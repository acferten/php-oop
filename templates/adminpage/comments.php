<?php include __DIR__ . '/../header.php'; ?>

<?php foreach ($comments as $comment): ?>
    <p id="comment<?= $comment->getId() ?>"><?= $comment->getText() ?></p>
    <p>Автор: <?= $comment->getAuthor()->getNickname() ?></p>
    <a href="http://localhost/comments/<?= $comment->getId() ?>/edit">Изменить</a>
    <hr>
<?php endforeach; ?>

<?php include __DIR__ . '/../footer.php'; ?>
