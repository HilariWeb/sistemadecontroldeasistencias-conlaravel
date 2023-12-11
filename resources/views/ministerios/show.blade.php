@extends('layouts.admin')

@section('content')

    <div class="content" style="margin-left: 20px">
        <h1>Ministerio: {{$ministerio->nombre_ministerio}}</h1><br>



        <div class="row">
            <div class="col-md-11">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Datos registrados</b></h3>
                    </div>
                    <div class="card-body" style="display: block;">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">Nombre del ministerio</label>
                                                <input type="text" name="nombre_ministerio" value="{{$ministerio->nombre_ministerio}}" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Fecha de ingreso</label>
                                                <input type="date" name="fecha_ingreso" value="{{$ministerio->fecha_ingreso}}" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Descripción</label>
                                                <p>{!!$ministerio->descripcion!!}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <a href="{{url('/ministerios')}}" class="btn btn-secondary">Cancelar</a>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
