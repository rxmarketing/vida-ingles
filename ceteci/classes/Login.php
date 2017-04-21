<?php 
	
namespace entrar;

use database\DB;

class Login
{
	public static function isLoggedIn(){

	if(isset($_COOKIE['CETECID'])){
		
		if(DB::getRow('SELECT estud_id FROM cetec.login_tokens WHERE token=:tok',[':tok'=>sha1($_COOKIE['CETECID'])])){
			
			$logged_id = DB::getRow('SELECT estud_id FROM cetec.login_tokens WHERE token=:tok',[':tok'=>sha1($_COOKIE['CETECID'])])[0]['estud_id'];
			
			if(isset($_COOKIE['CETECID_'])){
				return $logged_id;
			} else {
				$crypt_strong = True;
    		$token = bin2hex(openssl_random_pseudo_bytes(64,$crypt_strong));
				DB::insertRow('INSERT INTO cetec.login_tokens VALUES (\'\',:token,:estud_id)',[':token'=>sha1($token), ':estud_id'=>$logged_id]);
				DB::insertRow('DELETE FROM cetec.login_tokens WHERE token = :tok',[':tok'=>sha1($_COOKIE['CETECID'])]);
				
				setcookie("CETECID",$token, time() + 60 * 60 * 24 * 7,'/',NULL,NULL,TRUE);
				setcookie("CETECID_",'1', time() + 60 * 60 * 24 * 3,'/',NULL,NULL,TRUE);
				
				return $logged_id;
			}
		}
	}
	return false;
}
	
	
	
	
}	
	
?>