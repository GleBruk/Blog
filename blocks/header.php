<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Ideas Burner</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="/">Главная</a>
    <a class="p-2 text-dark" href="/contacts.php">Контакты</a>
    <?php
    // Проверяем, авторизован ли пользователь. Если авторизован,
    // то выводим ссылку на добавление статьи
      if($_COOKIE['login'] != '')
        echo '<a class="p-2 text-dark" href="/article.php">Добавить статью</a>';
    ?>
  </nav>
  <?php
  // Если пользователь не авторизован, то выводим ссылки на авторизации и регистрации
    if($_COOKIE['login'] == ''):
  ?>
  <a class="btn btn-outline-primary mr-2 mb-2" href="/auth.php">Войти</a>
  <a class="btn btn-outline-primary mb-2" href="/reg.php">Регистрация</a>
  <?php
    // Иначе выводим ссылку на кабинет пользователя
    else:
  ?>
  <a class="btn btn-outline-primary mb-2" href="/auth.php">Кабинет пользователя</a>
  <?php
    endif;
  ?>
</div>
