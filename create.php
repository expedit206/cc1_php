<!DOCTYPE html>
<html lang="fr">


<?php
    require 'Database.class.php';
if(isset($_POST['submit'])){
    $pdo = new Database;
$pdo = $pdo->getPdo();
    $libelle = htmlspecialchars($_POST['libelle']);
           
    $data = compact("libelle");
    $sql = "INSERT INTO produits VALUES (null, ?, 'NAN')";
  
 
    $stmt = $pdo->prepare($sql);
    
   $stmt->execute([$libelle]);
   
   header('location:index.php');
    
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
            <li><a href="index">Liste des Produits</a></li>
        </ul>
    </nav>
    
    <div class="form-container">
        <h2>Ajouter un Produit</h2>
        <form method="POST" action=''>
            <label for="name">Libelle</label>
            <input type="text" id="libelle" name="libelle" required>

   
            <input type="submit" name='submit' value="Ajouter Produit">
        </form>
    </div>
</body>
</html>