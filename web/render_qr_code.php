<?php
  include('./phpqrcode/qrlib.php');
  include('./env.php');
  include('./qr_type.php');

  # execute
  $type = $_POST['type'];
  $data = $_POST['data'];
  $format = $_POST['format'] ?? 'svg';
  render_qr_code($type, $data);

  function render_qr_code($inputType, $data, $format='svg') {
    $content = '';
    switch($inputType) {
      case QR_INPUT_TYPE['TEXT']:
        $content = render_qr_by_text($data);
        break;
      case QR_INPUT_TYPE['URL']:
        $content = render_qr_by_url($data);
        break;
      case QR_INPUT_TYPE['PHONE']:
        $content = render_qr_by_phone($data);
        break;
      case QR_INPUT_TYPE['SMS']:
        $content = render_qr_by_sms($data);
        break;
      case QR_INPUT_TYPE['EMAIL']:
        $content = render_qr_by_email($data);
        break;
      case QR_INPUT_TYPE['SKYPE']:
        $content = render_qr_by_skype($data);
        break;
      case QR_INPUT_TYPE['BUSINESS_CARD']:
        $content = render_qr_by_business_card($data);
        break;
    }
    switch($format) {
      case 'png':
        QRcode::png($content, QR_IMAGES_PATH . 'result.' . $format);
        break;
      case 'svg':
        QRcode::svg($content, QR_IMAGES_PATH . 'result.' . $format);
        break;
    }
    echo '/qr_images/result.' . $format;
  }

  function render_qr_by_text($text) {
    return $text;
  }

  function render_qr_by_url($url) {
    return $url;
  }

  function render_qr_by_phone($phoneNumber) {
    return $phoneNumber;
  }

  function render_qr_by_sms($phoneNumber) {
    return 'sms:'.$phoneNumber;
  }

  function render_qr_by_email($data) {
    return 'mailto:'.$data['email'].'?subject='.$data['subject'].'&body='.$data['body'];
  }

  function render_qr_by_skype($skype) {
    return 'skype:'.$skype.'?call';
  }

  function render_qr_by_business_card($data) {
    switch ($data['type']) {
      case 'simple':
        $content  = 'BEGIN:VCARD'.'\n';
        $content .= 'FN:'.$data['name'].'\n';
        $content .= 'TEL;WORK;VOICE:'.$data['phone'].'\n';
        $content .= 'END:VCARD';
        $tempDir = 'C:\Users\trinh\Projects\qr-code-generate\web';
        return $content;
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
        return $content;
        break;
      case 'photo':
        break;
    }
  }

?>