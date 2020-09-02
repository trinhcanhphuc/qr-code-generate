<template>
  <div>
    <div class="row">
      <div class="col-9">
        <input name="token" type="hidden" value="" />
        <CButtonGroup class="w-100 d-flex">
          <CButton color="info">
            URL
            <input type="radio" value="url" class="w-0">
          </CButton>
          <CButton color="info">
            Text
            <input type="radio" value="text" class="w-0">
          </CButton>
          <CButton color="info">
            Phone
            <input type="radio" value="phone" class="w-0">
          </CButton>
          <CButton color="info">
            SMS
            <input type="radio" value="sms" class="w-0">
          </CButton>
          <CButton color="info">
            Email
            <input type="radio" value="email" class="w-0">
          </CButton>
          <CButton color="info">
            Card
            <input type="radio" value="card" class="w-0">
          </CButton>
        </CButtonGroup>
      </div>
      <div id='qrcode-img' class="col-3">
        <img src="" class='border-8 border-gray-700'/>
        <button id='btn_save_qr' class='bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded block mx-auto mt-5 select-none'>
          <i class='fas fa-download'></i>
          <span class='ml-2'>Download</span>
        </button>
      </div>
    </div>
  </div>
</template>