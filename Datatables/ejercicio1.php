<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css"/>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
  </div>
</div>
</head>
<body>
<div class="container">
  <h1 class="text-center mt-4">TABLA OFERTAS</h1>
  <div class="row">
		<div class="col">
			<table id="taula">
			        <thead>
			            <tr>
			                <th>Id Usuario</th>
			                <th>Titulo</th>
                      <th>Precio Moneda</th>
			            </tr>
			        </thead>
			    </table>
		</div>
	</div>
	</div>
  <script>

  $(document).ready(function() {
      var t = $('#taula').DataTable( {
          ajax: {
             url: 'offer.php',
             dataSrc: '',
             type:"POST",
             },
           columns:  [
           { data: 'User_Id' },
           { data:'Title' },
           { data: 'Coin_Price' }
          ],
        language: {
                  url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
              },
          select: true
      } );
    });
  </script>
</body>
</html>
