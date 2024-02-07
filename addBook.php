<?php 
    include 'navbar.php'
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiungi libro</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 w-sm-50">
        <form  class="needs-validation" action="libraryDB.php" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">TITOLO</span>
                <input type="text" name="titolo" class="form-control" placeholder="Inserisci il titolo" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">AUTORE</span>
                <input type="text" name="autore" class="form-control" placeholder="Inserisci l'autore" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">GENERE</span>
                <input type="text" name="genere" class="form-control" placeholder="Inserisci il genere" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">CASA</span>
                <input type="text" name="casa_editrice" class="form-control" placeholder="Inserisci la casa editrice" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">ANNO</span>
                <input type="number" name="anno" class="form-control" placeholder="Inserisci l'anno" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <input type="file" name="cover" class="form-control" placeholder="Inserisci la cover" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">TRAMA</span>
                <textarea type="text" name="trama" class="form-control" placeholder="Inserisci la trama" aria-label="Username" aria-describedby="basic-addon1"></textarea>    
            </div>
            <button type="submit" class="btn btn-primary"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                Aggiungi libro
            </button>
        </form>
    </div>
</body>
</html>

