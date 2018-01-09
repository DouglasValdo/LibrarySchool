<?php
header('Content-Type: application/json');

require_once dirname(__DIR__)."/../vendor/autoload.php";

Use Library\Controller\System;

$system = new System\System();

$url = "/LibrarySchool/WebApp/";

$viewBooks = $system->viewBook((int)$_POST["bookID"]);
$viewBooks->bookImage =$url.$viewBooks->bookImage;
echo json_encode($viewBooks);