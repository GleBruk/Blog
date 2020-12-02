<?php
// Если пользователь не авторизован, то сперва он должен будет пройти регистрацию
  if($_COOKIE['login'] == '') {
    header('Location: /reg.php');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
    $website_title = 'Добавление статьи';
    require 'blocks/head.php';
  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <h4>Добавление статьи</h4>
        <form action="" method="post">
          <label for="title">Заголовок статьи</label>
          <input type="text" name="title" id="title" class="form-control">

          <label for="intro">Интро статьи</label>
          <textarea name="intro" id="intro" class="form-control"></textarea>

          <label for="text">Текст статьи</label>
          <textarea name="text" id="text" class="form-control"></textarea>

          <div class="alert alert-danger mt-2" id="errorBlock"></div>

          <button type="button" id="article_send" class="btn btn-success mt-3">
            Добавить
          </button>
        </form>
      </div>

      <?php require 'blocks/aside.php'; ?>
    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
      // При нажати кнопки "Добавить", статья добавляется в БД
    $('#article_send').click(function () {
      var title = $('#title').val();
      var intro = $('#intro').val();
      var text = $('#text').val();
      // Если данные заполнены корректно, то выводится сообщение "Готово". Иначе
        // выводится ошибка
      $.ajax({
        url: 'ajax/add_article.php',
        type: 'POST',
        cache: false,
        data: {'title' : title, 'intro' : intro, 'text' : text},
        dataType: 'html',
        success: function(data) {
          if(data == 'Готово') {
            $('#article_send').text('Все готово');
            $('#errorBlock').hide();
          } else {
            $('#errorBlock').show();
            $('#errorBlock').text(data);
          }
        }
      });
    });
  </script>
</body>
</html>
