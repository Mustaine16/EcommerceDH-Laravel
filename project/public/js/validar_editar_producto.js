
//Asignacion para capturar elementos de HTML
var form = document.querySelector('#editarProducto');
var campoNombre = document.querySelector('input[name=nombre]');
var sistOperativo = document.querySelector('input[name=sist_operativo]');
var memoriaInterna = document.querySelector('input[name=memoria_int]');
var memoriaRam = document.querySelector('input[name=memoria_ram]');
var procesador = document.querySelector('input[name=procesador]');
var pantalla = document.querySelector('input[name=pantalla]');
var camara = document.querySelector('input[name=camara]');
var precio = document.querySelector('input[name=precio]');

//Span de errores
var errorNombre = document.getElementById("error-nombre");
var errorSistOperativo = document.getElementById("error-sist-operativo");
var errorMemoriaInt = document.getElementById("error-memoria-int");
var errorMemoriaRam = document.getElementById("error-memoria-ram");
var errorProcesador = document.getElementById("error-procesador");
var errorPantalla = document.getElementById("error-pantalla");
var errorCamara = document.getElementById("error-camara");
var errorPrecio = document.getElementById("error-precio");

//Variable de validacion

var validacioncita = true;
var soloNumeros = /^[0-9]+([.])?([0-9]+)?$/;

//Checkeo ONLINE
campoNombre.addEventListener("input",validate);
sistOperativo.addEventListener("input",validate);
memoriaInterna.addEventListener("input",validate);
memoriaRam.addEventListener("input",validate);
procesador.addEventListener("input",validate);
pantalla.addEventListener("input",validate);
camara.addEventListener("input",validate);
precio.addEventListener("input",validate);

