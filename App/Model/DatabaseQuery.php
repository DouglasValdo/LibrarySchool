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
        $queryLogin = "call login(:userName, :userPassword)";

        $queryResponse = $this->databaseRequest->prepare($queryLogin);

        $queryResponse->execute(array(":userName"=>$userName, ":userPassword" => $userPassword));

        return ($queryResponse->rowCount()) ? $queryResponse->fetch(): null;
    }

    public function logout(int $userID)
    {
        $currentUser = SessionHandler::call("read", array("sessionID" => $userID));

        if(!is_null($currentUser))
            return SessionHandler::call("delete", array("sessionID" => $userID));
        return false;
    }

    public function register(Users $user)
    {
        $queryRegister = "call register(:userName, :userPassword, 
        :userProfileBackground, :userBooksPreferences)";

        $queryResponse = $this->databaseRequest->prepare($queryRegister);

        $userInfo = array(":userName" => $user->getUserName(),
            ":userPassword" => $user->getUserPassword(),
            ":userProfileBackground" => $user->getUserProfileBackground(),
            ":userBooksPreferences" => $user->getUserBooksPreferences());

        $queryResponse->execute($userInfo);

        return ($queryResponse->rowCount())? true: false;
    }

    public function editUserData(int $userID, string $userPassword)
    {
        $queryEditProfile = "call editUserProfile(:userID, :userPassword)";

        $queryResponse = $this->databaseRequest->prepare($queryEditProfile);

        $queryResponse->execute(array(":userID" =>$userID, ":userPassword" => $userPassword));

        return ($queryResponse->rowCount()) ? true: false;

    }

    public function borrowBook(int $bookID, int $userID)
    {
        $queryBorrowBook = "call borrowBook(:bookID, :userID)";

        $queryResponse = $this->databaseRequest->prepare($queryBorrowBook);

        $queryResponse->execute(array(":bookID" => $bookID, ":userID" => $userID));

        return ($queryResponse->rowCount())? true: false;
    }

    public function deleteAccount(int $userID, string $userPassword)
    {
        $queryDeleteAccount = "deleteAccount(:userID, :userPassword)";

        $queryResponse = $this->databaseRequest->prepare($queryDeleteAccount);

        $queryResponse->execute($queryDeleteAccount);

        return ($queryResponse->rowCount())? true: false;
    }

    public function viewBook(int $bookID)
    {
        $queryViewBook = "call viewBook(:bookID)";

        $queryResponse = $this->databaseRequest->prepare($queryViewBook);

        $queryResponse->execute(array(":bookID" => $bookID));

        return ($queryResponse->rowCount())? true: false;
    }

    public function listBooks()
    {
        $queryListBooks = "call listBooks()";

        $queryResponse = $this->databaseRequest->prepare($queryListBooks);

        $queryResponse->execute();

        return ($queryResponse->rowCount())?
            $queryResponse->fetchAll(\PDO::FETCH_OBJ): false;
    }

    public function booksCategory()
    {
        $queryBooksCategory = "call booksCategory()";

        $queryResponse = $this->databaseRequest->prepare($queryBooksCategory);

        $queryResponse->execute();

        return (bool) $queryResponse->rowCount();
    }

    public function searchBook(string $bookName)
    {
        $querySearch = "call searchBook(:bookName)";

        $queryResponse = $this->databaseRequest->prepare($querySearch);

        $queryResponse->execute(array(":bookName" => $bookName));

        return ($queryResponse->rowCount())?
            $queryResponse->fetchAll(\PDO::FETCH_OBJ): false;

    }
}

$test = new DatabaseQuery();

var_dump($test);