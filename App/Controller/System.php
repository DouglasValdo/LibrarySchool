<?php
/**
 * Created by PhpStorm.
 * User: keyersoze
 * Date: 04-01-2018
 * Time: 18:36
 */

namespace Library\Controller\System;


use Library\DatabaseRequests\DatabaseRequests;
use Library\SessionHandler\SessionHandler;
use Library\DatabaseQuery\DatabaseQuery;
Use Library\LibraryFunctions\Redirect;

class System implements DatabaseRequests
{
    private $databaseQuery;

    public function __construct()
    {
        $this->databaseQuery = new DatabaseQuery();
    }

    public function login(string $userName, string $userPassword)
    {
        $isLoginValid = $this->databaseQuery->login($userName, $userPassword);

        if ($isLoginValid) {

            $userInfo = ["sessionID" => $isLoginValid["userName"], "data" =>$isLoginValid];

            SessionHandler::call("write", $userInfo);

            Redirect::url("profile.php");
        }else {

            Redirect::url("home.php");
        }
    }

    public function logout(int $userName)
    {
        $currentUser = SessionHandler::call("read", array("sessionID" => $userName));

        if(!is_null($currentUser))
            return SessionHandler::call("delete", array("sessionID" => $userName));
        return false;
    }

    public function register(array $userInfo)
    {
       if($this->databaseQuery->register($userInfo))
           $this->login($userInfo["userName"], $userInfo["userPassword"]);
       else
           Redirect::url("register.php?error=Nao_Foi_Possivel_Registrar");
    }

    public function borrowBook(int $bookID, int $userID)
    {
        $book = $this->databaseQuery->bookNotAvailable($bookID);
        if (is_null($book["borrowerBy"]))
            return $this->databaseQuery->borrowBook($bookID, $userID);
        return $book;
    }

    public function listBooks()
    {
        $listBooks = $this->databaseQuery->listBooks();

        if($listBooks) return $listBooks;
        return false;
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

    public function userInfo(int $userID)
    {
        // TODO: Implement userInfo() method.
    }
}

