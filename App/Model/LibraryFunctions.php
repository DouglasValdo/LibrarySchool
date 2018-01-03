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

    public function verifyPassword($password, $passwordHashed):bool
    {
        return password_verify($password, $passwordHashed);
    }
}