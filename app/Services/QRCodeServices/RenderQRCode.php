<?php

namespace App\Services\QRCodeServices;

use App\Services\ServiceInterface;
use App\Services\QRCodeService;
use QRCode;

/**
 * @property string type
 * @property array form_data
 * @property string fore_color
 * @property string back_color
 * @property string logo
 * @property string format
 */
class RenderQRCode extends QRCodeService implements ServiceInterface
{
  const QR_INPUT_TYPE = [
    'TEXT' => 'text',
    'URL' => 'url',
    'PHONE' => 'phone',
    'SMS' => 'sms',
    'EMAIL' => 'email',
    'SKYPE' => 'skype',
    'BUSINESS_CARD' => 'business_card'
  ];

  public function __construct(
    string $type,
    array $form_data,
    string $fore_color,
    string $back_color,
    string $logo,
    string $format = 'png')
  {
    $this->type = $type;
    $this->form_data = $form_data;
    $this->fore_color = $fore_color;
    $this->back_color = $back_color;
    $this->logo = $logo;
    $this->format = $format;
  }

  public function execute()
  {
    $content = '';
    switch ($this->type) {
      case RenderQRCode::QR_INPUT_TYPE['TEXT']:
        $content = RenderQRCode::render_qr_by_text($this->form_data);
        break;
      case RenderQRCode::QR_INPUT_TYPE['URL']:
        $content = RenderQRCode::render_qr_by_url($this->form_data);
        break;
      case RenderQRCode::QR_INPUT_TYPE['PHONE']:
        $content = RenderQRCode::render_qr_by_phone($this->form_data);
        break;
      case RenderQRCode::QR_INPUT_TYPE['SMS']:
        $content = RenderQRCode::render_qr_by_sms($this->form_data);
        break;
      case RenderQRCode::QR_INPUT_TYPE['EMAIL']:
        $content = RenderQRCode::render_qr_by_email($this->form_data);
        break;
      case RenderQRCode::QR_INPUT_TYPE['SKYPE']:
        $content = RenderQRCode::render_qr_by_skype($this->form_data);
        break;
      case RenderQRCode::QR_INPUT_TYPE['BUSINESS_CARD']:
        $content = RenderQRCode::render_qr_by_business_card($this->form_data, $this->form_data['type']);
        break;
    }
    switch ($this->format) {
      case 'png':
        $fore_color = isset($this->data['fore_color']) ? $this->data['fore_color'] : [255, 255, 255];
        $back_color = isset($this->data['back_color']) ? $this->data['back_color'] : [0, 0, 0];
        $QR_path = RenderQRCode::get_qr_images_path() . 'result.' . $this->format;
        $qrcode = new QRcode();
        $qrcode->format('png')->merge($this->data['logo'], 0.3, true)
          ->size(500)->errorCorrection('H')
          ->color($fore_color[0], $fore_color[1], $fore_color[2])
          ->backgroundColor($back_color[0], $back_color[1], $back_color[2])
          ->encoding('UTF-8')
          ->generate($content, $this->get_qr_images_path());
        break;
      case 'svg':
        $fore_color = isset($this->data['fore_color']) ? $this->data['fore_color'] : [255, 255, 255];
        $back_color = isset($this->data['back_color']) ? $this->data['back_color'] : [0, 0, 0];
        $qrcode = new QRcode();
        $qrcode->encoding('UTF-8')
          ->generate('Make me into a QrCode!', $this->get_qr_images_path());
        break;
    }
    return '/qr_images/result.' . $this->format;
  }

  function get_qr_images_path()
  {
    return public_path('qr_images/result.png');
  }

  function decoded_base64_image($base64_encoded)
  {
    return base64_decode(explode(',', $base64_encoded, 2)[1]);
  }

  function combine_QR_with_logo($QR_path, $logo_decoded)
  {
    $QR = imagecreatefromstring(file_get_contents($QR_path));
    $logo = imagecreatefromstring($logo_decoded);
    $QR_width = imagesx($QR);
    $QR_height = imagesy($QR);
    $logo_width = imagesx($logo);
    $logo_height = imagesy($logo);
    $logo_qr_width = $QR_width / 4;
    $scale = $logo_width / $logo_qr_width;
    $logo_qr_height = $logo_height / $scale;
    $from_width = ($QR_width - $logo_qr_width) / 2;
    imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

    //Output pictures
    imagepng($QR, $QR_path);
    imagedestroy($QR);
    if (file_exists($QR_path)) {
      return true;
    } else {
      return false;
    }
  }

  function render_qr_by_text($data)
  {
    return $data['text'];
  }

  function render_qr_by_url($data)
  {
    return $data['url'];
  }

  function render_qr_by_phone($data)
  {
    return $data['phone'];
  }

  function render_qr_by_sms($data)
  {
    return 'sms:' . $data['content'];
  }

  function render_qr_by_email($data)
  {
    return 'mailto:' . $data['email'] . '?subject=' . $data['subject'] . '&body=' . $data['body'];
  }

  function render_qr_by_skype($skype)
  {
    return 'skype:' . $skype . '?call';
  }

  function render_qr_by_business_card($data, $data_type = 'detailed')
  {
    switch ($data_type) {
      case 'simple':
        $content = 'BEGIN:VCARD' . "\n";
        $content .= 'FN:' . $data['name'] . "\n";
        $content .= 'TEL;WORK;VOICE:' . $data['phone'] . "\n";
        $content .= 'END:VCARD';
        return $content;
        break;
      case 'detailed':
        $content = 'BEGIN:VCARD' . "\n";
        $content .= 'VERSION:2.1' . "\n";
        $content .= 'N:' . $data['full_name'] . "\n";
        $content .= 'ORG:' . 'IMT Solutions' . "\n";

        $content .= 'TEL;WORK;VOICE:' . $data['work_phone'] . "\n";
        $content .= 'TEL;HOME;VOICE:' . $data['private_phone'] . "\n";
        $content .= 'TEL;TYPE=cell:' . $data['phone_cell'] . "\n";

        $content .= 'ADR;TYPE=work;' .
          'LABEL="' . $data['address_label'] . '"'
          . $data['address_ext'] . ';'
          . $data['address_street'] . ';'
          . $data['address_town'] . ';'
          . $data['address_region'] . ';'
          . $data['address_postcode'] . ';'
          . $data['address_country']
          . "\n";

        $content .= 'EMAIL:' . $data['email'] . "\n";

        $content .= 'END:VCARD';

        return $content;
        break;
      case 'photo':
        break;
    }
  }
}
