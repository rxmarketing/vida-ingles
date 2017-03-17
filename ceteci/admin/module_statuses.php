<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 16/03/2017
 * Time: 06:44 PM
 */

include('../inc/db_ceteci_conn.php');
include('../inc/ceteci_functions.php');
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View, edit, add module statuses</title>
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap-reboot.min.css"/>
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../../bower_components/tether/dist/js/tether.min.js"></script>
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>

    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="table-fluid">
                <h3>Module statuses</h3>
                <p>Add and edit</p>
                <div id="live_data"></div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<script>
    $(document).ready(function () {

        /* Fetch módulos from db table
         * ------------------------------------------------------------------------------------------- */
        function fetch_data() {
            $.ajax({
                url: "ajax/ajax_fetch_module_statuses.php",
                method: "POST",
                success: function (data) {
                    $('#live_data').html(data);
                }

            });
        }

        fetch_data();

        /* add new record to db when #btn_add button is clicked
         * ------------------------------------------------------------------------------------------- */
        $(document).click('#btn_add', function () {
            var mod_status_name = $('#mod_estatus_nombre').text();
            var mod_status_desc = $('#mod_estatus_desc').text();

            if (mod_status_name === '' || mod_status_desc === "") {
                alert("Todos los campos son obligatorios");
                return false;
            }
            $.ajax({
                url: "php/php_insert_module_statuses.php",
                method: "POST",
                data: {
                    mod_status_name: mod_status_name,
                    mod_status_desc: mod_status_desc
                },
                dataType: "text",
                success: function (data) {
                    alert(data);
                    fetch_data();
                }
            });
        });

    });
</script>