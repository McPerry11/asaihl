let verifyId = null
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

  $('a[uk-toggle="target: #confirm-verify"]').click(function(e) {
    $('span#confirm-verify-name').html($(this).data('name'))
    verifyId = $(this).data('id')
  })

  $('button#confirm-verify-button').click(() => {
    $.ajax({
      url: api_url + 'participants', 
      data: {
        profile_id: verifyId
      },
      type: 'POST',
      success: response => {
        Swal.fire({
          title: 'A registrant has been verified as participant!', 
          type: 'success'
        })
        UIkit.modal($('#confirm-verify')).hide()
      }
    })
  })
})