<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HinatazakaAPI</title>
    <link rel="stylesheet" href="public/css/style.css">
  </head>
  <body>
    <header>
      <nav>
        <div class="title">
          <img src="public/img/Hinatazaka46_logo.png" alt="HinatazakaAPI" width="50px" height="60px">
          <h1><a href="index.php">HinatazakaAPI</a></h1>
        </div>
        <ul>
          <li><a href="https://www.hinatazaka46.com/s/official/">公式サイト</a></li>
          <li><a href="index.php">メンバー検索</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <div class="container">
        <?php require_once('app/controller/search_controller.php'); ?>
        <?php require_once('app/view/search_view.php'); ?>
      </div>
    </main>

    <footer id="footer">
        <p>&copy; 2023 HinatazakaAPI</p>
    </footer>
    <script type="text/javascript" src="public/js/footerFixed.js"></script>
</body>
</html>