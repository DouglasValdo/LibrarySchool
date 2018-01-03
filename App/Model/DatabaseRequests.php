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

    public function register(Users $user);

    public function editUserData(int $userID);

    public function borrowBook(int $bookID, int $userID);

    public function deleteAccount(int $userID);

    public function viewBook();

    public function listBooks();

    public function booksCategory();

    public function searchBook();

}

