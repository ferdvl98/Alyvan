<?php
  define('DB_SERVER','localhost');
  define('DB_USERNAME','root');
  define('DB_PASSWORD','');
  define('DB_NAME', 'alyvan');

  $link =mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  !mysqli_set_charset($link, "utf8");
  if(!$link){
    echo "No sé pudo conectar con la Base de Datos";
  }/*else{
    echo "Listo";
  }*/
?>
