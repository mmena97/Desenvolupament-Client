<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
      <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
      <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
      <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
      <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css"/>
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"/>


  </head>
<body>
<div class="container">
  <h1 class="text-center mt-4">TABLA OFERTAS</h1>
  <div class="row">
		<div class="col">
      <div class="dropdown pt-4 pb-4">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Columnas
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown">
          <a class="dropdown-item" value="0">Id Usuario</a>
          <a class="dropdown-item" value="1">Titulo</a>
          <a class="dropdown-item" value="2">Precio Moneda</a>
        </div>
      </div>
			<table id="taula" class="table table-striped table-bordered">
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

       var dt = $('#taula').DataTable( {
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
            <?php if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "es"):?>
                  url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            <?php elseif(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "ca"):?>
                  url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Catalan.json"
            <?php else :?>
                  url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
            <?php endif ?>
          },
          //BOTONOS
          dom: 'Bfrtip',
          buttons: [
              'pdf','csv','excel','print'
          ],
          //RESPONSIVE
          responsive:true,
          //OPCION BUSCAR DESACTIVADA
          searching:false
      });

      //CAMBIAR VISIBILIDAD COLUMNA
      $(".dropdown-item").click(function(){
        var x = $(this).attr("value");
        console.log(dt.column(x).visible());
        if (dt.column(x).visible()==false){
          dt.column(x).visible(true);
        }else{
          dt.column(x).visible(false);
        }
      });

    });


  </script>
</body>
</html>
