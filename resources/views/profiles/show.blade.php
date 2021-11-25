@extends('layouts.app')
@section('styles')
<style>
  label {
    background-color: rgb(173, 194, 240);
  }
</style>
@endsection
@section('content')
  <div class="container">
    <div class="card">
        <div class="card-body">
          <label>Nickname: </label>
          <h5 class="card-title">{{ $profile->nickname }}</h5>
          <label>Nationality: </label>
          @foreach($profile->nationalities as $obj)
            <h6 class="card-title">{{ '#' . $obj->nationality }}</h6>
          @endforeach
          <label>Languages: </label>
          @foreach($profile->languages as $obj)
            <h6 class="card-title">{{ '#' . $obj->language }}</h6>
          @endforeach
          <label>Self Introduction</label>
          <h5 class="card-text">{{ $profile->self_introduction }}</h5>
        </div>
    </div>
  </div>
@endsection
