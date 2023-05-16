<?php
include_once('functions.php');
include_once('database.php');
addMessage();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
</head>
<body>
    <?php
    printNavbar();
    ?>
    <main class="container mt-5">
        <h2>Kontakt</h2>
        <form method="post">
            <?=printFormField('email','E-mail','email')?>
            <?=printFormField('firstName','Imię','text')?>
            <?=printFormField('lastName','Nazwisko','text')?>
            <?=printTextarea('content','Treść')?>
            <input type="submit" class="btn btn-outline-primary" value="Wyślij wiadomość">
        </form>

        <?php
        if(isset($_GET['succeeded']) && $_GET['succeeded']) {
            ?>
            <div class="alert alert-info" role="alert">
                Wiadomość wysłana pomyślnie!
            </div>
            <?php
        }
        ?>
    </main>
    <script src="js/bootstrap/bootstrap.min.js">
        
    </script>
</body>
</html>