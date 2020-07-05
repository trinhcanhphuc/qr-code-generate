<?php
  function qr_address_generate($url) {
    $uri = 'https://chart.googleapis.com/chart?cht=qr&chs=400x400&chl=' . $url;
    echo base64_encode(file_get_contents($uri));
  }

  # execute
  $url = $_POST['url'];
  qr_address_generate($url);
?>