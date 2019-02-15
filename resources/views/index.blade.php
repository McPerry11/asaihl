@extends('layouts')

@section('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/index.js') }}"></script>
@if(session()->has('alert'))
<script>
  Swal.fire({
    type: "{{ session("alert")["type"] }}",
    title: "{{ session("alert")["title"] }}",
    text: "{{ session("alert")["message"] }}"
  })
</script>
@endif
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
      <small class="uk-margin-small-bottom">For payment transactions, click <a href="#" id="frontliner-header-about" uk-toggle="target: #upload-slip">here</a>.<br>
      </small>
      <small class="uk-margin-small-bottom">If you want to know more about ASAIHL, you can click <a href="http://www.feualabang.edu.ph/asaihl/#about" uk-tooltip="title: About the 2019 ASAIHL International Conference" id="frontliner-header-about">here</a>. </small>
    </div>
  </div>
</div>
<div id="upload-slip" uk-modal>
  <div class="uk-modal-dialog uk-modal-body">
      <h2 class="uk-modal-title">Upload payment slip</h2>
      <p>Upload your payment slip here. Your barcode is also needed to distinguish you from other users.</p>
      <form enctype="mulipart/form-data" method="POST" action="javascript:void(0)">
        @csrf
        <input type="text" name="barcode" placeholder="Barcode" class="uk-input uk-margin-bottom">
        Payment slip: <input type="file" name="payment_slip"><br>
        <button id="upload-slip-button" class="uk-margin-top">Upload your payment slip</button>
        <button id="paypal-button" class="uk-margin-top">Pay with PayPal</button>
      </form>
  </div>
</div>
@endsection
