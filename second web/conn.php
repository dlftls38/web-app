<?php
  $config = array(
    "host"=>"localhost",
    "duser"=>"root",
    "dpw"=>"111111",
    "dname"=>"opentutorials2"
  );
  function db_init($host, $duser, $dpw, $dname){
   $conn = mysqli_connect($host, $duser, $dpw);
   mysqli_select_db($conn,$dname);
   return $conn;
  }
  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
?>
