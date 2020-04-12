@extends('layouts.app')

@section('title', $article->title)

@section('content')

  <!-- Title -->
  <h1 class="mt-4">{{ $article->title }}</h1>

  <!-- Author -->
  <p class="lead">
    by <em>{{ $article->user->name }}</em>
  </p>

  <hr>

  <!-- Date/Time -->
  <p>Posted on {{ $article->created_at->format('j F, Y') }} </p>

  <hr>

  <!-- Preview Image -->
  <img class="img-fluid rounded mb-4" src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->title }}">

  <!-- Article Content -->
  <p>{!! $article->content !!}</p>

  <hr>

  <!-- Tags -->
  <p>
    <small><strong>Tags:</strong> </small>
    @foreach ($article->tags as $tag)
      <a href="{{ route('home', ['tag' => $tag->slug]) }}" class="badge badge-secondary">{{ $tag->name }}</a>
    @endforeach
  </p>

@endsection
