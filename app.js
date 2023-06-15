function completarPendiente(e){
    var id = "form" + e.id;
    var formulario = document.getElementById(id);
    formulario.submit();
}

function mostrarTodo(e){
    var formulario = document.getElementById("formMostrarTodo");
    formulario.submit();
}