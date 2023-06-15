<?php 
  require 'conexion.php';
  
  if(isset($_POST['text'])){
                $texto = $_POST['text'];
                
                $sql = "INSERT INTO tarea(descripcion, estado)
                                    VALUES('$texto', false)";
                
                if($conexion->query($sql) === true){
                   // echo '<div><form action=""><input type="checkbox">'.$texto.'</form></div>';
                }else{
                    die("Error al insertar datos: " . $conexion->error);
                }
               
            }
?>