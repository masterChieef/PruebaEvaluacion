@extends("layouts.app")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/lte/bower_components/select2/dist/css/select2.min.css")}}">
<style>
        #pregunta{
            
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
    Preguntas
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h2 class="box-title">Editar Preguntas&nbsp;  </h2>
                <a href="{{route('Pregunta')}}">
                    <button type="button" class="btn btn-primary">
                        <i class="fa fa-reply-all" ></i>       
                    </button>
                </a>
            </div>
            <form action="{{route('Pregunta.actualizar',$consulta->id)}}" method="POST">
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
                    <div class="row">
                        
                        <div class="col-lg-6">  
                            <h4>Pregunta</h4>      
                            <input id="pregunta" name="preguntar" class="form-control" type="text" value="{{$consulta->pregunta->pregunta}}">
                        </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                        <h4>Categoría</h4>
                        <select id="categoria" name="categoria" class="form-control selected">
                            <option value="{{$valorC->id}}">{{$valorC->nombre_cat}}</option>
                            @foreach ($categoria as $item)
                                <option value="{{$item->id}}">{{$item->nombre_cat}}</option>    
                            @endforeach
                        </select>
                    </div>
                    </div>
                    </div>
                   <table class="table table-hover">
                        <h3>Respuestas</h3>
                        <thead >
                            <tr>
                                <th scope="col">Tipo </th>
                                <th scope="col">Item</th>
                                <th scope="col">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Respuesta pasitiva</th>
                                <td class="col-lg-7">
                                    <select id="item1" name="itemP" class="form-control selected">
                                        <option value="{{$itemV2->id}}">{{$itemV2->nombre_item}}</option>
                                        @foreach ($itemS as $item)
                                            <option value="{{$item->id}}">{{$item->nombre_item}}</option>    
                                        @endforeach
                                    </select>
                                </td>
                                <th> <center> 2</center></th>
                            </tr>
                            <tr>
                          <th scope="row">Respuesta intermedia</th>
                            <td class="col-lg-7">
                                <select id="item2" name="itemI" class="form-control selected">
                                        <option value="{{$itemV1->id}}">{{$itemV1->nombre_item}}</option>
                                    @foreach ($itemS as $item)
                                        <option value="{{$item->id}}">{{$item->nombre_item}}</option>    
                                    @endforeach
                                </select>
                            </td>
                            <th class="col-lg-1"><center>1</center></th> 
                            </tr>
                            <tr>
                                <th scope="row">Respuesta negativa </th>
                                <td class="col-lg-7">
                                    <select id="item3" name="itemN" class="form-control selected">
                                            <option value="{{$itemV->id}}">{{$itemV->nombre_item}}</option>
                                        @foreach ($itemS as $item)
                                            <option value="{{$item->id}}">{{$item->nombre_item}}</option>    
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <th class="col-lg-1"><center>0</center></th>
                            </tr>
                        </tbody>
                    </table>    
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