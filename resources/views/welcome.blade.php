<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>
<body>
    <br>
    <br>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ingresar Persona</button>

    <hr>
    <div class="container">
        <div class="row">
            <table id="myTable"> 
                <thead>
                    <tr>
                        <td>Cod. Persona</td>
                        <td>Nombre</td>
                        <td>Sector</td>
                        <td>Zona</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>asd</td>
                        <td>2dasdsa</td>
                        <td>wewere</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">.:Persona:.</h4>
      </div>
      <div class="modal-body">
        <label for="">Cod. Persona</label>
        <input type="text" class="form-control" disable>
        <label for="" >Nombre</label>
        <input type="text" class="form-control" name="nom_persona">
        <label for="">Sector</label>
        <select name="sector_id" id="" class="form-control">
        @foreach($sectores as $sector)
            <option value="{{ $sector->id }}">{{ $sector->des_sector}}</option>
        @endforeach
        </select>
        <label for="">Zona</label>
        <select name="zona_id" id="ddl_zona" class="form-control">
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Nuevo</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Grabar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
      </div>
    </div>

  </div>
</div>
<script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
   <!-- Latest compiled and minified CSS -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
   </script>
</body>
</html>