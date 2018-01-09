<?php

require_once dirname(__DIR__)."/../vendor/autoload.php";

Use Library\Controller\System;

$system = new System\System();

$bookCategory = $system->booksCategory();

if($bookCategory) {
    $oldCategory = "";
    echo "<ul class='categoryContent'>";
    foreach ($bookCategory as $category) {
        if($category != $oldCategory) {
            echo "<li class='catgoryList' id='$category->category'>
                <a href='#$category->category'><p> {$category->category}</p></a>
            </li>";
        }
        $oldCategory = $category;
    }
    echo "</ul>";
}