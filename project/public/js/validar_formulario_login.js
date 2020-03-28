// console.log('holis');
// capturar los elementos
const form = document.querySelector('#formularioLogin');

var campoEmail = document.querySelector('#email');
const emailError = document.querySelector('#email + span.error');


var campoPassword = document.querySelector('#password');
const passwordError = document.querySelector('#password+ span.error');

const erroresAlEnviar = document.querySelector('#erroresAlEnviar');

var regexMail= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
// var nombreMinLength = 6;
var passwordMinLength = 6;
var errores =true;


//verificar campos


//password
campoPassword.onblur = function(event){
  //campo vacio o muy corto
  if(this.value.trim()=="" || this.value.trim().length < passwordMinLength){
    if(this.value.trim()=="") {
    console.log('El password no puede estar vacío');
    //mostrar mensaje de error
    passwordError.innerHTML = 'El password no puede estar vacío';
    passwordError.className = 'text-danger';
    errores=true;
   }
   else {
     console.log('El nombre es muy corto pa');
     //mostrar mensaje de error
     passwordError.innerHTML = 'El password es muy corto, al menos '+passwordMinLength+' caracteres';
     passwordError.className = 'text-danger';
     errores=true;
   }
  }
  else{
    //mensaje éxito
    passwordError.innerHTML = 'OK';
    passwordError.className = 'text-success';
    errores=false;
  }
}
//email
campoEmail.onblur = function(event){
  //campo vacio
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

//*********************************
//    si no cumplen las reglas no enviar el form
// *********************************


form.onsubmit = function(event){
console.log('adentro del onsubmit');
    if(
      campoEmail.value.trim()=="" ||
       !regexMail.test(campoEmail.value) ||
       campoPassword.value.trim()=="" ||
       campoPassword.value.trim().length < passwordMinLength
     )
    {
      // console.log('Parece que hay errores en los campos');
      erroresAlEnviar.innerHTML = 'parece que hay errores en los campos';
      erroresAlEnviar.className = 'alert-danger ';
      // evitar enviar el formulario
      event.preventDefault();
    }
}
