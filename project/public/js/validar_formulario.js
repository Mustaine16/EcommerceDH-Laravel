// capturar los elementos
const form = document.querySelector('#formularioContacto');

var campoNombre = document.querySelector('#nombre');
const nombreError = document.querySelector('#nombre + span.error');

var campoEmail = document.querySelector('#email');
const emailError = document.querySelector('#email + span.error');

var campoApellido = document.querySelector('#apellido');
const apellidoError = document.querySelector('#apellido + span.error');

var campoTelefono = document.querySelector('#telefono');
const telefonoError = document.querySelector('#telefono + span.error');

const erroresAlEnviar = document.querySelector('#erroresAlEnviar');

var regexMail= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var regexTelefono =/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/

var errores =true;


form.onsubmit = function(event){

//verificar campos
campoNombre.onblur = function(event){
  //campo vacio o muy corto
  if(this.value.trim()=="" || this.value.trim().length < 2){
    if(this.value.trim()=="") {
    console.log('El nombre no puede estar vacío');
    //mostrar mensaje de error
    nombreError.innerHTML = 'El nombre no puede estar vacío';
    nombreError.className = 'text-danger';
    errores=true;
   }
   else {
     console.log('El nombre es muy corto pa');
     //mostrar mensaje de error
     nombreError.innerHTML = 'El nombre es muy corto, al menos dos caracteres';
     nombreError.className = 'text-danger';
     errores=true;
   }
  }
  else{
    //mensaje éxito
    nombreError.innerHTML = 'OK';
    nombreError.className = 'text-success';
    errores=false;
  }
}
//apellido
campoApellido.onblur = function(event){
  //campo vacio
  if(this.value.trim()=="" ){
    //mostrar mensaje de error
    apellidoError.innerHTML = 'El apellido no puede estar vacío';
    apellidoError.className = 'text-danger';
    errores=true;
  }
  else{
    //mensaje éxito
    apellidoError.innerHTML = 'OK';
    apellidoError.className = 'text-success';
    errores=false;
  }
}
//email
campoEmail.onblur = function(event){
  //campo vacio o muy corto
  if(this.value.trim()=="" || !regexMail.test(this.value)) {
    if(this.value.trim()=="") {
    //mostrar mensaje de error
    emailError.innerHTML = 'El email no puede estar vacío';
    emailError.className = 'text-danger';
    errores=true;
   }
   else {
     console.log('El email no es valido');
     //mostrar mensaje de error
     emailError.innerHTML = 'El email no parece válido';
     emailError.className = 'text-danger';
     errores=true;
   }
  }
  else{
    //mensaje éxito
    emailError.innerHTML = 'OK';
    emailError.className = 'text-success';
    errores=false;
  }
}
//telefono
campoTelefono.onblur = function(event){
  //campo vacio o muy corto
  if(this.value.trim()=="" || !regexTelefono.test(this.value)) {
    if(this.value.trim()=="") {
    //mostrar mensaje de error
    telefonoError.innerHTML = 'El teléfono no puede estar vacío';
    telefonoError.className = 'text-danger';
    errores=true;
   }
   else {
     //mostrar mensaje de error
     telefonoError.innerHTML = 'El teléfono no parece válido';
     telefonoError.className = 'text-danger';
     errores=true;
   }
  }
  else{
    //mensaje éxito
    telefonoError.innerHTML = 'OK';
    telefonoError.className = 'text-success';
    errores=false;
  }
}


    if( errores ){
      // console.log('Parece que hay errores en los campos');
      erroresAlEnviar.innerHTML = 'parece que hay errores en los campos';
      erroresAlEnviar.className = 'alert-danger ';
      // evitar enviar el formulario
      event.preventDefault();
    }
}
