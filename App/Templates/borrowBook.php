<?php

require_once dirname(__DIR__)."/../vendor/autoload.php";

Use Library\Controller\System;

$system = new System\System();

$book = $system->borrowBook(1, 1);

if(is_null($book["borrowerBy"]))
    echo "Book Borrowed Successful Return it on Date: ".date("Y-m-d", strtotime('+ 7 days'));
else {
    $today = new \DateTime(date("Y-m-d"));
    $borrowed = new \DateTime($book["status"]);
    echo "book Borrowed it Will be Available in ".$today->diff($borrowed)->days. " Days!!!";
}