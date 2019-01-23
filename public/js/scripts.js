$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})

const main_url = $('base').attr('href') + '/'
const api_url = main_url + 'api/'
