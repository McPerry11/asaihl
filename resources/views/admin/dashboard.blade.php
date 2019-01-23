@extends('layouts')

@section('links')
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
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
              @foreach($registrants as $registrant)
                <tr>
                  <td>
                    <span class="uk-float-right actions">
                      <a href="#"><i class="far fa-check-square"></i></a>
                      <a href="#"><i class="fas fa-file-invoice-dollar"></i></a>
                    </span>
                    {{ $registrant->first_name }} {{ $registrant->middle_initial }} {{ $registrant->last_name }}<br>
                    <small class="uk-text-muted">
                      {{ $registrant->email_address }}<br>
                      {{ $registrant->contact_number }}
                    </small>
                  </td>
                </tr>
              @endforeach
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
      <div class="uk-margin-bottom total">Total Users: {{ $users->count() }}<span class="uk-float-right"><a href="#" uk-toggle="target: #add-users"><i class="fas fa-plus"></i><span class="uk-visible@m"> Add a user</span></a></span></div>


      <div class="uk-card uk-card-default">
        <div class="uk-padding-small">
          <input type="text" name="search-user" class="uk-input" placeholder="Search users...">
        </div>
        <div id="profile-table" data-simplebar>
          <table class="uk-table uk-table-default uk-margin-remove-bottom">
            <tbody id="profile-table-rows">
              @foreach($users as $user)
                <tr>
                  <td>
                    <span class="uk-float-right actions">
                      <a href="#"><i class="fas fa-times"></i></a>
                    </span>
                    {{ $user->username }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div id="add-users" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Add user</h2>
        <p>Fill in the information below to add a new user.</p>
        <input type="text" name="username" placeholder="Username" class="uk-input uk-margin-bottom">
        <input type="password" name="password" placeholder="Password" class="uk-input uk-margin-bottom">
        <button id="add-users-button">Sign new user</button>
    </div>
  </div>
</div>
@endsection