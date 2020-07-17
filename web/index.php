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
  <div class=''>
    <div id='qrcode-img'>
      <img src='' />
    </div>
    <div id='qrcode-title'></div>
    <div class='ma3'>
      <div class='flex justify-between mv2'>
        <div class='b lh-copy'>Choose Input Type</div>
        <select id='select-input-type' class='bg-gray-05 pa1'>
          <option value='url' class='' selected>Url</option>
          <option value='text' class=''>Text</option>
          <option value='phone' class=''>Phone</option>
        </select>
      </div>
      <textarea id='qrcode-text' class='bg-gray-05 br2 pa2 w-100 txtr-v' value=''></textarea>
      <div id='input-error' class='red dn'>Phone number invalid!</div>
      <div class='mv2 tc'>
        <button id='btn_save_qr' class='b b-0 grow inline-flex items-center no-underline pa2 tc'>
          <svg class='dib h1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><path d='M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z'/></svg>
          <span class='f6 ml3 pr2'>Download</span>
        </button>
      </div>
    </div>
  </div>

  <?php
    include('./render_qr_code.php');
    render_qr_code('phone', '(049)012-345-678');

  ?>
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
  </style>
  <script type='text/javascript' src='/js/home.js'></script>
</body>
</html>