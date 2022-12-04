<?php

session_start();

require_once __DIR__ . '/funcs.php';

if (isset($_POST['write'])) {
    writeFile();
    header('Location: index.php');
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Write File</title>
</head>
<body>
    <div class="container">
        <div class="row my-3">
            <div class="col-md-6 offset-md-3">
                <?php if (!empty($_SESSION['errors'])):?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php
                        echo $_SESSION['errors'];
                        unset($_SESSION['errors']);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif;?>
                
                <?php if (!empty($_SESSION['success'])):?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif;?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3>Запись текстового сообщения в файл</h3>
            </div>
        </div>

        <form action="index.php" method="POST" class="row g-3">
            <div class="col-md-6 offset-md-3">
                <div class="form-floating">
                    <textarea name="text" style="height: 300px;" class="form-control" placeholder="Введите ваше сообщение"></textarea>
                    <label>Введите ваше сообщение</label>
                </div>
            </div>

            <div class="col-md-6 offset-md-3">
                <button type="submit" name="write" class="btn btn-primary">Отправить сообщение</button>
                <a class="btn btn-primary" href="text.txt" download>Скачать файл</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>