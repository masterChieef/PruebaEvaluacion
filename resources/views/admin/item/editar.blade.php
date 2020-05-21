@extends("layouts.app")
@section('titulo')
    Items
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Items-Respuesta</h3>
            </div>
            <form action="{{route('Items.actualizar', $item->id)}}" method="POST">
                @method('PUT')
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
                    <input name="item" class="form-control input-lg" type="text" value="{{ $item->nombre_item }}">
                    
                    @if ( session('mensaje') )
                        <div class="callout callout-success">
                            <h4>Exito</h4>
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <br>
                    <input type="submit" class="btn btn-block btn-primary btn-lg" value="Guardar">
                    <a href="{{route('Items')}}"> 
                     <div class="btn btn-block btn-default">
                         Regresar
                    </div>       
                    </a> 
                </div>
            </form>
        </div>
        <div id="foto">
            <img  src="https://www.w3schools.com/images/w3schools_green.jpg"  width="300" height="400">
        </div>
    </div>
</div>
@endsection
@section('styles')
<style>
        #foto {
            text-align: center;
        }
</style>
@endsection
@section('scripts')
    
@endsection