<?php
/**
 * Created by PhpStorm.
 * User: keyersoze
 * Date: 04-01-2018
 * Time: 20:56
 */

namespace Library\View;

$path = dirname(__DIR__);

use Library\Controller\System\System;
use Library\DatabaseRequests\DatabaseRequests;

class SystemView implements DatabaseRequests
{
    private $system;

    public function __construct()
    {
        $this->system = new System();
    }

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
        $book = $this->system->borrowBook($bookID, $userID);

        if(is_null($book["borrowerBy"]))
            echo "Book Borrowed Successful Return it on Date: ".date("Y-m-d", strtotime('+ 7 days'));
        else {
            $today = new \DateTime(date("Y-m-d"));
            $borrowed = new \DateTime($book["status"]);
            echo "book Borrowed it Will be Available in ".$today->diff($borrowed)->days. " Days!!!";
        }
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
        // TODO: Implement listBooks() method.
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