<?php
require_once('flintstone.class.php');
function db_add_user($key, $user, $password, $level='user'){
    try {
        // Set options
        $options = array('dir' => '../db');
        // Load the databases
        $users = Flintstone::load('users', $options);
        // New incremental id
        $id = count($users->getKeys());

        if($users->get($key)){
            return 'This email is already registered.';
        } else {
            // Insert User
            $users->set($key, array('id' => $id, 'level' => $level, 'email' => $user, 'password' => password_hash($password, PASSWORD_BCRYPT)));
            return true;
        }
    }
    catch (FlintstoneException $e) {
        return 'An error occured:'.$e->getMessage();
    }
}
?>