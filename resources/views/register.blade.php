@extends('layouts')

@section('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/register.js') }}"></script>
@endsection

@section('body')
<div uk-grid>
  <div class="uk-width-1-4@m"></div>
  <div class="uk-width-1-2@m">
    <div class="uk-padding-small">
      <div class="uk-text-center"><a href="./"><img src="{{ asset('images/logo-colored.png') }}" width="200"></a></div>
      <h2 class="uk-margin-small-top uk-margin-remove-bottom">Indulge in an intellectual interchange.</h2>
      <p class="uk-margin-remove-top">Be part of the 2019 International Conference of the Association of Southeast Asian Institution of Higher Learning.</p>

      <form name="frmRegister">
        <div id="register" class="uk-padding-small" data-simplebar>
          <div id="register-info">
            <h4 class="uk-text-center">Personal Information</h4>
              <div class="uk-margin">
                Name<br>
                <input class="uk-input uk-width-1-3" placeholder="Family Name" name="last_name">
                <input class="uk-input uk-width-1-3" placeholder="Given Name" name="first_name">
                <input class="uk-input uk-width-1-6" placeholder="MI" name="middle_initial">
              </div>
              <div class="uk-margin">
                School / Affiliation<br>
                <input type="text" class="uk-input uk-width-1-1" placeholder="Name of the Institution" name="institution">
              </div>
              <div class="uk-margin">
                Email<br>
                <input type="email" class="uk-input uk-width-1-1" placeholder="Email Address" name="email_address">
              </div>
              <div class="uk-margin">
                Contact Number<br>
                <input type="text" class="uk-input uk-width-1-1" placeholder="Contact Number (insert only one)" name="contact_number">
              </div>
              <button type="button" id="register-info-button">Submit</button>
            </form>
          </div>

          <div id="register-companion">
            <h4 class="uk-text-center">Companion Management</h4>
            <div uk-grid class="uk-grid-collapse" id="register-companion-list">
              <div class="uk-width-1-6"><h1>1</h1></div>
              <div class="uk-width-5-6 uk-margin-bottom">
                <div class="uk-margin-small">
                  <input class="uk-input uk-width-1-3" placeholder="Family Name" name="comp_last_name[]">
                  <input class="uk-input uk-width-1-3" placeholder="Given Name" name="comp_first_name[]">
                  <input class="uk-input uk-width-1-6" placeholder="MI" name="comp_middle_initial[]">
                </div>

                <div class="uk-margin-small">
                  <input
                  class="uk-input uk-width-1-1" placeholder="Name of the Institution" name="comp_institution[]">
                </div>

                <div class="uk-margin-small">
                  <input class="uk-input uk-width-1-1" placeholder="Email" name="comp_email_address[]">
                </div>

                <div class="uk-margin-small">
                  <input class="uk-input uk-width-1-1" placeholder="Contact Number" name="comp_contact_number[]">
                </div>
              </div>
            </div>
            <a href="javascript:void(0)" id="register-companion-add">+ Add another companion</a><br><br>
            <button id="register-companion-button">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
