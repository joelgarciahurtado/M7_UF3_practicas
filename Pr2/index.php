<?php
  //connexió dins block try-catch:
  //  prova d'executar el contingut del try
  //  si falla executa el catch
  try {
    $hostname = "daw_mysql_1";
    $dbname = "acces_dades";
    $username = "u_acces_dades3";
    $pw = "pwd5914";
    $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

//preparem i executem la consulta
  $query = $pdo->prepare("select i, a FROM prova");
  $query->execute();

  //anem agafant les fileres d'amb una amb una
  $row = $query->fetch();
  foreach ( $row as $key) {
    echo $row['i']." - " . $row['a']. "<br/>";
    $row = $query->fetch();
  }

  //eliminem els objectes per alliberar memòria 
  unset($pdo); 
  unset($query)

?>