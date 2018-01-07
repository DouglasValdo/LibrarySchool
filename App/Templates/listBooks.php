<?php

require_once dirname(__DIR__)."/../vendor/autoload.php";

Use Library\Controller\System;

$system = new System\System();

$listBooks = $system->listBooks();

if ($listBooks) {
    echo"<ul class='displayBook'>";
    foreach ($listBooks as $book) {
        $url = "/LibrarySchool/WebApp/";
        echo "<li style='background: url($url$book->bookImage) no-repeat; 
            background-size: 100%'><div class='booksView' id='book_{$book->id}'>
            </div></li>";
    }
    echo "</ul>";
}
else
    echo "Não Existe Ainda Nenhum Livro no Banco de Dados.";