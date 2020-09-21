@extends('layouts.app')
@section('content')

  @if(\Auth::user())
    <product></product>
  @else
  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 text-center">
      <h1>Please login or register to begin</h1>
  </div>
  @endif
  
@endsection