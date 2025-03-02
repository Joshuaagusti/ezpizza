function toggleFavorite(button) {
    button.classList.toggle('active');
    const heartIcon = button.querySelector('.heart-icon');
    if (button.classList.contains('active')) {
        heartIcon.src = "../assets/img/Heartcoloreado.svg";
    } else {
        heartIcon.src = "../assets/img/Heartbordernegro.svg"; 
    }
}

//nav 
const nav = document.querySelector(".Nav-Opcion"); 
const abrir = document.querySelector("#abrir");   
const cerrar = document.querySelector("#cerrar"); 

abrir.addEventListener("click", () => {
  nav.classList.add("visible"); 
});

cerrar.addEventListener("click", () => {
  nav.classList.remove("visible"); 
});

const scrollContainer = document.querySelector('.scroll-container');

let isDown = false; // Indica si el mouse está presionado
let startX;         // Guarda la posición inicial del mouse
let scrollLeft;     // Guarda la posición inicial del desplazamiento

// Cuando el mouse se presiona
scrollContainer.addEventListener('mousedown', (e) => {
  isDown = true; // Activar el estado de arrastre
  scrollContainer.classList.add('active');
  startX = e.pageX - scrollContainer.offsetLeft; // Coordenada X inicial
  scrollLeft = scrollContainer.scrollLeft; // Posición inicial del scroll
});

// Cuando el mouse deja de presionar
scrollContainer.addEventListener('mouseup', () => {
  isDown = false; // Desactivar el estado de arrastre
  scrollContainer.classList.remove('active');
});

// Cuando el mouse sale del contenedor
scrollContainer.addEventListener('mouseleave', () => {
  isDown = false; // Desactivar el estado de arrastre
  scrollContainer.classList.remove('active');
});

// Cuando el mouse se mueve
scrollContainer.addEventListener('mousemove', (e) => {
  if (!isDown) return; // Si no está presionado, no hacer nada
  e.preventDefault(); // Evitar el comportamiento por defecto
  const x = e.pageX - scrollContainer.offsetLeft; // Nueva coordenada X
  const walk = (x - startX) * 2; // Velocidad del desplazamiento
  scrollContainer.scrollLeft = scrollLeft - walk; // Ajustar la posición del scroll
});
