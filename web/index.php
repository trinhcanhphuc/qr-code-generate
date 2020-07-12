<!DOCTYPE html>
<html>

<head>
  <title>QR CODE Generate</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='/css/libs/tachyons.min.css'>
</head>

<body>
  <div class='w-80'>
    <div id='qrcode-img' class='p-5'>
      <img src='' />
    </div>
    <div id='qrcode-title'></div>
    <div class='w-full px-5'>
      <div class='py-2 flex justify-between leading-8'>
        <div class='text-sm font-bold'>Choose Input Type</div>
        <select id='select-input-type' class='outline-none bg-gray-300 p-2 rounded-l text-sm'>
          <option value='url' class='text-sm' selected>Url</option>
          <option value='text' class='text-sm'>Text</option>
          <option value='phone' class='text-sm'>Phone</option>
        </select>
      </div>
      <textarea id='qrcode-text' class='w-full h-24 bg-gray-200 rounded-md p-3 min-h-12' value=''></textarea>
      <div id='input-error' class='hidden text-red-600'>Phone number invalid!</div>
    </div>
    <div class='w-full my-5 text-center'>
      <button id='btn_save_qr' class="focus:outline-none bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
        <span>Download</span>
      </button>
    </div>
  </div>

  <?php

  ?>
  <style>

  </style>
  <script type='text/javascript' src='/js/libs/jquery.min.js' defer></script>
  <script type='text/javascript' src='/js/libs/jquery-qrcode.min.js' defer></script>
  <script type='text/javascript' src='/js/utils/qr_code.js' defer></script>
  <script type='text/javascript' src='/js/home.js' defer></script>
</body>
</html>