@extends("layouts.app")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/lte/bower_components/select2/dist/css/select2.min.css")}}">
<style>
        #solucion{
            
        }
        #categoria{
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;   
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        #botones {
            text-align: right;
        }
        
</style>
@endsection
@section('titulo')
    Solución
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h2 class="box-title">Formulario de Solución&nbsp;  </h2>
                <a href="{{route('Respuesta')}}">
                    <button type="button" class="btn btn-primary">
                        <i class="fa fa-reply-all" ></i>       
                    </button>
                </a>
            </div>
            <form action="{{route('guardar.respuesta')}}" method="POST">
                @csrf
                @error('item')
                    <div class="callout callout-danger" >
                        <h4>Error</h4>
                        No esta lleno requerido por favor llenar el item
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
                <div class="box-body">
                    <div class="form-group">
                        <h4>Solución</h4>      
                        <input id="solucion" name="solucion" class="form-control" type="text" placeholder="Ingrese su solución">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">  
                            <h4>Estado</h4>
                            <select name="estado" id="estado" class="form-control selected">
                                <option value="pesimo">Pesimo (0)</option>
                                <option value="mal">Mal (1 a 3)</option>
                                <option value="regular" selected>Regular(4 a 6)</option>
                                <option value="bien">Bien (7 a 8)</option>
                                <option value="exelente">Exelente (9 a 10)</option>
                            </select> 
                        </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                        <h4>Categoría</h4>
                        <select id="categoria" name="categoria" class="form-control selected">
                            @foreach ($categoria as $item)
                                <option value="{{$item->id}}">{{$item->nombre_cat}}</option>    
                            @endforeach
                        </select>
                    </div>
                    </div>
                    </div>
                    @if ( session('mensaje') )
                        <div class="callout callout-success">
                            <h4>Exito</h4>
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <br>
                    <div id="botones">   
                        <input type="submit" class="btn  btn-primary btn-lg" value="Guardar">
                        <input type="reset" class="btn  btn-default btn-lg" value="Cancelar">
                                
                    </div>    
            </form>
        </div>
    </div>
</div>
@endsection
