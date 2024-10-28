
<!DOCTYPE html>
<html lang="it">
<body>
    <div class="center bgphoto column">
    <h1 class="textshadow">Registrazione</h1>
        <div class="container">
            <div class="column">
                
                <?php if($unt==true){ ?>
                    <h3>Utente non registrato</h3>
                <?php }?>
                <form action="../Ristorante/register.php" method="POST">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            
                <label for="indirizzo">Indirizzo</label>
                <input type="text" id="indirizzo" name="indirizzo" required>

                <label for="cellulare">Cellulare</label>
                <input type="text" id="cellulare" name="cellulare" required>
            
                <button type="submit" class="btn">Registrati</button>
            </form>
        </div>
    </div>
    </div>
</body>
</html>