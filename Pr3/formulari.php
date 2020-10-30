<?php

  try {
    $hostname = "daw_mysql_1";
    $dbname = "televisioDB";
    $username = "usertv";
    $pw = "lapineda";
    $dbh = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

  try {
    echo "Comença la inserció<br>";
    //cadascun d'aquests interrogants serà substituït per un paràmetre.
    $stmt = $dbh->prepare("INSERT INTO usuaris (user_name, password, last_login) VALUES(?,?,?)"); 
    //a l'execució de la sentència li passem els paràmetres amb un array 
    $stmt->execute( array('10', 'crack')); 
    echo "Inserit!"; 
  } catch(PDOExecption $e) { 
    print "Error!: " . $e->getMessage() . " Desfem</br>"; 
  }

?>