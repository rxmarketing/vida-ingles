<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 16/04/2017
 * Time: 02:04 PM
 */
include_once("../inc/check_session.php");
if ($admin_ok == true) {
    header("location: ../user.php?u=" . $_SESSION["username"]);
    exit();
}
if (isset($_POST["email"])) {
    sleep(2);
    include_once("../inc/db_cetec_mysqliconn.php");
    $e = mysqli_real_escape_string($db_mysqliconx, $_POST['email']);
    $p = hash('SHA512', $_POST['password']);
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
    if ($e == "" || $p == "") {
        echo "login_failed";
        exit();
    } else {
        $sql = "SELECT estud_id, estud_username, estud_pass FROM cetec.estudiantes WHERE estud_email='$e' AND estud_activated='1' LIMIT 1";
        $query = mysqli_query($db_mysqliconx, $sql);
        $row = mysqli_fetch_row($query);
        $db_id = $row[0];
        $db_username = $row[1];
        $db_pass_str = $row[2];
        if ($p != $db_pass_str) {
            echo "wrong_pass";
            exit();
        } else {
            $_SESSION['userid'] = $db_id;
            $_SESSION['username'] = $db_username;
            $_SESSION['password'] = $db_pass_str;
            setcookie("id", $db_id, strtotime('+30 days'), "/", "", "", TRUE);
            setcookie("user", $db_username, strtotime('+30 days'), "/", "", "", TRUE);
            setcookie("pass", $db_pass_str, strtotime('+30 days'), "/", "", "", TRUE);
            $sql = "UPDATE cetec.estudiantes SET estud_ip='$ip', estud_lastlogin=now() WHERE estud_username='$db_username' LIMIT 1";
            $query = mysqli_query($db_mysqliconx, $sql);
            echo $db_username;
            header("location: ../user.php?u=" . $_SESSION["username"]);
            exit();
        }
    }

} else {
    echo "No data.";
}