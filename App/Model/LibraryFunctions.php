<?php
/**
 * Created by PhpStorm.
 * User: keyersoze
 * Date: 03-01-2018
 * Time: 14:18
 */

namespace Library\LibraryFunctions;


class LibraryFunctions
{
    public static function createPassword($password):string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function verifyPassword($userPassword, $passwordHashed):bool
    {
        return password_verify($userPassword, $passwordHashed);
    }

    public static function dateInterval($borrowDate)
    {

        $borrowedDate = new \DateTime($borrowDate);
        $todayDate   = new  \DateTime("now",\DateTimeZone::EUROPE);

        return $borrowedDate > $todayDate;
    }

    public static function view($filePath)
    {
        $baseDir = dirname(__DIR__)."/Templates/";
        if(file_exists($baseDir.$filePath))
            require_once($baseDir.$filePath);
        else
            die("File Don't Exist on the System.");
    }
}

