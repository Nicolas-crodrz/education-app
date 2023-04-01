@extends('adminlte::page')

@section('content')
    <!-- Contenido de la página del administrador -->

    {{-- * Creacion de usuarios --}}
    <a href="{{ route('users') }}">
        <div class="card mt-3 ">
            <div class="card-body">
                <h5 class="card-title">Crear usuarios</h5>
                <p class="card-text">Haz clic aquí para crear nuevos usuarios en el panel de administración.</p>
            </div>
        </div>
    </a>

    {{-- * mostrar lista de usuarios --}}
    <a href="{{ route('usersList') }}">
        <div class="card mt-3 ">
            <div class="card-body">
                <h5 class="card-title">Lista de usuarios</h5>
                <p class="card-text">Haz clic aquí para ver la lista de usuarios en el panel de administración.</p>
            </div>
        </div>
    </a>
@endsection

@section('css')
    <!-- Hojas de estilo de ADMINLTE -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
@endsection

@section('js')
    <!-- Archivos JavaScript de ADMINLTE -->
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
@endsection
