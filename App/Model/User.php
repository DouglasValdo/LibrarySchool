<?php
/**
 * Created by PhpStorm.
 * User: keyersoze
 * Date: 03-01-2018
 * Time: 12:54
 */

namespace Library\Users;


abstract class Users
{
    public $userName;
    public $userPassword;
    public $userBooksPreferences;
    public $userProfileBackground;

    /**
     * @return string
     */
    public function getUserName():string

    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function getUserPassword():string
    {
        return $this->userPassword;
    }

    /**
     * @return array
     */
    public function getUserBooksPreferences():array
    {
        return $this->userBooksPreferences;
    }

    /**
     * @return mixed
     */
    public function getUserProfileBackground()
    {
        return $this->userProfileBackground;
    }
}

