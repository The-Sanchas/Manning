<?php

namespace App\Model;

class BookCategoryListItem
{
    private int $id;
    private string $title;
    private string $slag;

    public function __construct(int $id, string $title, string $slag)
    {
        $this->id = $id;
        $this->title = $title;
        $this->slag = $slag;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSlag(): string
    {
        return $this->slag;
    }
}
