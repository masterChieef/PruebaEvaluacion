@extends("layouts.app")
@section('titulo')
    Formulación de preguntas
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tablas de Preguntas-Items</h3>
                <div style="text-align:right;">
                    <a href="{{route('Pregunta.crear')}}">
                        <button type="button" class="btn btn-success ">
                            Insertar    <i class="fa fa-plus"></i>        
                        </button>
                    </a>
                </div>
            </div>
            
           {{--$pregunta--}}
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hove table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Pregunta</th>
                            <th>Item</th>
                            <th>Categoría</th>
                            <th>Valor</th>
                            <th>Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($pregunta as $valor=>$items)
                            <tr>
                            <td>{{$valor+1}}</td>
                            <td>{{$items->pregunta}}</td>
                            <td>{{$items->nombre_item}}</td>
                            <td>{{$items->nombre_cat}}</td>
                            <td>{{$items->valor}}</td>
                            <td>
                                <div>
                                    @if ($items->valor == 0)
                                    <form action="{{route('Pregunta.eliminar', $items)}}" method="POST" >
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{route('Pregunta.editar',$items)}}">
                                            <button  type="button" class="btn btn-info btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </a>
                                            <button class="btn btn-danger btn-sm" type="submit">
                                                <i class="fa fa-trash"></i>
                                            </button>    
                                        @endif
                                        
                                    </form>
                                </div>
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