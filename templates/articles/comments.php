<br>
<p>______________________________________________________________________</p>

<h3>Комментарии</h3>

<?php if ($user != null): ?>
    <form action="<?= $article->getId() ?>/comments" method="post">
        <label for="text">Оставьте свое мнение</label><br>
        <textarea name="text" id="text" rows="3" cols="60"><?= $_POST['text'] ?? '' ?></textarea><br>
        <br>
        <input type="submit" value="Создать">
    </form>
<?php endif ?>
<?php foreach ($comments as $comment): ?>
    <p id="comment<?= $comment->getId() ?>"><?= $comment->getText() ?></p>
    <p>Автор: <?= $comment->getAuthor()->getNickname() ?></p>
    <?php if ($user != null): ?>
        <?php if ((($user->getId() == $comment->getAuthor()->getId()) || ($user->getRole() == 'admin'))): ?>
            <a href="http://localhost/comments/<?= $comment->getId() ?>/edit">Изменить</a>
        <?php endif ?>
    <?php endif ?>
    <br>
<?php endforeach; ?>
