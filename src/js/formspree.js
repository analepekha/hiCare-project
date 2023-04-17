var form = document.getElementById('my-form');

async function handleSubmit(event) {
  event.preventDefault();
  var status = document.getElementById('my-form-status');
  status.classList.add('_status');
  var data = new FormData(event.target);
  fetch(event.target.action, {
    method: form.method,
    body: data,
    headers: {
      Accept: 'application/json',
    },
  })
    .then(response => {
      if (response.ok) {
        status.classList.remove('form__status');
        status.classList.add('_status');
        status.innerHTML = 'Дякуємо! Ваш запит відправлений';
        form.reset();
      } else {
        response.json().then(data => {
          if (Object.hasOwn(data, 'errors')) {
            status.classList.remove('form__status');

            status.classList.add('_status');
            status.innerHTML = data['errors'].map(error => error['message']).join(', ');
          } else {
            status.classList.remove('form__status');

            status.classList.add('_status');
            status.innerHTML = 'Упс... Щось пішло не так';
          }
        });
      }
    })
    .catch(error => {
      status.classList.add('_status');
      status.innerHTML = 'Упс... Щось пішло не так';
    });
}
form.addEventListener('submit', handleSubmit);
