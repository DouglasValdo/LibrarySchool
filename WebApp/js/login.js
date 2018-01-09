$(document).ready(function () {

    var url = window.location.href,
        errorStartIndex = url.lastIndexOf("?");

    if(errorStartIndex > -1) {
        var erro = url.substr(errorStartIndex+7, url.length),
            errorArray = erro.split("_"),
            errorLogin = "";

        errorArray.forEach(function(item) {

            return errorLogin +=" "+item;
        });

        invalidLogin(errorLogin+".");
    }

    $(".register").click(function () {

        window.location.href = "register.php";
    })
});

function invalidLogin(text) {

    var modal = $("<div>", {class: "ui modal mini"}).appendTo("body"),
        header = $("<div>", {class: "header"}).appendTo(modal).html("Login Error").css("font-size","18px"),
        content = $("<div>", {class: "content"}).appendTo(modal),
        pText = $("<p>", {text: text}).appendTo(content),
        actionContent = $("<div>", {class: "actions"}).appendTo(modal),
        btnApprove = $("<div>", {class: "ui positive right labeled icon button"}).appendTo(actionContent).html("Yes"),
        btnAprroveIcon = $("<i>", {class: "checkmark icon"}).appendTo(btnApprove);

    $(modal).modal({closable : false}).modal('show');

}

