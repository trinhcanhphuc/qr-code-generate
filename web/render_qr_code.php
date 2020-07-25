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
        $content = render_qr_by_business_card($data, $data['type']);
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

  function render_qr_by_business_card($data, $data_type='detailed') {
    switch ($data_type) {
      case 'simple':
        $content  = 'BEGIN:VCARD'.'\n';
        $content .= 'FN:'.$data['name'].'\n';
        $content .= 'TEL;WORK;VOICE:'.$data['phone'].'\n';
        $content .= 'END:VCARD';
        return $content;
        break;
      case 'detailed':
        $content  = 'BEGIN:VCARD'.'\n';
        $content .= 'VERSION:2.1'.'\n';
        $content .= 'N:'.$data['full_name'].'\n';
        $content .= 'ORG:'. 'IMT Solutions'.'\n';

        $content .= 'TEL;WORK;VOICE:'.$data['work_phone'].'\n';
        $content .= 'TEL;HOME;VOICE:'.$data['private_phone'].'\n';
        $content .= 'TEL;TYPE=cell:'.$data['phone_cell'].'\n';

        $content .= 'ADR;TYPE=work;'.
          'LABEL="'.$data['address_label'].'"'
          .$data['address_ext'].';'
          .$data['address_street'].';'
          .$data['address_town'].';'
          .$data['address_region'].';'
          .$data['address_postcode'].';'
          .$data['address_country']
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