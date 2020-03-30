const modal = document.getElementById("modal");
const buttonsOpenModal = document.querySelectorAll(".borrarFake");
const closeModal = document.getElementById("closeModal");
const buttonBorarr = document.getElementById("borrar")
const formulario = document.querySelector("#formBorrar")
//Abrir modal

buttonsOpenModal.forEach(boton => {
    boton.addEventListener("click", event => {
        event.preventDefault();
        if (!modal.classList.contains("modal-open")) {
            modal.classList.toggle("modal-open");
            formulario.dataset.idproducto = boton.dataset.idproducto
        }
    });
});

//Cerrar Modal

closeModal.addEventListener("click", () => {
    event.preventDefault();
    if (modal.classList.contains("modal-open")) {
        modal.classList.remove("modal-open");
    }
});

formulario.addEventListener("submit", function(event){
  event.preventDefault();

  const idProducto = this.dataset.idproducto
  
  this.action = `/producto/${idProducto}/borrar`

  this.submit();
  
})

//url = /producto/{{$producto->id}}/borrar
