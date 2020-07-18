<?php
  include('./phpqrcode/qrlib.php');
  include('./env.php');
  include('./qr_type.php');

  # execute
  $type = $_POST['type'];
  $data = $_POST['data'];
  render_qr_code($type, $data);

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
      case QR_INPUT_TYPE['BUSINESS_CARD']:
        render_qr_by_business_card($data);
        break;
    }
  }

  function render_qr_by_text($text) {
    $tempDir = 'C:\Users\trinh\Projects\qr-code-generate\web';
    QRcode::png($text, $tempDir.'\text.png');
    echo '<img src="'.'\text.png" />';
  }

  function render_qr_by_url($url) {
    QRcode::png($url, QR_IMAGES_PATH . 'url.png');
    echo '/qr_images/url.png';
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
    $content = 'mailto:'.$email;
    $tempDir = 'C:\Users\trinh\Projects\qr-code-generate\web';
    QRcode::png($content, $tempDir.'\email.png');
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

  function render_qr_by_business_card($data) {
    switch ($data['type']) {
      case 'simple':
        $content  = 'BEGIN:VCARD'.'\n';
        $content .= 'FN:'.$data['name'].'\n';
        $content .= 'TEL;WORK;VOICE:'.$data['phone'].'\n';
        $content .= 'END:VCARD';
        $tempDir = 'C:\Users\trinh\Projects\qr-code-generate\web';
        QRcode::png($content, $tempDir.'\business_card_simple.png');
        echo '<img src="'.'\business_card_simple.png" />';
        break;
      case 'detailed':
        $content  = 'BEGIN:VCARD'.'\n';
        $content .= 'VERSION:2.1'.'\n';
        $content .= 'N:'.$data['sort_name'].'\n';
        $content .= 'FN:'.$data['name'].'\n';
        $content .= 'ORG:'.$data['org_name'].'\n';

        $content .= 'TEL;WORK;VOICE:'.$data['phone'].'\n';
        $content .= 'TEL;HOME;VOICE:'.$data['phone_private'].'\n';
        $content .= 'TEL;TYPE=cell:'.$data['phone_cell'].'\n';

        $address = $data['address'];
        $content .= 'ADR;TYPE=work;'.
          'LABEL="'.$address['label'].'":'
          .$address['pobox'].';'
          .$address['ext'].';'
          .$address['street'].';'
          .$address['town'].';'
          .$address['region'].';'
          .$address['post_code'].';'
          .$address['country']
        .'\n';

        $content .= 'EMAIL:'.$data['email'].'\n';

        $content .= 'END:VCARD';
        $tempDir = 'C:\Users\trinh\Projects\qr-code-generate\web';
        QRcode::png($content, $tempDir.'\business_card_detailed.png');
        echo '<img src="'.'\business_card_detailed.png" />';
        break;
      case 'photo':
        break;
    }
  }

?>