
<!-- Search Widget -->
<div class="card mb-4">
  <h5 class="card-header">Search</h5>
  <div class="card-body">
    <form action="{{ route('home') }}" class="my-2 my-lg-0 mr-2" method="get">
      <div class="input-group">
        <input type="text" name="key" class="form-control" value="{{ request()->key }}" placeholder="Search">
        <div class="input-group-append">
          <button type="submit" class="btn btn-secondary">Go!</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Categories Widget -->
<div class="card my-4">
  <h5 class="card-header">Tags</h5>
  <div class="card-body">
    <ul class="row list-unstyled mb-0">
      @foreach ($tags as $tag)
        <li class="col-lg-6">
          <a href="{{ route('home', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
        </li>
      @endforeach
    </ul>
  </div>
</div>

<!-- Side Widget -->
<div class="card my-4">
  <h5 class="card-header">Side Widget</h5>
  <div class="card-body">
    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
  </div>
</div>
