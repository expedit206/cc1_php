<?php
// app/index.php*
require 'controllers/ProductController.php';
require 'controllers/NomenclatureController.php';
require 'controllers/ComposantController.php';
use controllers\ProductController;
use controllers\NomenclatureController;
use controllers\ComposantController;
$requestUri = trim($_SERVER['REQUEST_URI'], '/');

// Définir la base de l'URL

$productcontroller =  new ProductController;
$NomenclatureController =  new NomenclatureController;
$ComposantController =  new ComposantController;
// Vérifier si l'URI commence par la base
$controller =   $productcontroller;
$action =  $_GET['action']?? 'index';
if(isset($_GET['controller'])){
switch ($_GET['controller']) {
    case '':
        // Afficher la page d'accueil ou la liste
    $controller =  $productcontroller;

        break;
        
    case 'ProductController':
        // Afficher la page d'accueil ou la liste
        break;
        
        case 'formCreate':
            // Afficher le formulaire de création
        break;

     
    default:
        // Afficher la partie inconnue
        echo "Vous avez entré : " . htmlspecialchars($partAfterBase);
        break;
}
}
    
$controller->$action();
