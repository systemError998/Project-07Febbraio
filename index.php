<?php

require 'config.php';
//var_dump($mysqli);
include 'libraryFunction.php';
include 'navbar.php';

$allBooks = getAllBooks($mysqli);
//var_dump($allBooks[0]['anno_pubblicazione']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria</title>
    <link rel="stylesheet" href="assets/styles.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <h1>LIBRERIA</h1>
    <div class="d-flex justify-content-center">
        <div class="container row d-flex justify-content-center">
            <?php
            if (!empty($allBooks)) {
                foreach ($allBooks as $book) {
                    ?>
                    <div class="card mb-3 position-relative col-6 g-3 mx-2" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img class='img-fluid rounded-start ms-0' src="<?= $book['cover'] ?>"
                                    alt="<?= 'Copertina di' . ' ' . $book['titolo'] ?>" />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $book['titolo'] ?>
                                    </h5>
                                    <p class="card-text">
                                        <!-- INSERIRE ID DELL'AUTORE -->
                                        <a href="detailAuthor.php?id=<?= $book['id'] ?>" class="text-decoration-none text-dark authorLink">
                                            <?= $book['autore'] ?>
                                        </a>
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary">
                                            <?= $book['genere'] ?>
                                        </small></p>
                                    <p class="card-text"><small class="text-body-secondary">
                                            <?= $book['anno_pubblicazione'] ?>
                                        </small></p>
                                    <p class="card-text"><small class="text-body-secondary">
                                            <?= $book['casa_editrice'] ?>
                                        </small></p>
                                </div>
                                <div class="position-absolute bottom-0 end-0 p-3">
                                    <a href="detailBook.php?id=<?= $book['id']?>" role="button" class="btn btn-primary flex-end"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                        <i class="bi bi-journal-text fs-5"></i>
                                    </a>
                                    <a href="updateBook.php?action=update&id=<?= $book['id'] ?>" role="button" class="btn btn-primary flex-end"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                        <i class="bi bi-pencil fs-5"></i>
                                    </a>
                                    <a href="libraryDB.php?action=delete&id=<?=$book['id']?>" role="button" class="btn btn-primary flex-end"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                        <i class="bi bi-trash fs-5"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                }
            }
            ?>
        </div>
    </div>
    
</body>

</html>