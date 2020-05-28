<?php

namespace App\Box;

class Box
{
    public function putBall(Ball $ball): void
    {
        echo 'В корзину добавлен мяч <br/>';
    }
}

class Ball
{
    public static int $count = 0;

    public function __construct()
    {
        self::$count++;
    }
}

echo '<a href="/">Вернуться на главную</a><br />';

$box = new Box();

$rand = (int) rand(1, 10);
for ($i = 0; $i < $rand; $i++) {
    $box->putBall(new Ball());
}

echo 'В корзине ' . Ball::$count . ' мячей';
