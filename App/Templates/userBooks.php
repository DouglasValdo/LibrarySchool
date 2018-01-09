<?php

require_once dirname(__DIR__)."/../vendor/autoload.php";

Use Library\Controller\System;

$system = new System\System();

$userBooks = $system->userBooks(1);

if($userBooks) {

    echo "<div class='ui items userBooks'>";
    foreach ($userBooks as $book) {

        echo "
                <div class='item'>
                    <a class='ui tiny image'>
                      <img src='{$book->bookImage}'>
                    </a>
                    <div class='middle aligned content'>
                      <div class='header userBookName' style='color: white;'>
                        <i class='remove circle outline icon' style='cursor:pointer;'></i>
                       {$book->bookName}
                      </div>
                    </div>
    </div>";
  }
}