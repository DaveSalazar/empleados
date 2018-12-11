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
<input type="text" id="jsonZonas" value="{{ $zonas->toJson() }}" style="visibility:hidden;">
    <br>
    <br>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" id="btnModal">Ingresar Persona</button>
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
                        <td>Sueldo</td>
                        <td>Estado</td>
                        <td>Opciones</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($personas as $persona)
                    <tr>
                        <td>{{ $persona->id }}</td>
                        <td>{{ $persona->nom_persona }}</td>
                        <td>{{ $persona->sector->des_sector }}</td>
                        <td>{{ $persona->zona->des_zona }}</td>
                        <td>{{ $persona->sueldo }}</td>
                        <td>{{ $persona->estado }}</td>
                        <td>
                            <a href="#" class="btn btn-xs btn-success btnEditar" empleado_id="{{ $persona->id}}">Editar</a>
                            <form action="{{ url('/personas/'. $persona->id)}}" method="POST">
                            @csrf
                            {!! method_field('delete') !!}
                                <input type="submit" value="Eliminar" class="btn btn-xs btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>  
    <hr>
    
    <div class="container">
    <h3>Sueldos de empleados mayores  a 65</h3>
        <div class="row">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <td>Sector</td>
                        <td>Zona</td>
                        <td>Sueldo</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($calc as $data)
                    <tr>
                        <td>{{ $sectores->where('id', $zonas->where('id', $data->zona_id)->first()->sector_id)->first()->des_sector }}</td>
                        <td>{{ $zonas->where('id', $data->zona_id)->first()->des_zona }}</td>
                        <td>{{ $data->total }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>  
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <form action="{{ url('/personas') }}" method="POST">
    @csrf
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">.:Persona:.</h4>
            </div>
            <div class="modal-body">
                <label for="">Cod. Persona</label>
                <input type="text" id="persona_id" name="persona_id" class="form-control" readonly>
                <label for="" >Nombre</label>
                <input type="text" class="form-control" id="nom_persona" name="nom_persona" required>
                <label for="" >Fecha Nacimiento</label>
                <input type="date" class="form-control" id="fec_nacimiento" name="fec_nacimiento" required>
                <label for="">Sector</label>
                <select name="sector_id" id="ddlSector" class="form-control" required>
                @foreach($sectores as $sector)
                    <option value="{{ $sector->id }}">{{ $sector->des_sector}}</option>
                @endforeach
                </select>
                <label for="">Zona</label>
                <select name="zona_id" id="ddl_zona" class="form-control" required>
                </select>
                <label for="" >Sueldo</label>
                <input type="text" class="form-control " id="sueldo" name="sueldo" onkeypress="javascript:return isNumber(event)" required>
                <label for="" >Estado</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Grabar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
            </div>
            </div>
        </div>
    </form>
</div>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
   <!-- Latest compiled and minified CSS -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script>
   function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    

    $(document).ready( function () {
        $('#myTable').DataTable();
    });
    $('#ddlSector').change( function () {
        let data = JSON.parse($('#jsonZonas').val() ).filter( (el) => {
            return el.sector_id == $('#ddlSector').val()             
        })
        $('#ddl_zona').empty()            
        data.forEach( (el) => {
            $('#ddl_zona').append(`<option value="${el.id}">${el.des_zona}</option>`)
        })
    })

    $('.btnEditar').click( function () {
        let id = $(this).attr('empleado_id')
        
        $.get("{{ url('/personas') }}/"+id, function (data,status) {
           
            $('#persona_id').val(data.id)
            $('#nom_persona').val(data.nom_persona)
            $('#fec_nacimiento').val(data.fec_nacimiento)
            $('#ddlSector').val(data.sector_id)

            let zonas = JSON.parse($('#jsonZonas').val() ).filter( (el) => {
                return el.sector_id == $('#ddlSector').val()             
            })
            $('#ddl_zona').empty()            
            zonas.forEach( (el) => {
                $('#ddl_zona').append(`<option value="${el.id}">${el.des_zona}</option>`)
            })

        
            $('#zona').val(data.zona_id)
            $('#sueldo').val(data.sueldo)
            $('#estado').val(data.estado)

            $("#myModal").modal()
        })
        
    })

    $('#btnModal').click( function () {
    
        $('#persona_id').val("")
        $('#nom_persona').val("")
        $('#fec_nacimiento').val("")                
        $('#zona').val("")
        $('#sueldo').val("")
        $('#estado').val("")

        $("#myModal").modal()
    })
        
   </script>
</body>
</html>