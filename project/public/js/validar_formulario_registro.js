// console.log('holis');
// capturar los elementos
const form = document.querySelector("#formularioRegistro");

var campoAvatar = document.querySelector("#avatar");
const avatarError = document.querySelector("#avatar + span.error");

var campoUsuario = document.querySelector("#username");
const usuarioError = document.querySelector("#username + span.error");
// console.log(form);

var campoEmail = document.querySelector("#email");
const emailError = document.querySelector("#email + span.error");

var campoConfirmarPassword = document.querySelector("#password-confirm");
const confirmarPasswordError = document.querySelector(
    "#password-confirm + span.error"
);

var campoPassword = document.querySelector("#password");
const passwordError = document.querySelector("#password+ span.error");

const erroresAlEnviar = document.querySelector("#erroresAlEnviar");

var regexMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var nombreMinLength = 6;
var passwordMinLength = 6;
var errores = true;

//***************************
//      verificar campos
// ***************************
//avatar
campoAvatar.onblur = function(event) {
    //campo vacio o muy corto
    if (this.value.trim() == "") {
        console.log("El avatar no puede estar vacío");
        //mostrar mensaje de error
        avatarError.innerHTML = "El avatar no puede estar vacío";
        avatarError.className = "text-danger";
        errores = true;
    } else {
        //mensaje éxito
        avatarError.innerHTML = "OK";
        avatarError.className = "text-success";
        errores = false;
    }
};

campoUsuario.onblur = function(event) {
    //campo vacio o muy corto
    if (this.value.trim() == "" || this.value.trim().length < nombreMinLength) {
        if (this.value.trim() == "") {
            console.log("El usuario no puede estar vacío");
            //mostrar mensaje de error
            usuarioError.innerHTML = "El usuario no puede estar vacío";
            usuarioError.className = "text-danger";
            errores = true;
        } else {
            console.log("El nombre es muy corto pa");
            //mostrar mensaje de error
            usuarioError.innerHTML =
                "El usuario es muy corto, al menos " +
                nombreMinLength +
                " caracteres";
            usuarioError.className = "text-danger";
            errores = true;
        }
    } else {
        //mensaje éxito
        usuarioError.innerHTML = "OK";
        usuarioError.className = "text-success";
        errores = false;
    }
};
//password
campoPassword.onblur = function(event) {
    //campo vacio o muy corto
    if (
        this.value.trim() == "" ||
        this.value.trim().length < passwordMinLength
    ) {
        if (this.value.trim() == "") {
            console.log("El password no puede estar vacío");
            //mostrar mensaje de error
            passwordError.innerHTML = "El password no puede estar vacío";
            passwordError.className = "text-danger";
            errores = true;
        } else {
            console.log("El nombre es muy corto pa");
            //mostrar mensaje de error
            passwordError.innerHTML =
                "El password es muy corto, al menos " +
                passwordMinLength +
                " caracteres";
            passwordError.className = "text-danger";
            errores = true;
        }
    } else {
        //mensaje éxito
        passwordError.innerHTML = "OK";
        passwordError.className = "text-success";
        errores = false;
    }
};
//email
campoEmail.onblur = function(event) {
    //campo vacio o muy corto
    if (this.value.trim() == "" || !regexMail.test(this.value)) {
        if (this.value.trim() == "") {
            //mostrar mensaje de error
            emailError.innerHTML = "El email no puede estar vacío";
            emailError.className = "text-danger";
            errores = true;
        } else {
            console.log("El email no es valido");
            //mostrar mensaje de error
            emailError.innerHTML = "El email no parece válido";
            emailError.className = "text-danger";
            errores = true;
        }
    } else {
        //mensaje éxito
        emailError.innerHTML = "OK";
        emailError.className = "text-success";
        errores = false;
    }
};

//confirm password
campoConfirmarPassword.onblur = function(event) {
    //campo vacio o muy corto

    if (this.value.trim() == "") {
        console.log("El password no puede estar vacío");
        //mostrar mensaje de error
        confirmarPasswordError.innerHTML = "El password no puede estar vacío";
        confirmarPasswordError.className = "text-danger";
        errores = true;
    } else if (this.value.trim() != campoPassword.value) {
        //mostrar mensaje de error
        confirmarPasswordError.innerHTML = "Los passwords no coinciden";
        confirmarPasswordError.className = "text-danger";
        errores = true;
    } else if (this.value.trim().length < passwordMinLength) {
        console.log("El nombre es muy corto pa");
        //mostrar mensaje de error
        confirmarPasswordError.innerHTML =
            "El password es muy corto, al menos " +
            passwordMinLength +
            " caracteres";
        confirmarPasswordError.className = "text-danger";
        errores = true;
    } else {
        //mensaje éxito
        confirmarPasswordError.innerHTML = "OK";
        confirmarPasswordError.className = "text-success";
        errores = false;
    }
};

//*********************************
//    si no cumplen las reglas no enviar el form
// *********************************
form.onsubmit = function(event) {
    console.log("adentro del onsubmit");

    if (
        campoAvatar.value.trim() == "" ||
        campoUsuario.value.trim() == "" ||
        campoUsuario.value.trim().length < nombreMinLength ||
        campoPassword.value.trim() == "" ||
        campoPassword.value.trim().length < passwordMinLength ||
        campoConfirmarPassword.value.trim() == "" ||
        campoConfirmarPassword.value.trim().length < passwordMinLength ||
        campoEmail.value.trim() == "" ||
        !regexMail.test(campoEmail.value)
    ) {
        // console.log('Parece que hay errores en los campos');
        erroresAlEnviar.innerHTML = "Parece que hay errores en los campos";
        erroresAlEnviar.className = "alert-danger ";
        // evitar enviar el formulario
        event.preventDefault();
    }
};
