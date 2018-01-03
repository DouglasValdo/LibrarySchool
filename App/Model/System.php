<?php
/**
 * Created by PhpStorm.
 * User: keyersoze
 * Date: 03-01-2018
 * Time: 13:38
 */

namespace Library\System;


use Library\DatabaseRequests\DatabaseRequests;
use Library\Users\Users;

class System implements DatabaseRequests
{

    private function bookStatus($status)
    {

    }

    public function login(string $userName, string $userPassword)
    {
        // TODO: Implement login() method.
    }

    public function logout(int $userID)
    {
        // TODO: Implement logout() method.
    }

    public function register(Users $user)
    {
        // TODO: Implement register() method.
    }

    public function editUserData(int $userID)
    {
        // TODO: Implement editUserData() method.
    }

    public function borrowBook(int $bookID, int $userID)
    {
        // TODO: Implement borrowBook() method.
    }

    public function deleteAccount(int $userID)
    {
        // TODO: Implement deleteAccount() method.
    }

    public function viewBook()
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

    public function searchBook()
    {
        // TODO: Implement searchBook() method.
    }
}

