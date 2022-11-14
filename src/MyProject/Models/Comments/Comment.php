<?php

namespace MyProject\Models\Articles;

use MyProject\Exceptions\InvalidArgumentException;
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
}