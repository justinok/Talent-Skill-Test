<?php 
function validating($phone){
    /** This function will clean the phone number for the register
     *  (only "+" allowed) and then check if has less than 10 characters
     * 
     * Args: $phone (String) : Phone comming from the Signing form
     * 
     * Return: True if has less than 10 characters
     *         False if has more than 10 characters
    */
    $valid_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    if (strlen($valid_number) > 10){
        return false;
    }
    if (strlen($valid_number) <= 10){
        return true;
    } 
}


?>