//VALIDACION SENCILLA
function validate (e) {
    let target = e.target;
//VALIDACION NOMBRE
    if(target.name == "nombre"){
        errorNombre.innerHTML = ""
    if (this.value.trim() == "") {
        //Esta Vacio?
       errorNombre.innerHTML = "El campo no puede estar vacio";
       validacioncita = false
       errorNombre.className = "badge badge-danger"
    
    }else{
        validacioncita = true 
        errorNombre.innerHTML = "Correcto"
        errorNombre.className = "badge badge-success valid"
    }
}
//VALIDACION SISTEMA OPERATIVO
    if(target.name=="sist_operativo"){
        errorSistOperativo.innerHTML = "";
    if (this.value.trim() == "") {
        errorSistOperativo.innerHTML = "El campo no puede estar vacio";
        validacioncita = false
        errorSistOperativo.className = "badge badge-danger"
    }else{
        validacioncita = true 
        errorSistOperativo.innerHTML = "Correcto"
        errorSistOperativo.className = "badge badge-success valid"
    }
}
//VALIDACION MEMORIA INTERNA
    if(target.name=="memoria_int"){
        if(this.value.trim()==""){
        errorMemoriaInt.innerHTML = "El campo no puede estar vacio"
        validacioncita = false
        errorMemoriaInt.className = "badge badge-danger"
    }else if(!soloNumeros.test(this.value)){
        errorMemoriaInt.innerHTML = "Solo numeros positivos"
        validacioncita = false
        errorMemoriaInt.className = "badge badge-danger"
    }else if(this.value > 1025 || this.value < 1){
        errorMemoriaInt.innerHTML = "El maximo de memoria interna es 1024GB y el minimo es 1GB"
        validacioncita = false
        errorMemoriaInt.className = "badge badge-danger"
    }else{
        validacioncita = true 
        errorMemoriaInt.innerHTML = "Correcto"
        errorMemoriaInt.className = "badge badge-success valid"
    }
    }
//VALIDACION MEMORIA RAM
    if(target.name=="memoria_ram"){
        errorMemoriaRam.innerHTML = "";
    if (this.value.trim() == "") {
        errorMemoriaRam.innerHTML = "El campo no puede estar vacio";
        validacioncita = false
        errorMemoriaRam.className = "badge badge-danger"
    }else if(!soloNumeros.test(this.value)){
        errorMemoriaRam.innerHTML = "Solo numeros"
        validacioncita = false
        errorMemoriaRam.className = "badge badge-danger"
    }else if(this.value > 12 || this.value < 1){
        errorMemoriaRam.innerHTML = "El maximo de ram es 12GB y el minimo es 1GB";
        validacioncita = false
        errorMemoriaRam.className = "badge badge-danger"
    }
    else{
        validacioncita = true 
        errorMemoriaRam.innerHTML = "Correcto"
        errorMemoriaRam.className = "badge badge-success valid"
    }
}
//VALIDACION PROCESADOR
     if(target.name=="procesador"){
        errorProcesador.innerHTML = "";
    if (this.value.trim() == "") {
        errorProcesador.innerHTML = "El campo no puede estar vacio";
        validacioncita = false
        errorProcesador.className = "badge badge-danger"
    }else{
        validacioncita = true 
        errorProcesador.innerHTML = "Correcto"
        errorProcesador.className = "badge badge-success valid"
    }
}
//VALIDACION PANTALLA
      if(target.name=="pantalla"){
        errorPantalla.innerHTML = "";
    if (this.value.trim() == "") {
        errorPantalla.innerHTML = "El campo no puede estar vacio";
        validacioncita = false
        errorPantalla.className = "badge badge-danger"
    }else if(this.value > 7){
        errorPantalla.innerHTML = "El tamaño de la pantalla tiene que ser menor a 7 pulgadas no vendemos tablets (por ahora <3)";
        validacioncita = false
        errorPantalla.className = "badge badge-danger"
    }else if(this.value <= 3){
        errorPantalla.innerHTML = "El tamaño de la pantalla tiene que ser mayor a 3 pulgadas";
        validacioncita = false
        errorPantalla.className = "badge badge-danger"
    }else if(!soloNumeros.test(this.value)){
        errorPantalla.innerHTML = "Solo positivos (pueden ser numeros seguidos por un puntito)";
        validacioncita = false
        errorPantalla.className = "badge badge-danger"
    }
    else{
        validacioncita = true 
        errorPantalla.innerHTML = "Correcto"
        errorPantalla.className = "badge badge-success valid"
    }
}
//VALIDACION CAMARA
    if(target.name=="camara"){
        errorCamara.innerHTML = "";
    if (this.value.trim() == "") {
        errorCamara.innerHTML = "El campo no puede estar vacio";
        validacioncita = false
        errorCamara.className = "badge badge-danger"
    }else{
        validacioncita = true 
        errorCamara.innerHTML = "Correcto"
        errorCamara.className = "badge badge-success valid"
    }
}
//VALIDACION PRECIO
    if(target.name=="precio"){
        errorPrecio.innerHTML = "";
    if (this.value.trim() == "") {
        errorPrecio.innerHTML = "El campo no puede estar vacio";
        validacioncita = false
        errorPrecio.className = "badge badge-danger"
    }else if(!soloNumeros.test(this.value)){
        errorPrecio.innerHTML = "Solo numeros positivos";
        validacioncita = false
        errorPrecio.className = "badge badge-danger"
    }
    else{
        validacioncita = true 
        errorSistOperativerrorPrecio.innerHTML = "Correcto"
        errorSistOperativerrorPrecio.className = "badge badge-success valid"
    }
}
}

    

//No me envies porfa si tengo errores :)
form.onsubmit = function(event){
    
    if( validacioncita == false )
    {
    console.log('No me puedo enviar contengo errores');

      // evitar enviar el formulario
      event.preventDefault();
    }else{
        alert("Todo correcto...volviendo a los productos...")
    }
}

//Preview para la imagen asi evitamos el input, que se ve feo c:
function vistazoImagen(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById("imagenEdit");
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}

