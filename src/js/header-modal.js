// (() => {
//   const menuBtnRef = document.querySelector('[data-menu-button]');
//   const mobileMenuRef = document.querySelector('[data-header-menu]');
//   const mobileBtnClose = document.querySelector('[data-menu-close]');

//   menuBtnRef.addEventListener('click', () => {
//     mobileMenuRef.classList.toggle('is-open');
//   });
//   mobileBtnClose.addEventListener('click', () => {
//     mobileMenuRef.classList.toggle('is-open');
//   });
// })();

const menuBtn = document.querySelector('#hamb');
const mobileMenuRef = document.querySelector('[data-header-menu]');
const menuBtnClose = document.querySelector('[data-menu-close]');
const body = document.body;

menuBtn.addEventListener('click', menuOpenHandler);
// menuBtnClose.addEventListener('click', menuCloseHandler);

function menuOpenHandler(e) {
  e.preventDefault();
  mobileMenuRef.classList.toggle('is-open');
  menuBtn.classList.toggle('active');
  body.classList.toggle('noscroll');
}
// function menuCloseHandler(e) {
//   e.preventDefault();
//   mobileMenuRef.classList.toggle('is-open');
// }

const links = Array.from(mobileMenuRef.children);

links.forEach(link => {
  link.addEventListener('click', closeOnClick);
});

function closeOnClick() {
  mobileMenuRef.classList.remove('is-open');
  menuBtn.classList.remove('active');
  body.classList.remove('noscroll');
}
