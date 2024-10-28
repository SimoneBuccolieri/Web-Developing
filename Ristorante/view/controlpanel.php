<!DOCTYPE html>
<html lang="en">

<body>
<?php include 'navbar.php';?>
<div class="">
    <div class="center bgphoto">
        <div class="container">
        <div class="column">
            <h1>Benvenuto </h1>
            <p>Ciao, <strong><?php echo $_COOKIE["nome"]; ?></strong></p>

            <div class="">
                <h2>Pannello di controllo</h2>
                <div class="">
                    <a href="menu.php" class="btn">Menù</a>
                    <a href="ordini.php" class="btn">Ordini</a>
                    <a href="profilo.php" class="btn">Il Mio Profilo</a>
                    <?php if($_COOKIE["cellulare"] == "0") { ?>
                        <a href="gestoreristorante.php" class="btn">Gestione Ristorante</a>
                    <?php } ?>
                </div>
            </div>

            <div class="logout">
                <form action="logout.php" method="POST">
                    <button type="submit" class="btn">Esci</button>
                </form>
            </div>
            </div>
            </div>
    </div>
</div> 
</body>
