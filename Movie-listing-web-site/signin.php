<?php 
include("template/header.php"); 
require("administrator/config/users.php");
require("administrator/config/uservalidation.php");

    /** This page is designed to create a new admin for the site
     *  Validation on the form is needed are applied using if statements and regular expresions
     * 
    */
$user = [
    'username' => "",
    'email' => "",
    'phone' => "",
    'password' => ""
];

$errors = [
    'username' => "",
    'email' => "",
    'phone' => "",
    'password' => ""
];

$is_valid = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // if exitst the POST request we are going to fill the user
    // and then check for all the validations 

    $user = array_merge($user, $_POST);



    if (!$user['username'] && !ctype_alpha($user['username'])){
        $is_valid = false;
        $errors['username'] = 'Username is mandatory';
    }

    

    if ($is_valid){
        $user = createUser($_POST);
        echo $user;
        //header("Location: administrator/index.php");
    }





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
                <label>Username</label>
                <input class="form-control <?php echo $errors['username'] ? 'is-invalid' : '' ?>" name="username" value="<?php echo $movie['username'] ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['username'] ?>
                </div>
            </div>

            <div class = "form-group">
                <label>Email</label>
                <input class="form-control <?php echo $errors['email'] ? 'is-invalid' : '' ?>" name="email" value="<?php echo $movie['email'] ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['email'] ?>
                </div>
            </div>
            
            <div class = "form-group">
                <label>Phone</label>
                <input class="form-control <?php echo $errors['phone'] ? 'is-invalid' : '' ?>" name="phone" value="<?php echo $movie['phone'] ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['phone'] ?>
                </div>
            </div>

            <div class = "form-group">
                <label>Password</label>
                <input class="form-control <?php echo $errors['password'] ? 'is-invalid' : '' ?>" name="password" value="<?php echo $movie['password'] ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['password'] ?>
                </div>
            </div>

            <button class="btn btn-success">Submit</button>
                    
        </form>
    
        </div>
        
    </div>

    
    
    
</div>


<?php include("template/footer.php"); ?>