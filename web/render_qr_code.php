<?php
  include('./phpqrcode/qrlib.php');
  
  const QR_INPUT_TYPE = [
    'TEXT' => 'text',
    'URL' => 'url',
    'PHONE' => 'phone',
    'SMS' => 'sms',
    'EMAIL' => 'email',
    'EMAIL_WITH_CONTENT' => 'email_with_content',
    'SKYPE' => 'skype',
    'BUSINESS_CARD' => 'business_card'
  ];

  function render_qr_code($inputType, $data) {
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
    $tempDir = 'C:\Users\trinh\Projects\qr-code-generate\web';
    QRcode::png($url, $tempDir.'\url.png');
    echo '<img src="'.'\url.png" />';
  }

  function render_qr_by_phone($phoneNumber) {
    $tempDir = 'C:\Users\trinh\Projects\qr-code-generate\web';
    QRcode::png($phoneNumber, $tempDir.'\phone.png');
    echo '<img src="'.'\phone.png" />';
  }

  function render_qr_by_sms($phoneNumber) {
    $content = 'sms:'.$phoneNumber;
    $tempDir = 'C:\Users\trinh\Projects\qr-code-generate\web';
    QRcode::png($content, $tempDir.'\sms.png');
    echo '<img src="'.'\sms.png" />';
  }

  function render_qr_by_email($email) {
    $tempDir = 'C:\Users\trinh\Projects\qr-code-generate\web';
    QRcode::png($email, $tempDir.'\email.png');
    echo '<img src="'.'\email.png" />';
  }

  function render_qr_by_email_with_content($data) {
    $content = 'mailto:'.$data['email'].'?subject='.urlencode($data['subject']).'&body='.urlencode($data['body']);
    $tempDir = 'C:\Users\trinh\Projects\qr-code-generate\web';
    QRcode::png($content, $tempDir.'\email_with_content.png');
    echo '<img src="'.'\email_with_content.png" />';
  }

  function render_qr_by_skype($skype) {
    $content = 'skype:'.$skype.'?call';
    $tempDir = 'C:\Users\trinh\Projects\qr-code-generate\web';
    QRcode::png($content, $tempDir.'\skype.png');
    echo '<img src="'.'\skype.png" />';
  }

?>