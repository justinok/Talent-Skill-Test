<?php 
include("../template/header.php");
require("../config/moviesdata.php");

    /** This page is designed to check every record on the database
     * sometimes we need to expand the info to check in detail 

     * 
     * Args and Returns: $movie (Array ) : Will display the movie
     *                                     that was asked
     * 
    */

if (!isset($_GET['imdbID'])){
    include("../template/not_found.php");
    exit;
}
$movieId = $_GET['imdbID'];

$movie = getMoviesByImdbID($movieId);
if (!$movie){
    include("../template/not_found.php");
    exit; 
}
?>

<div class="container">
    <div class="card">
        
        <div class="card-body">
            <h3 class="card-title">View movie: <b><?php echo $movie['Title'] ?></b></h3>
        </div>

        <table class="table">
        
        <tbody>
            <tr>
                <th>Title:</th>
                <td><?php echo $movie['Title']?></td>
            </tr>
            <tr>
                <th>Year:</th>
                <td><?php echo $movie['Year']?></td>
            </tr>
            <tr>
                <th>imdbId:</th>
                <td><?php echo $movie['imdbID']?></td>
            </tr>
            <tr>
                <th>Type:</th>
                <td><?php echo $movie['Type']?></td>
            </tr>
            <tr>
                <th>Poster:</th>
                <td>
                    <a target="_blank" href="<?php echo $movie['Poster'] ?>"><img style="width: 100px" src="<?php echo $movie['Poster'] ?>" ></a>
                
                    <a target="_blank" href="<?php echo $movie['Poster'] ?>"><?php echo $movie['Poster'] ?></a>
                </td>
            </tr>
        </tbody>
    </table>

    </div>
</div>






<?php include("../template/footer.php"); ?>