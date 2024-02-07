<?php 
    
    require 'config.php';
    //var_dump($mysqli);
    include 'libraryFunction.php';
    
    function getBookById($mysqli) {     
        $queryLibrary = "SELECT * FROM books WHERE id = " . $_GET['id']; 
        $result = $mysqli->query($queryLibrary);      //return object mysiquili
        //var_dump($result); -> object(mysqli_result)#2 (5) { ["current_field"]=> int(0) ["field_count"]=> int(7) ["lengths"]=> NULL ["num_rows"]=> int(1) ["type"]=> int(0) }
        if(!empty($result)) {
            $riga = $result->fetch_assoc();  //estraggo ogni singola riga che leggo dal DB e la inserisco in un array 
            //var_dump($riga);
        }
        return $riga;
    };

    if(isset($_GET['id'])) {
        $book = getBookById($mysqli);  //Metto la riga (un'array) in book
    };

    //var_dump($book);

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
        <form  class="needs-validation" action="libraryDB.php?action=update&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">TITOLO</span>
                <input type="text" name="titolo" value="<?= $book['titolo']?>" class="form-control" placeholder="Inserisci il titolo" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">AUTORE</span>
                <input type="text" name="autore" value="<?= $book['autore']?>" class="form-control" placeholder="Inserisci l'autore" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">GENERE</span>
                <input type="text" name="genere" value="<?= $book['genere']?>" class="form-control" placeholder="Inserisci il genere" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">CASA</span>
                <input type="text" name="casa_editrice" value="<?= $book['casa_editrice']?>" class="form-control" placeholder="Inserisci la casa editrice" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">ANNO</span>
                <input type="number" name="anno" value="<?= $book['anno_pubblicazione']?>" class="form-control" placeholder="Inserisci l'anno" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <input type="file" name="cover" value="<?= $book['cover']?>" class="form-control" placeholder="Inserisci la cover" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">TRAMA</span>
                <textarea type="text" name="trama" class="form-control" placeholder="Inserisci la trama" aria-label="Username" aria-describedby="basic-addon1">
                    <?= $book['trama'] ?>
                </textarea>    
            </div>
            <button type="submit" class="btn btn-primary"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                Salva modifiche
            </button>
        </form>
    </div>
</body>
</html>

