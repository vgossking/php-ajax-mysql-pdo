/**
 * Created by admin-pc on 2/3/2017.
 */

$(document).ready(function () {
    $('#add-book').click(function () {
        $('#search-container').hide();
        ChangeTitle("Add book");
        $('#loader-image').show();

        var addBook = $('#add-book');

        var allBooks = $('#all-book');

        btnToggle(addBook, allBooks);

        // fade out effect first
        $('#page-content').fadeOut('slow', function(){
            $('#page-content').load('create_form.php', function(){

                // hide loader image
                $('#loader-image').hide();

                // fade in effect
                $('#page-content').fadeIn('slow');
            });
        });
    });
});

$(document).ready(function () {
   $(document).on("submit",'#add-book-form',function () {
      $('#loader-image').show();
      $.post('service/CreateBookService.php',$(this).serialize()).done(
        function (data) {
            $('#add-book').show();
            $('#all-book').hide();
            ShowBooks();
        }
      )
   });

    $('#loader-image').show();
    ShowBooks();


    $('#all-book').click(function(){
        ChangeTitle("All Books");
        $('#loader-image').show();
        btnToggle($('#all-book'),$('#add-book'));
        ShowBooks();
    });
});
function btnToggle(elemHide, elemShow){
    elemHide.hide();
    elemShow.show();
}
function ShowBooks() {
    $('#search-container').show();
    $('#page-content').fadeOut('slow', function(){
        $('#page-content').load('AllBook.php', function(){
            // hide loader image
            $('#loader-image').hide();

            // fade in effect
            $('#page-content').fadeIn('slow');
        });
    });
}
function  ChangeTitle(title) {
    $('#page-title').html(title);
}

$(document).ready(function (){

    $('#search-box').keyup(function () {
        var keyWord = $(this).val();
        if (keyWord.length > 2) {
            $('#alert').remove();
            $.post("SearchBook.php", {keyword: keyWord}).done(function (data) {
                $('#loader-image').show();
                $('#list-book').remove();
                $('#search-book').remove();
                $('#loader-image').hide();
                $('#page-content').append(data);
            });
        } else if (keyWord.length == 0) {
            ShowBooks();
            ChangeTitle('All Books');
        }
    });

    $(document).on('click', '.edit-btn', function () {
        var id = $(this).closest('td').find('.book-id').text();
        ChangeTitle("Update Product");
        $('#loader-image').show();
        btnToggle($('#add-book'), $('#all-book'));
        $('#page-content').fadeOut('slow', function () {
            $('#page-content').load('service/update.php?id=' + id, function () {
                $('#search-container').hide();
                $('#loader-image').hide();
                $('#page-content').fadeIn('slow');
            });
        });
    });

    $(document).on('click', '.delete-btn', function () {
        var id = $(this).closest('td').find('.book-id').text();
        $.post('service/deleteService.php',{id: id}).done(
            function () {
                $('#add-book').show();
                $('#all-book').hide();
                ShowBooks();
                alert('delete success');
            }
        );
    });

    $(document).on("submit",'#update-book-form',function () {
        $('#loader-image').show();
        $.post('service/UpdateService.php',$(this).serialize()).done(
            function (data) {
                $('#add-book').show();
                $('#all-book').hide();
                ShowBooks();
            }
        )
    });
});
