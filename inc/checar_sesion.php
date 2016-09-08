<?php
    session_start();
    include_once("db_vidainglescore_conn.php");
    // Files that inculde this file at the very top would NOT require 
    // connection to database or session_start(), be careful.
    // Initialize some vars
    $user_ok = false;
    $admin_ok = false;
    $log_id = "";
    $log_username = "";
    $log_password = "";
    // User Verify function
    function evalLoggedUser($conx,$id,$u,$p){
        $sql = "SELECT ip FROM usuarios WHERE userid='$id' AND username='$u' AND password='$p' AND activated='1' LIMIT 1";
        $query = mysqli_query($conx, $sql);
        $numrows = mysqli_num_rows($query);
        if($numrows > 0){
            return true;
        }
    }
    
    // ADMIN VERIFICATION FUNCTION ////////////////////////////////
    function evalAdmin($conx,$id,$u,$p) {
        $sql = "SELECT ip FROM usuarios WHERE userid='$id' AND username='$u' AND password='$p' AND userlevel='4' AND activated='1' LIMIT 1";
        $qry = mysqli_query($conx, $sql);
        $numrows = mysqli_num_rows($qry);
        if ($numrows > 0) {
            return true;
        }
    }
    
    if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
        $log_id = preg_replace('#[^0-9]#', '', $_SESSION['userid']);
        $log_username = preg_replace('#[^a-z0-9]#i', '', $_SESSION['username']);
        $log_password = preg_replace('#[^a-z0-9]#i', '', $_SESSION['password']);
        
        
        // Verify the user
        $admin_ok = evalAdmin($db_conx,$log_id,$log_username,$log_password);
        $user_ok = evalLoggedUser($db_conx,$log_id,$log_username,$log_password);
        } else if(isset($_COOKIE["id"]) && isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){
        $_SESSION['userid'] = preg_replace('#[^0-9]#', '', $_COOKIE['id']);
        $_SESSION['username'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['user']);
        $_SESSION['password'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['pass']);
        $log_id = $_SESSION['userid'];
        $log_username = $_SESSION['username'];
        $log_password = $_SESSION['password'];
        $_SESSION['lastlogintime'] = time();
        // Verify the user
        $admin_ok = evalAdmin($db_conx,$log_id,$log_username,$log_password);
        $user_ok = evalLoggedUser($db_conx,$log_id,$log_username,$log_password);
        if($user_ok == true){
            // Update their lastlogin datetime field
            $sql = "UPDATE usuarios SET lastlogin=now() WHERE id='$log_id' LIMIT 1";
            $query = mysqli_query($db_conx, $sql);
        }
        
    }
    
    $avatar = "";
    $sql = "SELECT avatar FROM usuarios WHERE username='$log_username' AND activated='1' LIMIT 1";
    $avatar_query = mysqli_query($db_conx,$sql);
    while ($row = mysqli_fetch_array($avatar_query, MYSQLI_ASSOC)) {
        $avatar = $row["avatar"];
    }
    //inicilizamos avatar de usuario en sesion
    $log_user_pic = '<img class="img-circle" src="http://localhost/vidaingles/users/'.$log_username.'/'.$avatar.'" alt="'.$log_username.'" width="27" height="27">';
    if($avatar == NULL){
        $log_user_pic = '<img class="img-circle" src="http://localhost/vidaingles/i/avatardefault.jpg" width="27" height="27" alt="'.$log_username.'">';
    }
    //fetch site info
    $sql = "SELECT * FROM siteinfo";
    $siteinfo_query = mysqli_query($db_conx,$sql);
    while ($row = mysqli_fetch_array($siteinfo_query, MYSQLI_ASSOC)) {
        $site_id = $row["siteid"];
        $site_name = $row["sitetitle"];
        $site_tagline = $row["sitetagline"];
        $site_url = $row["siteurl"];
        $site_email = $row["siteemail"];
        $site_mobile = $row["sitemobile"];
        $site_phone = $row["sitephone"];
        $site_address1 = $row["siteaddress1"];
        $site_address2 = $row["siteaddress2"];
        $site_city = $row["sitecity"];
        $site_cp = $row["sitecp"];
        $site_state = $row["sitestate"];
        $site_country = $row["sitecountry"];
    }
    //set page title
    $test_name = "";
    $page_title = ''.$site_name.' | '.$site_tagline.' ';
    // Build the url in the address bar
	$url  = 'http://';
	$url .= $_SERVER['HTTP_HOST'];
	$url .= $_SERVER['REQUEST_URI'];
    
?>