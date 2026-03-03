//PREVIEW
// document.addEventListener("DOMContentLoaded", function () {

//     const track = document.querySelector(".preview-track");
//     const items = document.querySelectorAll(".preview-item");
//     const dots = document.querySelectorAll(".dot");
//     const prev = document.getElementById("prevPreview");
//     const next = document.getElementById("nextPreview");

//     let index = 0;
//     const width = 360;

//     function updatePreview() {
//         track.style.transform = "translateX(" + (-index * width) + "px)";

//         items.forEach(item => item.classList.remove("active"));
//         dots.forEach(dot => dot.classList.remove("active"));

//         items[index].classList.add("active");
//         dots[index].classList.add("active");
//     }

//     next.addEventListener("click", () => {
//         index++;

//         if (index >= items.length) {
//             index = 0; // balik ke awal
//         }

//         updatePreview();
//     });

//     prev.addEventListener("click", () => {
//         index--;

//         if (index < 0) {
//             index = items.length - 1; // ke akhir
//         }

//         updatePreview();
//     });
//     updatePreview();
// });






// //TESTIMONI
// const testiTrack = document.querySelector(".testi-track");
// const testiCards = document.querySelectorAll(".testi-card");
// const prevTesti = document.getElementById("testiPrev");
// const nextTesti = document.getElementById("testiNext");
// const testiDots = document.querySelectorAll(".testi-dot");

// let testiIndex = 1;
// const testiWidth = 324; // card + gap

// function updateTesti() {
//     testiTrack.style.transform =
//         "translateX(" + (-testiIndex * testiWidth) + "px)";

//     testiCards.forEach(card => card.classList.remove("active"));
//     testiDots.forEach(dot => dot.classList.remove("active"));

//     testiCards[testiIndex].classList.add("active");
//     testiDots[testiIndex].classList.add("active");
// }

// nextTesti.addEventListener("click", () => {
//     testiIndex++;
//     if (testiIndex >= testiCards.length) {
//         testiIndex = 0;
//     }
//     updateTesti();
// });

// prevTesti.addEventListener("click", () => {
//     testiIndex--;
//     if (testiIndex < 0) {
//         testiIndex = testiCards.length - 1;
//     }
//     updateTesti();
// });

// updateTesti();




//TESTIMONI

// const testiSwiper = new Swiper(".testi-swiper", {
//   slidesPerView: 5,
//   centeredSlides: true,
//   spaceBetween: 16,
//   loop: true,
//   speed: 600,

//   navigation: {
//     nextEl: ".testi-swiper .swiper-button-next",
//     prevEl: ".testi-swiper .swiper-button-prev",
//   },

//   pagination: {
//     el: ".testi-swiper .swiper-pagination",
//     clickable: true,
//   },

//   breakpoints: {
//     0: {
//       slidesPerView: 5,
//     },
//     600: {
//       slidesPerView: 5,
//     },
//   },
// });


// TESTIMONI
// const testiTrack = document.querySelector(".testi-track");
// const testiCards = document.querySelectorAll(".testi-card");
// const prevTesti = document.getElementById("testiPrev");
// const nextTesti = document.getElementById("testiNext");s
// const testiDots = document.querySelectorAll(".testi-dot");

// let testiIndex = 0;
// const cardWidth = testiCards[0].offsetWidth + 24; // width + gap

// function updateTesti() {
//   const centerOffset =
//     (testiTrack.parentElement.offsetWidth / 2) -
//     (testiCards[testiIndex].offsetWidth / 2);

//   testiTrack.style.transform =
//     `translateX(${centerOffset - testiIndex * cardWidth}px)`;

//   testiCards.forEach(card => card.classList.remove("active"));
//   testiDots.forEach(dot => dot.classList.remove("active"));

//   testiCards[testiIndex].classList.add("active");
//   testiDots[testiIndex].classList.add("active");
// }

// nextTesti.addEventListener("click", () => {
//   testiIndex++;
//   if (testiIndex >= testiCards.length) testiIndex = 0;
//   updateTesti();
// });

// prevTesti.addEventListener("click", () => {
//   testiIndex--;
//   if (testiIndex < 0) testiIndex = testiCards.length - 1;
//   updateTesti();
// });

// testiDots.forEach((dot, i) => {
//   dot.addEventListener("click", () => {
//     testiIndex = i;
//     updateTesti();
//   });
// });

// updateTesti();







//PREVIEW

constswiper = new Swiper('.swiper', {
    // Optional parameters
    effect: 'coverflow',
    direction: 'horizontal',
    loop: false,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 0,
        stretch: -20,
        depth: 200,
        modifier: 1,
        slideShadows: false,
    },
    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
});


// TESTIMONI
const swiper = new Swiper('.testi-swiper', {
  loop: true,
  centeredSlides: true,
  slidesPerView: 'auto',
  spaceBetween: 40,
  watchOverflow: true,
  effect: 'coverflow',
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 120,
    modifier: 2.5,
    slideShadows: false,
  },

  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});


