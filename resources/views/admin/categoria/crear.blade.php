@extends("layouts.app")
@section('titulo')
    Categoria
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Crear una nueva Categoria-Pregunta</h3>
                <a href="{{route('Categoria')}}">
                    <button type="button" class="btn btn bg-navy">
                        <i class="fa fa-reply-all" ></i>       
                    </button>
                </a>
            </div>
            <div class="box-body">
                <input name="categoria" class="form-control input-lg" type="text" placeholder="Ingrese una nueva categoria">
            </div>
        </div>
    </div>
</div>
@endsection