<!doctype html>
<html lang="en">
  <head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <?php $url="http://".$_SERVER['HTTP_HOST']."/Movie-listing-web-site"  ?>

    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Website Administrator <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrator/login.php">Home</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrator/sections/moviestable.php"">Movies</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrator/sections/endsesion.php"">End sesion</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>">Go to website</a>
        </div>
    </nav>

    <div class="container">
        <br/><br/>
        <div class="row">