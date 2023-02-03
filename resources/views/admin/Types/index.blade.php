@extends('layouts.admin')

@section('content')
    <h1>Lista Tipologie</h1>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    <div class="my-4">
        <a href="{{ route('admin.types.create') }}" class="btn btn-primary" >Crea Tipo</a>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $types as $type )
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->slug }}</td>
                        <td>
                            <a href="{{ route('admin.types.show', $type)}}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.types.edit', $type)}}" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>

                            <form class="d-inline-block" action="{{route('admin.types.destroy', $type)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >Cancella</button>
                            </form>
                        </td>

                        
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>
  

@endsection