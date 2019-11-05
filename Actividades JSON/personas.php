<?php

  class personas
  {
    public $nombre;
    public $treball;
    public $horari;
    public $email;
  }

  function connectToDb(){
    try {
      return new PDO('mysql:host=127.0.0.1;dbname=dc','root','');
    } catch (PDOException $e){
      die($e->getMessage());
    }
  }

  function fecthAllPersonas($pdo){
    $statement = $pdo -> prepare('select*from personas');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS,'personas');
  }

  $pdo = connectToDb();
  $personas = fecthAllPersonas($pdo);

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
     <h2>PERSONAS</h2>
     <p>Datos obtenidos de la base de datos</p>
     <table>
      <tr id='a'>
        <th>NOMBRE</th>
        <th>TREBALL</th>
        <th>HORARI</th>
        <th>EMAIL</th>
      </tr>
      <?php foreach ($personas as $persona): ?>
     <tr>
       <th><?= $persona->nombre; ?></th>
       <th><?= $persona->treball; ?></th>
       <th><?= $persona->horari; ?></th>
       <th><?= $persona->email; ?></th>
     </tr>
     <?php endforeach; ?>
   </table><br>
    <div id="resultado"></div>
    <script>
        //ALMACENAR DATOS
        var personas = {personas:
          [<?php foreach ($personas as $persona): ?>
          {Nombre: "<?= $persona->nombre; ?>", Trabajo: <?= $persona->treball; ?>,Horario: "<?= $persona->horari; ?>",Email: "<?= $persona->email; ?>"},
          <?php endforeach; ?>]
        };
        var personasJson = JSON.stringify(personas);
        localStorage.setItem("jsont2",personasJson );
        document.getElementById("resultado").innerHTML = "Datos Guardados";
        //archivoJson = localStorage.getItem("jsont2");
        //console.log(archivoJson);
        //objetoArchivoJson = JSON.parse(archivoJson);
        //document.getElementById("resultado").innerHTML = objetoArchivoJson.name;
        //console.log(objetoArchivoJson.personas[1]);
    </script>
  </body>
</html>
