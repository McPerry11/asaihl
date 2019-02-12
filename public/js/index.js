window.Swal = Swal.mixin({
  heightAuto: false
})

const base_url = $('base').attr('href')

$(() => {
  $('button#upload-slip-button').click(e => {
    e.preventDefault()

    let barcode = $('input[name="barcode"]').val()

    if (barcode.length != 10) {
      return Swal.fire({
        title: 'Warning',
        text: 'Invalid Barcode.',
        type: 'warning'
      })
    }

    let data = new FormData()
    data.append('payment_slip', $('input[name="payment_slip"]')[0].files[0])
    data.append('barcode', barcode)

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

  $('button#paypal-button').click(() => {
    let barcode = $('input[name="barcode"]').val()

    if (barcode.length != 10) {
      return Swal.fire({
        title: 'Warning',
        text: 'Invalid Barcode.',
        type: 'warning'
      })
    }

    location.href = base_url + '/payment/generate?id=' + $('input[name="barcode"]').val()
  })
})
