@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Articulos
                    <a href="{{ route('posts.create') }}" class="btn btn-sn btn-primary float-right">Crear</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th colspam="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sn">
                                        Editar
                                    </a>
                                </td>   
                                <td>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input 
                                    type="submit" 
                                    value="Eliminar" 
                                    class="btn btn-sn btn-danger"
                                    onclick="return confirm('¿Desea eliminar..?')"
                                    >
                                </td>  
                            </tr>
                            @endforeach
                    </table>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
