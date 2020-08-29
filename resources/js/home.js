global.$ = global.jQuery = require('jquery');

window.createQRCode = createQRCode;
window.hexTo0x = hexTo0x;
window.readURL = readURL;
window.saveQRCode = saveQRCode;

$( document ).ready( () => {

var qrcode_type = 'url';
  $('.qr-type-radios').click((e) => {
    e.stopPropagation();
    $('.qr-type-radios').removeClass('active');
    $(this).addClass('active');
    $('.qrcode-input-form').hide();
    var qr_type_ele = $(e.target).closest("input");
    qrcode_type = qr_type_ele.val();
    switch(qrcode_type) {
      case 'email':
        $('#qrcode-email-form').show();
        break;
      case 'business_card':
        $('#qrcode-card-form').show();
        break;
      default:
        $('#qrcode-text').show();
        $('#qrcode-text').val('');
    }
  });
  $('#btn_save_qr').click(() => saveQRCode());
  $('.btn-menu-item').click(() => {
    $('.nav-menu-item').toggle();
  })
})
function hexTo0x(color) {
  return eval('0x' + color.substr(1));
}
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#blah')
        .attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
function createQRCode() {
  switch(qrcode_type) {
    case 'email':
      data = {
        'email': $("#qrcode-email-form *[name='email']").val(),
        'subject': $("#qrcode-email-form *[name='subject']").val(),
        'body': $("#qrcode-email-form *[name='body']").val()
      }
      break;
    case 'business_card':
      data = {
        'type': 'detailed',
        'full_name': $("#qrcode-card-form input[name='full_name']").val(),
        'work_phone': $("#qrcode-card-form input[name='work_phone']").val(),
        'private_phone': $("#qrcode-card-form input[name='private_phone']").val(),
        'phone_cell': $("#qrcode-card-form input[name='phone_cell']").val(),
        'company': $("#qrcode-card-form input[name='company']").val(),
        'email': $("#qrcode-card-form input[name='email']").val(),
        'address_label': $("#qrcode-card-form input[name='address_label']").val(),
        'address_ext': $("#qrcode-card-form input[name='address_ext']").val(),
        'address_street': $("#qrcode-card-form input[name='address_street']").val(),
        'address_town': $("#qrcode-card-form input[name='address_town']").val(),
        'address_region': $("#qrcode-card-form input[name='address_region']").val(),
        'address_postcode': $("#qrcode-card-form input[name='address_postcode']").val(),
        'address_country': $("#qrcode-card-form input[name='address_country']").val()
      }
      break;
    default:
      data = {
        'content': $('#qrcode-text').val()
      }
  }
  data.fore_color = $("#qr-colors-section input[name='fore_color']").val().slice(1).convertToRGB();
  data.back_color = $("#qr-colors-section input[name='back_color']").val().slice(1).convertToRGB();
  data.logo = $("#qr-logo-section img[name='logo']").attr('src');
  $.ajax({
    method: 'POST',
    url: 'render_qr_code',
    data: {
      'type': qrcode_type,
      'data': data,
      '_token': $("input[name='token']").val()
    },
  })
  .done(function(result) {
    $('#qrcode-img img').attr('src', result + '?' + new Date().getTime());
    console.log()
    $("#qrcode-img img").css('border-color', $("#qr-colors-section input[name='back_color']").val());
  })
  .fail(function(error) {
  })
  .always(function() {
  })
}

function saveQRCode() {
  var qr_tag = document.createElement('a');
  qr_tag.href = $('#qrcode-img').find('img')[0].src;
  qr_tag.download = 'qr_code.png';
  qr_tag.click();
}
String.prototype.convertToRGB = function(){
  if(this.length != 6){
    throw "Only six-digit hex colors are allowed.";
  }

  var aRgbHex = this.match(/.{1,2}/g);
  var aRgb = [
    parseInt(aRgbHex[0], 16),
    parseInt(aRgbHex[1], 16),
    parseInt(aRgbHex[2], 16)
  ];
  return aRgb;
}