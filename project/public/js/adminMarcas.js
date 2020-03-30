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
            formulario.dataset.idmarca = boton.dataset.idmarca
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

  const idMarca = this.dataset.idmarca
  
  this.action = `/marca/${idMarca}/borrar`

  this.submit();
  
  
})

