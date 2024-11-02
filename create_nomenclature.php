<!DOCTYPE html>
<html lang="fr">


<?php
    require 'Database.class.php';
    $pdo = new Database;
$pdo = $pdo->getPdo();
  
$sql = "SELECT * FROM composants";
$result = $pdo->query($sql);


$composants = $result->fetchAll();
$sql = "SELECT * FROM produits";
$result = $pdo->query($sql);


$products = $result->fetchAll();
//    die;
//    header('location:index_component.php');
    
if(isset($_POST['submit'])){
    $composant = htmlspecialchars($_POST['composant']);
    $product = htmlspecialchars($_POST['product']);
    $quantite = htmlspecialchars($_POST['quantite']);
           
    $data = compact("libelle");
    $sql = "INSERT INTO nomenclatures VALUES (?, ?, ?)";
  
 
    $stmt = $pdo->prepare($sql);
    
   $stmt->execute([$product, $composant, $quantite]);
   
   header('location:nomenclature.php');
    
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
    <link rel="stylesheet" href="./style.css">
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #007bff;
            padding: 10px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
            background:#08095C9C;
        }

        nav ul li a:hover {
            background-color: #0056b3;
        }

        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style> -->

</head>
<body>
    <nav>
        <ul>
            <li><a href="index">Ajout du composant</a></li>
        </ul>
    </nav>
    
    <div class="form-container">
        <h2>Ajouter un Produit</h2>
        <form method="POST" action=''>
            
        produits
            <select name="product" id="">
                <?php foreach ($products as $product) {?>
                    <option value="<?= $product['id'] ?>"><?= $product['libelle'] ?></option>
                    <?php } ?>
            </select>
        composants
            <select name="composant" id="">
                <?php foreach ($composants as $composant) {?>
                    <option value="<?= $composant['id'] ?>"><?= $composant['libelle'] ?></option>
                    <?php } ?>
            </select>
           quantité <input type="text" id="quantité" name="quantite" required>

            <input type="submit" name='submit' value="Ajouter composant">
        </form>
    </div>
</body>
</html>