<?php

namespace MyProject\Models\Comments;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;


class Comment extends ActiveRecordEntity
{
    /** @var int */
    protected $authorId;

    /** @var int */
    protected $articleId;

    /** @var string */
    protected $text;

    protected $date;

    public static function createFromArray(array $fields, User $author, $article): Comment
    {
        $comment = new Comment();

        $comment->setAuthor($author);
        $comment->setText($fields['text']);
        $comment->setArticle($article);
        $comment->save();

        return $comment;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setText(string $text)
    {
        $this->text = $text;
    }

    public function setAuthor($author)
    {
        $this->authorId = $author->getId();
    }

    public function setArticle($article)
    {
        $this->articleId = $article->getId();
    }
}