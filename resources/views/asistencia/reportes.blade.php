@extends('layouts.admin')



@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                Reporte de asistencias
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box" style="height: 92px;">
                                    <span class="info-box-icon bg-info">
                                       <a href="{{url('/asistencias/pdf')}}">
                                            <i class="far "><i class="bi bi-printer"></i></i>
                                       </a>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Imprimir reporte</span>
                                        <span class="info-box-number">Asistencias</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-warning">
                                       <a href="{{url('/asistencias/pdf')}}">
                                            <i class="far "><i class="bi bi-printer"></i></i>
                                       </a>
                                    </span>
                                    <div class="info-box-content">
                                        <form action="{{url('asistencias/pdf_fechas')}}" method="get">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Fecha de inicio</label>
                                                    <input type="date" name="fi" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Fecha de final</label>
                                                    <input type="date" name="ff" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="height: 37px"></div>
                                                    <button type="submit" class="btn btn-success">Generar reporte</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>




@endsection
