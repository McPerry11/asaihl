$(() => {
  $('button#add-users-button').click(() => {
    $.ajax({
      type: 'POST',
      url: api_url + 'users', 
      data: {
        username: $('input[name="username"]').val(), 
        password: $('input[name="password"]').val()
      },
      success: response => {
        Swal.fire({
          title: 'A new user has been added!',
          type: 'success'
        })
        $('input[name="username"]').val('')
        $('input[name="password"]').val('')
      }
    })
  })
})