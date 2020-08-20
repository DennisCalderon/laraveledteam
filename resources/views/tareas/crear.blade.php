@extends('layouts.app')

@section('content')

    @include('partials.navbar')

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
        <div class="container">
        <h1 class="mt-5">Mis Tareas</h1>
        <a href="{{ route('tareas.index') }}">Regresar</a>
        <section class="content">
            <h4>Crear Tareas </h4>
            @include('tareas._form')
        </section>        
    </main>
@endsection