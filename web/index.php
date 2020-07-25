<!DOCTYPE html>
<html>

<head>
  <title>QR CODE Generate</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='/css/libs/tailwind.min.css'>
  <script type='text/javascript' src='/js/libs/jquery.min.js'></script>
</head>

<body>
  <div class='header'>

  </div>
  <div class='content flex w-100 h-100'>
    <div class='w-3/5 mx-auto mt-10'>
      <div id='qrcode-title'></div>
      <div class='mx-10'>
        <div class='flex mb-3'>
          <div class='qr-type-radios hover:bg-blue-100 active relative'>
            <label class='inline-flex items-center cursor-pointer px-3 py-1'>
              <input type='radio' class='form-radio opacity-0' name='qr-type' value='url' checked>
              <span class='ml-2'>
                <i class='fa fa-link absolute' style='top: 0.5rem; left: 0.5rem'></i>URL
              </span>
            </label>
          </div>
          <div class='qr-type-radios hover:bg-blue-100 relative'>
            <label class='inline-flex items-center cursor-pointer px-3 py-1'>
              <input type='radio' class='form-radio opacity-0' name='qr-type' value='text'>
              <span class='ml-2'>
                <i class='fa fa-align-left absolute' style='top: 0.5rem; left: 0.5rem'></i>Text
              </span>
            </label>
          </div>
          <div class='qr-type-radios hover:bg-blue-100 relative'>
            <label class='inline-flex items-center cursor-pointer px-3 py-1'>
              <input type='radio' class='form-radio opacity-0' name='qr-type' value='phone'>
              <span class='ml-2'>
                <i class='fa fa-phone absolute' style='top: 0.5rem; left: 0.5rem'></i>Phone
              </span>
            </label>
          </div>
          <div class='qr-type-radios hover:bg-blue-100 relative'>
            <label class='inline-flex items-center cursor-pointer px-3 py-1'>
              <input type='radio' class='form-radio opacity-0' name='qr-type' value='sms'>
              <span class='ml-2'>
                <i class='fa fa-sms absolute' style='top: 0.5rem; left: 0.5rem'></i>SMS
              </span>
            </label>
          </div>
          <div class='qr-type-radios hover:bg-blue-100 relative'>
            <label class='inline-flex items-center cursor-pointer px-3 py-1'>
              <input type='radio' class='form-radio opacity-0' name='qr-type' value='email'>
              <span class='ml-2'>
                <i class='fa fa-envelope absolute' style='top: 0.5rem; left: 0.5rem'></i>Email
              </span>
            </label>
          </div>
          <div class='qr-type-radios hover:bg-blue-100 relative'>
            <label class='inline-flex items-center cursor-pointer px-3 py-1'>
              <input type='radio' class='form-radio opacity-0' name='qr-type' value='card'>
              <span class='ml-2'>
                <i class='fa fa-id-card absolute' style='top: 0.5rem; left: 0.5rem'></i>Card
              </span>
            </label>
          </div>
        </div>
        <textarea id='qrcode-text' class='w-full bg-gray-200 resize-y rounded-lg focus:outline-none focus:shadow-outline h-24 mb-3 p-3 qrcode-input-form' value='' placeholder='http://example.com'></textarea>
        <div id='qrcode-email-form' class='hidden qrcode-input-form mb-3'>
          <div class='w-full inline-flex my-2 p-1'>
            <div class='w-1/5 leading-10'>Email:</div>
            <input name='email' class='w-4/5 bg-gray-200 h-10 rounded-lg p-3'  placeholder='example@email.com'>
          </div>
          <div class='w-full inline-flex my-2 p-1'>
            <div class='w-1/5 leading-10'>Subject:</div>
            <input name='subject' class='w-4/5 bg-gray-200 h-10 rounded-lg p-3' placeholder='Greeting!'>
          </div>
          <div class='w-full inline-flex my-2 p-1'>
            <div class='w-1/5 leading-10'>Body:</div>
            <textarea name='body' class='w-4/5 bg-gray-200 resize-y h-24 rounded-lg p-3' placeholder='Today, I write this email to inform'></textarea>
          </div>
        </div>
        <div id='qrcode-card-form' class='qrcode-input-form'>

        </div>
        <div id='input-error' class='text-red-500 hidden'>Phone number invalid!</div>
        <button id='btn-create-qr' class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
          <i class="fas fa-plus"></i>
          <span class='ml-2'>Create QR</span>
        </button>
        <button id='btn_save_qr' class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
          <i class="fas fa-download"></i>
          <span class='ml-2'>Download</span>
        </button>
      </div>
    </div>
    <div id='qrcode-img' class='w-2/5 center flex'>
      <img src='<?php
        include('./render_qr_code.php');
        render_qr_code('url', 'http://localhost:3000/');
      ?>'/>
    </div>
  </div>
  <div class='footer'>

  </div>

  <script>
    var qrcode_type = 'url';
    $('.qr-type-radios').click((e) => {
      $('.qrcode-input-form').hide();
      var qr_type_ele = $(e.target).parent().find("input[name='qr-type']");
      qrcode_type = qr_type_ele.val();
      switch(qrcode_type) {
        case 'email':
          $('#qrcode-email-form').show();
          break;
        case 'card':
          $('#qrcode-card-form').show();
          break;
        default:
          $('#qrcode-text').show();
          $('#qrcode-text').val('');
      }
    });
    $('#btn-create-qr').click(function() {
      switch(qrcode_type) {
        case 'email':
          data = {
            'email': $("#qrcode-email-form *[name='email']").val(),
            'subject': $("#qrcode-email-form *[name='subject']").val(),
            'body': $("#qrcode-email-form *[name='body']").val()
          }
          break;
        case 'card':
          data = {

          }
          break;
        default:
          data = $('#qrcode-text').val();
      }
      $.ajax({
        method: 'POST',
        url: 'render_qr_code.php',
        data: {
          'type': qrcode_type,
          'data': data
        },
      })
      .done(function(result) {
        $('#qrcode-img img').attr('src', result + '?' + new Date().getTime());
      })
      .fail(function(error) {
      })
      .always(function() {
      })
    })
    $('.qr-type-radios').click(function(e) {
      e.preventDefault();
      $('.qr-type-radios').removeClass('active');
      $(this).addClass('active');
    });
  </script>
  <style>
    #qrcode-img img {
      margin: auto;
      display: flex;
      width: 300px;
      height: 300px;
    }
    .qr-type-radios.active {
      background: #e2e8f0;
    }
  </style>
  <link rel='stylesheet' href='/css/libs/fontawesome.min.css'>
</body>
</html>