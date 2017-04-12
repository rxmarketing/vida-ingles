<?php

namespace estudiantes;

include_once "Database.php";
use dbconn\Database;


class Students
{
    function fetchStuds()
    {

        $getStuds = new Database();

        $lista_estudiantes = null;
        $getRows = $getStuds->getRows("SELECT estudiantes.estud_id ,escuelas.esc_nombre_corto AS 'Escuela'
            ,estudiantes.grupo_id
            ,estudiantes.estud_matricula
            ,estudiantes.estud_estatus_id
            ,estudiantes.estud_pnombre
            ,estudiantes.estud_snombre
            ,estudiantes.estud_papellido
            ,estudiantes.estud_sapellido
            ,generos.genero_nombre_corto AS 'Genero'
            ,grupos.grupo_clave AS 'Grupo'
            ,estudiante_estatuses.estud_estatus_nombre AS 'Estatus'
            
            FROM estudiantes 
            
            INNER JOIN escuelas ON escuelas.esc_id = estudiantes.escuela_id
            INNER JOIN generos ON generos.genero_id = estudiantes.genero_id
            INNER JOIN grupos ON grupos.grupo_id = estudiantes.grupo_id
            INNER JOIN estudiante_estatuses ON estudiante_estatuses.estud_estatus_id = estudiantes.estud_estatus_id
            
            ORDER BY  grupo_id DESC");

        foreach ($getRows as $row) {

            $studid = $row['estud_id'];
            $matricula = $row['estud_matricula'];
            $schoolclave = $row['Escuela'];
            $grupoclave = $row['Grupo'];
            // $levelId = $row['Level Id'];
            //$levelNombre = $row['Nombre Nivel'];
            $studestatusnombre = $row['Estatus'];
            $pnombre = $row['estud_pnombre'];
            $snombre = $row['estud_snombre'];
            $papellido = $row['estud_papellido'];
            $sapellido = $row['estud_sapellido'];
            $studfullname = $pnombre . ' ' . $snombre . ' ' . $papellido . ' ' . $sapellido;
            $generoclave = $row['Genero'];
            $lista_estudiantes .= '<tr>
		<td>' . $studid . '</td>
		<td>' . $matricula . '</td>
		<td>' . $studfullname . '</td>
		<td>' . $generoclave . '</td>
		<td>' . $schoolclave . '</td>
		<td>' . $grupoclave . '</td>
		<td></td>
		<td>' . $studestatusnombre . '</td>
		<td><input type="button" name="view" value="View" id="' . $studid . '" class="btn btn-info btn-sm view-data" /></td>
		<td><input type="button" name="view" value="Edit" id="' . $studid . '" class="btn btn-info btn-sm edit-data" /></td>
		</tr>';
        }
        return $lista_estudiantes;
    }
}