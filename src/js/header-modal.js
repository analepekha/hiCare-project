const menuBtn = document.querySelector('#hamb');
const mobileMenuRef = document.querySelector('[data-header-menu]');
const body = document.body;

menuBtn.addEventListener('click', menuOpenHandler);

function menuOpenHandler(e) {
  e.preventDefault();
  mobileMenuRef.classList.toggle('is-open');
  menuBtn.classList.toggle('active');
  body.classList.toggle('noscroll');
}

const links = Array.from(mobileMenuRef.children);

links.forEach(link => {
  link.addEventListener('click', closeOnClick);
});

function closeOnClick() {
  mobileMenuRef.classList.remove('is-open');
  menuBtn.classList.remove('active');
  body.classList.remove('noscroll');
}
