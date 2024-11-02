<!DOCTYPE html>
<html lang="fr">

<?php
require 'Database.class.php';
$pdo = new Database;
$pdo = $pdo->getPdo();
$sql = "SELECT * FROM nomenclatures";
$result = $pdo->query($sql);


$nomenclatures = $result->fetchAll();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil - Gestion des Produits</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .product {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            margin: 10px 0;
            background-color: #fafafa;
            transition: 0.3s;
        }
        .product:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .price {
            font-weight: bold;
            color: #28a745;
        }
        a {
            display: inline-block;
            margin: 5px 0;
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
        .button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #08095C9C;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-weight:bold;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style> -->
</head>
<body id='body-index'>
    <div class="header">
        <h1>Gestion des nomenclature</h1>
    </div>

    <div class="container">
        <h2>Liste des nomenclatures</h2>

        <?php if (!empty($nomenclatures)): ?>
            <?php foreach ($nomenclatures as $nomenclature): ?>
                <div class="nomenclature">
                <?php 
                $id=$nomenclature['id_produit'];
$sql = "SELECT * from produits where id = $id";

$product = $pdo->query($sql);
$product = $product->fetch();
?>

                    <h3><?php echo $product['libelle']; ?></h3>
                    <a href="x"class="button">Voir nomenclature</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun produit trouvé.</p>
        <?php endif; ?>
    </div>

    <a class="button"  href="./create_nomenclature.php">listes des nomenclature</a><br>
    <a href="index.php">Produits</a>
    <a href="index_component.php">composants</a>
    <a href="nomenclature.php">nomenclature</a>

    <div class="footer">
        <p>&copy; <?php echo date("Y"); ?> Gestion des Produits</p>
    </div>
</body>
</html>