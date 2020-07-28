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
  <div class='header flex justify-between p-3 shadow-lg sticky inset-x-0 top-0 left-0 bg-white z-10'>
    <div class='logo flex'>
      <img src='/images/logo.png' class='h-10' />
      <span class='leading-10 font-bold'>QR Code Generator</span>
    </div>
    <div class='menu-bar flex'>
      <a href='#' class='leading-10 text-blue-500 font-bold mx-3'>QR Generator</a>
      <a href='#' class='leading-10 font-bold mx-3'>QR Scanner</a>
      <a href='#' class='mx-3 text-center block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white cursor-pointer'>Try it free</a>
    </div>
  </div>
  <div class='content w-100 h-100'>
    <div class='introduction text-center mt-16'>
      <h1 class='text-5xl font-boldm'>
        QR Code Generator
      </h1>
      <h3 class='text-xl font-boldm'>
        Easily make a QR code for you
      </h3>
    </div>
    <div class='qr-type-section mt-20'>
      <div class='flex mb-3 w-3/5 ml-10'>
        <div class='qr-type-radios hover:bg-blue-100 active relative rounded-md select-none'>
          <label class='inline-flex items-center cursor-pointer px-3 py-1'>
            <input type='radio' class='form-radio opacity-0' name='qr-type' value='url' checked>
            <span class='ml-2'>
              <i class='fa fa-link absolute' style='top: 0.5rem; left: 0.5rem'></i>URL
            </span>
          </label>
        </div>
        <div class='qr-type-radios hover:bg-blue-100 relative rounded-md select-none'>
          <label class='inline-flex items-center cursor-pointer px-3 py-1'>
            <input type='radio' class='form-radio opacity-0' name='qr-type' value='text'>
            <span class='ml-2'>
              <i class='fa fa-align-left absolute' style='top: 0.5rem; left: 0.5rem'></i>Text
            </span>
          </label>
        </div>
        <div class='qr-type-radios hover:bg-blue-100 relative rounded-md select-none'>
          <label class='inline-flex items-center cursor-pointer px-3 py-1'>
            <input type='radio' class='form-radio opacity-0' name='qr-type' value='phone'>
            <span class='ml-2'>
              <i class='fa fa-phone absolute' style='top: 0.5rem; left: 0.5rem'></i>Phone
            </span>
          </label>
        </div>
        <div class='qr-type-radios hover:bg-blue-100 relative rounded-md select-none'>
          <label class='inline-flex items-center cursor-pointer px-3 py-1'>
            <input type='radio' class='form-radio opacity-0' name='qr-type' value='sms'>
            <span class='ml-2'>
              <i class='fa fa-sms absolute' style='top: 0.5rem; left: 0.5rem'></i>SMS
            </span>
          </label>
        </div>
        <div class='qr-type-radios hover:bg-blue-100 relative rounded-md select-none'>
          <label class='inline-flex items-center cursor-pointer px-3 py-1'>
            <input type='radio' class='form-radio opacity-0' name='qr-type' value='email'>
            <span class='ml-2'>
              <i class='fa fa-envelope absolute' style='top: 0.5rem; left: 0.5rem'></i>Email
            </span>
          </label>
        </div>
        <div class='qr-type-radios hover:bg-blue-100 relative rounded-md select-none'>
          <label class='inline-flex items-center cursor-pointer px-3 py-1'>
            <input type='radio' class='form-radio opacity-0' name='qr-type' value='business_card'>
            <span class='ml-2'>
              <i class='fa fa-id-card absolute' style='top: 0.5rem; left: 0.5rem'></i>Card
            </span>
          </label>
        </div>
      </div>
      <div class='w-2/5 center flex'>
      </div>
    </div>
    <div class='qr-content-section flex m-10 rounded-lg shadow-2xl p-10 mt-0'>
      <div class='w-3/5'>
        <div id='qrcode-title'></div>
        <div>
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
          <div id='qrcode-card-form' class='hidden qrcode-input-form mb-3'>
            <div class='w-full inline-flex my-2 p-1'>
              <div class='w-1/5 leading-10'>Full Name:</div>
              <input name='full_name' class='w-4/5 bg-gray-200 h-10 rounded-lg p-3'  placeholder='Phuc Trinh'>
            </div>
            <div class='w-full inline-flex my-2 p-1'>
              <div class='w-1/5 leading-10'>Email:</div>
              <input name='email' class='w-4/5 bg-gray-200 h-10 rounded-lg p-3'  placeholder='example@email.com'>
            </div>
            <div class='w-full inline-flex my-2 p-1'>
              <div class='w-1/5 leading-10'>Phone:</div>
            </div>
            <div class='w-full inline-flex my-2 p-1'>
              <div class='w-1/5 leading-10'>Work Phone:</div>
              <input name='work_phone' class='w-4/5 bg-gray-200 h-10 rounded-lg p-3'  placeholder='0963*******'>
            </div>
            <div class='w-full inline-flex my-2 p-1'>
              <div class='w-1/5 leading-10'>Private Phone:</div>
              <input name='private_phone' class='w-4/5 bg-gray-200 h-10 rounded-lg p-3'  placeholder='0963*******'>
            </div>
            <div class='w-full inline-flex my-2 p-1'>
              <div class='w-1/5 leading-10'>Cell Phone:</div>
              <input name='phone_cell' class='w-4/5 bg-gray-200 h-10 rounded-lg p-3'  placeholder='0963*******'>
            </div>
            <div class='w-full inline-flex my-2 p-1'>
              <div class='w-1/5 leading-10'>Address:</div>
            </div>
            <div class='w-full inline-flex my-2 p-1'>
              <div class='w-1/5 leading-10'>Label:</div>
              <input name='address_label' class='w-4/5 bg-gray-200 h-10 rounded-lg p-3'  placeholder='Our Office'>
            </div>
            <div class='w-full inline-flex my-2 p-1'>
              <div class='w-1/5 leading-10'>Street:</div>
              <input name='address_street' class='w-4/5 bg-gray-200 h-10 rounded-lg p-3'  placeholder='Nam Ki Khoi Nghia'>
            </div>
            <div class='w-full inline-flex my-2 p-1'>
              <div class='w-1/5 leading-10'>Town:</div>
              <input name='address_town' class='w-4/5 bg-gray-200 h-10 rounded-lg p-3'  placeholder='District 1'>
            </div>
            <div class='w-full inline-flex my-2 p-1'>
              <div class='w-1/5 leading-10'>Region:</div>
              <input name='address_region' class='w-4/5 bg-gray-200 h-10 rounded-lg p-3'  placeholder='Ho Chi Minh'>
            </div>
            <div class='w-full inline-flex my-2 p-1'>
              <div class='w-1/5 leading-10'>Postcode:</div>
              <input name='address_postcode' class='w-4/5 bg-gray-200 h-10 rounded-lg p-3'  placeholder='700000'>
            </div>
            <div class='w-full inline-flex my-2 p-1'>
              <div class='w-1/5 leading-10'>Country:</div>
              <input name='address_country' class='w-4/5 bg-gray-200 h-10 rounded-lg p-3'  placeholder='Viet Nam'>
            </div>
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
        case 'business_card':
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
        case 'business_card':
          data = {
            'type': 'detailed',
            'full_name': $("#qrcode-card-form input[name='full_name']").val(),
            'work_phone': $("#qrcode-card-form input[name='work_phone']").val(),
            'private_phone': $("#qrcode-card-form input[name='private_phone']").val(),
            'phone_cell': $("#qrcode-card-form input[name='phone_cell']").val(),
            'company': $("#qrcode-card-form input[name='company']").val(),
            'email': $("#qrcode-card-form input[name='email']").val(),
            'address_label': $("#qrcode-card-form input[name='address_label']").val(),
            'address_ext': $("#qrcode-card-form input[name='address_ext']").val(),
            'address_street': $("#qrcode-card-form input[name='address_street']").val(),
            'address_town': $("#qrcode-card-form input[name='address_town']").val(),
            'address_region': $("#qrcode-card-form input[name='address_region']").val(),
            'address_postcode': $("#qrcode-card-form input[name='address_postcode']").val(),
            'address_country': $("#qrcode-card-form input[name='address_country']").val()
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
      margin-left: auto;
      margin-right: auto;
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