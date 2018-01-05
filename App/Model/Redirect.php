<?php
/**
 * Created by PhpStorm.
 * User: keyersoze
 * Date: 04-01-2018
 * Time: 18:55
 */

namespace Library\LibraryFunctions;


class Redirect
{
        public static function url($userUrl){

            header("Location: ".$userUrl, false, 303);
        }
}