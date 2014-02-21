<?php
require_once('flintstone.class.php');
function db_delete_user($id){
    try {
        // Set options
        $options = array('dir' => 'app/db');
        // Load the databases
        $users = Flintstone::load('users', $options);
        $keys = $users->getKeys();
        foreach ($keys as $key) {
            if($users->get($key)['id'] == $id){
                return $users->delete($key);
            }
        }
        return true;
    }
    catch (FlintstoneException $e) {
        return 'An error occured: ' . $e->getMessage();
    }
}
?>