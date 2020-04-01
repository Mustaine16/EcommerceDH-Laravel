var campoNombre = document.querySelector('input[name=nombre]');

var errorNombre = document.getElementById("error-nombre");

campoNombre.onblur = function() {
    errorNombre.innerHTML = "";
    if (this.value.trim() == "") {
        errorNombre.innerHTML = "El campo Nombre marca es Obligatorio";
    }
}

//Preview para la imagen asi evitamos el input, que se ve feo c:
function vistazoImagen(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById("imagenEdit");
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}