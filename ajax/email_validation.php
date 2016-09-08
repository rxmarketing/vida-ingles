<?php
if (isset($_POST['email'])) {
 $email = $_POST['email'];
 if (!empty($email)) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
   echo '<div class="bg-danger text-danger">Tu correo electrónico no es válido</div>';
  } else {
   echo '<div class="bg-success text-success">Correo electrónico válido</div>';
  }
 }
}
?>