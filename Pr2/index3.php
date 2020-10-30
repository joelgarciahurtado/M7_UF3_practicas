<?php
  //connexió dins block try-catch:
  //  prova d'executar el contingut del try
  //  si falla executa el catch
  try {
    $hostname = "daw_mysql_1";
    $dbname = "televisioDB";
    $username = "usertv";
    $pw = "lapineda";
    $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

//preparem i executem la consulta
  $query = $pdo->prepare("select * FROM usuaris");
  $query->execute();

  //anem agafant les fileres d'amb una amb una
  $row = $query->fetch();
  foreach ( $row as $key) {
    echo $row['user_name']." - " . $row['password']." - ". $row['last_login']. "<br/>";
    $row = $query->fetch();
  }

  //eliminem els objectes per alliberar memòria 
  unset($pdo); 
  unset($query)

?>