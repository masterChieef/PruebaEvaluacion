@extends("layouts.app")
@section('titulo')
    Categoria
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tablas de Categoria-Respuestas</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hove table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Categoria</th>
                            <th>Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoria as $items)
                            <tr>
                            <td>{{$items->id}}</td>
                            <td>{{$items->nombre_cat}}</td>
                            <td>
                                <div>
                                    {{--<a href="{{route('Categoria.crear')}}">
                                        <button type="button" class="btn btn-success btn-sm">
                                                <i class="fa fa-plus"></i>        
                                        </button>
                                    </a>--}}
                                     <a href="{{route('Categoria.editar',$items)}}">
                                        <button  type="button" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </a>
                                   {{--  <form action="{{route('Categoria.eliminar', $items)}}" method="POST" >
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form> --}}
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