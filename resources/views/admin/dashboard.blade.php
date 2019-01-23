@extends('layouts')

@section('links')
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('body')
@include('admin/navbar')
<div uk-grid class="uk-grid-small">
  <div class="uk-width-1-2@m">
    <div id="profile" class="uk-padding">
      <h2 class="uk-margin-remove-bottom">Manage Profiles</h2>
      <p class="uk-margin-remove-top">
        People who registered for the event should appear here.<br>
        Verify them as participants if they have paid the full amount already.
      </p>
      <span class="uk-margin-bottom total">Total Registrants: 100</span>

      <div class="uk-card uk-card-default uk-margin-remove-bottom">
        <div class="uk-padding-small">
          <input type="text" name="search-registrant" class="uk-input" placeholder="Search registrant...">
        </div>
        <div id="profile-table" data-simplebar>
          <table class="uk-table uk-table-default">
            <tbody>
              <tr>
                <td>
                  <span class="uk-float-right actions">
                    <a href="#"><i class="far fa-check-square"></i></a>
                    <a href="#"><i class="fas fa-file-invoice-dollar"></i></a>
                  </span>
                  Participant #1<br>
                  <small class="uk-text-muted">
                    clivefuentebella@gmail.com<br>
                    09989532547
                  </small>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="uk-float-right actions">
                    <a href="#"><i class="far fa-check-square"></i></a>
                    <a href="#"><i class="fas fa-file-invoice-dollar"></i></a>
                  </span>
                  Participant #1<br>
                  <small class="uk-text-muted">
                    clivefuentebella@gmail.com<br>
                    09989532547
                  </small>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="uk-float-right actions">
                    <a href="#"><i class="far fa-check-square"></i></a>
                    <a href="#"><i class="fas fa-file-invoice-dollar"></i></a>
                  </span>
                  Participant #1<br>
                  <small class="uk-text-muted">
                    clivefuentebella@gmail.com<br>
                    09989532547
                  </small>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="uk-float-right actions">
                    <a href="#"><i class="far fa-check-square"></i></a>
                    <a href="#"><i class="fas fa-file-invoice-dollar"></i></a>
                  </span>
                  Participant #1<br>
                  <small class="uk-text-muted">
                    clivefuentebella@gmail.com<br>
                    09989532547
                  </small>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="uk-width-1-2@m">
    <div id="profile" class="uk-padding">
      <h2 class="uk-margin-remove-bottom">Manage Users</h2>
      <p class="uk-margin-remove-top">
        Allowed users should appear here.<br>
        Be mindful in registering new users to the system.
      </p>
      <span class="uk-margin-bottom total">Total Users: 2</span>

      <div class="uk-card uk-card-default">
        <div class="uk-padding-small">
          <input type="text" name="search-user" class="uk-input" placeholder="Search users...">
        </div>
        <div id="profile-table" data-simplebar>
          <table class="uk-table uk-table-default uk-margin-remove-bottom">
            <tbody>
              <tr>
                <td>
                  <span class="uk-float-right actions">
                    <a href="#"><i class="fas fa-times"></i></a>
                  </span>
                  User #1<br>
                  <small class="uk-text-muted">clivefuentebella</small>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="uk-float-right actions">
                    <a href="#"><i class="fas fa-times"></i></a>
                  </span>
                  User #2<br>
                  <small class="uk-text-muted">clivefuentebella</small>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
