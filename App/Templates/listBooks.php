<?php

require_once dirname(__DIR__)."/../vendor/autoload.php";

Use Library\Controller\System;

$system = new System\System();

$listBooks = $system->listBooks();

if ($listBooks) {
    echo"<ul class='displayBook'>";
    $url = "/LibrarySchool/WebApp/";
    foreach ($listBooks as $book) {

        echo "<li class='$book->id' style='background: url($url$book->bookImage) no-repeat; 
            background-size: 100%'><div class='booksView' id='{$book->id}'>
            </div></li>";
    }
    echo "</ul>";
}
else
    echo "Não Existe Ainda Nenhum Livro no Banco de Dados.";