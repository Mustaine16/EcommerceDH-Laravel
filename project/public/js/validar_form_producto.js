var campoNombre = document.querySelector('input[name=nombre]');
var campoMarca = document.querySelector('input[name=id_marca]');
var sistOperativo = document.querySelector('input[name=sist_operativo]');
var memoriaInterna = document.querySelector('input[name=memoria_int]');
var memoriaRam = document.querySelector('input[name=memoria_ram]');
var procesador = document.querySelector('input[name=procesador]');
var pantalla = document.querySelector('input[name=pantalla]');
var camara = document.querySelector('input[name=camara]');
var precio = document.querySelector('input[name=precio]');

campoNombre.onblur = function() {
    if (this.value.trim() == "") {
        alert("El campo Nombre del Producto es Obligatorio");
    }
}

sistOperativo.onblur = function() {
    if (this.value.trim() == "") {
        alert("El campo Sistema Operativo es Obligatorio.");
    }
}

memoriaInterna.onblur = function() {
    if (this.value.trim() == "") {
        alert("El campo Memoria Interna es Obligatorio.");
    } else if (isNaN(this.value)) {
        alert("El campo Memoria Interna debe ser Numérico.");
    }
}

memoriaRam.onblur = function() {
    if (this.value.trim() == "") {
        alert("El campo Memoria Ram es Obligatorio.");
    } else if (isNaN(this.value)) {
        alert("El campo Memoria Ram debe ser Numérico.");
    }
}

procesador.onblur = function() {
    if (this.value.trim() == "") {
        alert("El campo Procesador es Obligario.");
    }
}

pantalla.onblur = function() {
    if (this.value.trim() == "") {
        alert("El campo Pantalla es Obligatorio.");
    } else if (isNaN(this.value)) {
        alert("El campo Pantalla debe ser Numérico.");
    }
}

camara.onblur = function() {
    if (this.value.trim() == "") {
        alert("El campo Cámara es Obligatorio.");
    } else if (isNaN(this.value)) {
        alert("El campo Cámara debe ser Numérico.");
    }
}

precio.onblur = function() {
    if (this.value.trim() == "") {
        alert("El campo Precio es Obligatorio.");
    } else if (isNaN(this.value)) {
        alert("El campo Precio debe ser Numérico.");
    }
}
