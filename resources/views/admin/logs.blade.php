<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ASAIHL International Conference</title>
  @include('links')
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/logs.css') }}">
</head>
<body>
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
  @include('scripts')
</body>
</html>