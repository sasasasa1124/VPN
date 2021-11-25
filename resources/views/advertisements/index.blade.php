@extends('layouts.app')
@section('content')
<div class="container">
    {{-- @foreach($advertisements as $advertisement)
        <div class="card">
            <div class="card-header">
                <div class="card-title"><h5><a  href="/profiles/{{ $advertisement->user->id }}">{{ $advertisement->user->name }}</a></h5></div>
                <h5><label>Language:<label> <span class="badge badge-pill badge-primary">{{ $advertisement->communicationLanguage }}</span></h5>
                <div class="card-text">{{ $advertisement->updated_at }}</div>
            </div>
            <div class="card-body">
                <div class="card-text">{{ $advertisement->body }}</div>
                
            </div>
        </div>
    @endforeach --}}
    <advertisement-index
        v-bind:csrf=" {{ json_encode(csrf_token()) }}"
        ></advertisement-index>
    <create-button></create-button>
</div>
@endsection