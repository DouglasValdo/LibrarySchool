$(document).ready(function () {


    bookHover();

    displayBook();

    $(".bookGetByLetter > li").click(function () {
        searchBook($(this).text());
    });

    $(".prompt").on('keypress', function (event) {
        if(event.which === 13){
            event.preventDefault();
            if($(this).val().length > 0)
            searchBook($(this).val());
        }
    });


    $(".categoryContent > li").on('click', function () {

        selectBookByCategory($(this).attr("id"));
    });
});



function modalViewBook(result) {

    var modal = $("<div>", {class: "ui modal longer", id : result.id}).appendTo("body"),
        header = $("<div>", {class: "header"}).appendTo(modal).html(result.bookName),
        content = $("<div>", {class: "image content"}).appendTo(modal),
        imageBook = $("<img>", {class: "image", src:result.bookImage}).appendTo(content),
        description = $("<div>", {class: "description"}).appendTo(content),
        pText = $("<p>", {text: result.bookDescription, class:'bookDescription'}).appendTo(description),
        actionContent = $("<div>", {class: "actions"}).appendTo(modal),
        btnApprove = $("<div>", {class: "ui positive right labeled icon button"}).appendTo(actionContent).html("Borrow"),
        approveIcon = $("<i>", {class: "ui checkmark icon"}).appendTo(btnApprove),
        btnClose = $("<div>", {class: "ui negative right labeled icon button"}).appendTo(actionContent).html("Close"),
        closeIcon = $("<i>", {class: "ui remove icon"}).appendTo(btnClose);

        $(btnApprove).on('click', function () {


            borrowBook($(modal).attr("id"), 1);
        });

    $(modal).modal({closable : false}).modal('show');

}

function borrowBook(bookID, userID) {

    var modal = $("<div>", {class: "ui modal mini"}).appendTo("body"),
        header = $("<div>", {class: "header"}).appendTo(modal).html("Borrow Book"),
        content = $("<div>", {class: "content"}).appendTo(modal),
        pText = $("<p>", {text: "Do you Want to Borrow This Book?"}).appendTo(content),
        actionContent = $("<div>", {class: "actions"}).appendTo(modal),
        btnApprove = $("<div>", {class: "ui positive right labeled icon button"}).appendTo(actionContent).html("Yes"),
        btnAprroveIcon = $("<i>", {class: "checkmark icon"}).appendTo(btnApprove),
        btnCancel = $("<div>", {class: "ui negative button"}).appendTo(actionContent).html("No");

    $(btnApprove).on('click', function () {

        borrowBookRequest(bookID, userID);
    });

    $(modal).modal({closable : false}).modal('show');
}

function bookHover() {

    $(".booksView").hover(function () {
        if($(this).attr("class") !== "booksView booksViewHover") {

            $(this).addClass("booksViewHover");

            $("<div>",{class:"viewContent"}).appendTo(this);

            $("<p>", {class: 'viewBook'}).appendTo(".viewContent");

            $("<i>",{class : "add to cart icon"}).appendTo(".viewContent");
        }
    },function () {

        $(this).removeClass("booksViewHover");

        if($(".viewBook").attr("class")){

            $(this).empty();
        }
    });
}

function displayBook() {
    $(".displayBook > li").click(function () {

        const bookID = $("."+this.className+ " .booksView").attr("id");

        $.ajax({
            dataType : 'json',
            method: 'post',
            url : '../App/Templates/viewBook.php',
            data: {bookID : bookID},

            success: function (result) {
                $("body").append(result);

                modalViewBook(result);
            },
            error: function () {
                alert("Some error as Occurs!");
            }
        })
    });
}

function searchBook(element) {

    $.ajax({
        method: 'post',
        url : '../App/Templates/searchBook.php',
        data: {bookName : element},

        success: function (result) {

            $(".showBooks").html(result);
            bookHover();
            displayBook();

        },
        error: function () {
            alert("Some error as Occurs!");
        }
    })
}

function selectBookByCategory(bookCategory) {

    $.ajax({
        method: 'post',
        url : '../App/Templates/bookByCategory.php',
        data: {category : bookCategory},

        success: function (result) {

            $(".showBooks").html(result);
            bookHover();
            displayBook();

        },
        error: function () {
            alert("Some error as Occurs!");
        }
    })
}

function borrowBookRequest(bookID, userID) {

    $.ajax({
        method: 'post',
        url : '../App/Templates/borrowBook.php',
        data: {bookID : bookID, userID : userID},

        success: function (result) {

            modalInfo(result);
            updateProfileBorrowedBook();
        },
        error: function () {
            alert("Some error as Occurs!");
        }
    })
}

function modalInfo(textInfo) {

    var modal = $("<div>", {class: "ui modal mini"}).appendTo("body"),
        header = $("<div>", {class: "header"}).appendTo(modal).html("Book Status"),
        content = $("<div>", {class: "content"}).appendTo(modal),
        pText = $("<p>", {text: textInfo, class:'bookStatusInfo'}).appendTo(content),
        actionContent = $("<div>", {class: "actions"}).appendTo(modal),
        btnApprove = $("<div>", {class: "ui positive right labeled icon button"}).appendTo(actionContent).html("Close"),
        btnAprroveIcon = $("<i>", {class: "checkmark icon"}).appendTo(btnApprove);

    $(modal).modal({closable : false}).modal('show');

}

function updateProfileBorrowedBook() {

    $.ajax({
        beforeSend : function () {

            const loadContent = $("<div>", {class: "ui segment"}).appendTo("user-info");

          $("<div>", {class: "ui active dimmer"}).appendTo(loadContent);

          $("<div>", {class: "ui text loader", }).appendTo(loadContent);
        },
        method: 'post',
        url : '../App/Templates/userBooks.php',
        data: {userID : 1},

        success: function (result) {
            var info = ".user-info";

            $(info).empty();
            $(info).html(result);

        },
        error: function () {
            alert("Some error as Occurs!");
        }
    })
}