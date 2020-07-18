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
      case QR_INPUT_TYPE['SKYPE']:
        render_qr_by_skype($data);
        break;
      case QR_INPUT_TYPE['BUSINESS_CARD']:
        render_qr_by_business_card($data);
        break;
    }
  }

  function render_qr_by_text($text) {
    QRcode::png($text, QR_IMAGES_PATH . 'text.png');
    echo '/qr_images/text.png';
  }

  function render_qr_by_url($url) {
    QRcode::png($url, QR_IMAGES_PATH . 'url.png');
    echo '/qr_images/url.png';
  }

  function render_qr_by_phone($phoneNumber) {
    QRcode::png($phoneNumber, QR_IMAGES_PATH . 'phone_number.png');
    echo '/qr_images/phone_number.png';
  }

  function render_qr_by_sms($phoneNumber) {
    $content = 'sms:'.$phoneNumber;
    QRcode::png($content, QR_IMAGES_PATH . 'sms.png');
    echo '/qr_images/sms.png';
  }

  function render_qr_by_email($data) {
    $content = 'mailto:'.$data['email'].'?subject='.$data['subject'].'&body='.$data['body'];
    QRcode::png($content, QR_IMAGES_PATH . 'email.png');
    echo '/qr_images/email.png';
  }

  function render_qr_by_skype($skype) {
    $content = 'skype:'.$skype.'?call';
    QRcode::png($content, QR_IMAGES_PATH . 'skype.png');
    echo '/qr_images/skype.png';
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