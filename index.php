<!DOCTYPE html>
<html>

<head>
  <title>QR CODE Generate</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='/public/css/bootstrap.min.css'>
  <script src='/public/js/jquery-3.5.1.min.js'></script>
  <script src='/public/js/bootstrap.min.js'></script>
  <link rel='stylesheet' href='/public/css/main.css'>
</head>

<body>
  <div class='container'>
    <div class='form-group'>
      <h1>QR Code generate link</h1>
    </div>
    <div class='form-group'>
      <img src='' id='qr-code-image'>
    </div>
    <div class='form-group'>
      <input type='text' id='qr-link'/>
    </div>
    <div class='form-group'>
      <button type='button' class='btn btn-primary' id='btn-get-qr-image'>
        Get QR Image
      </button>
    </div>
  </div>

  <?php

  ?>

  <script>
    $('#btn-get-qr-image').click(function() {
      $.ajax({
        method: 'POST',
        url: 'qr_address_generate.php',
        data: {url: $('#qr-link').val()},
      })
      .done(function(result) {
        $('#qr-code-image').attr('src','data:image/png;base64, ' + result);
      })
      .fail(function(error) {
        console.log(error)
      })
      .always(function() {
      })
    })
  </script>
</body>
</html>