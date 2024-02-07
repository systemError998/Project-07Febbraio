<?php

    #Creo l'array Config, contenente tutte le info diconfigurazione necessarie x accedere al database
    $config = [
        'mysql_host' => 'localhost',
        'mysql_user' => 'root',
        'mysql_password' => ''
    ];

    $mysqli = new mysqli(
        $config['mysql_host'], 
        $config['mysql_user'], 
        $config['mysql_password']
    );

    if ($mysqli->connect_error) {
        die('Errore di connessione: ' . $mysqli->connect_error);
    };

    $libreriaDB = 'CREATE DATABASE IF NOT EXISTS libreriaDB';  //Il codice tra apici è sql, ed ora sto creando un database
    //IF NOT EXIST è necessario, altrimenti lui prova a ricreare il database ad ogni running del code
    //var_dump($myDB);
    #Il metodo query serve per eseguire codice SQL (quindi, azioni sul db) e restituisce true o false se fallisce
    if(!$mysqli->query($libreriaDB)) { 
        die($mysqli->connect_error);
    }

    $mysqli->query('USE libreriaDB');

    $libreriaDB = 
        ' CREATE TABLE IF NOT EXISTS books (
            id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            titolo VARCHAR(255) NOT NULL,
            autore VARCHAR(255) NOT NULL,
            anno_pubblicazione INT(4) UNSIGNED NOT NULL,
            genere VARCHAR(255) NOT NULL,
            casa_editrice VARCHAR(255) NOT NULL,
            cover VARCHAR(255) NOT NULL,
            trama TEXT NOT NULL
        )';    
    if(!$mysqli->query($libreriaDB)) { 
        die($mysqli->connect_error);
    };

    $libreriaDB = 
        ' CREATE TABLE IF NOT EXISTS authors (
            id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            nome VARCHAR(255) NOT NULL,
            cognome VARCHAR(255) NOT NULL,
            books_id INT NOT NULL,
            FOREIGN KEY (books_id) REFERENCES books (id) ON DELETE CASCADE ON UPDATE CASCADE
        )';    
    if(!$mysqli->query($libreriaDB)) { 
        die($mysqli->connect_error);
    };


    //Aggiungi nuova colonna con questa zia pera di funzioncina
/*      $libreriaDB = 'ALTER TABLE books ADD trama TEXT NOT NULL';
    if(!$mysqli->query($libreriaDB)) { 
        die($mysqli->connect_error);
    };  */ 


    //CAMPO AGGIUNTO 
/*     $libreriaDB = 'IF NOT EXISTS (
                    SELECT
                        *
                    FROM
                        INFORMATION_SCHEMA.COLUMNS
                    WHERE
                        TABLE_NAME = books AND COLUMN_NAME = image)
                    BEGIN
                        ALTER TABLE books
                            ADD image VARCHAR(255) NULL
                    END;';
    if(!$mysqli->query($libreriaDB)) { 
        die($mysqli->connect_error);
    }; */

    

    