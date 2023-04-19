document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('form-partner');
  const notify = document.getElementById('partner-status');
  form.addEventListener('submit', submitPartnerForm);

  async function submitPartnerForm(event) {
    event.preventDefault(); // отключаем перезагрузку/перенаправление страницы
    try {
      // Формируем запрос
      const response = await fetch(event.target.action, {
        method: 'POST',
        body: new FormData(event.target),
      });
      // проверяем, что ответ есть
      if (!response.ok) throw `Ошибка при обращении к серверу: ${response.status}`;
      // проверяем, что ответ действительно JSON
      const contentType = response.headers.get('content-type');
      if (!contentType || !contentType.includes('application/json')) {
        throw 'Ошибка обработки. Ответ не JSON';
      }
      // обрабатываем запрос
      if (response.ok) {
        const result = await response.json();
        form.reset();
        notify.classList.remove('form-status');
        notify.classList.add('_status');
        notify.innerHTML = 'Дякуємо! Ваш запит відправлений';
        // в случае успеха
        // alert(result.message);
      } else {
        // в случае ошибки
        // alert('помилка');

        notify.classList.remove('form-status');
        notify.classList.add('_status');
        notify.innerHTML = 'Упс... Щось пішло не так';
      }
    } catch (error) {
      // обработка ошибки
      notify.classList.remove('form-status');
      notify.classList.add('_status');
      notify.innerHTML = 'Упс... Щось пішло не так';
      // alert(error);
    }
  }
});
