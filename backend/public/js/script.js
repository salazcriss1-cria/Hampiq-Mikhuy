// Lógica de interacción para Cocina con Ronald

document.addEventListener('DOMContentLoaded', () => {

    // 1. Contador interactivo de vasos de agua
    let vasos = 0;
    const contador = document.getElementById('contador-vasos');
    const mensaje = document.getElementById('mensaje-agua');
    const btnSumar = document.getElementById('btn-sumar');
    const btnRestar = document.getElementById('btn-restar');

    if (btnSumar && btnRestar) {
        btnSumar.addEventListener('click', () => {
            vasos++;
            actualizarAgua();
        });

        btnRestar.addEventListener('click', () => {
            if (vasos > 0) vasos--;
            actualizarAgua();
        });
    }

    function actualizarAgua() {
        contador.textContent = vasos;
        if (vasos >= 8) {
            mensaje.textContent = "🎉 ¡Felicidades! Lograste tu meta diaria de agua.";
        } else if (vasos === 0) {
            mensaje.textContent = "¡Empieza tu registro diario!";
        } else {
            mensaje.textContent = `Te faltan ${8 - vasos} vasos para cumplir tu meta.`;
        }
    }

    // 2. Marcar/Desmarcar Recetas Favoritas
    const botonesFavorito = document.querySelectorAll('.btn-favorito');

    botonesFavorito.forEach(boton => {
        boton.addEventListener('click', () => {
            boton.classList.toggle('guardado');
            if (boton.classList.contains('guardado')) {
                boton.textContent = "💖 Guardado en Favoritos";
            } else {
                boton.textContent = "❤️ Guardar en Favoritos";
            }
        });
    });

});