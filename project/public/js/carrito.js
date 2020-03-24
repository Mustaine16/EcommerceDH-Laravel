
//Nodos

const productosArr_node = document.querySelectorAll(".producto_datos");
const precioFinal_node = document.getElementById("precioFinal");


//Listeners

productosArr_node.forEach(item => {
    const select = item.children[2];
    const precio = item.children[3];

    select.addEventListener("change", event => {
        handleSelect(event, precio);
        setPrecioFinal();
    });
});

//Handlers

function handleSelect(event, precio) {
    const cantidad = event.target.value;
    const subtotal = precio.dataset.precio * cantidad;
    precio.dataset.subtotal = subtotal;
    precio.textContent = "$ " + new Intl.NumberFormat().format(subtotal);
}

function setPrecioFinal() {
    const productosArray = Array.from(productosArr_node);

    const subtotales = productosArray.map(item =>
        Number(item.children[3].dataset.subtotal)
    );

    const precioFinal = subtotales.reduce((accum, item) => accum + item);

    precioFinal_node.textContent =
        "Precio Final: $ " + new Intl.NumberFormat().format(precioFinal);
}
