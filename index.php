<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Library</title>
</head>
<body>
<!-- container -->
    <div class="container">

        <div class='page-header'>
            <h1 id='page-title'>All Books</h1>
                <!-- this is the loader image, hidden at first -->
            </div><!-- page header -->
            <div class='margin-bottom-1em overflow-hidden'>
                <!-- when clicked, it will show the product's list -->
                <div id='all-book' class='btn btn-primary pull-right display-none'>
                    <span class='glyphicon glyphicon-list'></span> All Books
                </div>

                <!-- when clicked, it will load the create product form -->
                <div id='add-book' class='btn btn-primary pull-right'>
                    <span class='glyphicon glyphicon-plus'></span> Add Book
                </div>
            </div>
            <div id='page-content'>
                <div id='loader-image' class = "loader-image"><img src='/assets/image/ajax-loader.gif  ' /></div>
            </div><!-- page content -->
        </div>

        <!-- content will be here -->

    </div>
<!-- /container -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
<script src="/assets/js/custom_script.js"></script>
</body>
</html>