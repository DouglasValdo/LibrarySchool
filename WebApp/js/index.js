

$(document).ready(function () {

    $(".booksView").on('hover', function () {

        $(this).addClass("booksViewHover");

        $("<div>",{class:"viewContent"}).appendTo(this);

        $("<p>", {class: 'viewBook'}).appendTo(".viewContent");

        $("<i>",{class : "add to cart icon"}).appendTo(".viewContent");



    },function () {

        $(this).removeClass("booksViewHover");

        if($(".viewBook").attr("class")){

            $(this).empty();
        }
    });

    $(".showModal").click(function () {
        showBookAvailable(1, 1);

    });
});

function showBookAvailable(bookId, userID) {

    $.ajax({
        method: 'post',
        url : '../App/Templates/borrowBook.php',
        data: {bookID : bookId, userID: userID},

        success: function (result) {
            modalInfo(result);
        },
        error: function () {
            alert("Some error as Occurs!");
        }
    })
}

function BorrowBook() {

    var modal = $("<div>", {class: "ui modal mini"}).appendTo("body"),
        header = $("<div>", {class: "header"}).appendTo(modal).html("Borrow Book"),
        content = $("<div>", {class: "content"}).appendTo(modal),
        pText = $("<p>", {text: "Do you Want to Borrow This Book?"}).appendTo(content),
        actionContent = $("<div>", {class: "actions"}).appendTo(modal),
        btnApprove = $("<div>", {class: "ui positive right labeled icon button"}).appendTo(actionContent).html("Yes"),
        btnAprroveIcon = $("<i>", {class: "checkmark icon"}).appendTo(btnApprove),
        btnCancel = $("<div>", {class: "ui negative button"}).appendTo(actionContent).html("No");

    $(modal).modal({closable : false}).modal('show');
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