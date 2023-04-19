document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('form-order');
  const notify = document.getElementById('order-status');
  form.addEventListener('submit', submitOrderForm);

  async function submitOrderForm(event) {
    event.preventDefault();
    try {
      const response = await fetch(event.target.action, {
        method: 'POST',
        body: new FormData(event.target),
      });
      if (!response.ok) throw `Ошибка при обращении к серверу: ${response.status}`;
      const contentType = response.headers.get('content-type');
      if (!contentType || !contentType.includes('application/json')) {
        throw 'Ошибка обработки. Ответ не JSON';
      }
      if (response.ok) {
        const result = await response.json();
        form.reset();
        notify.classList.remove('form-status');
        notify.classList.add('_status');
        notify.innerHTML = 'Дякуємо! Ваш запит відправлений';
      } else {
        notify.classList.remove('form-status');
        notify.classList.add('_status');
        notify.innerHTML = 'Упс... Щось пішло не так';
      }
    } catch (error) {
      notify.classList.remove('form-status');
      notify.classList.add('_status');
      notify.innerHTML = 'Упс... Щось пішло не так';
    }
  }
});
