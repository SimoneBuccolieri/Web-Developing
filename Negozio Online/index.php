<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Negozio Online</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
        }

        form, .order {
            background-color: white;
            padding: 20px;
            margin: 20px auto;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            background-color: #008CBA;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px auto;
            width: 300px;
        }

        a:hover {
            background-color: #007bb5;
        }
    </style>
</head>
<body>
    <h1>Negozio Online</h1>

    <!-- Form per aggiungere un prodotto -->
    <form action="process.php" method="POST">
        <h2>Aggiungi Prodotto</h2>
        <label for="name">Nome prodotto:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="price">Prezzo:</label><br>
        <input type="number" step="0.01" id="price" name="price" required><br><br>

        <label for="quantity">Quantità:</label><br>
        <input type="number" id="quantity" name="quantity" required><br><br>

        <button type="submit">Aggiungi Prodotto</button>
    </form>

    <!-- Link per vedere l'ordine -->
    <h2>Visualizza Ordine</h2>
    <a href="process.php?action=view">Visualizza l'ordine corrente</a>

</body>
</html>
