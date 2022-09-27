<?php
$users = [];
function createUser($data){
    /** This function was an attempt to create the database without using SQL
     * 
     * Args: $data (Array) : Array filled with the new admin info 
     * 
     * Return: Nothing.
    */
    $users = array_push($data);
    file_put_contents(__DIR__.'/users.json', json_encode($data));

}
function getUsers(){
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}

function userExist($email, $password){

}

function getUserByEmail($email){
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['email'] == $email) {
            return $user;
        }
    }
    return null;
}



?>