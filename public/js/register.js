let compCounter = 2
$(() => {
  Swal.fire({
    icon: 'info', 
    title: 'Privacy Notice', 
    text: 'The event organizers collected information from you as participants for the purposes of registration and overall event management. By providing your information, you are giving your consent to us to use you information for the aforementioned purposes.\n\nAfter conclusion of the event and completion of all necessary reports, your personal data will be saved in secure files for future reference and networking activities.\n\nIf you do not wish to be contacted further after this event, kindly inform the organizers.'
  })

  $('div#register-companion').hide()
  $('button#register-info-button').click(e => {
    e.preventDefault()

    $('button#register-info-button').html('<i class="fas fa-sync fa-spin"></i>')
    Swal.fire({
      type: 'question',
      title: 'Are the information correct?',
      text: 'Registration information are not editable upon clicking the button'
    }).then(result => {
      if (
        !(
          result.dismiss === Swal.DismissReason.backdrop ||
          result.dismiss === Swal.DismissReason.cancel ||
          result.dismiss === Swal.DismissReason.esc
        )
      ) {
        $('div#register-info').hide('slide', { direction: 'left' }, 200)
        $('div#register-companion').show('slide', { direction: 'right' }, 200)
      }
      $('button#register-info-button').html('Submit')
    })
  })
  $('a#register-companion-add').click(e => {
    let compTemplate = `
      <div class="uk-width-1-6"><h1>${compCounter}</h1></div>
      <div class="uk-width-5-6 uk-margin-bottom">
        <div class="uk-margin-small">
          <input class="uk-input uk-width-1-3" placeholder="First Name" name="comp_first_name[]">
          <input class="uk-input uk-width-1-3" placeholder="Last Name" name="comp_last_name[]">
          <input class="uk-input uk-width-1-6" placeholder="MI" name="comp_middle_initial[]">
        </div>

        <div class="uk-margin-small">
          <input class="uk-input uk-width-1-1" placeholder="Email" name="comp_email_address[]">
        </div>

        <div class="uk-margin-small">
          <input class="uk-input uk-width-1-1" placeholder="Contact Number" name="comp_contact_number[]">
        </div>
      </div>
      `
    $('div#register-companion-list').append(compTemplate)
    compCounter++
  })

  // $('button#register-companion-button').click(e => {
  //   e.preventDefault()
  // })

  $("form[name='frmRegister']").submit(function(e) {
    e.preventDefault()

    if (!$('button#register-companion-button').hasClass('disabled')) {
      $('button#register-companion-button').html('<i class="fas fa-sync fa-spin"></i>')
      $('button#register-companion-button').addClass('disabled')
      $.ajax({
        type: 'POST',
        url: api_url + 'registrants',
        data: $(this).serialize(),
        success: response => {
          $('button#register-companion-button').html('Submit')
          $('button#register-companion-button').removeClass('disabled')
          Swal.fire({
            title: 'You are now registered to ASAIHL International Conference 2019!',
            html: 'Remember your barcode. Upload your payment slip in the link provided in the index page.<br><br>Barcode: <b>' + response.barcode + '</b>',
            type: 'success'
          })
        }, 
        error: response => {
          $('button#register-companion-button').html('Submit')
          $('button#register-companion-button').removeClass('disabled')
          Swal.fire({
            title: 'Something happened while submitting your form',
            type: 'error'
          })
        }
      })
    }
  })
})
