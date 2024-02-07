<?php

require 'config.php';
//var_dump($mysqli);
require 'libraryFunction.php';

session_start();

//creo array associativo book
$book = [
    'titolo' => $_POST['titolo'],
    'autore' => $_POST['autore'],
    'genere' => $_POST['genere'],
    'anno' => $_POST['anno'],
    'casa_editrice' => $_POST['casa_editrice'],
    'trama' => $_POST['trama']
];
//var_dump($book);

//Controllo su immagine.
$target_dir = "cover/";
$filename = $_FILES['cover']["name"];
$cover = $target_dir . 'default.jpg';

if(!empty($_FILES['cover'])) {
    if(is_uploaded_file($_FILES['cover']["tmp_name"]) && $_FILES['cover']["error"] === UPLOAD_ERR_OK) {
        if(move_uploaded_file($_FILES['cover']["tmp_name"], $target_dir.$filename)) {
            $cover = $target_dir.$filename;
            //var_dump($cover);
            echo 'Caricamento avvenuto con successo';
        } else {
            echo 'Errore!!!';
        }
    }
};

date_default_timezone_set('UTC');
$annoCorrente = date("Y");
//var_dump($annoCorrente);



//update,delete e addbook
if(isset($_GET['action']) && $_GET['action'] === 'delete') {     //Se nell'action c'è qualcosa ed è delete
    removeBook($mysqli, $_GET['id']);                            //Allora avvio la funzione removeBook dichiarata su 
    exit(header('Location: http://localhost/IFOA-Back-End/Week%201%20-%20PHP%20,%20Laragon%20,%20XAMPP/Project-07Febbraio/index.php'));
    
} else if (isset($_GET['action']) && $_GET['action'] === 'update') {
    //se l'action è update devo eseguire i controlli
    $titolo = strlen(htmlspecialchars($_POST['titolo'])) > 2 ? htmlspecialchars($_POST['titolo']) : exit();
    $autore = strlen(htmlspecialchars($_POST['autore'])) > 2 ? htmlspecialchars($_POST['autore']) : exit();
    $genere = strlen(htmlspecialchars($_POST['genere'])) > 2 ? htmlspecialchars($_POST['genere']) : exit();
    $casa_editrice = strlen(htmlspecialchars($_POST['casa_editrice'])) > 2 ? htmlspecialchars($_POST['casa_editrice']) : exit();
    $trama = strlen(htmlspecialchars($_POST['trama'])) > 100 ? htmlspecialchars($_POST['trama']) : exit();
    $anno = $_POST['anno'];
        if($anno<=$annoCorrente) {
            echo 'anno ok';
        } else {
            echo 'anno non valido';
        }
    //Too many arguments to function addBookToLibrary(). 8 provided, but 7 accepted.
    $args = [$titolo, $autore, $genere, $anno, $cover, $casa_editrice, $trama];
    var_dump($args);

    updateBook($mysqli, $_GET['id'], ...$args);
    exit(header('Location: http://localhost/IFOA-Back-End/Week%201%20-%20PHP%20,%20Laragon%20,%20XAMPP/Project-07Febbraio/index.php'));

} else {
    $titolo = strlen(htmlspecialchars($_POST['titolo'])) > 2 ? htmlspecialchars($_POST['titolo']) : exit();
    $autore = strlen(htmlspecialchars($_POST['autore'])) > 2 ? htmlspecialchars($_POST['autore']) : exit();
    //crea ciclo che controlli che il genere esista in un array di generi validi
    $genere = strlen(htmlspecialchars($_POST['genere'])) > 2 ? htmlspecialchars($_POST['genere']) : exit();
    $casa_editrice = strlen(htmlspecialchars($_POST['casa_editrice'])) > 2 ? htmlspecialchars($_POST['casa_editrice']) : exit();
    $trama = strlen(htmlspecialchars($_POST['trama'])) > 100 ? htmlspecialchars($_POST['trama']) : exit();
    
    $anno = $_POST['anno'];
    if($anno<=$annoCorrente) {
        echo 'anno ok';
    } else {
        echo 'anno non valido';
    }

    $args = [$titolo, $autore, $genere, $anno, $cover, $casa_editrice, $trama];
    //Creo la funzione che aggiunga un nuovo libro alla libreria
    addBookToLibrary($mysqli, ...$args);
}

exit(header('Location: http://localhost/IFOA-Back-End/Week%201%20-%20PHP%20,%20Laragon%20,%20XAMPP/Project-07Febbraio/'));




    