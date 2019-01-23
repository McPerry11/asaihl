@extends('layouts')

@section('links')
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/logs.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/index.js') }}"></script>
@endsection

@section('body')
@include('admin/navbar')
<div uk-grid class="uk-grid-small">
  <div class="uk-padding uk-width-1-1">
    <h2 class="uk-margin-remove-bottom">What did the system do?</h2>
    <p class="uk-margin-remove-top">All actions that the user have done can be seen in the log list.</p>
    <span class="uk-margin-small-bottom">Recent 25 logs are being displayed in the list below.</span>
    <pre data-simplebar>
      [November 11, 2019] Sample log #1<br>
      [November 11, 2019] Sample log #2<br>
    </pre>
  </div>
</div>
@endsection
