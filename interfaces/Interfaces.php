<?php

namespace App\Interfaces;

interface Reader
{
    public function __construct(string $file);

    public function read(): array;
}

interface Writer
{
    public function __construct();

    public function write(array $data): void;
}

interface Converter
{
    public function __construct(int $position);

    public function convert(array $data): array;
}

class Import
{
    public Reader $reader;
    public Writer $writer;
    public array $converters;

    public function from(Reader $reader): Import
    {
        $this->reader = $reader;
        return $this;
    }

    public function to(Writer $writer): Import
    {
        $this->writer = $writer;
        return $this;
    }

    public function with(Converter $converter): Import
    {
        $this->converters[] = $converter;
        return $this;
    }

    public function execute()
    {
        $array = $this->reader->read();
        if (!empty($this->converters)) {
            foreach ($this->converters as $converter) {
                $array = $converter->convert($array);
            }
        }
        $this->writer->write($array);
    }
}

class FileReader implements Reader
{
    private string $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function read(): array
    {
        if (file_exists($this->file)) {
            $handle = fopen($this->file, 'r');
            $data = fgets($handle);
            fclose($handle);
            return explode(' ', $data);
        }
        return [];
    }
}

class FileWriter implements Writer
{
    public static string $file;

    public function __construct()
    {
        static::$file = $_SERVER['DOCUMENT_ROOT'] . '/interfaces/write.txt';
    }

    // На экран ничего не выводится, результат записывается в файл
    public function write(array $data): void
    {
        $handle = fopen(self::$file, 'w');
        fwrite($handle, implode(' ', $data));
        fclose($handle);
    }
}

class ToLowerCase implements Converter
{
    public int $position;

    public function __construct(int $position)
    {
        $this->position = $position;
    }

    public function convert(array $data): array
    {
        $data[$this->position] = mb_strtolower($data[$this->position]);
        return $data;
    }
}

class ToUpperCase implements Converter
{
    public int $position;

    public function __construct(int $position)
    {
        $this->position = $position;
    }

    public function convert(array $data): array
    {
        $data[$this->position] = mb_strtoupper($data[$this->position]);
        return $data;
    }
}

echo '<a href="/">Вернуться на главную</a ><br />';

(new Import())
    ->from(new FileReader($_SERVER['DOCUMENT_ROOT'] . '/interfaces/read.txt'))
    ->to(new FileWriter())
    ->with(new ToLowerCase(0))
    ->with(new ToUpperCase(1))
    ->execute();
