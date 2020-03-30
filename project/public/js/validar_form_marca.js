var campoNombre = document.querySelector('input[name=nombre]');

var errorNombre = document.getElementById("error-nombre");

campoNombre.onblur = function() {
    errorNombre.innerHTML = "";
    if (this.value.trim() == "") {
        errorNombre.innerHTML = "El campo Nombre marca es Obligatorio";
    }
}
