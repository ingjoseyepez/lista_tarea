<?php
            $servidor = "localhost";
            $nombreusuario = "root";
            $password = "root";
            $db = "lista";
        
            $conexion = new mysqli($servidor, $nombreusuario, $password, $db);
        
            if($conexion->connect_error){
                die("Conexión fallida: " . $conexion->connect_error);
            }
        ?>