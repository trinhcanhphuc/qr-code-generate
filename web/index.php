<!DOCTYPE html>
<html>

<head>
  <title>QR CODE Generate</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='/css/libs/tachyons.min.css'>
  <script type='text/javascript' src='/js/libs/jquery.min.js'></script>
  <script type='text/javascript' src='/js/libs/jquery-qrcode.min.js'></script>
  <script type='text/javascript' src='/js/utils/qr_code.js'></script>
</head>

<body>
  <div class='header'>

  </div>
  <div class='content inline-flex-ns w-100'>
    <div class='w-60-ns center'>
      <div id='qrcode-title'></div>
      <div class='ma3'>
        <div class='pv4 ph2'>
          <label class='container'>
            <input type='radio' name='qr-type' value='url'>
            <span class='checkmark'>
              <i class='fa fa-link'></i>
            </span>
            URL
          </label>
          <label class='container'>
            <input type='radio' name='qr-type' value='text'>
            <span class='checkmark'>
              <i class='fa fa-align-left'></i>
            </span>
            Text
          </label>
          <label class='container'>
            <input type='radio' name='qr-type' value='phone'>
            <span class='checkmark'>
              <i class='fa fa-phone'></i>
            </span>
            Phone
          </label>
          <label class='container'>
            <input type='radio' name='qr-type' value='sms'>
            <span class='checkmark'>
              <i class='fa fa-sms'></i>
            </span>
            SMS
          </label>
          <label class='container'>
            <input type='radio' name='qr-type' value='email'>
            <span class='checkmark'>
              <i class='far fa-envelope'></i>
            </span>
            Email
          </label>
          <label class='container'>
            <input type='radio' name='qr-type' value='sms'>
            <span class='checkmark'>
              <i class='fa fa-sms'></i>
            </span>
            SMS
          </label>
          <label class='container'>
            <input type='radio' name='qr-type' value='skype'>
            <span class='checkmark'>
              <i class='fab fa-skype'></i>
            </span>
            Skype
          </label>
          <label class='container'>
            <input type='radio' name='qr-type' value='card'>
            <span class='checkmark'>
              <i class='fa fa-id-card'></i>
            </span>
            Card
          </label>
        </div>
        <textarea id='qrcode-text' class='bg-gray-05 br2 pa2 w-100 txtr-v' value=''></textarea>
        <div id='input-error' class='red dn'>Phone number invalid!</div>
        <div class='mv2 tc'>
          <button id='btn-create-qr' class='b b-0 grow inline-flex items-center no-underline pa2 tc'>
            <span class='f6 ml3 pr2'>Create QR</span>
          </button>
        </div>
        <div class='mv2 tc'>
          <button id='btn_save_qr' class='b b-0 grow inline-flex items-center no-underline pa2 tc'>
            <svg class='dib h1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><path d='M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z'/></svg>
            <span class='f6 ml3 pr2'>Download</span>
          </button>
        </div>
      </div>
    </div>
    <div id='qrcode-img' class='center'>
      <img src='' />
    </div>
  </div>
  <div class='footer'>

  </div>

  <script>
    $("input[name='qr-type']").click(() => {
      $('#qrcode-text').val('');
    });
    $('#btn-create-qr').click(function() {
      let qr_type;
      for (const rb of document.querySelectorAll('input[name="qr-type"]')) {
        if (rb.checked) {
          qr_type = rb.value;
          break;
        }
      }
      $.ajax({
        method: 'POST',
        url: 'render_qr_code.php',
        data: {
          'type': qr_type,
          'data': $('#qrcode-text').val()
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
    #qrcode-img {
      width: 300px;
      height: 300px;
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
  <script type='text/javascript' src='/js/home.js'></script>
</body>
</html>