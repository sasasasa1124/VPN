@extends('layouts.app')
@section('content')
    @if(Auth::user()->profile()->first())
        <profile-edit
        v-bind:proprofile="{{ Auth::user()->profile()->first() }}"
        v-bind:proplang="{{ Auth::user()->profile()->first()->languages()->get() }}"
        v-bind:propnation="{{ Auth::user()->profile()->first()->nationalities()->get() }}"
        :csrf="{{ json_encode(csrf_token()) }}"
        ></profile-edit>
    @else
        <profile-create
        v-bind:csrf="{{ json_encode(csrf_token()) }}">
        </profile-create>
    @endif
@endsection