<?php
/**
 * Created by PhpStorm.
 * User: keyersoze
 * Date: 03-01-2018
 * Time: 13:02
 */

namespace Library\Books;


abstract class Books
{
    public $bookName;
    public $aboutBook;
    public $bookStatus;
    public $bookCategory;

    /**
     * @return string
     */
    public function getBookName():string
    {
        return $this->bookName;
    }

    /**
     * @return string
     */
    public function getAboutBook():string
    {
        return $this->aboutBook;
    }

    /**
     * @return \DateInterval
     */
    public function getBookStatus():\DateInterval
    {
        return $this->bookStatus;
    }

    /**
     * @return string
     */
    public function getBookCategory():string
    {
        return $this->bookCategory;
    }

}