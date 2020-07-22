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
  <div class='content flex w-100'>
    <div class='w-3/5 m-auto'>
      <div id='qrcode-title'></div>
      <div class='mx-10'>
        <div class='flex'>
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
        <textarea id='qrcode-text' class='bg-gray-05 br2 pa2 w-100 txtr-v qrcode-input-form' value=''></textarea>
        <div id='qrcode-email-form' class='qrcode-input-form dn'>
          <div class='w-100 inline-flex justify-between mv2'>
            <div class='w-20'>Email:</div>
            <input name='email' class='w-80 bg-gray-05 br2 pa2'>
          </div>
          <div class='w-100 inline-flex justify-between mv2'>
            <div class='w-20'>Subject:</div>
            <input name='subject' class='w-80 bg-gray-05 br2 pa2'>
          </div>
          <div class='w-100 inline-flex justify-between mv2'>
            <div class='w-20'>Body:</div>
            <textarea name='body' class='w-80 bg-gray-05 br2 pa2 txtr-v'></textarea>
          </div>
        </div>
        <div id='qrcode-card-form' class='qrcode-input-form dn'>

        </div>
        <div id='input-error' class='red dn'>Phone number invalid!</div>
        <button id='btn-create-qr' class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
          <i class="fas fa-plus"></i>
          <span>Create QR</span>
        </button>
        <button id='btn_save_qr' class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
          <i class="fas fa-download"></i>
          <span>Download</span>
        </button>
      </div>
    </div>
    <div id='qrcode-img' class='w-2/5 center'>
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
    .b-0 {
      border: 0;
    }
    .bg-gray { background-color: #777; }
    .bg-gray-90 { background-color: rgba( 0, 0, 47, .9 ); }
    .bg-gray-80 { background-color: rgba( 0, 0, 47, .8 ); }
    .bg-gray-70 { background-color: rgba( 0, 0, 47, .7 ); }
    .bg-gray-60 { background-color: rgba( 0, 0, 47, .6 ); }
    .bg-gray-50 { background-color: rgba( 0, 0, 47, .5 ); }
    .bg-gray-40 { background-color: rgba( 0, 0, 47, .4 ); }
    .bg-gray-30 { background-color: rgba( 0, 0, 47, .3 ); }
    .bg-gray-20 { background-color: rgba( 0, 0, 47, .2 ); }
    .bg-gray-10 { background-color: rgba( 0, 0, 47, .1 ); }
    .bg-gray-05 { background-color: rgba( 0, 0, 47, .05 ); }
    #qrcode-img img {
      width: 300px;
      height: 300px;
      margin: auto;
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