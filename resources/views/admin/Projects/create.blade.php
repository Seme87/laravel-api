@extends('layouts.admin')

@section('content')

   
    
    <div class="container">
        <h1>Crea Project</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mt-4">
           <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo" value="{{ old('title') }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Contenuto</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Inserisci il contenuto">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="cover_image" class="form-label">Immagine</label>

                    <div class="mb-3">
                        <img id="output" width="100"/>
                        <script>
                            var loadFile = function(event) {
                                var reader = new FileReader();
                                reader.onload = function(){
                                var output = document.getElementById('output');
                                output.src = reader.result;
                                };
                                reader.readAsDataURL(event.target.files[0]);
                            };
                        </script>
                    </div>
                    
                    <input type="file" class="form-control" id="cover_image" name="cover_image" value="{{ old('cover_image') }} " onchange="loadFile(event)">
                </div>
                <div class="mb-3">
                    <label for="type_id" class="form-label">Categoria</label>
                    <select class="form-select" name="type_id" id="type_id">
                        <option value="">Senza categoria</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="mb-3">
                    <div class="mb-3">Tecnologie</div>
                    @foreach ($technologies as $technology)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="technologies[]"  id="{{$technology->slug}}" value="{{ $technology->id }}" {{ in_array($technology->id, old('technologies', []) ) ? 'checked' : '' }} >
                            <label class="form-check-label" for="{{$technology->slug}}">{{$technology->name}}</label>
                        </div>
                    @endforeach
                </div>
                
                <button type="submit" class="btn btn-primary">Crea</button>
                
            </form>
        </div>
    </div>
  

@endsection