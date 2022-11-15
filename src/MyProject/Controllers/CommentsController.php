<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;

class CommentsController extends AbstractController
{
    public function add(int $articleId): void
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        $article = Article::getById($articleId);
        if (!empty($_POST)) {
            $comment = Comment::createFromArray($_POST, $this->user, $article);
            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }
        $this->view->renderHtml('articles/view.php');
    }
}