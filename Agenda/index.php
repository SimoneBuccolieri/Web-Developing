<!DOCTYPE html>

<?php
if(!isset($_COOKIE["sessionid"]))
    header('Location: login.php');
?>


<html>
    <head>
        <title>Agenda</title>
        <link href="master.css" rel="stylesheet">
    </head>
    <body class="body">
        <form class="form" action="addDB.php" method="POST">
            <p>Oggetto: <input type="text" name="oggetto" id="oggetto" ></p>
            <p>Data: <input type="datetime-local" name="data" id="data"></p>
            <input type="submit">
        </form>
        
        <div>
            <div class=centered>
                <p><?php echo$_COOKIE['sessionuser'];?></p>
                <form action="logout.php" method="POST">
                    <button type="submit">Logout

                    </button>
                </form>
            </div>
            <div class="border">
            <?php
            include 'Events.php';
            ?>
            </div>
            
            <div class="border">
            <?php
            include 'PassedEvents.php';
            ?>
            </div>
        </div>
    </body>
</html>