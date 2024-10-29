@extends('layouts.app')
@section('title') Show @endsection

@section('show_content')

        <div class="card">
            <div class="card-header">
              Post info
            </div>
            <div class="card-body">
              <h5 class="card-title">Title : {{$post->title}}</h5>
              <p class="card-text">Description : {{$post->description }}</p>
            </div>
          </div>

          <div class="card mt-3" >
            <div class="card-header">
              Post create info
            </div>
            <div class="card-body">
              <h5 class="card-title">Name : {{$post->user ? $post->user->name : 'not found'}}</h5>
              <p class="card-text">Email : {{$post->user ? $post->user->email:'not found'}}</p>
              <p class="card-text">Create At: {{$post->user ? $post->user->created_at : 'not found'}}</p>
            </div>
          </div>

@endsection