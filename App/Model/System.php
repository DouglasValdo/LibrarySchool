<?php
/**
 * Created by PhpStorm.
 * User: keyersoze
 * Date: 03-01-2018
 * Time: 13:38
 */

namespace Library\System;

use Library\DatabaseRequests\DatabaseRequests;
use Library\SessionHandler\SessionHandler;
use Library\DatabaseQuery\DatabaseQuery;

class System implements DatabaseRequests
{
    private $databaseQuery;

    public function __construct()
    {
        $this->databaseQuery = new DatabaseQuery();
    }

    private function bookStatus($status)
    {

    }

    public function login(string $userName, string $userPassword)
    {

    }

    public function logout(int $userID)
    {
        $currentUser = SessionHandler::call("read", array("sessionID" => $userID));

        if(!is_null($currentUser))
            return SessionHandler::call("delete", array("sessionID" => $userID));
        return false;
    }

    public function register(array $userInfo)
    {
        // TODO: Implement register() method.
    }



    public function borrowBook(int $bookID, int $userID)
    {
        // TODO: Implement borrowBook() method.
    }

    public function listBooks()
    {
        // TODO: Implement listBooks() method.
    }

    public function booksCategory()
    {
        // TODO: Implement booksCategory() method.
    }

    public function deleteAccount(int $userID, string $userPassword)
    {
        // TODO: Implement deleteAccount() method.
    }

    public function viewBook(int $bookID)
    {
        // TODO: Implement viewBook() method.
    }

    public function searchBook(string $bookName)
    {
        // TODO: Implement searchBook() method.
    }
}

