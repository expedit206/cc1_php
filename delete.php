<?php

require 'Database.class.php';
$pdo = new Database;
$pdo = $pdo->getPdo();
$id=$_GET['id'];

       $sql = "DELETE from produits where id = $id";
        
       $pdo->query($sql);

       header('location:index.php');