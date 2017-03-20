<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 19/03/2017
 * Time: 08:15 PM
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
  <title>Módulos sub-categorías</title>
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
        <h1>Módulo sub-categorías</h1>
        <p>Ver, agregar y editar.</p>
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
                url: "ajax/ajax_fetch_module_subcategories.php",
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
            var mod_subcat_name = $('#mod_subcat_nombre').text();
            var mod_cat_id = $('#mod_cat_id').text();

            if (mod_subcat_name === '' || mod_cat_id === '') {
                alert("Todos los campos son obligatorios");
                return false;
            }
            $.ajax({
                url: "php/php_insert_mod_subcat.php",
                method: "POST",
                data: {
                    mod_subcat_name: mod_subcat_name,
                    mod_cat_id: mod_cat_id
                },
                dataType: "text",
                success: function (data) {
                    alert(data);
                    fetch_data();
                }
            });
        });

      /* update record
       ------------------------------------------------------------------------------- */
        function edit_mod_cat(id, text, column_name) {
            $.ajax({
                url: "php/php_update_mod_subcat.php",
                method: "POST",
                data: {
                    id: id,
                    text: text,
                    column_name: column_name
                },
                dataType: "text",
                success: function (data) {
                    alert(data);
                }

            });
        }

        $(document).on('blur', '.mod_subcat_nombre', function () {
            var id = $(this).data("id1");
            var mod_subcat_nombre = $(this).text();
            edit_mod_cat(id, mod_subcat_nombre, "modulo_subcat_nombre")
        });

        $(document).on('blur', '.mod_cat_id', function () {
            var id = $(this).data("id2");
            var mod_cat_id = $(this).text();
            edit_mod_cat(id, mod_cat_id, "modulo_cat_id")
        });


    });
</script>