let compCounter = 2
$(() => {
  $('div#register-companion').hide()
  $('button#register-info-button').click(e => {
    e.preventDefault()

    $('button#register-info-button').html('<i class="fas fa-sync fa-spin"></i>')
    Swal.fire({
      type: 'question', 
      title: 'Are the information correct?', 
      text: 'Registration information are not editable upon clicking the button'
    }).then(result => {
      if (!(result.dismiss === Swal.DismissReason.backdrop || result.dismiss === Swal.DismissReason.cancel || result.dismiss === Swal.DismissReason.esc)) {
        $('div#register-info').hide('slide', { direction: 'left' }, 200)
        $('div#register-companion').show('slide', { direction: 'right' }, 200)  
      }
      $('button#register-info-button').html('Submit')
    })
  })
  $('a#register-companion-add').click(e => {
    let compTemplate = `
      <div class="uk-width-1-6"><h1>${ compCounter }</h1></div>
      <div class="uk-width-5-6 uk-margin-bottom">
        <div class="uk-margin-small">
          <input class="uk-input uk-width-1-3" placeholder="First Name" name="compFirstName[]">
          <input class="uk-input uk-width-1-3" placeholder="Last Name" name="compLastName[]">
          <input class="uk-input uk-width-1-6" placeholder="MI" name="compMiddleInitial[]">
        </div>

        <div class="uk-margin-small">
          <input class="uk-input uk-width-1-1" placeholder="Email" name="compEmail[]">
        </div>

        <div class="uk-margin-small">
          <input class="uk-input uk-width-1-1" placeholder="Contact Number" name="compContact[]">
        </div>
      </div>
      `
    $('div#register-companion-list').append(compTemplate)
    compCounter++
  })
  $('button#register-companion-button').click(e => {
    e.preventDefault()
    Swal.fire({
      title: 'You are now registered to ASAIHL International Conference 2019!',
      text: 'Please pay the participation fee. Upload your payment slip in the link provided in the index page.',
      type: 'success'
    })
  })
})