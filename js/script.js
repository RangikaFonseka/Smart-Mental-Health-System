
let menu = document.querySelector('#menu-btn');
let navbar= document.querySelector('.navbar');

menu.onclick=()=>{

  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
}


window.onscroll=()=>{

  menu.classList.remove('fa-times');
  navbar.classList.remove('active');


}


var swiper = new Swiper(".facility-slider", {
   
  spaceBetween: 20,
  grabCursor: true,
  loop: true,
  clickable: true,
  pagination: {
    el: ".swiper-pagination",
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    998: {
      slidesPerView: 3,
    },
  },
});


