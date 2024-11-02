
<?php

require 'Database.class.php';

if(isset($_POST['submit'])){

    $pdo = new Database;
    $pdo = $pdo->getPdo();
$id=$_POST['id'];
$libelle=$_POST['libelle'];
$sql = "UPDATE produits SET libelle = ? WHERE id = ?";

$result = $pdo->prepare($sql);
$stmt = $result->execute([$libelle,$id]);
header('location:index.php');
}

$pdo = new Database;
$pdo = $pdo->getPdo();
$id = $_GET['id'];

$sql = "SELECT * from produits where id = $id";

$product = $pdo->query($sql);
$product = $product->fetch();

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="../css/add.css">

</head>
<body>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Produit</title>
</head>
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
<body>
<div class="form-container">

<h1>Modifier le Produit</h1>
<form method="POST" action=''>
    
    <label for="name">libelle du produit:</label>
    <input type="text" id="name" name="libelle" value="<?= $product['libelle'] ?>" required>
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">

   
    
    <input type="submit" name="submit" value="Modifier Produit">
</form>
<a href="index">Retour</a>
    </div>

</body>
</html>
</body>
</html>