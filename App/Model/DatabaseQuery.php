<?php
/**
 * Created by PhpStorm.
 * User: keyersoze
 * Date: 03-01-2018
 * Time: 14:24
 */

namespace Library\DatabaseQuery;

require_once "DatabaseRequests.php";
require_once "DatabaseConnection.php";
require_once "User.php";

use Library\DatabaseConnection\DatabaseConnection;
use Library\DatabaseRequests\DatabaseRequests;
use Library\Users\Users;
use Library\SessionHandler\SessionHandler;

class DatabaseQuery implements DatabaseRequests
{

    private $databaseConnection;
    private $databaseRequest;

    public function __construct()
    {
        $this->databaseConnection = DatabaseConnection::getDatabaseConnection();

        $errorConnectionBD = $this->databaseConnection->errorConnectingDatabase();

        if(!$errorConnectionBD)
            $this->databaseRequest = $this->databaseConnection->DatabaseConnection();

    }


    public function login(string $userName, string $userPassword)
    {
        $query = "call login(:userName, :userPassword)";

        $queryResponse = $this->databaseRequest->prepare($query);

        $queryResponse->execute(array(":userName"=>$userName, ":userPassword" => $userPassword));

        return ($queryResponse->rowCount()) ? $queryResponse->fetch(): null;
    }

    public function logout(int $userID)
    {
        $currentUser = SessionHandler::call("read", array("sessionID" => $userID));

        if(!is_null($currentUser))
            SessionHandler::call("delete", array("sessionID" => $userID));

    }

    public function register(Users $user)
    {

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

$test = new DatabaseQuery();

var_dump($test);