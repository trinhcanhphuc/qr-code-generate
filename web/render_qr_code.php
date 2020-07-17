<?php
  include('./phpqrcode/qrlib.php');
  
  const QR_INPUT_TYPE = [
    'TEXT' => 'text',
    'URL' => 'url',
    'PHONE' => 'phone',
    'SMS' => 'sms',
    'EMAIL' => 'email',
    'EMAIL_WITH_CONTENT' => 'email_with_content',
    'SKYPE' => 'skype'
  ];

  function render_qr_code($inputType, $data) {
    echo "render_qr_code";
    echo $inputType;
    echo $data;
    switch($inputType) {
      case QR_INPUT_TYPE['TEXT']:
        render_qr_by_text($data);
        break;
      case QR_INPUT_TYPE['URL']:
        render_qr_by_url($data);
        break;
      case QR_INPUT_TYPE['PHONE']:
        render_qr_by_phone($data);
        break;
      case QR_INPUT_TYPE['SMS']:
        render_qr_by_sms($data);
        break;
      case QR_INPUT_TYPE['EMAIL']:
        echo "render_qr_by_email";
        render_qr_by_email($data);
        break;
      case QR_INPUT_TYPE['EMAIL_WITH_CONTENT']:
        render_qr_by_email_with_content($data);
        break;
      case QR_INPUT_TYPE['SKYPE']:
        render_qr_by_skype($data);
        break;
    }
  }

  function render_qr_by_text($text) {
    $tempDir = 'C:\Users\trinh\Projects\qr-code-generate\web';
    QRcode::png($text, $tempDir.'\text.png');
    echo '<img src="'.'\text.png" />';
  }

  function render_qr_by_url($url) {
    
  }

  function render_qr_by_phone($phoneNumber) {
    $tempDir = 'C:\Users\trinh\Projects\qr-code-generate\web';
    QRcode::png($phoneNumber, $tempDir.'\phone.png');
    echo '<img src="'.'\phone.png" />';
  }

  function render_qr_by_sms($sms) {
    
  }

  function render_qr_by_email($email) {
    $tempDir = 'C:\Users\trinh\Projects\qr-code-generate\web';
    QRcode::png($email, $tempDir.'\email.png');
    echo '<img src="'.'\email.png" />';
  }

  function render_qr_by_email_with_content($content) {
    
  }

  function render_qr_by_skype($skype) {
    
  }

?>