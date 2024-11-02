<?php
// app/index.php*
require 'controllers/ProductController.php';
use controllers\ProductController;

$controllerName= new ProductController;
$requestUri = trim($_SERVER['REQUEST_URI'], '/');

// Définir la base de l'URL
$baseUri = 'php_poo/crud_mvc';

// Vérifier si l'URI commence par la base
if (strpos($requestUri, $baseUri) === 0) {
    // Extraire la partie qui suit la base
    $partAfterBase = substr($requestUri, strlen($baseUri) + 1);
    $first = explode('?', $partAfterBase);

    switch ($first[0]) {
        case '':
            // Afficher la page d'accueil ou la liste
            $controllerName->index();
            break;
            
        case 'index':
            // Afficher la page d'accueil ou la liste
            $controllerName->index();
            break;
            
            case 'formCreate':
                // Afficher le formulaire de création
                $controllerName->createForm();
            break;

            case 'insert':
                // Afficher le formulaire de création
                $controllerName->insert();
                break;
                
                case 'edit':
                    $controllerName->edit($first[1]);
            break;

                case 'update':

                    $first[1] = $_POST['id'];

                    $controllerName->update($first[1]);
            break;

                case 'delete':


                    $controllerName->delete($first[1]);
            break;

        default:
            // Afficher la partie inconnue
            echo "Vous avez entré : " . htmlspecialchars($partAfterBase);
            break;
    }
} else {
    echo "L'URL ne commence pas par la base spécifiée.";
}