/**
 * Created by admin-pc on 2/3/2017.
 */

$(document).ready(function () {
    $('#add-book').click(function () {
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

// clicking the 'read products' button
    $('#all-book').click(function(){
        ChangeTitle("All Books");
        // show a loader img
        $('#loader-image').show();

        // show create product button
        btnToggle($('#all-book'),$('#add-book'));

        // show products
       ShowBooks();
    });
    function ShowBooks() {
        $('#page-content').fadeOut('slow', function(){
            $('#page-content').load('AllBook.php', function(){
                // hide loader image
                $('#loader-image').hide();

                // fade in effect
                $('#page-content').fadeIn('slow');
            });
        });
    }
});
function btnToggle(elemHide, elemShow){
    elemHide.hide();
    elemShow.show();
}

function  ChangeTitle(title) {
    $('#page-title').html(title);
}
