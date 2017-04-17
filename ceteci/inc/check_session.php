<?php
session_start();

include_once 'db_cetec_mysqliconn.php';

$admin_ok = false;
$student_ok = false;
$log_adminid = "";
$log_adminusername = "";
$log_adminpass = "";

function evalAdmin($conn, $id, $user, $pass)
{
    $stmt = "SELECT admin_ip FROM admin WHERE admin_id='$id' AND admin_username='$user' AND admin_pass='$pass' AND admin_activated='1' LIMIT 1";

    $result = mysqli_query($conn, $stmt);

    $numRows = mysqli_num_rows($result);

    if ($numRows > 0) {
        return true;
    }
}


function evalStud($conn, $id, $user, $pass)
{
    $stmt = "SELECT estud_id FROM cetec.estudiantes WHERE estud_id='$id' AND estud_username='$user' AND estud_pass='$pass' AND estud_activated='1' LIMIT 1";
    $result = mysqli_query($conn, $stmt);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        return true;
    }
}

if (isset($_SESSION['u_id']) && isset($_SESSION['u_username']) && isset($_SESSION['u_pass'])) {
    $log_id = preg_replace('#[^0-9]#', '', $_SESSION['u_id']);
    $log_username = preg_replace('#[^a-z0-9]#i', '', $_SESSION['u_username']);
    $log_pass = preg_replace('#[^a-z0-9]#i', '', $_SESSION['u_pass']);

    $admin_ok = evalAdmin($db_mysqliconx, $log_id, $log_username, $log_pass);
    $student_ok = evalStud($db_mysqliconx, $log_id, $log_username, $log_pass);

} elseif (isset($_COOKIE["id"]) && isset($_COOKIE["user"]) && isset($_COOKIE["pass"])) {


    $_SESSION['u_id'] = preg_replace('#[^0-9]#', '', $_COOKIE['id']);
    $_SESSION['u_username'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['user']);
    $_SESSION['u_pass'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['pass']);


    $log_id = $_SESSION['u_id'];
    $log_username = $_SESSION['u_username'];
    $log_pass = $_SESSION['u_pass'];
    $_SESSION['lastlogintime'] = time();

    $admin_ok = evalAdmin($db_mysqliconx, $log_id, $log_username, $log_pass);
    $student_ok = evalStud($db_mysqliconx, $log_id, $log_username, $log_pass);

    if ($admin_ok == true) {
        // Update their lastlogin datetime field
        $sql = "UPDATE admin SET admin_lastlogin=now() WHERE admin_id='$log_id' LIMIT 1";
        $query = mysqli_query($db_mysqliconx, $sql);
    }

    if ($student_ok == true) {
        // Update their lastlogin datetime field
        $sql = "UPDATE cetec.estudiantes SET estud_lastlogin=now() WHERE estud_id='$log_id' LIMIT 1";
        $query = mysqli_query($db_mysqliconx, $sql);
    }
}