<?php
  include('./phpqrcode/qrlib.php');
  include('./env.php');
  include('./qr_type.php');

  # execute
  $type = $_POST['type'];
  $data = $_POST['data'];
  $format = $_POST['format'] ?? 'svg';
  render_qr_code($type, $data);

  function render_qr_code($inputType, $data, $format='png') {
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
        $back_color = (int) $data['back_color'];
        $fore_color = (int) $data['fore_color'];
        $QR_path = QR_IMAGES_PATH . 'result.' . $format;
        QRcode::png($content, $QR_path, QR_ECLEVEL_H, 20, 2, FALSE, $back_color, $fore_color);
        
        if ($data['logo']) {
          $logo_decoded = decoded_base64_image($data['logo']);
          combine_QR_with_logo($QR_path, $logo_decoded);
        }

        break;
      case 'svg':
        $back_color = (int) $data['back_color'];
        $fore_color = (int) $data['fore_color'];
        QRcode::svg($content, QR_IMAGES_PATH . 'result.' . $format, QR_ECLEVEL_L, 3, 2, FALSE, $back_color, $fore_color);
        break;
    }
    echo '/qr_images/result.' . $format;
  }

  function decoded_base64_image($base64_encoded) {
    return base64_decode(explode(',', $base64_encoded, 2)[1]);
  }

  function combine_QR_with_logo($QR_path, $logo_decoded) {
    $QR = imagecreatefromstring(file_get_contents($QR_path));
    $logo = imagecreatefromstring($logo_decoded);
    $QR_width = imagesx($QR);
    $QR_height = imagesy($QR);
    $logo_width = imagesx($logo);
    $logo_height = imagesy($logo);
    $logo_qr_width = $QR_width / 4;
    $scale = $logo_width/$logo_qr_width;
    $logo_qr_height = $logo_height/$scale;
    $from_width = ($QR_width - $logo_qr_width) / 2;
    imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

    //Output pictures
    imagepng($QR, $QR_path);
    imagedestroy($QR);
    if(file_exists($QR_path))
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  function render_qr_by_text($data) {
    return $data['content'];
  }

  function render_qr_by_url($data) {
    return $data['content'];
  }

  function render_qr_by_phone($data) {
    return $data['content'];
  }

  function render_qr_by_sms($data) {
    return 'sms:'.$data['content'];
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
        $content  = 'BEGIN:VCARD'."\n";
        $content .= 'FN:'.$data['name']."\n";
        $content .= 'TEL;WORK;VOICE:'.$data['phone']."\n";
        $content .= 'END:VCARD';
        return $content;
        break;
      case 'detailed':
        $content  = 'BEGIN:VCARD'."\n";
        $content .= 'VERSION:2.1'."\n";
        $content .= 'N:'.$data['full_name']."\n";
        $content .= 'ORG:'. 'IMT Solutions'."\n";

        $content .= 'TEL;WORK;VOICE:'.$data['work_phone']."\n";
        $content .= 'TEL;HOME;VOICE:'.$data['private_phone']."\n";
        $content .= 'TEL;TYPE=cell:'.$data['phone_cell']."\n";

        $content .= 'ADR;TYPE=work;'.
          'LABEL="'.$data['address_label'].'"'
          .$data['address_ext'].';'
          .$data['address_street'].';'
          .$data['address_town'].';'
          .$data['address_region'].';'
          .$data['address_postcode'].';'
          .$data['address_country']
        ."\n";

        $content .= 'EMAIL:'.$data['email']."\n";

        $content .= 'END:VCARD';
    
        return $content;
        break;
      case 'photo':
        break;
    }
  }

?>