@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
    <div class="container">
        <div class="row justify-content-end mb-4">
            <div class="col-md-2">
                <a href="#" class="btn btn-info link_open_popup" data-url="<?= url('intranet/item/create') ?>" style ="color:white" data-target="#modal_item_create">AGREGAR ITEM</a>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-6">
            <h1>Servicios</h1>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="text-center"> 
                        <th class="w-25">Titulo</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <h1>Productos</h1>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="text-center">
                        <th class="w-25">Titulo</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="modal_item_create" class="modal fade"></div>
@endsection