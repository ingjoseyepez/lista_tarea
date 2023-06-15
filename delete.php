<?php
  require 'conexion.php';
if(isset($_POST['eliminar'])){
                $id = $_POST['eliminar'];

                $sql = "DELETE FROM tarea WHERE id = $id";

                if($conexion->query($sql) === true){
                    //echo '<div><form action=""><input type="checkbox">'.$texto.'</form></div>';
                }else{
                    die("Error al actualizar datos: " . $conexion->error);
                } 
            }
?>