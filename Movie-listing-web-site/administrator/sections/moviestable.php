<?php include("../template/header.php"); ?>
<?php 

require("../config/moviesdata.php"); 
// Info catched from the website forms
$action=(isset($_POST['action']))?$_POST['action']:"";
$txtSearch=(isset($_POST['search']))?$_POST['search']:"";
$firstyear = (isset($_POST['year1']))?$_POST['year1']:"";
$secondyear = (isset($_POST['year2']))?$_POST['year2']:"";

    /** After reading the POST request, the system will check wich 
     * button has been clicked in order to excecute the correct query
     * 
     * ex: if clicked "Dowload DataBase" it will execute getMovies();
    */
switch($action){

    case "OriginalDatabase":
        $movies = getMovies();
        break;
    case "YearSortDes":
        $movies = sortMovies(getMovies(), 'Year', SORT_DESC);
        break;
    case "YearSortAsc":
        $movies = sortMovies(getMovies(), 'Year', SORT_ASC);
        break;
    case "TitleSortAsc":
        $movies = sortMovies(getMovies(), 'Title', SORT_ASC);
        break;
    case "Search":
        $movies = searchByName($txtSearch);
        break;
    case "Search":
        $movies = sortMovies(getMovies(), 'Title', SORT_DESC);
        break;
}



?>

<div class="card-md-4">
    
    <div class="card-body">
        <nav class="navbar navbar-light bg-light">
        <form method="POST" class="form-inline">
             <input class="form-control mr-sm-2" name="search" type="search" placeholder="keyword in movie title" aria-label="Search">
             <button class="btn btn-outline-success my-2 my-sm-0" name="action" value="Search" type="submit">Search</button>
        </form>
        </nav>
    </div>

</div>
<div class="card-md-4">
    <div class="card-body">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Filter by years</label>
            <input type="text" name="year1" id="" class="form-control" placeholder="Start year" >
            <input type="text" name="year2" id="" class="form-control" placeholder="End year" >
        </div>
        <button type="submit" name="action" value="YearsSearch"  class="btn btn-success">Search by years</button>
    </form>
    </div>

</div>
<div class="card-md-4">
    <div class="card-body">
    
        <form method="POST" enctype="multipart/form-data">
                <div class="btn-group" role="group" aria-label="">
                <button type="submit" name="action" value="OriginalDatabase"  class="btn btn-sm btn-success">Download the data base</button>
                    <button type="submit" name="action" value="YearSortDes" class="btn btn-sm btn-warning">Sort by Year Desc</button>
                    <button type="submit" name="action" value="YearSortAsc" class="btn btn-sm btn-warning">Sort by Year Asc</button>
                    <button type="submit" name="action" value="TitleSortAsc" class="btn btn-sm btn-info">Sort by Title</button>
                </div>
        </form>
    </div>

</div>

<div class="container">
    <table id ="myTable2" class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>imdbID</th>
                <th>Type</th>
                <th>Poster Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $movie): ?>
            <tr>
                <td><?php echo $movie['Title'] ?></td>
                <td><?php echo $movie['Year'] ?></td>
                <td><?php echo $movie['imdbID'] ?></td>
                <td><?php echo $movie['Type'] ?></td>
                <td>
                    <a target="_blank" href="<?php echo $movie['Poster'] ?>"><img style="width: 100px" src="<?php echo $movie['Poster'] ?>" ></a>
                </td>
                <td>
                    <a href="view.php?imdbID=<?php echo $movie['imdbID'] ?>" class="btn btn-sm btn-outline-info">View</a>
                    <a href="update.php?imdbID=<?php echo $movie['imdbID'] ?>" class="btn btn-sm btn-outline-secondary">Update</a>
                    <form method="post" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $movie['imdbID'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>                
                </td>
            </tr>
            <?php endforeach; ; ?>
        </tbody>
    </table>
</div>




<?php include("../template/footer.php"); ?>