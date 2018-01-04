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
require_once "LibraryFunctions.php";

use Library\DatabaseConnection\DatabaseConnection;
use Library\DatabaseRequests\DatabaseRequests;
use Library\LibraryFunctions\LibraryFunctions;

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


    public function isBookAvailable($bookID)
    {
        $queryBorrowBook = "call bookAvailable(:bookID)";

        $queryResponse = $this->databaseRequest->prepare($queryBorrowBook);

        $queryResponse->execute(array(":bookID" => $bookID));

        return ($queryResponse->rowCount())? $queryResponse->fetch() : false;
    }

    public function login(string $userName, string $userPassword):bool
    {
        $queryLogin = "call login(:userName)";

        $queryResponse = $this->databaseRequest->prepare($queryLogin);

        $queryResponse->execute(array(":userName"=>$userName));

        if($queryResponse->rowCount()) {

            $userDatabaseData = $queryResponse->fetch();
            $userDatabaseHashPassword = $userDatabaseData["userPassword"];

            if(LibraryFunctions::verifyPassword($userPassword, $userDatabaseHashPassword))
                return true;
            else
                return false;
        }

        else
            return false;
    }

    public function register(array $userInfo)
    {
        if($this->login($userInfo["userName"], $userInfo["userPassword"]))
            die();

        $queryRegister = "call register(:userName, :userPassword, 
        :userProfileBackground, :userBooksPreferences)";

        $queryResponse = $this->databaseRequest->prepare($queryRegister);

        $userInfo = array(":userName" => $userInfo["userName"],
            ":userPassword" => LibraryFunctions::createPassword($userInfo["userPassword"]),
            ":userProfileBackground" => $userInfo["userProfileBackground"],
            ":userBooksPreferences" => $userInfo["userBooksPreferences"]);

        $queryResponse->execute($userInfo);

        return ($queryResponse->rowCount())? true: false;
    }

    public function borrowBook(int $bookID, int $userID)
    {
        $queryBorrowBook = "call borrowBook(:bookID, :userID)";

        $queryResponse = $this->databaseRequest->prepare($queryBorrowBook);

        $queryResponse->execute(array(":bookID" => $bookID, ":userID" => $userID));

        return ($queryResponse->rowCount())? true: false;
    }

    public function deleteAccount(int $userID, string $userPassword)//not implemented this Function delete Account
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

        return ($queryResponse->rowCount())? $queryResponse->fetch(\PDO::FETCH_OBJ): false;
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

        return ($queryResponse->rowCount())?
            $queryResponse->fetchAll(\PDO::FETCH_OBJ): false;
    }

    public function searchBook(string $bookName)
    {
        $querySearch = "call searchBook(:bookName)";

        $queryResponse = $this->databaseRequest->prepare($querySearch);

        $queryResponse->execute(array(":bookName" => $bookName));

        return ($queryResponse->rowCount())?
            $queryResponse->fetchAll(\PDO::FETCH_OBJ): false;

    }

    public function logout(int $userID)
    {
        // TODO: Implement logout() method.
    }

    public function userInfo(int $userID)
    {
        $querySearch = "call userInfo(:userID)";

        $queryResponse = $this->databaseRequest->prepare($querySearch);

        $queryResponse->execute(array(":userID" => $userID));

        return ($queryResponse->rowCount())?
            $queryResponse->fetchAll(\PDO::FETCH_OBJ): false;
    }
}

$test = new DatabaseQuery();
echo "<pre>";
var_dump($test->userInfo(1));
