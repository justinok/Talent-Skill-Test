<?php
/** This file was created to execute all the queries related to
 * the data base
 *  ex : sorting, editing, searching ...
 */

function getMovies(){
    // Function designed to read the Json and decode as an asociative array
    return json_decode(file_get_contents(__DIR__.'/movies.json'), true);
    
}

function searchByYears($y1,$y2){
    /** search ByYears look in our database for all the movies matches that
     * are between the years that the userd asked for, it will create a new
     * array and return it filled with the good matches
     * 
     * Args: $y1(Int) : To check above this year
     *       $y2(Int) : To check below this year
     * 
     * Return: new_movies (Array) : Filled with the good matches
    */
    $movies = getMovies();
    $new_movies = [];
    foreach ($movies as $movie){
        if ($movie['Year']>$y1 && $movie['Year']<$y2){
            array_push($new_movies, $movie);
            
        }
    }
    return $new_movies;
}

function searchByName($word){
    /** search by name will look for a title occurence for a keyword
     * that the user send in the front-end
     * 
     * Args: $word (String) : Keyword to search in the database
     * 
     * Return: movie (Array) : Filled with the best match
    */
    $movies = getMovies();
    foreach ($movies as $movie){
        if (strpos($movie['Title'], $word)){
            return $movie;
            exit;
        }
    }
    return null;
}
function searchByName2($word){
    /** search by name will look for a title occurence for a keyword
     * that the user send in the front-end
     * /// this was another attempt to do the job
     * 
     * Args: $word (String) : Keyword to search in the database
     * 
     * Return: movie (Array) : Filled with the best match
    */
    $movies = getMovies();
    foreach ($movies as $i => $movie){
        if (!array_search($word, $movie['Title'])){
            unset($movies[$i]);
            
        }
    }
    return $movies;
}


function sortMovies($array, $on, $order=SORT_ASC)
    /** This function will sort the database based on a specific Column ($on)
     * you can sort it ascending or descending. but you can only sort one row at time
     * 
     * Args: $array (Array) : database to be sorted
     *       $on (Column name) : The Column that we want to Sort
     *       $order (Variable) : Can be SORT_ASC or SORT_DESC
     * 
     * Return: new_array (Array) : Filled with the sorted database
    */
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

function getMoviesByImdbID($imdbID){
    $movies = getMovies();
    foreach ($movies as $movie){
        if ($movie['imdbID'] == $imdbID){
            return $movie;
        }
    }
    return null;
}

function createMovie($data){
    /** This function was an intention to make database more interactive
     * but wasn't asked in the test. Voluntary
    */
}

function updateMovie($data, $imdbID){
    /** This function was an intention to make database more interactive
     * but wasn't asked in the test. Voluntary
     * 
     * Args: $data (Array) : Array with the info to update that movie
     *       $imdbID (String) : Id to identify the movie
     * 
     * Return: movies actualiced
    */
    $movies = getMovies();
    foreach ($movies as $i => $movie){
        if ($movie['imdbID'] == $imdbID){
            $movies[$i] = array_merge($movie, $data);
        }
    }

    file_put_contents(__DIR__.'/movies.json', json_encode($movies), true);
}

function deleteMovie($imdbID){
    $movies = getMovies();
    foreach ($movies as $i => $movie){
        if ($movie['imdbID'] == $imdbID){
            array_splice($movies,$i,1);
        }
    }
    file_put_contents(__DIR__.'/movies.json', json_encode($movies), true);
    
}





?>