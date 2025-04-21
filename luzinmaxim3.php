
<?php

declare(strict_types=1);

/**
 * Абстрактный класс Животное
 */
abstract class Animal
{
    protected string $name;
    protected bool $isSleeping = false;
    protected bool $isHungry = true;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    // Полиморфный метод для издания звука
    abstract public function makeSound(): string;

    public function sleep(): void
    {
        $this->isSleeping = true;
        $this->isHungry = true; // Проснётся голодным
    }

    public function wakeUp(): void
    {
        $this->isSleeping = false;
    }

    public function feed(): void
    {
        $this->isHungry = false;
    }

    public function getStatus(): string
    {
        $status = $this->name . ": ";
        $status .= $this->isSleeping ? "Спит" : "Бодрствует";
        $status .= ", " . ($this->isHungry ? "голоден" : "сыт");
        $status .= ", Издаёт звук: " . $this->makeSound();
        return $status;
    }
}

/**
 * Класс Кошка
 */
class Cat extends Animal
{
    public function makeSound(): string
    {
        return $this->isSleeping ? "Муррр..." : "Мяу!";
    }
}

/**
 * Класс Собака
 */
class Dog extends Animal
{
    public function makeSound(): string
    {
        return $this->isSleeping ? "Хррр..." : "Гав!";
    }
}

/**
 * Класс Птица
 */
class Bird extends Animal
{
    public function makeSound(): string
    {
        return $this->isSleeping ? "Тик-тик..." : "Чирик!";
    }
}

// Демонстрация
header('Content-Type: text/html; charset=utf-8');
echo "<!DOCTYPE html><html><head><title>Состояния животных</title></head><body>";
echo "<h1>Состояния животных</h1>";

$animals = [
    new Cat('Барсик'),
    new Dog('Шарик'),
    new Bird('Кеша')
];

foreach ($animals as $animal) {
    echo "<div style='margin: 20px; padding: 10px; border: 1px solid #ddd;'>";
    
    // Исходное состояние
    echo "<p><b>Начальное состояние:</b><br>" . $animal->getStatus() . "</p>";
    
    // Кормим
    $animal->feed();
    echo "<p><b>После кормления:</b><br>" . $animal->getStatus() . "</p>";
    
    // Усыпляем
    $animal->sleep();
    echo "<p><b>После засыпания:</b><br>" . $animal->getStatus() . "</p>";
    
    // Будим
    $animal->wakeUp();
    echo "<p><b>После пробуждения:</b><br>" . $animal->getStatus() . "</p>";
    
    echo "</div>";
}

echo "</body></html>";