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
    <?php $hinatazaka = get_members($url); ?>
    <?php if(isset($error_message)): ?>
        <p><?= $error_message; ?></p>
    <?php else: ?>
        <?php foreach ($hinatazaka as $member): ?>
            <div class="member-container">
                <div class="member-image">
                    <img id="member-image-id" src="<?= $member["photoUrl"]; ?>" alt="<?= $member["name"]; ?>">
                </div>
                <div class="member-details">
                    <h3><?= $member["name"]; ?></h3>
                    <p>誕生日：<?= $member["birthdate"]; ?></p>
                    <p>血液型：<?= $member["bloodType"]; ?>型</p>
                    <p>身長：<?= $member["height"]; ?>cm</p>
                    <p>出身地：<?= $member["birthplace"]; ?></p>
                    <p><a href="<?= $member['profile_url'] ?>" target="_blank">公式サイトのプロフィールを見る</a></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endif; ?>
