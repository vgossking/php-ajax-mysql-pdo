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
            ShowBooks(1);
        }
      )
   });

    $('#loader-image').show();
    ShowBooks(1);

    $(document).on("click", ".paging-btn", function(){

        // show loader image
        $("#loader-image").show();

        // get the page number
        var page = $(this).attr('page-num');

        // read products
        ShowBooks(page);

    });
    $('#all-book').click(function(){
        ChangeTitle("All Books");
        $('#loader-image').show();
        btnToggle($('#all-book'),$('#add-book'));
        ShowBooks(1);
    });
});
function btnToggle(elemHide, elemShow){
    elemHide.hide();
    elemShow.show();
}
//load page all book with param page
function ShowBooks(page) {
    $('#search-container').show();
    $('#page-content').fadeOut('slow', function(){
        $('#page-content').load('AllBook.php?page='+page, function(){
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
            $.post("SearchBook.php", {keyword: keyWord}).done(function (data) {
                $('#alert').remove();
                $('#paging').remove();
                $('#loader-image').show();
                $('#list-book').remove();
                $('#search-book').remove();
                $('#loader-image').hide();
                $('#page-content').append(data);
            });
        } else if (keyWord.length == 0) {
            ShowBooks(1);
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
                ShowBooks(1);
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
                ShowBooks(1);
            }
        )
    });
    //go to page 
    $(document).on('click', '#go-to-btn',function () {
        $("#loader-image").show();
        var page = $('#go-to-page').val();
        ShowBooks(page);
    });

    $('#user-login').click(function () {
        var username = $('#lg_username').val();
        var password = $('#lg_password').val();
        if(username.length > 4 && password.length > 4){
            $.post(
                'service/LogInService.php',
                {
                    username: username,
                    password: password
                }
            ).done(function (data) {
                if(data == 0) {
                    $('.login-form-main-message').html("Username or password is not correct");
                    $('.login-form-main-message').css({'opacity': 1, 'margin-bottom': '50px'});
                }else{
                    window.location.href = 'http://library.dev';
                }
            });
        }else{
            $('.login-form-main-message').text("Username and password must have more than 6 letters");
            $('.login-form-main-message').css({'opacity':1, 'margin-bottom':'50px'});
        }
    });
});
