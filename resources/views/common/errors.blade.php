@if ($errors->count())
  @foreach ($errors->all() as $error)
      <div class="error">{{$error}}</div>
  @endforeach
@endif