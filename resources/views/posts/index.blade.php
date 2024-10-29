@extends('layouts.app')

@section('title') Index @endsection

@section('content')
<div class="text-center">
  <a href="{{route('posts.create')}}" type="button" class="btn btn-success">Create Post</a>
</div>
<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Create At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
      <th scope="row">{{$post['id']}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->user ? $post->user->name : 'not found'}}</td>
      <td>{{$post->created_at->format('Y-m-d')}}</td>
      <td>
          <a href="{{route('posts.show',$post['id'])}}" class="btn btn-info">view</a>
          <a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">Edit</a>
          <form style="display: inline" method="post" action="{{route('posts.destroy',$post['id'])}}">
            @csrf
            @method('delete')
            <button type="submit" href="#" class="btn btn-danger">Delete</button>
          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
 