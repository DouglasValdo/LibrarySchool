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

class SystemView implements DatabaseRequests
{

    public function login(string $userName, string $userPassword)
    {
        // TODO: Implement login() method.
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
        // TODO: Implement viewBook() method.
    }

    public function listBooks()
    {
        LibraryFunctions::view("listBooks.php");
    }

    public function booksCategory()
    {
        // TODO: Implement booksCategory() method.
    }

    public function searchBook(string $bookName)
    {
        // TODO: Implement searchBook() method.
    }

    public function userInfo(int $userID)
    {
        // TODO: Implement userInfo() method.
    }
}

$test = new SystemView();

$test->listBooks();