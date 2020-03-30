var campoNombre = document.querySelector('input[name=nombre]');
var campoMarca = document.querySelector('input[name=id_marca]');
var sistOperativo = document.querySelector('input[name=sist_operativo]');
var memoriaInterna = document.querySelector('input[name=memoria_int]');
var memoriaRam = document.querySelector('input[name=memoria_ram]');
var procesador = document.querySelector('input[name=procesador]');
var pantalla = document.querySelector('input[name=pantalla]');
var camara = document.querySelector('input[name=camara]');
var precio = document.querySelector('input[name=precio]');

var errorNombre = document.getElementById("error-nombre");
var errorSistOperativo = document.getElementById("error-sist-operativo");
var errorMemoriaInt = document.getElementById("error-memoria-int");
var errorMemoriaRam = document.getElementById("error-memoria-ram");
var errorProcesador = document.getElementById("error-procesador");
var errorPantalla = document.getElementById("error-pantalla");
var errorCamara = document.getElementById("error-camara");
var errorPrecio = document.getElementById("error-precio");

campoNombre.onblur = function() {
    errorNombre.innerHTML = "";
    if (this.value.trim() == "") {
        errorNombre.innerHTML = "El campo Nombre del Producto es Obligatorio.";
    }
}

sistOperativo.onblur = function() {
    errorSistOperativo.innerHTML = "";
    if (this.value.trim() == "") {
        errorSistOperativo.innerHTML = "El campo Sistema Operativo es Obligatorio.";
    }
}

memoriaInterna.onblur = function() {
    errorMemoriaInt.innerHTML = "";
    if (this.value.trim() == "") {
        errorMemoriaInt.innerHTML = "El campo Memoria Interna es Obligatorio.";
    } else if (isNaN(this.value)) {
        errorMemoriaInt.innerHTML = "El campo Memoria Interna debe ser Numérico.";
    }
}

memoriaRam.onblur = function() {
    errorMemoriaRam.innerHTML = "";
    if (this.value.trim() == "") {
        errorMemoriaRam.innerHTML = "El campo Memoria Ram es Obligatorio.";
    } else if (isNaN(this.value)) {
        errorMemoriaRam.innerHTML = "El campo Memoria Ram debe ser Numérico.";
    }
}

procesador.onblur = function() {
    errorProcesador.innerHTML = "";
    if (this.value.trim() == "") {
        errorProcesador.innerHTML = "El campo Procesador debe ser Numérico.";
    }
}

pantalla.onblur = function() {
    errorPantalla.innerHTML = "";
    if (this.value.trim() == "") {
        errorPantalla.innerHTML = "El campo Pantalla es Obligatorio.";
    } else if (isNaN(this.value)) {
        errorPantalla.innerHTML = "El campo Pantalla debe ser Numérico.";
    }
}

camara.onblur = function() {
    errorCamara.innerHTML = "";
    if (this.value.trim() == "") {
        errorCamara.innerHTML = "El campo Cámara es Obligatorio.";
    } else if (isNaN(this.value)) {
        errorCamara.innerHTML = "El campo Cámara debe ser Numérico.";
    }
}

precio.onblur = function() {
    errorPrecio.innerHTML = "";
    if (this.value.trim() == "") {
        errorPrecio.innerHTML = "El campo Precio es Obligatorio.";
    } else if (isNaN(this.value)) {
        errorPrecio.innerHTML = "El campo Precio debe ser Numérico.";
    }
}
