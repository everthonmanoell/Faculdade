const autoBtns = document.querySelectorAll('.nav-auto div');
const manualBtns = document.querySelectorAll('.manual-btn');
const slides = document.querySelector('.slider-content').children;
const radioBtns = document.getElementsByName('btn-radio');
let index = 0;

for (let i = 0; i < autoBtns.length; i++) {
  autoBtns[i].addEventListener('click', function () {
    index = i;
    changeSlide();
    updateAutoBtns();
  });
}

for (let i = 0; i < manualBtns.length; i++) {
  manualBtns[i].addEventListener('click', function () {
    index = i;
    changeSlide();
    updateAutoBtns();
  });
}

function changeSlide() {
  for (let i = 0; i < slides.length; i++) {
    slides[i].classList.remove('primeiro');
  }

  slides[index].classList.add('primeiro');
}

function updateAutoBtns() {
  for (let i = 0; i < autoBtns.length; i++) {
    autoBtns[i].classList.remove('active');
  }

  autoBtns[index].classList.add('active');
}

function autoPlay() {
  if (index === slides.length - 1) {
    index = 0;
  } else {
    index++;
  }

  changeSlide();
  updateAutoBtns();
}

setInterval(autoPlay, 3000);
