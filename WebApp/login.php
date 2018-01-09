<!DOCTYPE html>
<html>
<head><title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel='stylesheet' type="text/css" href='css/login.css'>
    <link rel="stylesheet" type="text/css" href="WebComponents/node_modules/semantic-ui/dist/semantic.min.css">
    <script type='text/javascript' src='js/jquery-3.2.1.min.js'></script>
    <script src="WebComponents/semantic/dist/semantic.min.js"></script>
    <script type='text/javascript' src='js/login.js'></script>
</head>
<body>
    <div class="global-container">
        <div class="container">
            <div class="loginContainer">
                <div class="ui card" style="width: 400px; height: 350px; margin: auto; position: relative; top: 100px;
                    background-color: #131B3C; box-shadow: 0 1px 3px 0 #252529, 0 0 0 1px #3d3d48;">
                    <div class="extra content" style="font-size: 30px; text-align:center; color: white; font-weight: bold;
                                text-transform: uppercase;"> Login</div>
                    <div class="content" style="">
                        <form class="ui form formLogin" method="post" action="loginRedirect.php" style="font-family: 'Open Sans', sans-serif;">
                            <div class="field">
                                <input type="text" name="userName" placeholder="Name..." style="position:relative;
                                top: 29px; height: 60px;
                                border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
                            </div>
                            <div class="field">
                                <input type="password" name="userPassword" placeholder="Password..."
                                       style="position:relative; top: 15px; height: 60px;
                                border-top-left-radius: 0; border-top-right-radius: 0;">
                            </div>

                    </div>
                    <div class="extra content" style="height: 80px">
                        <a>
                            <div class="ui buttons" style=" padding-top: 0; position: relative; left: 90px">
                                <button class="ui button" type="submit" style="width: 100px; height: 45px;
                                background-color: #0ea432; color: white;">Login</button>
                                <div class="or"></div>
                                <button class="ui positive button register"  type="button" style="background-color: #FF5E3A">Register</button>
                            </div>
                        </a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>