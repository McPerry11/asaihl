$(() => {
  $('div#register-companion').hide()
  $('button#register-info-button').click(e => {
    e.preventDefault()
    $('div#register-info').hide('slide', { direction: 'left' }, 200)
    $('div#register-companion').show('slide', { direction: 'right' }, 200)
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