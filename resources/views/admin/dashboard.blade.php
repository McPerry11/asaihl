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
      <span class="uk-margin-bottom total">Total Registrants: {{ \App\Registrant::all()->count() }}</span>

      <div class="uk-card uk-card-default uk-margin-remove-bottom">
        <div class="uk-padding-small">
          <input type="text" name="search-registrant" class="uk-input" placeholder="Search registrant...">
        </div>
        <div id="profile-table" data-simplebar>
          <table class="uk-table uk-table-default uk-margin-remove-bottom">
            <tbody>
              @foreach($registrants as $registrant)
                <tr>
                  <td>
                    <span class="uk-float-right actions">
                      @if(\App\Participant::where('profile_id', $registrant->profile->id)->count() <= 0) 
                        <a href="#" data-name="{{ $registrant->profile->first_name }} {{ $registrant->profile->middle_initial }}. {{ $registrant->profile->last_name }}" data-id="{{ $registrant->profile->id }}" uk-toggle="target: #confirm-verify"><i class="far fa-check-square"></i></a>
                      @endif
                    </span>
                    {{ $registrant->profile->first_name }} {{ $registrant->profile->middle_initial }}. {{ $registrant->profile->last_name }}
                    @if(\App\Participant::where('profile_id', $registrant->profile->id)->count() > 0) 
                      (Participant)
                    @endif
                    <br>
                    <small class="uk-text-muted">
                      {{ $registrant->profile->email_address }}<br>
                      {{ $registrant->profile->contact_number }}
                    </small><br>
                    <small>
                      @if(\Illuminate\Support\Facades\File::exists(public_path() . '/uploads/' . $registrant->profile->barcode))
                        Payment slips:
                        @foreach(\Illuminate\Support\Facades\File::files(public_path() . '/uploads/' . $registrant->profile->barcode) as $file)
                          <a href="{{ substr($file, stripos($file, 'public')) }}" target="_blank" class="uk-margin-small-left">{{ substr($file, stripos($file, $registrant->profile->barcode)) }}</a>
                        @endforeach
                      @endif
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
                    <!-- <span class="uk-float-right actions">
                      <a href="#"><i class="fas fa-times"></i></a>
                    </span> -->
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
</div>
<div id="add-users" uk-modal>
  <div class="uk-modal-dialog uk-modal-body">
      <h2 class="uk-modal-title">Add user</h2>
      <p>Fill in the information below to add a new user.</p>
      <input type="text" name="username" placeholder="Username" class="uk-input uk-margin-bottom">
      <input type="password" name="password" placeholder="Password" class="uk-input uk-margin-bottom">
      <button class="classic" id="add-users-button">Sign new user</button>
  </div>
</div>
<div id="confirm-verify" uk-modal>
  <div class="uk-modal-dialog uk-modal-body">
      <h2 class="uk-modal-title">Confirm verification</h2>
      <p>Are you sure you want to register <span id="confirm-verify-name"></span>?</p>
      <button class="classic uk-margin-small-right" id="confirm-verify-button">Yes, register as participant</button>
      <button class="danger" id="reject-verify-button">No, continue browsing</button>
  </div>
</div>
@endsection