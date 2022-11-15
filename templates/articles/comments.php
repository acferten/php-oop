<br>
<p>______________________________________________________________________</p>

<h3>Комментарии</h3>

<?php if ($user != null): ?>
    <form action="" method="post">
        <label for="text">Оставьте свое мнение</label><br>
        <textarea name="text" id="text" rows="3" cols="60"><?= $_POST['text'] ?? '' ?></textarea><br>
        <br>
        <input type="submit" value="Создать">
    </form>
<?php endif ?>
<p><?= $comment->getText() ?></p>
<p>Автор: <?= $comment->getAuthor()->getNickname() ?></p>
