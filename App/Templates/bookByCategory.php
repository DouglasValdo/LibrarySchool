<?php


require_once dirname(__DIR__)."/../vendor/autoload.php";

Use Library\Controller\System;

$system = new System\System();

$categoryBooks = $system->listBookByCategory($_POST["category"]);

if ($categoryBooks) {
    echo"<ul class='displayBook'>";
    $url = "/LibrarySchool/WebApp/";
    foreach ($categoryBooks as $book) {

        echo "<li class='$book->id' style='background: url($url$book->bookImage) no-repeat; 
            background-size: 100%'><div class='booksView' id='{$book->id}'>
            </div></li>";
    }
    echo "</ul>";
}
else
    echo "<div class='bookDontExt'><i class='tripadvisor icon' style='    text-align: center;
    position: relative;
    left: 200px;'></i><br>Book Don't Exist!</div>";