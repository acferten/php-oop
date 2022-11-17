<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\PermissionException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;
use MyProject\Models\Users\User;

class AdminController extends AbstractController
{
    public function articles()
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if ($this->user->getRole() != 'admin') {
            throw new PermissionException();
        }

        $articles = Article::orderByDate();
        krsort($articles);
//        usort($articles, function($a, $b) {
//            return strtotime($a['date']) - strtotime($b['date']);
//        });
        $this->view->renderHtml('adminpage/articles.php', [
            'articles' => $articles,
        ]);
    }

    public function comments()
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if ($this->user->getRole() != 'admin') {
            throw new PermissionException();
        }

        $comments = Comment::orderByDate();
        krsort($comments);
        $this->view->renderHtml('adminpage/comments.php', [
            'comments' => $comments,
        ]);
    }
}