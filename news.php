<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
    require_once 'mysql_connect.php';
    // Берём из БД нужную статью по id
    $sql = 'SELECT * FROM `articles` WHERE `id` = :id';
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $_GET['id']]);

    $article = $query->fetch(PDO::FETCH_OBJ);

    $website_title = $article->title;
    require 'blocks/head.php';
  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <div class="jumbotron">
          <h1><?=$article->title?></h1>
          <p><b>Автор статьи:</b> <mark><?=$article->author?></mark></p>
          <?php
          //Получаем день публикации
            $date = date('d ', $article->date);
          //Теперь создаём массив с названиями месяцев на русском
            $array = ["Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля",
                "Августа", "Сентября", "Октября", "Ноября", "Декабря"];
          //Получаем русское название месяца, используя созданный массив и номер
          // месяца публикации в качестве индекса
            $date .= $array[date('n', $article->date) - 1];
          //Получаем время публикации
            $date .= date(' H:i', $article->date);
          //Выводим время публикации и саму статью
          ?>
          <p><b>Время публикации:</b> <u><?=$date?></u></p>
          <p>
            <?=$article->intro?>
            <br><br>
            <?=$article->text?>
          </p>
        </div>

        <h3 class="mt-5">Комментарии</h3>
        <form action="/news.php?id=<?=$_GET['id']?>" method="post">
          <label for="username">Ваше имя</label>
          <input type="text" name="username" value="<?=$_COOKIE['login']?>" id="username" class="form-control">

          <label for="mess">Сообщение</label>
          <textarea name="mess" id="mess" class="form-control"></textarea>

          <button type="submit" id="mess_send" class="btn btn-success mt-3 mb-5">
            Добавить комментарий
          </button>
        </form>
        <?php
        // Проводим валидацию данных
          if($_POST['username'] != '' && $_POST['mess'] != '') {
            $username = trim(filter_var($_POST['username'],
                FILTER_SANITIZE_STRING));
            $mess = trim(filter_var($_POST['mess'],
                FILTER_SANITIZE_STRING));
        // Добавляем комментарий в БД
            $sql = 'INSERT INTO comments(name, mess, article_id) VALUES(?, ?, ?)';
            $query = $pdo->prepare($sql);
            $query->execute([$username, $mess, $_GET['id']]);
          }
        // Выводим все комментарии из БД
          $sql = 'SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` DESC';
          $query = $pdo->prepare($sql);
          $query->execute(['id' => $_GET['id']]);
          $comments = $query->fetchAll(PDO::FETCH_OBJ);

          foreach ($comments as $comment) {
            echo "<div class='alert alert-info mb-2'>
              <h4>$comment->name</h4>
              <p>$comment->mess</p>
            </div>";
          }
        ?>
      </div>

      <?php require 'blocks/aside.php'; ?>
    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>
</body>
</html>
