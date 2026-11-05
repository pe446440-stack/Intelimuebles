document.addEventListener('DOMContentLoaded', function () {
    crearGaleria()
    notificacion()
})

function crearGaleria() {

    const CANTIDAD_IMAGENES = 7
    const galeria = document.querySelector('.galeria_imagenes')

    if (galeria) {
        for (let i = 1; i <= CANTIDAD_IMAGENES; i++) {
            const imagen = document.createElement('IMG')
            imagen.src = `src/img/gallery/${i}.png`
            imagen.alt = 'Imagen Galería'

            // Event Handler
            imagen.onclick = function () {
                mostrarImagen(i)
            }

            galeria.appendChild(imagen)
        }
    }


}

function mostrarImagen(i) {
    if(!document.querySelector('.galeria_imagenes')) {
        return;
    }
    const imagen = document.createElement('IMG')
    imagen.src = `src/img/gallery/${i}.png`
    imagen.alt = 'Imagen Galería'

    // Generar Modal
    const modal = document.createElement('DIV')
    modal.classList.add('modal')
    modal.onclick = cerrarModal

    // Botón cerrar modal
    const cerrarModalBtn = document.createElement('BUTTON')
    cerrarModalBtn.textContent = 'X'
    cerrarModalBtn.classList.add('btn-cerrar')
    cerrarModalBtn.onclick = cerrarModal

    modal.appendChild(imagen)
    modal.appendChild(cerrarModalBtn)

    // Agregar al HTML
    const body = document.querySelector('body')
    body.classList.add('overflow-hidden')
    body.appendChild(modal)

}

function cerrarModal() {

    if(!document.querySelector('.galeria_imagenes')){
        return;
    }
    const modal = document.querySelector('.modal')
    modal.classList.add('fade-out')

    setTimeout(() => {
        modal?.remove()

        const body = document.querySelector('body')
        body.classList.remove('overflow-hidden')
    }, 500);
}

/*
function notificacion() {
    if(!document.querySelector('.imagen-producto')){
        return;
    }
    const imagenesProductos = document.querySelectorAll('.imagen-producto');

    imagenesProductos.forEach(img => {
        img.addEventListener('click', (e) => {
            e.preventDefault();
            // Lo mandamos al login, pero agregamos "?alerta=login" a la URL
            window.location.href = 'login.php?alerta=login';
        });
    });
} */
