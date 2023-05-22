@extends('layouts.app')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Titolo</th>
        <th scope="col">Slug</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                <td class="d-flex">
                  <a class="btn btn-primary me-3" href="{{route('admin.posts.show', ['post' => $post->slug])}}">Dettagli</a>
                  <a class="btn btn-secondary me-3" href="{{route('admin.posts.edit', ['post' => $post->slug])}}">Modifica</a>
                  <form action="{{route('admin.posts.destroy', ['post' => $post->slug])}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <!--onclick="return confirm('Are you sure?')"-->
                      <button type="submit" class="btn btn-danger delete">Elimina</button>
                  </form>
              </td>
            </tr>
        @endforeach
    </tbody>
  </table>

@endsection
