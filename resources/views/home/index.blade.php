<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>QR Code Generate</title>

  <link href="{{ asset('css/app.css') }}" rel='stylesheet'>
  <script type='text/javascript' src='/js/libs/jquery.min.js'></script>
</head>
<body class='mb-20'>
  <nav class='header flex items-center justify-between flex-wrap bg-white p-6 shadow-lg sticky inset-x-0 top-0 left-0 z-10'>
    <div class='logo flex'>
      <img src='/images/logo.png' class='h-10' />
      <span class='leading-10 font-bold'>QR Code Generator</span>
    </div>
    <div>
      <div class='block lg:hidden'>
        <button class='btn-menu-item flex items-center px-3 py-2 border rounded text-black border-white hover:border-black ml-auto'>
        <i class='fas fa-bars'></i>
        </button>
      </div>
      <div class='nav-menu-item hidden lg:block lg:show text-sm'>
        <a href='#' class='block mt-4 lg:inline-block lg:mt-0 hover:text-blue-200 mr-4 leading-10 text-blue-500 font-bold'>
          QR Code Generator
        </a>
        <a href='#' class='block mt-4 lg:inline-block lg:mt-0 hover:text-blue-200 mr-4 leading-10 text-blue-500 font-bold'>
          QR Scanner
        </a>
      </div>
    </div>
  </nav>
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
      <div class='flex mb-3 sm:w-3/5 ml-4'>
        <div class='qr-type-radios hover:bg-blue-100 active relative rounded-md select-none'>
          <label class='inline-flex items-center cursor-pointer sm:px-3 py-1'>
            <input type='radio' class='form-radio opacity-0' name='qr-type' value='url' checked>
            <span class='sm:ml-2'>
              <i class='fa fa-link absolute' style='top: 0.5rem; left: 0.5rem'></i>
              <span class='invisible sm:visible'>URL</span>
            </span>
          </label>
        </div>
        <div class='qr-type-radios hover:bg-blue-100 relative rounded-md select-none'>
          <label class='inline-flex items-center cursor-pointer sm:px-3 py-1'>
            <input type='radio' class='form-radio opacity-0' name='qr-type' value='text'>
            <span class='sm:ml-2'>
              <i class='fa fa-align-left absolute' style='top: 0.5rem; left: 0.5rem'></i>
              <span class='invisible sm:visible'>Text</span>
            </span>
          </label>
        </div>
        <div class='qr-type-radios hover:bg-blue-100 relative rounded-md select-none'>
          <label class='inline-flex items-center cursor-pointer sm:px-3 py-1'>
            <input type='radio' class='form-radio opacity-0' name='qr-type' value='phone'>
            <span class='sm:ml-2'>
              <i class='fa fa-phone absolute' style='top: 0.5rem; left: 0.5rem'></i>
              <span class='invisible sm:visible'>Phone</span>
            </span>
          </label>
        </div>
        <div class='qr-type-radios hover:bg-blue-100 relative rounded-md select-none'>
          <label class='inline-flex items-center cursor-pointer sm:px-3 py-1'>
            <input type='radio' class='form-radio opacity-0' name='qr-type' value='sms'>
            <span class='sm:ml-2'>
              <i class='fa fa-sms absolute' style='top: 0.5rem; left: 0.5rem'></i>
              <span class='invisible sm:visible'>SMS</span>
            </span>
          </label>
        </div>
        <div class='qr-type-radios hover:bg-blue-100 relative rounded-md select-none'>
          <label class='inline-flex items-center cursor-pointer sm:px-3 py-1'>
            <input type='radio' class='form-radio opacity-0' name='qr-type' value='email'>
            <span class='sm:ml-2'>
              <i class='fa fa-envelope absolute' style='top: 0.5rem; left: 0.5rem'></i>
              <span class='invisible sm:visible'>Email</span>
            </span>
          </label>
        </div>
        <div class='qr-type-radios hover:bg-blue-100 relative rounded-md select-none'>
          <label class='inline-flex items-center cursor-pointer sm:px-3 py-1'>
            <input type='radio' class='form-radio opacity-0' name='qr-type' value='business_card'>
            <span class='sm:ml-2'>
              <i class='fa fa-id-card absolute' style='top: 0.5rem; left: 0.5rem'></i>
              <span class='invisible sm:visible'>Card</span>
            </span>
          </label>
        </div>
      </div>
      <div class='w-2/5 center flex'>
      </div>
    </div>
    <div class='qr-content-section md:flex lg:m-10 lg:p-10 m-3 mt-0 p-3 rounded-lg shadow-2xl sm:m-5 sm:p-5'>
      <div class='md:w-3/5'>
        <textarea id='qrcode-text' class='w-full bg-gray-200 resize-y rounded-lg focus:outline-none focus:shadow-outline h-24 mb-3 p-3 qrcode-input-form' placeholder='https://www.facebook.com/'>https://www.facebook.com/</textarea>
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
        <div id='qr-colors-section'>
          <div class='w-full inline-flex my-2 p-1'>
            <div class='w-1/5 leading-10'>QR Code Color:</div>
            <input name='fore_color' value='#000000' class='w-4/5 bg-gray-200 h-10 rounded-lg p-3'  placeholder='#000000'>
          </div>
          <div class='w-full inline-flex my-2 p-1'>
            <div class='w-1/5 leading-10'>QR Background:</div>
            <input name='back_color' value='#FFFFFF' class='w-4/5 bg-gray-200 h-10 rounded-lg p-3' placeholder='#FFFFFF'>
          </div>
        </div>
        <div id='qr-logo-section' class='w-full inline-flex my-2 p-1 mt-3'>
          <img id="blah" name='logo' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg==' alt='your image' class='w-1/5 leading-10' />
          <input type='file' onchange='readURL(this);' class='w-full inline-flex my-2 p-1' />
        </div>
        <button id='btn-create-qr' class='bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center'>
          <i class='fas fa-plus'></i>
          <span class='ml-2'>Create QR</span>
        </button>
      </div>
      <div id='qrcode-img' class='md:w-2/5 center'>
        <img src={{ $imgSrc }} class='border-8 border-gray-700'/>
        <button id='btn_save_qr' class='bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded block mx-auto mt-5'>
          <i class='fas fa-download'></i>
          <span class='ml-2'>Download</span>
        </button>
      </div>
    </div>
  </div>
  <div class='bottom-0 fixed flex header justify-between p-3 shadow-lg w-full z-10 bg-white'>
    <div>@ QR Code <?php echo date('Y') ?></div>
    <div>
      <a href='https://www.facebook.com' class='mx-2'>
        <i class="fab fa-facebook"></i>
      </a>
      <a href='https://www.twitter.com' class='mx-2'>
        <i class="fab fa-twitter"></i>
      </a>
      <a href='https://www.youtube.com' class='mx-2'>
        <i class="fab fa-youtube"></i>
      </a>
    </div>
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
          data = {
            'content': $('#qrcode-text').val()
          }
      }
      data.fore_color = $("#qr-colors-section input[name='fore_color']").val().slice(1).convertToRGB();
      data.back_color = $("#qr-colors-section input[name='back_color']").val().slice(1).convertToRGB();
      data.logo = $("#qr-logo-section img[name='logo']").attr('src');
      $.ajax({
        method: 'POST',
        url: 'render_qr_code',
        data: {
          'type': qrcode_type,
          'data': data,
          '_token': '{{ csrf_token() }}'
        },
      })
      .done(function(result) {
        $('#qrcode-img img').attr('src', result + '?' + new Date().getTime());
        console.log()
        $("#qrcode-img img").css('border-color', $("#qr-colors-section input[name='back_color']").val());
      })
      .fail(function(error) {
      })
      .always(function() {
      })
    })
    $('#btn_save_qr').click(() => saveQRCode());
    $('.qr-type-radios').click(function(e) {
      e.preventDefault();
      $('.qr-type-radios').removeClass('active');
      $(this).addClass('active');
    });
    $('.btn-menu-item').click(() => {
      $('.nav-menu-item').toggle();
    })
    function hexTo0x(color) {
      return eval('0x' + color.substr(1));
    }
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#blah')
            .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
    String.prototype.convertToRGB = function(){
      if(this.length != 6){
        throw "Only six-digit hex colors are allowed.";
      }

      var aRgbHex = this.match(/.{1,2}/g);
      var aRgb = [
        parseInt(aRgbHex[0], 16),
        parseInt(aRgbHex[1], 16),
        parseInt(aRgbHex[2], 16)
      ];
      return aRgb;
    }
    function saveQRCode() {
      var qr_tag = document.createElement('a');
      qr_tag.href = $('#qrcode-img').find('img')[0].src;
      qr_tag.download = 'qr_code.png';
      qr_tag.click();
    }
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
</body>
</html>