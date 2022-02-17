@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>Modifica Post</h2></div>

                <div class="card-body">

                    <form action="{{route('posts.update', $post->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- title --}}
                        <div class="form-group">
                            <label for="title">Titolo</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo del post" value="{{old('title', $post->title)}}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- content --}}
                        <div class="form-group">
                            <label for="content">Contenuto</label>
                            <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Inserisci il Contenuto del post" rows="6">{{old('content', $post->content)}}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- checkbox --}}
                        <div class="form-group form-check">

                            
                            @php
                                $published = old('published') ? old('published') : $post->published    
                            @endphp

                            <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" {{$published ? 'checked' : ''}}>
                            <label class="form-check-label" for="published">Pubblica</label>  
                            @error('published')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror  
                                                   
                        </div>

                        {{-- azioni --}}
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Salva</button>
                            <a href="{{route('posts.index')}}"><button type="button" class="btn btn-secondary">Torna ai Posts</button></a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection