<?php
require_once('flintstone.class.php');
function db_add_user($user, $password, $level='user'){
    try {
        // Set options
        $options = array('dir' => '../db');
        // Load the databases
        $users = Flintstone::load('users', $options);
        // New incremental id
        $id = count($users->getKeys());
        $key = str_replace(array('@', '.', ' '), '', $user);
        if($users->get($key)){
            return 'This email is already registered.';
        } else {
            // Insert User
            $users->set($key, array('id' => $id, 'level' => $level, 'email' => $user, 'password' => password_hash($password, PASSWORD_BCRYPT)));
            return $id;
        }
    }
    catch (FlintstoneException $e) {
        return 'An error occured:'.$e->getMessage();
    }
}
?>