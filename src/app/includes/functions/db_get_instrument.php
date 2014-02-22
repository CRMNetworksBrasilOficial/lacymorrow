<?php
require_once('flintstone.class.php');
function db_get_instrument($key){
    try {
        // Set options
        $options = array('dir' => 'app/db');
        // Load the databases
        $instrument = Flintstone::load('instrument', $options);
        return $instrument->get($key);
    }
    catch (FlintstoneException $e) {
        return 'An error occured: ' . $e->getMessage();
    }
}
?>