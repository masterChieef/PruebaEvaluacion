@extends("layouts.app")
@section('titulo')
Resultado 
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tablas de Resultados y/o Consejos </h3>
                <div style="text-align:right;">
                    <a href="{{route('Respuesta.crear')}}">
                        <button type="button" class="btn btn-success">
                            Insertar <i class="fa fa-plus"></i>        
                        </button>
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hove table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Solucion</th>
                            <th>Estado</th>
                            <th>Categoria</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($respuesta as $valor=>$items)
                            <tr>
                            <td>{{$valor+1}}</td>
                            <td>{{$items->solucion}}</td>
                            <td>{{$items->estado}}</td>
                            <td>{{$items->nombre_cat}} </td>
                            <td>
                                <form action="{{route('Respuesta.eliminar', $items)}}" method="POST" >
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{route('Respuesta.editar',$items)}}">
                                        <button  type="button" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </a>
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@endsection