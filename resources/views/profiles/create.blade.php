@extends('layouts.app')

@section('content')
<form action="{{ action('ProfileController@update') }}" method="POST" role="form" class="board-form">
    @csrf
    <div class="form-group">
        <label for="nickname">Nick name</label>
        <input type="text" class="form-control" name="nickname">
    </div>
    <div class="form-group">
        <label for="nationality">Nationality</label>
        <select class="form-control" name="nationality">
            @foreach(Config::get('countries.countryList') as $country)
                <option value="{{ $country }}">{{ $country }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="languages">Languages</label>
        <select class="form-control" name="languages">
            @foreach(Config::get('languages.languageList') as $language)
                <option value="{{ $language->name }}">{{ $language->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for=""></label>
        <input type="text" class="form-control" name="nationality">
    </div>
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection