<?php

require_once dirname(__DIR__)."/../vendor/autoload.php";

Use Library\Controller\System;

$system = new System\System();

$searchBook = $system->searchBook($_POST["bookName"]);

if ($searchBook) {
    echo" 
 <ul class='displayBook'>";
    foreach ($searchBook as $book) {
        $url = "/LibrarySchool/WebApp/";
        echo "<li class='$book->id' style='background: url($url$book->bookImage) no-repeat; 
            background-size: 100%'><div class='booksView'  id='{$book->id}' >
            </div></li>";
    }
    echo "</ul>";
}
else
    echo "<div class='bookDontExt'><i class='tripadvisor icon' style='    text-align: center;
    position: relative;
    left: 200px;'></i><br>Book Don't Exist!</div>";