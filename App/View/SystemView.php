<?php
/**
 * Created by PhpStorm.
 * User: keyersoze
 * Date: 04-01-2018
 * Time: 20:56
 */

namespace Library\View;

require_once dirname(__DIR__)."/../vendor/autoload.php";
use Library\DatabaseRequests\DatabaseRequests;
use Library\LibraryFunctions\LibraryFunctions;
use Library\Controller\System;

class SystemView implements DatabaseRequests
{

    private $controllerSystem;

    public function __construct()
    {
        $this->controllerSystem = new System\System();
    }

    public function login(string $userName, string $userPassword)
    {
        $this->controllerSystem->login($userName, $userPassword);
    }

    public function logout(int $userName)
    {
        // TODO: Implement logout() method.
    }

    public function register(array $userInfo)
    {
        // TODO: Implement register() method.
    }

    public function borrowBook(int $bookID, int $userID)
    {
        LibraryFunctions::view("borrowBook.php");
    }

    public function deleteAccount(int $userID, string $userPassword)
    {
        // TODO: Implement deleteAccount() method.
    }

    public function viewBook(int $bookID)
    {

    }

    public function listBooks()
    {
        LibraryFunctions::view("listBooks.php");
    }

    public function booksCategory()
    {
        LibraryFunctions::view("bookCategory.php");
    }

    public function searchBook(string $bookName)
    {
        // TODO: Implement searchBook() method.
    }

    public function userInfo(int $userID)
    {
        // TODO: Implement userInfo() method.
    }

    function userBooks()
    {
        LibraryFunctions::view("userBooks.php");
    }

    public function listBookByCategory(string $bookCategory)
    {
        // TODO: Implement listBookByCategory() method.
    }
}