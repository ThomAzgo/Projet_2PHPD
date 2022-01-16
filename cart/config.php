<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=jeanstore_projet','root','');
    }
    catch(Exception $e)
    {
        die('Error'.$e->getMessage());
    }
?>