<?php 
include("../template/header.php");
require("../config/moviesdata.php");

// Check if the movie exists, if not redirect to a warning page
if (!isset($_GET['imdbID'])){
    include("../template/not_found.php");
    exit;
}
$movieId = $_GET['imdbID'];
$movie = getMoviesByImdbID($movieId);
deleteMovie($movieId);
// Check if the movie was recived, if not redirect to a warning page
if (!$movie){
    include("../template/not_found.php");
    exit; 
}
header("Location: moviestable.php");
?>