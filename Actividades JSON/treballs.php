<?php

  class treballs
  {
    public $id;
    public $nombre;
  }

  function connectToDb(){
    try {
      return new PDO('mysql:host=127.0.0.1;dbname=dc','root','');
    } catch (PDOException $e){
      die($e->getMessage());
    }
  }

  function fecthAllTreballs($pdo){
    $statement = $pdo -> prepare('select*from treballs');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS,'treballs');
  }

  $pdo = connectToDb();
  $treballs = fecthAllTreballs($pdo);

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <style>
      #a{
          background-color: #ec7241;
          border: 1px solid black;
        }
        table, td, th {
           border: 1px solid black;
        }
    </style>
   </head>
   <body>
     <h2>TRABAJOS</h2>
     <p>Datos obtenidos de la base de datos</p>
     <table>
      <tr id='a'>
        <th>ID</th>
        <th>NOMBRE</th>
      </tr>
      <?php foreach ($treballs as $treball): ?>
     <tr>
       <th><?= $treball->id; ?></th>
       <th><?= $treball->nombre; ?></th>
     </tr>
     <?php endforeach; ?>
   </table><br>
    <div id="resultado"></div>
    <script>
        //ALMACENAR DATOS
        var treballs = {treballs:
          [<?php foreach ($treballs as $treball): ?>
          {id: <?= $treball->id; ?>, nombre: "<?= $treball->nombre; ?>"},
          <?php endforeach; ?>]
        };
        var treballsJson = JSON.stringify(treballs);
        localStorage.setItem("jsont1",treballsJson );
        document.getElementById("resultado").innerHTML = "Datos Guardados";
        //RECUPERAR LOS DATOS
        //archivoJson = localStorage.getItem("jsont1");
        // console.log(archivoJson);
        //objetoArchivoJson = JSON.parse(archivoJson);
        //document.getElementById("resultado").innerHTML = objetoArchivoJson.name;
        // console.log(objetoArchivoJson.treballs[1]);
    </script>
  </body>
</html>
