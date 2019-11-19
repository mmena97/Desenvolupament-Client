<?php

  header("Content-Type: application/json; charset=UTF-8");
  $obj = json_decode($_GET["x"],false);

  $conn = new mysqli("127.0.0.1","root","","dc");

  $result = $conn->query("SELECT * FROM ".$obj->table);
  $outp = array();
  $outp = $result->fetch_all(MYSQLI_ASSOC);

  echo json_encode($outp);

?>
