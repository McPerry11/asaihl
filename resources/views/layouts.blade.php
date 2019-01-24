<!DOCTYPE html>
<html>
<head>
  <base href="{{ url('/') }}">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>ASAIHL International Conference</title>

  <link href="https://fonts.googleapis.com/css?family=Questrial|Quicksand|Ubuntu+Mono" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/css/uikit.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />
  <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
  @yield('links')
</head>
<body>
  @yield('body')

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/js/uikit.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/js/uikit-icons.min.js"></script>
  <script src="https://unpkg.com/simplebar@latest/dist/simplebar.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.1/dist/sweetalert2.all.min.js"></script>
  <script src="{{ asset('js/scripts.js') }}" type="text/javascript" charset="utf-8"></script>
  @yield('scripts')
</body>
</html>
