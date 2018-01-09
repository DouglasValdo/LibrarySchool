<?php
require_once "../../LibrarySchool/vendor/autoload.php";
use Library\View\SystemView;
$systemView = new SystemView();
?>
<!DOCTYPE html>
<html>
<head><title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fascinate" rel="stylesheet">
    <link rel='stylesheet' type="text/css" href='css/home.css'>
    <link rel='stylesheet' type="text/css" href='css/booksStyle.css'>
    <link rel="stylesheet" type="text/css" href="WebComponents/node_modules/semantic-ui/dist/semantic.min.css">
    <script type='text/javascript' src='js/jquery-3.2.1.min.js'></script>
    <script src="WebComponents/semantic/dist/semantic.min.js"></script>
    <script src="js/home.js"></script>

</head>
<body>
<div class="ui internally celled grid">
    <div class="row" style="box-shadow: none">
        <div class="three wide column category-div">
            <div class="siteName">
                <i class="ui book icon"></i>
                <p class="siteTitle">Your Book</p>
            </div>
        </div>
        <div class="ten wide column search-div" style="border-bottom: 1px solid rgba(0, 0, 0, 0.1);">
            <div class="ui fluid search">
                <div class="ui icon input" style="    float: right;right: 100px;top: 20px;">
                    <input class="prompt" type="text" placeholder="Search..." style="    width: 300px;height: 50px;">
                    <i class="search icon"></i>
                </div>
                <div class="results"></div>
            </div>
        </div>
        <div class="three wide column profile-div">
            <div class="user-profile">
                <div class="ui hidden divider"></div>
                <div class="ui floating dropdown button" style="background-color: transparent; font-size: 20px;
                color: white; width: 230px; position: relative;
                right: 20px;">
                    <div class="text"><?php echo "Douglas Valdo"; ?></div>
                    <i class="dropdown icon iconMenu"></i>
                    <div class="menu">
                        <a class="item" href="#"><i class="home icon"></i> Home</a>
                        <a class="item" href="#"><i class="users icon"></i> Browse</a>
                        <a class="item" href="#"><i class="search icon"></i> Search</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="box-shadow: none">
        <div class="three wide column category-bar" style="padding: 0;">
            <?php $systemView->booksCategory();?>
        </div>
        <div class="ten wide column books-listed" style="padding-left: 0; padding-right: 0; padding-top: 0">
            <div class="displayBookLetter">
                <ul class="bookGetByLetter">
                    <li>A</li>
                    <li>B</li>
                    <li>C</li>
                    <li>D</li>
                    <li>E</li>
                    <li>F</li>
                    <li>G</li>
                    <li>H</li>
                    <li>I</li>
                    <li>J</li>
                    <li>K</li>
                    <li>L</li>
                    <li>M</li>
                    <li>N</li>
                    <li>O</li>
                    <li>P</li>
                    <li>Q</li>
                    <li>R</li>
                    <li>S</li>
                    <li>T</li>
                    <li>U</li>
                    <li>V</li>
                    <li>X</li>
                    <li>W</li>
                    <li>Y</li>
                    <li>Z</li>


                </ul>
            </div>
            <div class="showBooks">
                <?php
                $systemView->listBooks();
                ?>
            </div>
        </div>
        <div class="three wide column user-info">
            <?php $systemView->userBooks()?>
        </div>
    </div>
</div>
</body>
</html>