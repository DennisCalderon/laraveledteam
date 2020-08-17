@extends('layouts.app')

@section('content')

    @include('partials.navbar')

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
        <div class="container">
        <h1 class="mt-5">Comandos en PHP Artisan</h1>
        @if (!empty($like))
        @foreach ($like as $l)
        <p>{{  $l->nombre }} - {{ $l->correo }}</p>
        <p>{{  $l->numero }}</p>
        <p>{{  $l->aleatorio }}</p>
        <p><img src="{{  $l->imagen }}"></p>
        @endforeach
        @endif
    </main>

    @include('partials.footer')

@endsection