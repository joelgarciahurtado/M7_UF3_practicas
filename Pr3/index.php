<?php

  try {
    $hostname = "daw_mysql_1";
    $dbname = "acces_dades";
    $username = "u_acces_dades3";
    $pw = "pwd5914";
    $dbh = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

  try {
    echo "Comença la inserció<br>";
    //cadascun d'aquests interrogants serà substituït per un paràmetre.
    $stmt = $dbh->prepare("INSERT INTO prova (i, a) VALUES(?,?)"); 
    //a l'execució de la sentència li passem els paràmetres amb un array 
    $stmt->execute( array('10', 'crack')); 
    echo "Inserit!"; 
  } catch(PDOExecption $e) { 
    print "Error!: " . $e->getMessage() . " Desfem</br>"; 
  }

?>