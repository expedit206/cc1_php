<?php

require 'Database.class.php';
$pdo = new Database;
$pdo = $pdo->getPdo();
$id=$_GET['id'];

       $sql = "DELETE from composanrs where id = $id";
        
       $pdo->query($sql);

       header('location:index_component.php');