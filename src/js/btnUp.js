const btnUp = document.querySelector('.btn-up');

btnUp.addEventListener('click', function (e) {
  e.preventDefault();
  window.scrollTo({
    top: 0,
    behavior: 'smooth',
  });
});

setInterval(function displayBtnScrollTop() {
  if (window.scrollY >= 400) {
    btnUp.classList.remove('btn-up_hide');
  } else {
    btnUp.classList.add('btn-up_hide');
  }
}, 250);
