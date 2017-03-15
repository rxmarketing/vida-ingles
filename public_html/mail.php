<?php 
    
    $to = "ricomxmarketing@gmail.com";
            $from = "auto_responder@vidaingles.com";
            $headers ="From: $from\n";
            $headers .= "MIMEVersion: 1.0\n";
            $headers .= "Contenttype: text/html; charset=iso88591 \n";
            $subject ="Vida Ingles Contrasena Temporal";
            $msg = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Contraseña temporal Vida Inglés</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:20px; color:#CCC;"><a href="http://vidaingles.com"><img src="http://vidaingles.com/i/logo50x50.png" width="36" height="30" alt="Vida Inglés" style="border:none; float:left;"></a>&nbsp;Contraseña temporal</div><div style="padding:24px; font-size:17px;"><h2>Hola '.$ausername.'</h2><p>Este es un mensaje autogenerado. Si no solicitaste una contraseña temporal, por favor ignora este mensaje.</p><p>Has indicado que has olvidado tu contraseña para inicio de sesión. Hemos  generado una contraseña temporal para que puedas iniciar sesión, luego, una vez iniciado sesión podrás cambiar la contraseña a una de tu elección.</p><p>Después de hacer clic a botón de abajo tu contraseña temporal será:<br /> <b>'.$tempPass.'</b></p><p><a href="http://vidaingles.com/forgotpass.php?u='.$ausername.'&p='.$hashTempPass.'"><button style="background-color:#222;color:#fff;padding:8px;font-size:15px;">Clic aquí para inicar sesión con tu contraseña temporal</button></a></p><p>Si no haces clic al botón, ningun cambio se hará a tu cuenta. Para cambiar tu contraseña de inicio de sesión a esta contraseña temporal debes hacer clic al botón de arriba.</p></div></body></html>';
            mail($to,$subject,$msg,$headers);
    
    
    ?>