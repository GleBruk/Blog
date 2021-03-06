<footer class="footer">
  <div class="container">
    <span class="text-muted">Все права защищены</span>
  </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  // При нажатии на кнопку "Отправить" добавляем запись в таблицу БД
  // в формате Ajax запроса
  $('#send_to_chat').click(function () {
    var message = $('#chat_message').val();

    $.ajax({
      url: '/ajax/chat_message.php',
      type: 'POST',
      cache: false,
      data: {'message' : message},
      dataType: 'html',
      success: function(data) {
        // Очищаем поле от текста что ввел пользователь
        $('#chat_message').val("");
      }
    });
  });

  // Устанавливаем интервал, который вызывает ajax запрос каждые 3 секунды
  // Через ajax запрос мы получаем все сообщения и добавляем их постоянно в блок с сообщениями
  setInterval(function() {
    $.ajax({
      url: '/ajax/get_messages.php',
      type: 'POST',
      cache: false,
      dataType: 'html',
      success: function(data) {
        // В data мы получаем весь HTML и само сообщение
        $(".allMessages").html(data);
      }
    });
  }, 500);
</script>
