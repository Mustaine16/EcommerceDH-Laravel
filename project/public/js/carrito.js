//Nodos

//Para manipular el precio final
const productosArr_node = document.querySelectorAll(".producto_datos");
const precioFinal_node = document.getElementById("precioFinal");

//Para manipular los modales
const openModal = document.getElementById("openModal");
const closeModal = document.getElementById("closeModal");

//Listeners- Manipular precio final

productosArr_node.forEach(item => {
    const select = item.children[2];
    const precio = item.children[3];

    select.addEventListener("change", event => {
        handleSelect(event, precio);
        setPrecioFinal();
    });
});

//Abrir modal de confirmacion

openModal.addEventListener("click", event => {
    event.preventDefault();
    if (!modal.classList.contains("modal-open")) {
        modal.classList.toggle("modal-open");
        formulario.dataset.idproducto = boton.dataset.idproducto;
    }
});

//Cerrar Modal

closeModal.addEventListener("click", () => {
    event.preventDefault();
    if (modal.classList.contains("modal-open")) {
        modal.classList.remove("modal-open");
    }
});

//Handler del evento

function handleSelect(event, precio) {
    const cantidad = event.target.value;
    const subtotal = precio.dataset.precio * cantidad;
    precio.dataset.subtotal = subtotal;
    precio.textContent = "$ " + new Intl.NumberFormat().format(subtotal);
}

//Setear el precio visualmente

function setPrecioFinal() {
    const productosArray = Array.from(productosArr_node);

    const subtotales = productosArray.map(item =>
        Number(item.children[3].dataset.subtotal)
    );

    const precioFinal = subtotales.reduce((accum, item) => accum + item);

    precioFinal_node.textContent =
        "Precio Final: $ " + new Intl.NumberFormat().format(precioFinal);
}
