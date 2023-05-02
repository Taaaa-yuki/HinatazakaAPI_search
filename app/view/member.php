<?php
require_once('app/controller/search.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
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
            <h2 class="search-title">メンバー検索</h2>
            <form action="" method="post">
                <select name="search_by">
                    <option value="name">名前</option>
                    <option value="bloodType">血液型</option>
                    <option value="birthdate">誕生日</option>
                    <option value="height">身長</option>
                    <option value="birthplace">出身地</option>
                </select>
                <input type="text" name="query" placeholder="検索ワードを入力">
                <button type="submit" name="submit">検索</button>
            </form>

            <?php if(isset($_POST["submit"])): ?>
                <?php $hinatazaka = GetMembers($url); ?>
                <?php if ($hinatazaka == null): ?>
                    <p>該当するメンバーがいませんでした。</p>
                <?php else: ?>
                    <?php foreach ($hinatazaka as $member): ?>
                        <div class="member-container">
                            <div class="member-image">
                                <img id="member-image-id" src="<?= $member["photoUrl"]; ?>" alt="<?= $member["name"]; ?>">
                            </div>
                            <div class="member-details">
                                <h3><?= $member["name"]; ?></h3>
                                <p>誕生日：<?= $member["birthdate"]; ?></p>
                                <p>血液型：<?= $member["bloodType"]; ?></p>
                                <p>身長：<?= $member["height"]; ?></p>
                                <p>出身地：<?= $member["birthplace"]; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </main>

    <footer id="footer">
        <p>&copy; 2023 HinatazakaAPI</p>
    </footer>
    <script type="text/javascript" src="public/js/footerFixed.js"></script>
</body>
</html>
