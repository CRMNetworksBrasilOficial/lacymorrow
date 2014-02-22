<?php
require_once('flintstone.class.php');
function db_update_instrument($id, $cid){
    try {
        // Set options
        $options = array('dir' => '../db');

        // Load the databases
        $instruments = Flintstone::load('instruments', $options);
        $ins = $instruments->get($id);
        if(!is_numeric($cid) || $cid < 0){
            $instruments->delete($id);
            $instruments->set($id, array('id' => $id, 'cid' => '', 'email' => '', 'lid' => $ins['lid'], 'type' => $ins['type']));
        } else {
            $instruments->delete($id);
            $instruments->set($id, array('id' => $id, 'cid' => $cid, 'lid' => $ins['lid'], 'type' => $ins['type']));
        }
        return true;
    }
    catch (FlintstoneException $e) {
        return 'An error occured:'.$e->getMessage();
    }
}
?>