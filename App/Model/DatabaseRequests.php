<?php
/**
 * Created by PhpStorm.
 * User: keyersoze
 * Date: 03-01-2018
 * Time: 14:24
 */

namespace Library\DatabaseRequests;

Use Library\Users\Users;

interface DatabaseRequests
{
    public function login(string $userName, string $userPassword);

    public function logout(int $userID);

    public function register(array $userInfo);

    public function borrowBook(int $bookID, int $userID);

    public function deleteAccount(int $userID, string $userPassword);

    public function viewBook(int $bookID);

    public function listBooks();

    public function booksCategory();

    public function searchBook(string $bookName);

    public function userInfo(int $userID);

}


