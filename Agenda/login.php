<html>
    <head>
        <title>Login/Register Agenda</title>
        <link href="master.css" rel="stylesheet">
    </head>
    <body>
        <div>
            <div>
                <p>Login/Register Page</p>
                <?php
                    if($_GET["info"]==="registrato"){
                    ?>
                    <p>Registrazione effettuata</p>
                    <?php
                    }
                    if($_GET["info"]==="loginerrato"){
                    ?>
                    <p>Login Errato</p>
                    <?php
                    }    
                ?>
            </div>
            <div>
                <form action="checklogin.php" method="POST">
                    Username: <input type="text" name="username" id="username">
                    Password: <input type="password" name="password" id="password">
                    <button type="submit">Invio</button>
                </form>
            </div>
        </div>
    </body>
</html>