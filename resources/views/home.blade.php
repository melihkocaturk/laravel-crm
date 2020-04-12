@extends('layouts.app')

@section('content')

  @foreach ($articles as $article)
    <!-- Blog article -->
    <div class="card mb-4">
      <img class="card-img-top" src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->title }}">
      <div class="card-body">
        <h2 class="card-title">{{ $article->title }}</h2>
        <p class="card-text">{!! substr($article->content, 0, strpos($article->content, ' ', 200)) !!}...</p>
        <a href="{{ route('article.show', $article->slug) }}" class="btn btn-primary">Read More &rarr;</a>
      </div>
      <div class="card-footer text-muted">
        Posted on {{ $article->created_at->format('j F, Y') }} by
        <em>{{ $article->user->name }}</em>
      </div>
    </div>
  @endforeach

  <!-- Pagination -->
  {{ $articles->withQueryString()->links() }}

@endsection
