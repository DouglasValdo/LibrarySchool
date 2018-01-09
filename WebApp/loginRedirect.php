<?php

require_once "../../LibrarySchool/vendor/autoload.php";

use Library\View\SystemView;


$viewLogin = new SystemView();

$viewLogin->login($_POST["userName"], $_POST["userPassword"]);