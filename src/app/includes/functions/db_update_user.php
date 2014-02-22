<?php
require_once('flintstone.class.php');
function db_update_user($id, $email='', $pass='', $level=''){
    try {
        // Set options
        $options = array('dir' => '../db');

        // Load the databases
        $users = Flintstone::load('users', $options);
        $keys = $users->getKeys();
        foreach ($keys as $key) {
            if($users->get($key)['id'] == $id){
                $user = $users->get($key);
                $k = $key;
            }
        }
        $users->delete($k);
        $email = ($email == '') ? $user['email'] : $email;
        $key = str_replace(array('@', '.', ' '), '', $email);
        $password = ($pass=='') ? $user['password'] : password_hash($pass, PASSWORD_BCRYPT);
        $level = ($level != 'admin') ? 'user' : $level;
        $users->set($key, array('id' => $id, 'email' => $email, 'password' => $password, 'level' => $level));
        return true;
    }
    catch (FlintstoneException $e) {
        return 'An error occured:'.$e->getMessage();
    }
}
?>