<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Lista de Tareas</title>
</head>
<body>
    <div id="main-container">
        <div class="titulo"><i class="fa-solid fa-list-check"></i><h1> Lista de Tareas</h1>
     </div>
        
        <form id="nuevo-pendiente-container" action="index.php" method="POST">
            <input type="text" name="text" id="text">
            <input type="submit" value="Añadir Tarea">
        </form>
        <div id="mostrar-todo-container">
            <form id="formMostrarTodo" action="index.php" method="POST">
                <input type="checkbox" name="mostrar-todo" onchange="mostrarTodo(this)" 
                <?php if(isset($_POST['mostrar-todo'])) {
                    if($_POST['mostrar-todo'] == "on"){
                        echo " checked";
                    }
                    } ?>> Mostrar todo
            </form>
        </div>

        <div id="todolist">
            <?php
             include("conexion.php");
             include("add.php");
             include("update.php");          
             include("delete.php");  
                $sql = "";
                if(isset($_POST['mostrar-todo'])){
                    $ordenar = $_POST['mostrar-todo'];

                    if($ordenar == "on"){
                        $sql = "SELECT * FROM tarea ORDER BY estado DESC";    
                    }
                }else{
                    $sql = "SELECT * FROM tarea WHERE estado = 0";
                }
                //Obtención de datos de tabla
                $resultado = $conexion->query($sql);

                if($resultado->num_rows > 0){
                    while($row = $resultado->fetch_assoc()){
                        ?>
                        <div class="pendiente">
                            <form method="POST" class="form_actualizar" id="form<?php echo $row['id']; ?>" action="">
                                <input name ="completar" value="<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>" type="checkbox" onchange="completarPendiente(this)" <?php if($row['estado'] == 1) echo " checked disabled"; ?>><div class="texto <?php if($row['estado'] == 1) echo " deshabilitado"; ?>"><?php echo $row['descripcion'];?></div>
                            </form>
                            <form method="POST" class="form_eliminar" action="index.php">
                                <input type="hidden" name="eliminar" value="<?php echo $row['id']; ?>"  />
                                <input type="submit" class="delete" value="Eliminar">
                            </form>
                        </div>
                        <?php
                        
                    }
                }

                $conexion->close();

            ?>
        </div>
    </div>
    <script src="app.js"></script>
</body>
</html>