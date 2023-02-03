@extends('layouts.admin')

@section('content')
    
    <div class="container">
        <h1>{{ $type->name }}</h1>
        <ul>
            @forelse ($type->projects as $project)
                <a href="{{ route('admin.projects.show', $project) }}"><li>{{ $project->title }}</li></a>
            @empty
                <li>Nessuna Tipologia</li>
            @endforelse
            
        </ul>

    </div>
  

@endsection