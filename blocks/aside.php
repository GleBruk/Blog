<aside class="col-md-4">
  <div class="p-3 mb-3 bg-warning rounded">
    <h4><b>Интересные факты</b></h4>
    <p>Убийца Гая Юлия Цезаря, Марк Юний Брут, происходил из знатного плебейского
        рода Юниев, которые претендовали на происхождение от патриция Луция Юния Брута,
    легенадарного основателя Римской Республики, который сверг последнего царя Тарквиния
    Гордого</p>
  </div>
  <div class="p-3 mb-3">
    <img class="img-thumbnail" src="https://itproger.com/img/courses/1534230100.jpg">
  </div>

  <style>
    .allMessages {
      max-height: 300px;
      overflow: scroll;
      margin-bottom: 20px;
    }
  </style>

  <div class="p-3 mb-3">
    <div class="allMessages">
      <?php
        // Берём сообщения из БД
        require_once 'mysql_connect.php';

        $sql = 'SELECT * FROM `chat` ORDER BY `id` DESC';
        $query = $pdo->prepare($sql);
        $query->execute();
        $messages = $query->fetchAll(PDO::FETCH_ASSOC);

        // Если сообщений ноль, то выводим, что сообщений еще нет. Иначе выводим сообщения
        if(count($messages) == 0)
          echo '<div class="alert alert-warning">Пока сообщений еще нет</div>';
        else {
          foreach($messages as $el)
            echo '<div class="alert alert-info">'.$el['message'].'</div>';
        }
      ?>
    </div>
    <form action="#" method="post">
      <input type="text" id="chat_message" placeholder="Сообщение" class="form-control"><br>
      <button type="button" class="btn btn-success" id="send_to_chat">Отправить</button>
    </form>
  </div>
</aside>
