<?php

namespace App\Animals;

abstract class Animal
{
    public function sleep(): void
    {
        echo $this . ' zzzzzzzz <br/>';
    }

    public abstract function move(): void;

    public abstract function __toString(): string;
}

// Я реализовал метод передвижения не у конкретного животного, а у "типа" животного
// Для змеи переопределил в классе змеи
abstract class Predator extends Animal
{
    public abstract function hunt(): void;

    public function move(): void
    {
        echo $this . ' бежит <br/>';
    }
}

abstract class SeaAnimal extends Animal
{
    public function move(): void
    {
        echo $this . ' уплывает <br/>';
    }

    public function jumpFromWater()
    {
        echo $this . ' выпрыгивает из воды <br/>';
    }
}

abstract class Bird extends Animal
{
    public function move(): void
    {
        echo $this . ' пытается взлететь <br/>';
    }
}

abstract class Herbivorous extends Animal
{
    public function move(): void
    {
        echo $this . ' топ-топ-топ <br/>';
    }
}

class Fish extends SeaAnimal
{
    public function __toString(): string
    {
        return 'Рыба';
    }
}

class Tiger extends Predator
{
    public function __toString(): string
    {
        return 'Тигр';
    }

    public function hunt(): void
    {
        echo $this . ' крадется к жертве <br/>';
    }
}

class Bear extends Predator
{
    public function __toString(): string
    {
        return 'Медведь';
    }

    public function hunt(): void
    {
        echo $this . ' ловит рыбу <br/>';
    }
}

class Moose extends Herbivorous
{
    public function __toString(): string
    {
        return 'Лось';
    }
}

class Snake extends Predator
{
    public function move(): void
    {
        echo $this . ' ползет <br/>';
    }

    public function __toString(): string
    {
        return 'Змея';
    }

    public function hunt(): void
    {
        echo $this . ' поджидает жертву <br/>';
    }
}

class Chicken extends Bird
{
    public function __toString(): string
    {
        return 'Курица';
    }
}

class Camel extends Herbivorous
{
    public function __toString(): string
    {
        return 'Верблюд';
    }
}

class Elephant extends Herbivorous
{
    public function __toString(): string
    {
        return 'Слон';
    }
}

class Dolphin extends SeaAnimal
{
    public function __toString(): string
    {
        return 'Дельфин';
    }
}

echo '<a href="/">Вернуться на главную</a><br />';

$fish = new Fish();
$tiger = new Tiger();
$bear = new Bear();
$moose = new Moose();
$snake = new Snake();
$chicken = new Chicken();
$camel = new Camel();
$elephant = new Elephant();
$dolphin = new Dolphin();

$fish->move();
$tiger->move();
$bear->move();
$moose->move();
$snake->move();
$chicken->move();
$camel->move();
$elephant->move();
$dolphin->move();

echo '<br/>';

$fish->sleep();
$tiger->sleep();
$bear->sleep();
$moose->sleep();
$snake->sleep();
$chicken->sleep();
$camel->sleep();
$elephant->sleep();
$dolphin->sleep();

echo '<br/>';

$fish->jumpFromWater();
$tiger->hunt();
$bear->hunt();
$snake->hunt();
$dolphin->jumpFromWater();
