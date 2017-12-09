<?php

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09.12.2017
 * Time: 12:25
 */

namespace app\models;




class News
{

    private  $id;
    private $title;
    private $date;
    private $category;

    public function getCategory() : string{
        return $this->category;
    }

    public function setCategory(string $category)
    {
        $this->category = $category;
    }


    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function __construct(int $id, string $title, \DateTime $date, $category = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->category = $category;
    }

    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }


    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }




}