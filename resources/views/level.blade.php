@extends('layout')

@section('main')
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'info') }}">{{ Session::get('message') }}</p>
@endif

@include('levels/' . $level)

<div class="question {{ $cssClass }}">{{ $question }}</div>

<form method="POST" action="/level/{{ $level }}/solve">
@csrf
<input type="hidden" name="level" value="{{ $level }}" />
<input type="hidden" name="challenge" value="{{ $challenge }}" />
<input type="text" name="solution" autocomplete="off" />
<input class="button" type="submit" value="Submit" />
</form>
@endsection

@section('status')
<div class="status">
    <div class="level">ANIMALS: {{ $level - 1 }} / 5</div>
    <div class="result">
         @if(Session::has('result'))
            @if(Session::get('result'))
            STATUS: <span class="success">OK</span>
            @else
            STATUS: <span class="error">ERROR</span>
            @endif
        @else
            STATUS: <span class="info">PENDING</span>
        @endif
    </div>

</div>
@endsection
