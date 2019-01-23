@extends('layouts')

@section('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/index.js') }}"></script>
@endsection

@section('body')
<div uk-grid id="frontliner">
  <div id="frontliner-margin"></div>
  <div class="uk-width-3-4@m" id="frontliner-header">
    <div class="uk-padding">
      <img src="{{ asset('images/logo.png') }}" width="250">
      <h1 class="uk-margin-small-bottom uk-margin-small-top">
        2019 ASAIHL<br>
        International Conference
      </h1>
      <p class="uk-margin-remove-top uk-text-muted uk-text-bold">
        The time for the reconfiguration of universities for the future comes forth.<br>
        Be in part of the venue for intellectual, academic, and multidisciplinary interchanges.
      </p>
      <a class="uk-margin-top uk-margin-large-bottom" href="{{ url('register') }}" id="frontliner-header-register">Go to Registration</a><br>
      <small class="uk-margin-small-bottom">If you had paid your accounts already and had registered, upload your slip <a href="http://www.feualabang.edu.ph/asaihl/#about" id="frontliner-header-about">here</a>.<br>
      </small>
      <small class="uk-margin-small-bottom">If you want to know more about ASAIHL, you can click <a href="http://www.feualabang.edu.ph/asaihl/#about" uk-tooltip="title: About the 2019 ASAIHL International Conference" id="frontliner-header-about">here</a>. </small>
    </div>
  </div>
</div>
@endsection
