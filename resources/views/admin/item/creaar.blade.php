@extends("layouts.app")
@section('titulo')
    Items
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Crear Items-Respuesta&nbsp;  </h3>
                <a href="{{route('Items')}}">
                    <button type="button" class="btn btn bg-navy">
                        <i class="fa fa-reply-all" ></i>       
                    </button>
                </a>
            </div>
            <form action="{{route('guardar.item')}}" method="POST">
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
                    <input name="item" class="form-control input-lg" type="text" placeholder="Ingrese su nuevo item">
                    
                    @if ( session('mensaje') )
                        <div class="callout callout-success">
                            <h4>Exito</h4>
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <br>
                    <input type="submit" class="btn btn-block btn-primary btn-lg" value="Guardar">
                    <input type="reset" class="btn btn-block btn-default" value="Cancelar">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('styles')
<style>
       
</style>
@endsection
@section('scripts')
    
@endsection