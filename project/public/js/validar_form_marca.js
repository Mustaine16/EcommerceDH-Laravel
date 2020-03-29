var campoNombre = document.querySelector('input[name=nombre]');

campoNombre.onblur = function() {
    if (this.value.trim() == "") {
        alert("El campo Nombre marca es Obligatorio");
    }
}
