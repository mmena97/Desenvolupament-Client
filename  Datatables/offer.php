<?php
  header("Content-Type: application/json; charset=UTF-8");
  $conn = new mysqli("localhost", "mena", "123","datatables");
  $stmt = $conn->prepare("SELECT * FROM offer");
  $stmt->execute();
  $result = $stmt->get_result();
  $outp = $result->fetch_all(MYSQLI_ASSOC);
  echo json_encode($outp);
?>
