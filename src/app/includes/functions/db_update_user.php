<?php
require_once('flintstone.class.php');
function db_update_user($id, $user){
    try {
        // Set options
        $options = array('dir' => '../db');

        // Load the databases
        $users = Flintstone::load('users', $options);

        // Insert User
        $users->set($id, array('email' => $user));
        return true;
    }
    catch (FlintstoneException $e) {
        return 'An error occured:'.$e->getMessage();
    }
}
?>