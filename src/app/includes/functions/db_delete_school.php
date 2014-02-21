<?php
require_once('flintstone.class.php');
function db_delete_school($id){
    try {
        // Set options
        $options = array('dir' => 'app/db');
        // Load the databases
        $schools = Flintstone::load('schools', $options);
        $schools->delete($id);
        return true;
    }
    catch (FlintstoneException $e) {
        return 'An error occured: ' . $e->getMessage();
    }
}
?>