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
        $articles = Article::orderByDate();
        print_r($articles);
        print_r(gettype($articles));
        usort($articles, function($a, $b){
            return $a['createdAt'] <=> $b['createdAt'];
        });

        $this->view->renderHtml('adminpage/articles.php', [
            'articles' => $articles,
        ]);
    }

    public function comments()
    {

    }
}