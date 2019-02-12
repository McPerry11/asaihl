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
        }).then(result => {
          location.reload()
        })
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
        }).then(result => {
          location.reload()          
        })
      }
    })
  })

  $('a#delete-user').click(function(e) {
    $.ajax({
      url: api_url + 'users/' + $(this).data('id'),
      type: 'DELETE',
      success: response => {
        Swal.fire({
          title: 'A registrant has been verified as participant!', 
          type: 'success'
        }).then(result => {
          location.reload()          
        })
      }
    })
  })

  $('input[name="search-registrant"]').keydown(function(e) {
    if (e.keyCode == 13) {
      window.location.href = main_url + 'admin/dashboard?r=' + $('input[name="search-registrant"]').val() + '&u=' + $('input[name="search-user"]').val()
    }
  })
})