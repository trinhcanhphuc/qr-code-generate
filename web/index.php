<!DOCTYPE html>
<html>

<head>
  <title>QR CODE Generate</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='/css/libs/tailwind.min.css'>
  <script type='text/javascript' src='/js/libs/jquery.min.js'></script>
  <script type='text/javascript' src='/js/libs/jquery-qrcode.min.js'></script>
  <script type='text/javascript' src='/js/utils/qr_code.js'></script>
</head>

<body>
  <div class='header'>

  </div>
  <div class='content flex w-100 h-100'>
    <div class='w-3/5 mx-auto mt-10'>
      <div id='qrcode-title'></div>
      <div class='mx-10'>
        <div class='flex mb-3'>
          <label class='container inline-flex'>
            <input type='radio' name='qr-type' value='url' checked>
            <span class='checkmark'>
              <i class='fa fa-link'></i>
            </span>
            URL
          </label>
          <label class='container inline-flex'>
            <input type='radio' name='qr-type' value='text'>
            <span class='checkmark'>
              <i class='fa fa-align-left'></i>
            </span>
            Text
          </label>
          <label class='container inline-flex'>
            <input type='radio' name='qr-type' value='phone'>
            <span class='checkmark'>
              <i class='fa fa-phone'></i>
            </span>
            Phone
          </label>
          <label class='container inline-flex'>
            <input type='radio' name='qr-type' value='sms'>
            <span class='checkmark'>
              <i class='fa fa-sms'></i>
            </span>
            SMS
          </label>
          <label class='container inline-flex'>
            <input type='radio' name='qr-type' value='email'>
            <span class='checkmark'>
              <i class='far fa-envelope'></i>
            </span>
            Email
          </label>
          <label class='container inline-flex'>
            <input type='radio' name='qr-type' value='card'>
            <span class='checkmark'>
              <i class='fa fa-id-card'></i>
            </span>
            Card
          </label>
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
    </div>
  </div>
  <div class='footer'>

  </div>

  <script>
    var qrcode_type = 'url';
    $("input[name='qr-type']").click((e) => {
      $('.qrcode-input-form').hide();
      qrcode_type = e.target.value;
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
        $('#qrcode-img img').attr('src', result);
      })
      .fail(function(error) {
      })
      .always(function() {
      })
    })
  </script>
  <style>
    #qrcode-img img {
      margin: auto;
      display: flex;
    }
    #qrcode-text {
      height: 100px;
      min-height: 50px;
      max-height: 150px;
    }
    .txtr-v {
      resize: vertical;
    }
    .txtr-h {
      resize: horizontal;
    }
    .txtr-n {
      resize: none;
    }

    .h-100 {
      height: 25rem;
    }

    /* The container */
    .container {
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default radio button */
    .container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
    }


    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
      background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container input:checked ~ .checkmark {
      background-color: #2196F3;
    }


    /* Show the indicator (dot/circle) when checked */
    .container input:checked ~ .checkmark:after {
      display: block;
    }

    /* Style the indicator (dot/circle) */
    .container .checkmark:after {
      top: 9px;
      left: 9px;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: white;
    }
  </style>
  <link rel='stylesheet' href='/css/libs/fontawesome.min.css'>
  <script type='text/javascript' src='/js/main.js'></script>
</body>
</html>