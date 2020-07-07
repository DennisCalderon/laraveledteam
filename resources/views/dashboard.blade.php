@extends('layouts.app')

@section('content')

    @include('partials.navbar')

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
        <div class="container">
        <h1 class="mt-5">Comandos en PHP Artisan</h1>
        @for ($i = 0; $i < 4; $i++)
            <p class="lead"><code>php artisan make:controller</code>.</p>
        @endfor        
        <p>Back to <a href="#">the default sticky footer</a> minus the navbar.</p>
        {{-- esto es un comentario --}}
        <p>{{ $mensaje }}</p> {{-- Texto plano --}}
        <p>{{ $html }}</p> {{-- Texto plano --}}
        <p>{!! $html !!}</p>{{-- código enbebido, tal cual viene del otor lado --}}        
        
        <p>La fecha es {{ date('Y-m-d') }}</p>
        @php
            var_dump($mensaje); {{-- Se puede usar todo lo que se sabe de PHP --}}
        @endphp

        @if (!empty($valor1)) {{-- si es valor no es nulo --}}
            {{ $valor1 }}
        @endif

        @if (isset($valor1)) {{-- si existe --}}
            {{ $valor1 }}
        @endif

        @if ($valor2 == 0)
            <p>El valor es 0</p>
        @else
        <p>El valor es diferente de 0</p>
        @endif
        </div>
    </main>

    @include('partials.footer')

@endsection