<?php
include_once('functions.php');
checkIfAdmin();
include_once('database.php');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <?php
    printNavbar();
    ?>
    <main class="container mt-5">
        <h2>Posty</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tytuł</th>
                    <th>Kategoria</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5">
                        <a href="admin-add-post.php" class="btn btn-outline-primary col-12">Nowy post</a>
                    </td>
                </tr>
                <?php
                $posts = getAllPosts();
                foreach($posts as $a) {
                    ?>
                    <tr>
                        <td><?=$a['id']?></td>
                        <td><?=$a['title']?></td>
                        <td><?=$a['categoryName']?></td>
                        <td><a href="admin-post.php?id=<?=$a['id']?>" class="btn btn-outline-info"><i class="bi bi-link"></i></a></td>
                        <td><a href="admin-delete-post.php?id=<?=$a['id']?>" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </main>
    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>
</html>