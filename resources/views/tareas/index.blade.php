@extends('layouts.app')

@section('content')

    @include('partials.navbar')

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
        <div class="container">
        <h1 class="mt-5">Mis tareas</h1>
        <p><a href="{{ route('tareas.create') }}"> Nueva Tarea</a></p>
        @if (!empty($tareas))
            @foreach ($tareas as $tarea)
            <p>{{  $tarea->titulo }} - {{  $tarea->description }} <p/>
            @endforeach
        @endif
    </main>


@endsection