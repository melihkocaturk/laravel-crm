@if (session()->has('success'))
  <div class="alert alert-success alert-block">
    <strong>{{ session()->get('success') }}</strong>
  </div>
@endif

@if (session()->has('error'))
  <div class="alert alert-danger alert-block">
    <strong>{{ session()->get('error') }}</strong>
  </div>
@endif

@if (session()->has('warning'))
  <div class="alert alert-warning alert-block">
    <strong>{{ session()->get('warning') }}</strong>
  </div>
@endif

@if (session()->has('info'))
  <div class="alert alert-info alert-block">
    <strong>{{ session()->get('info') }}</strong>
  </div>
@endif

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
