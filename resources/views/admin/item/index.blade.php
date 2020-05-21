@extends("layouts.app")
@section('titulo')
    Items
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tablas de Items-Respuestas</h3>
            
            <div style="text-align:right;">
                <a href="{{route('Items_crear')}}">
                    <button type="button" class="btn btn-success" >
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
                                <th>Item</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item as $valor=>$items)
                                <tr>
                                <td>{{$valor+1}}</td>
                                <td>{{$items->nombre_item}}</td>
                                <td>
                                    <div>
                                        <form action="{{route('Items.eliminar', $items)}}" method="POST" >
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{route('Items.editar',$items)}}">
                                                <button  type="button" class="btn btn-info btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <button class="btn btn-danger btn-sm" type="submit">
                                                <i class="fa fa-trash"></i>
                                            </button>
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