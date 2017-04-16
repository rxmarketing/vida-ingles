<?php
session_start();

include_once 'db_cetec_mysqliconn.php';

$admin_ok = false;
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

if (isset($_SESSION['adminid']) && isset($_SESSION['adminusername']) && isset($_SESSION['adminpass'])) {
    $log_adminid = preg_replace('#[^0-9]#', '', $_SESSION['adminid']);
    $log_adminusername = preg_replace('#[^a-z0-9]#i', '', $_SESSION['adminusername']);
    $log_adminpass = preg_replace('#[^a-z0-9]#i', '', $_SESSION['adminpass']);

    $admin_ok = evalAdmin($db_mysqliconx, $log_adminid, $log_adminusername, $log_adminpass);

} elseif (isset($_COOKIE["id"]) && isset($_COOKIE["user"]) && isset($_COOKIE["pass"])) {


    $_SESSION['adminid'] = preg_replace('#[^0-9]#', '', $_COOKIE['id']);
    $_SESSION['adminusername'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['user']);
    $_SESSION['adminpass'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['pass']);


    $log_adminid = $_SESSION['adminid'];
    $log_adminusername = $_SESSION['adminusername'];
    $log_adminpass = $_SESSION['adminpass'];
    $_SESSION['lastlogintime'] = time();

    $admin_ok = evalAdmin($db_mysqliconx, $log_adminid, $log_adminusername, $log_adminpass);

    if ($admin_ok == true) {
        // Update their lastlogin datetime field
        $sql = "UPDATE admin SET admin_lastlogin=now() WHERE admin_id='$log_adminid' LIMIT 1";
        $query = mysqli_query($db_mysqliconx, $sql);
    }
}