<?php

require 'config.php';
//var_dump($mysqli);
include 'libraryFunction.php';

function getBookById($mysqli)
{
    $queryLibrary = "SELECT * FROM books WHERE id = " . $_GET['id'];
    $result = $mysqli->query($queryLibrary);      //return object mysiquili
    //var_dump($result); -> object(mysqli_result)#2 (5) { ["current_field"]=> int(0) ["field_count"]=> int(7) ["lengths"]=> NULL ["num_rows"]=> int(1) ["type"]=> int(0) }
    if (!empty($result)) {
        $riga = $result->fetch_assoc();  //estraggo ogni singola riga che leggo dal DB e la inserisco in un array 
        //var_dump($riga);
    }
    return $riga;
}
;

if (isset($_GET['id'])) {
    $book = getBookById($mysqli);  //Metto la riga (un'array) in book
}
;

var_dump($book);

include 'navbar.php'
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiungi libro</title>
    <link rel="stylesheet" href="assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="container mt-5 w-sm-50 d-flex justify-content-center ">
            <div class="card mb-3" style="max-width: 1040px; width: 999px; ">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= $book['cover'] ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book['titolo'] ?></h5>
                            <p class="card-text"><a href="" class="text-decoration-none text-dark authorLink" ><?= $book['autore'] ?></a></p>
                            <p class="card-text"><small class="text-body-secondary"><?= $book['anno_pubblicazione'] ?></small></p>
                            <p class="card-text"><small class="text-body-secondary"><?= $book['genere'] ?></small></p>
                            <p class="card-text"><small class="text-body-secondary"><?= $book['casa_editrice'] ?></small></p>
                            <p class="card-text"><small class="text-body-secondary"><?= $book['trama'] ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>