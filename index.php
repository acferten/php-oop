<?php

abstract class HumanAbstract
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getGreetings(): string;

    abstract public function getMyNameIs(): string;

    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }
}

class RussianHuman extends HumanAbstract
{
    public function getGreetings(): string
    {
        return 'Привет';
    }

    public function getMyNameIs(): string
    {
        return $this->name;
    }

    public function introduceYourself(): string
    {
        $intro = $this->getGreetings() . '! ' . 'Меня зовут ' . $this->getMyNameIs();
        return $intro;
    }

}

class EnglishHuman extends HumanAbstract
{
    public function getGreetings(): string
    {
        return ' Hello';
    }

    public function getMyNameIs(): string
    {
        return $this->name;
    }

    public function introduceYourself(): string
    {
        $intro = $this->getGreetings() . '! ' . 'My name is ' . $this->getMyNameIs();
        return $intro;
    }

}


$rus = new RussianHuman('Иван');
print_r($rus->introduceYourself());
$eng = new EnglishHuman('John');
print_r($eng->introduceYourself());