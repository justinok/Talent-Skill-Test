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

// Check if the movie was recived, if not redirect to a warning page
if (!$movie){
    include("../template/not_found.php");
    exit; 
}

// time to send it 

$errors = [
    'name' => "",
];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    updateMovie($_POST, $movieId);
    header("Location: moviestable.php");
    exit;


}
?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Movie Data 
        </div>
        <div class="card-body">

        <form method="POST" enctype="multipart/form-data" action="">
            <div class = "form-group">
                <label>Title</label>
                <input class="form-control <?php echo $errors['name'] ? 'is-invalid' : '' ?>" name="Title" value="<?php echo $movie['Title'] ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['name'] ?>
                </div>
            </div>

            <div class = "form-group">
                <label>Year</label>
                <input class="form-control" name="Year" value="<?php echo $movie['Year'] ?>">
            </div>

            <div class = "form-group">
                <label>imdbID</label>
                <input class="form-control" name="imdbID" value="<?php echo $movie['imdbID'] ?>">
            </div>

            <div class = "form-group">
                <label>Type</label>
                <input class="form-control" name="Type" value="<?php echo $movie['Type'] ?>">
            </div>

            <div class = "form-group">
                <label>Poster</label>
                <input class="form-control" name="Poster" value="<?php echo $movie['Poster'] ?>">
            </div>

            <button class="btn btn-success">Submit</button>
                    
        </form>
    
        </div>
        
    </div>

    
    
    
</div>