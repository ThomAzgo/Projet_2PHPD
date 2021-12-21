<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=jeanstore_users;charset=utf8','root','');
    }
    catch(Exception $e)
    {
        die('Error'.$e->getMessage());
    }
?>