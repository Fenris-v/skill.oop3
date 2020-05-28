<?php

namespace App\Cat;

class Cat
{
    public string $name;
    public string $color;
    public int $old;

    public function __construct(string $name, string $color = '', int $old = 0)
    {
        $this->name = $name;
        $this->color = $color;
        $this->old = $old;
    }
}

// Не совсем понял суть 3го пункта, поэтому в конструктор и задал дефолтные значения
class CatFactory
{
    public static function createBlack8YearsOldCat(string $name): Cat
    {
        return new Cat($name, 'black', 8);
    }

    public static function createWhiteCat(string $name): Cat
    {
        return new Cat($name, 'white');
    }

    public static function createGrey1YearsOldCat(string $name): Cat
    {
        return new Cat($name, 'grey', 1);
    }

    public static function create10YearsOldCat(string $name): Cat
    {
        $cat = new Cat($name);
        $cat->old = 10;
        return $cat;
    }

    public static function createBlack2YearsOldCat(string $name): Cat
    {
        return new Cat($name, 'black', 2);
    }

    public static function createWhite7YearsOldCat(string $name): Cat
    {
        return new Cat($name, 'white', 7);
    }

    public static function createGrey5YearsOldCat(string $name): Cat
    {
        return new Cat($name, 'grey', 5);
    }
}

echo '<a href="/">Вернуться на главную</a><br />';

$cats[] = [
    CatFactory::createBlack8YearsOldCat('Барсик'),
    CatFactory::createWhiteCat('Снежок'),
    CatFactory::createGrey1YearsOldCat('Пушок'),
    CatFactory::create10YearsOldCat('Василий'),
    CatFactory::createBlack2YearsOldCat('Черч'),
    CatFactory::createWhite7YearsOldCat('Бегемот'),
    CatFactory::createGrey5YearsOldCat('Лентяй')
];

?>
<pre>
<? print_r($cats); ?>
</pre>
