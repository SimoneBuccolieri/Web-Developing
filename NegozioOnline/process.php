<?php
require_once 'class.php';
session_start();
if (!isset($_SESSION['order'])) {
    $_SESSION['order'] = new Order();
}

$orderDetails = "";
if (isset($_GET['action']) && $_GET['action'] === 'view') {
    $orderDetails = $_SESSION["order"]->displayOrder();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product = new Product($_POST['name'], $_POST['price'], $_POST['quantity']);
    $_SESSION['order']->addProduct($product);
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettagli Ordine</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            color: #333;
        }
        .order-details {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f1f1f1;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #4CAF50;
            padding: 10px;
            border: 1px solid #4CAF50;
            border-radius: 4px;
        }
        a:hover {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

<header>
    <h1>Dettagli Ordine</h1>
</header>

<div class="container">
    <div class="order-details">
        <h2>Dettagli dell'Ordine</h2>
        <?php if ($orderDetails): ?>
            <?= $orderDetails ?>
        <?php else: 
                Header("Location:index.php");?>
        <?php endif; ?>
    </div>

    <a href="index.php">Torna alla pagina principale</a>
</div>

</body>
</html>
