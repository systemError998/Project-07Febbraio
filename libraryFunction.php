<?php 

function addBookToLibrary($mysqli, $titolo, $autore, $genere, $anno, $cover, $casa_editrice, $trama){
    $queryLibrary = 
    "INSERT INTO books (titolo, autore, genere, anno_pubblicazione, cover, casa_editrice, trama)
        VALUES ('$titolo', '$autore', '$genere', '$anno', '$cover', '$casa_editrice', '$trama') ";
    if (!$mysqli->query($queryLibrary)) {
        echo ($mysqli->connect_error);
    } else {
        echo 'Record aggiunto con successo!!!';
    }
};


function updateBook($mysqli, $id, $titolo, $autore, $genere, $anno, $cover, $casa_editrice, $trama) {
    $queryLibrary = "UPDATE books SET 
                            titolo = '" . $titolo . "',
                            autore = '" . $autore . "',
                            genere = '" . $genere . "',
                            anno_pubblicazione = '" . $anno . "',
                            cover = '" . $cover . "',
                            casa_editrice = '" . $casa_editrice . "'
                            trama = '" . $trama . "'
                     WHERE id = " . $id;

    if(!$mysqli->query($queryLibrary)) {
        echo ($mysqli->connect_error);
    } else {
        echo "Libro modificato con successo.";
    }
}

function removeBook($mysqli, $id) {
    if(!$mysqli->query('DELETE FROM books WHERE id = ' . $id)) { 
        echo($mysqli->connect_error); }
    else { 
        echo 'Libro rimosso dalla libreria.';
    }
}

function getAllBooks($mysqli)
{
    $queryLibrary = 'SELECT * FROM books';
    $myBooks = $mysqli->query($queryLibrary);
    //var_dump($myBooks);
    $myArrayBooks = [];
    //var_dump($myUsers);
    if (!empty($myBooks)) {
        while ($row = $myBooks->fetch_assoc()) { //fetch_assoc restituisce un array associativo dal db, quindi i nomi dei campi sono quelli del db non le var
            array_push($myArrayBooks, $row);
        }
    }
    //print_r($myArrayBooks);
    return $myArrayBooks;
}
$allBooks = getAllBooks($mysqli);
//var_dump($allBooks[0]['anno_pubblicazione']);
