<?php
    $db_conx = new mysqli("localhost","ricardo","tio51tony50","ceteci");
    $db_conx->set_charset("utf8");
    if($db_conx->connect_errno) {
        echo "Lo sentimos, este sitio esta teniendo problemas, intentelo mas tarde. <br />";
        //echo "ERRNO: " . $db_conx->connect_errno . "<br />";
        //echo "ERROR: " . $db_conx->connect_error;
        exit;
    }
    include('inc/ceteci_functions.php');
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>New school</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/cetec.css" />
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script src="js/aajax.js"></script>
        <script src="js/main.js"></script>
        <script src="js/myjavascript.js"></script>
        <script src="js/ceteci.js"></script>
        <style type="text/css">
            .sstud-form-wrapper {
            width:50%;
            margin: 0 auto;
            padding-bottom: 30px;
            }
            
            .form-signin {
            max-width: 430px;
            padding: 15px;
            margin: 0 auto;
            }
            
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
            margin-bottom: 10px;
            }
            
            .form-control {
            margin-bottom: 10px;
            }
            
            fieldset {
            margin-bottom: 20px;
            }
        </style>
        <script>
            function restrict(elem) {
                var tf = _(elem);
                var rx = new RegExp;
                if(elem == "groupCode") {
                    rx = /[.,'"; ]/gi;
                    } else if(elem == "groupNotes"){
                    rx = /['"]/gi;    
                }
                tf.value = tf.value.replace(rx, "");
            }
        </script>
    </head>
    <body>
        <div class="container">
            <div class="stud-form-wrapper">
                <form action="php/php_add_school.php" class="form-signin" role="form" method="post" name="addGrpFrm" id="addGrpFrm">
                    <h1 class="form-signin-heading">Create new school</h1>
                    <fieldset>
                        <legend>School info</legend>
                        <div class="form-group">
                            <label class="control-label" for="school_name">School name</label>
                        	<input type="text" class="form-control" onkeyup="restrict('')" name="school_name" id="school_name" placeholder="Key in school name " maxlength="50"/>
                        </div>
						
                        <div class="form-group">
                        	<label class="control-label" for="address">Address line 1</label>
                        	<input class="form-control" type="text" name="address" id="address" maxlength="80"/>
                        </div>
                        <div class="form-group">
                        	<label class="control-label" for="address2">Address line 2</label>
                        	<input class="form-control" type="text" name="address2" id="address2" maxlength="80" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="country">Country</label>
                            <select class="form-control" name="country" id="country">
                                <option value="0" disabled selected>--- Select a country ----</option>
                                 <?php echo select_countries($db_conx) ?>
                            </select>
                        </div>
						<div class="form-group">
                        	<label class="control-label" for="state_id">State</label>
                        	<select class="form-control" name="state" id="state">
                        	    <option value="" selected disabled>--- choose a state -------</option>
                        	    <?php echo select_states($db_conx) ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="muni">Municipality</label>
                            <select class="form-control" name="muni" id="muni">
                            </select>
                        </div>
                        <div class="form-group">
                        	<label class="control-label" for="asentamiento">Col/Fracc</label>
                            <select name="asentamiento" id="asentamiento" class="form-control">
                            </select>
                        </div>
                        <div class="form-group">
                        	<label class="control-label" for="zip">Zip Code</label>
                        	<input class="form-control" onkeyup="restrict('zip')" type="zip" name="zip" id="zip" maxlength="5" placeholder="Key in zip code"/>
                        </div>
						<div class="form-group">
                        	<label class="control-label" for="email">Email</label>
                        	<input class="form-control" onkeyup="restrict('email')" type="email" name="email" id="email" maxlength="100"/>
                        </div>
                        <div class="form-group">
                        	<label class="control-label" for="mobilef">Mobile Phone</label>
                        	<input class="form-control" onkeyup="restrict('mobilef')" type="tel" name="mobilef" id="mobilef" maxlength="10" />
                        </div>
                        <div class="form-group">
                        	<label class="control-label" for="homef">Home Phone</label>
                        	<input class="form-control" onkeyup="restrict('homef')" type="tel" name="homef" id="homef" maxlength="10"/>
                        </div>
						<div class="form-group">
                        	<label class="control-label" for="website">Website</label>
                        	<input class="form-control" type="text" name="website" id="website" placeholder="Key in website" maxlength="100"/>
                        </div>
						<div class="form-group">
                        	<label class="control-label" for="rfc">RFC</label>
                        	<input class="form-control" type="text" name="rfc" id="rfc" placeholder="Key in RFC" maxlength="100"/>
                        </div>
						<div class="form-group">
                        	<label class="control-label" for="scl_notes">Notes</label>
                        	<input class="form-control" type="text" name="scl_notes" id="scl_notes" placeholder="Notes" maxlength="255"/>
                        </div>
                    </fieldset>
                    
                    
                    
                    
                    <button class="btn btn-primary btn-block" id="addSchoolBtn">Create school</button>
                    <span class="msg"></span>
                </form>
                <script src="js/add_group.js"></script>
            </div>
        </div>
    </body>
</html>