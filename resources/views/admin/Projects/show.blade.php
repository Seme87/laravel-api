@extends('layouts.admin')

@section('content')
    
    <div class="container">
        <h1>{{ $project->title }}</h1>
        
        @if (isset( $project->type->name  ))

            <h3>Categoria : <a href="{{ route('admin.types.show', $project->type) }}"> {{ $project->type->name }} </a> </h3>
        @else    
            Nessuna Tipologia
        @endif

        <div class="mt-4">

            <div class="w-25 mb-4" >
                @if ($project->cover_image )
                    <img src="{{ asset("storage/$project->cover_image ") }}" alt="{{ $project->title  }}">
                @endif
            </div>

            {{ $project->description }}

        </div>

    </div>
  

@endsection