<?php
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
    <title>View, edit, add student statuses</title>
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap-reboot.min.css"/>
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../../bower_components/tether/dist/js/tether.min.js"></script>
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="table-responsive">
                <h1>Add, edit, student statuses</h1>
                <div id="live_data"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function () {

        /* fetch group statuses and display them in a table function
         -------------------------------------------------------------------------------*/
        function fetch_data() {
            $.ajax({
                url: "ajax/ajax_fetch_student_statuses.php",
                method: "POST",
                success: function (data) {
                    $('#live_data').html(data);
                }
            });
        }

        fetch_data();


        /* add new record to db when #btn_add button is clicked
         -------------------------------------------------------------------------------*/
        $(document).click('#btn_add', function () {
            var stud_status_name = $('#estatus_nombre').text();

            if (stud_status_name === '') {
                alert("Todos los campos son obligatorios");
                return false;
            }
            $.ajax({
                url: "php/php_insert_student_statuses.php",
                method: "POST",
                data: {
                    stud_status_name: stud_status_name
                },
                dataType: "text",
                success: function (data) {
                    alert(data);
                    fetch_data();
                }
            });
        });

        /* edit record
         -------------------------------------------------------------------------------
         function live_edit_stud(id, text, column_name){
         $.ajax({
         url: "php/php_live_edit_stud_data.php",
         method: "POST",
         data: {
         id:id,
         text: text,
         column_name:column_name
         },
         dataType: "text",
         success: function(data){
         alert(data);
         }

         });
         }

         $(document).on('blur', '.p_apellido',function(){
         var id = $(this).data("id1");
         var p_apellido = $(this).text();
         live_edit_stud(id, p_apellido, "estud_papellido")
         });

         */
    });
</script>
