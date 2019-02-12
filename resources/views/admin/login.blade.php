@extends('layouts')

@section('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/login.js') }}"></script>
@endsection

@section('body')
<div uk-grid id="frontliner">
  <div id="frontliner-margin"></div>
  <div class="uk-width-3-4@m" id="frontliner-header">
    <div class="uk-padding">
      <img src="{{ asset('images/logo.png') }}" width="250">
      <h1 class="uk-margin-small-bottom uk-margin-small-top">
        2019 ASAIHL<br>
        Control Panel
      </h1>
      <p class="uk-margin-remove-top uk-text-muted">
        Manage and monitor the participants of the event in this control panel.
      </p>
      <form method="post">
        @csrf
        <div class="uk-margin">
          <input type="text" class="uk-input uk-width-1-2@m" placeholder="Username" name="username">
        </div>
        <div class="uk-margin">
          <input type="password" class="uk-input uk-width-1-2@m" placeholder="Password" name="password">
        </div>
        <button class="uk-margin-top uk-margin-large-bottom" id="frontliner-header-register">Sign In</button>
      </form>
    </div>
  </div>
</div>
@endsection
