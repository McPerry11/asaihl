$(() => {
  $('div#frontliner-header').hide()
  $('div#frontliner-header').fadeIn(1000)
  $('button#upload-slip-button').click(e => {
    e.preventDefault()

    let data = new FormData()
    data.append('payment_slip', $('input[name="payment_slip"]')[0].files[0])
    data.append('barcode', $('input[name="barcode"]').val())

    $.ajax({
      url: api_url + 'payments',
      type: 'POST', 
      data: data, 
      cache: false, 
      contentType: false, 
      processData: false,
      success: response => {
        Swal.fire({
          title: 'Your payment slip is successfully uploaded!', 
          text: 'Please wait for a message regarding your participation in the event.',
          type: 'success'
        }).then(result => {
          $('input[name="barcode"]').val('')
          UIkit.modal($('#upload-slip')).hide()
        })
      }
    })
  })
})