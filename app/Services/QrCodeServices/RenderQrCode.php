<?php

namespace App\Services\QrCodeServices;

use App\Services\QrCodeService;
use App\Services\ServiceInterface;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * @property string image_name
 * @property string type
 * @property array form_data
 * @property array fore_color
 * @property array back_color
 * @property string logo
 * @property string format
 */
class RenderQrCode extends QrCodeService implements ServiceInterface
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
    string $image_name,
    string $type,
    array $form_data,
    array $fore_color,
    array $back_color,
    $logo,
    string $format = 'png')
  {
    $this->image_name = $image_name;
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
      case RenderQrCode::QR_INPUT_TYPE['TEXT']:
        $content = RenderQrCode::render_qr_by_text($this->form_data);
        break;
      case RenderQrCode::QR_INPUT_TYPE['URL']:
        $content = RenderQrCode::render_qr_by_url($this->form_data);
        break;
      case RenderQrCode::QR_INPUT_TYPE['PHONE']:
        $content = RenderQrCode::render_qr_by_phone($this->form_data);
        break;
      case RenderQrCode::QR_INPUT_TYPE['SMS']:
        $content = RenderQrCode::render_qr_by_sms($this->form_data);
        break;
      case RenderQrCode::QR_INPUT_TYPE['EMAIL']:
        $content = RenderQrCode::render_qr_by_email($this->form_data);
        break;
      case RenderQrCode::QR_INPUT_TYPE['SKYPE']:
        $content = RenderQrCode::render_qr_by_skype($this->form_data);
        break;
      case RenderQrCode::QR_INPUT_TYPE['BUSINESS_CARD']:
        $content = RenderQrCode::render_qr_by_business_card($this->form_data);
        break;
    }
    switch ($this->format) {
      case 'png':
        $fore_color = isset($this->fore_color) ? $this->fore_color : [255, 255, 255];
        $back_color = isset($this->back_color) ? $this->back_color : [0, 0, 0];
        if ($this->logo) {
          QrCode::format('png')->merge($this->logo, 0.3, true)
            ->size(500)->errorCorrection('H')
            ->color($fore_color[0], $fore_color[1], $fore_color[2])
            ->backgroundColor($back_color[0], $back_color[1], $back_color[2])
            ->encoding('UTF-8')
            ->generate($content, $this->get_qr_images_path($this->image_name));
        }
        else {
          QrCode::format('png')->size(500)->errorCorrection('H')
            ->color($fore_color[0], $fore_color[1], $fore_color[2])
            ->backgroundColor($back_color[0], $back_color[1], $back_color[2])
            ->encoding('UTF-8')
            ->generate($content, $this->get_qr_images_path($this->image_name));
        }
        break;
      case 'svg':
        $fore_color = isset($this->fore_color) ? $this->fore_color : [255, 255, 255];
        $back_color = isset($this->back_color) ? $this->back_color : [0, 0, 0];
        QrCode::encoding('UTF-8')
          ->generate('Make me into a QrCode!', $this->get_qr_images_path($this->image_name));
        break;
    }
    return true;
  }

  function get_qr_images_path($image_name)
  {
    return public_path('qr_images/' . $image_name . '.png');
  }

  function decoded_base64_image($base64_encoded)
  {
    return base64_decode(explode(',', $base64_encoded, 2)[1]);
  }

  function combine_qr_with_logo($qr_path, $logo_decoded)
  {
    $qr = imagecreatefromstring(file_get_contents($qr_path));
    $logo = imagecreatefromstring($logo_decoded);
    $qr_width = imagesx($qr);
    $qr_height = imagesy($qr);
    $logo_width = imagesx($logo);
    $logo_height = imagesy($logo);
    $logo_qr_width = $qr_width / 4;
    $scale = $logo_width / $logo_qr_width;
    $logo_qr_height = $logo_height / $scale;
    $from_width = ($qr_width - $logo_qr_width) / 2;
    imagecopyresampled($qr, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

    // Output pictures
    imagepng($qr, $qr_path);
    imagedestroy($qr);
    if (file_exists($qr_path)) {
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
    return 'smsto:' . $data['phone'] . ':' . $data['message'];
  }

  function render_qr_by_email($data)
  {
    return 'mailto:' . $data['email'] . '?cc=' . $data['cc'] . '&bcc=' . $data['bcc'] . '&subject=' . $data['subject'] . '&body=' . $data['body'];
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
      case 'detailed':
        $content = 'BEGIN:VCARD' . "\n";
        $content .= 'VERSION:4.0' . "\n";
        $content .= 'N:' . $data['last_name'] . ';' . $data['first_name'] . ';;Mr.;' . "\n";
        $content .= 'ORG:' . 'IMT Solutions' . "\n";
        $content .= 'TITLE:' . 'Software Developer' . "\n";
        $content .= 'TEL;WORK;VOICE:' . $data['work_phone'] . "\n";
        $content .= 'TEL;HOME;VOICE:' . $data['private_phone'] . "\n";
        $content .= 'TEL;MAIN;VOICE:' . $data['cell_phone'] . "\n";
        $content .= 'ADR;TYPE#WORK;PREF#1;LABEL#"Normality\n"' . ':;;' . $data['address_street'] . ';' . $data['address_city'] . ';' . $data['address_province'] . ';' . $data['address_postcode'] . ';' . $data['address_country'] . "\n";
        $content .= 'EMAIL:' . $data['email'] . "\n";
        $content .= 'END:VCARD';

        return $content;
      case 'photo':
        break;
    }
  }
}
