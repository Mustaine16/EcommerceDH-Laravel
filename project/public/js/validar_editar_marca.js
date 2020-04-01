
//Asignacion de variables para capturar elementos del HTML
var form = document.querySelector('#editarMarca');
var nombreErrorsito = document.getElementById("error-nombre");
var imagenErrorsito = document.getElementById("error-imagen");
var nombreCampito = document.querySelector('#nombre');
var imagenCampito = document.querySelector('#imagen');

//Variables para la validacion
var letters = /^[A-Za-z]+$/;

var validacioncita = true;

//Checkeo ONLINE
nombreCampito.addEventListener('input', validate);
imagenCampito.addEventListener('click', validate);

//VALIDACION SENCILLA
function validate (e) {
    let target = e.target;
    nombreErrorsito.innerHTML = "";
    
    if(target.name == "nombre"){
    if (this.value.trim() == "") {
        //Esta Vacio?
       nombreErrorsito.innerHTML = "El campo no puede estar vacio c:";
       validacioncita = false
       nombreErrorsito.className = "badge badge-danger"
    }else if (!letters.test(this.value)){
        //Solo letras permitidas
        nombreErrorsito.innerHTML = "Solo letras porfi";
        validacioncita = false
        nombreErrorsito.className = "badge badge-danger invalid"
    }else{
        validacioncita = true 
        nombreErrorsito.innerHTML = "Correcto"
        nombreErrorsito.className = "badge badge-success valid"
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
            alert("Todo correcto...volviendo a las marcas...")
        }
    }

//Preview para la imagen asi evitamos el input, que se ve feo c:
function vistazoImagen(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('imagenEdit');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
