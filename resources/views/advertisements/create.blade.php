@extends('layouts.app')
@section('content')
    <advertisement-create
    v-bind:csrf="{{ json_encode(csrf_token()) }}"
    v-bind:user="{{ Auth::user() }}"
    >
    </advertisement-create>
@endsection