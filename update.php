<?php
  require 'conexion.php';
if(isset($_POST['completar'])){
                $id = $_POST['completar'];

                $sql = "UPDATE tarea SET estado = 1 WHERE id = $id";

                if($conexion->query($sql) === true){
                    //echo '<div><form action=""><input type="checkbox">'.$texto.'</form></div>';
                }else{
                    die("Error al actualizar datos: " . $conexion->error);
                } 
            }
?>            