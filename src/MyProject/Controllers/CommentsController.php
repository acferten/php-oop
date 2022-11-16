<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\PermissionException;
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

    public function edit(int $commentId)
    {
        $comment = Comment::getById($commentId);

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!(($this->user->getRole() == 'admin') || ($this->user->getId() == $comment->getAuthor()->getId()))) {
            throw new PermissionException();
        }

        if ($comment === null) {
            throw new NotFoundException();
        }

        if (!empty($_POST)) {
            try {
                $comment->updateFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('comments/edit.php', ['error' => $e->getMessage(), 'comment' => $comment]);
                return;
            }

            header('Location: /articles/' . $comment->getArticleId(), true, 302);
            exit();
        }

        $this->view->renderHtml('comments/edit.php', ['comment' => $comment]);
    }
}