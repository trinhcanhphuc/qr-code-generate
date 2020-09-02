<template>
  <div>
    <div class="row">
      <div class="col-md-9">
        <input name="token" type="hidden" value="" />
        <CButtonGroup class="w-100 d-flex" size="lg">
          <CButton color="primary">
            URL
            <input type="radio" value="url" class="w-0">
          </CButton>
          <CButton color="primary">
            Text
            <input type="radio" value="text" class="w-0">
          </CButton>
          <CButton color="primary">
            Phone
            <input type="radio" value="phone" class="w-0">
          </CButton>
          <CButton color="primary">
            SMS
            <input type="radio" value="sms" class="w-0">
          </CButton>
          <CButton color="primary">
            Email
            <input type="radio" value="email" class="w-0">
          </CButton>
          <CButton color="primary">
            Card
            <input type="radio" value="card" class="w-0">
          </CButton>
        </CButtonGroup>

        <div class="mt-3">
          <div class="qrcode-text-form">
            <CRow>
              <CCol sm="12">
                <CTextarea
                  id="qrcode-text"
                  label="URL"
                  placeholder="https://www.facebook.com/"
                  rows="2"
                />
              </CCol>
            </CRow>
          </div>

          <div id="qrcode-email-form">
            <CRow>
              <CCol sm="12">
                <CInput
                  label="Email"
                  name="email"
                  placeholder="example@email.com"
                />
              </CCol>
            </CRow>
            <CRow>
              <CCol sm="12">
                <CInput
                  label="Subject"
                  name="subject"
                  placeholder="Greeting!"
                />
              </CCol>
            </CRow>
            <CRow>
              <CCol sm="12">
                <CTextarea
                  id="qrcode-text"
                  label="Body"
                  name="body"
                  placeholder="Today, I write this email to inform"
                  rows="3"
                />
              </CCol>
            </CRow>
          </div>

          <div id="qrcode-card-form">
            <CRow>
              <CCol sm="12">
                <CInput
                  label="Full Name"
                  name="full_name"
                  placeholder="Your Name"
                />
              </CCol>
            </CRow>
            <CRow>
              <CCol sm="12">
                <CInput
                  label="Email"
                  name="email"
                  placeholder="example@email.com"
                />
              </CCol>
            </CRow>
            <CRow>
              <CCol sm="4">
                <CInput
                  label="Work Phone"
                  name="work_phone"
                  placeholder="0963*******"
                />
              </CCol>
              <CCol sm="4">
                <CInput
                  label="Private Phone"
                  name="private_phone"
                  placeholder="0963*******"
                />
              </CCol>
              <CCol sm="4">
                <CInput
                  label="Cell Phone"
                  name="cell_phone"
                  placeholder="0963*******"
                />
              </CCol>
            </CRow>
            <CRow>
              <CCol sm="8">
                <CInput
                  label="Your Company"
                  name="address_label"
                  placeholder="Your Office"
                />
              </CCol>
              <CCol sm="4">
                <CInput
                  label="Postcode"
                  name="address_postcode"
                  placeholder="700000"
                />
              </CCol>
            </CRow>
            <CRow>
              <CCol sm="3">
                <CInput
                  label="Street"
                  name="address_street"
                  placeholder="Nam Ki Khoi Nghia"
                />
              </CCol>
              <CCol sm="3">
                <CInput
                  label="Town"
                  name="address_town"
                  placeholder="District 1"
                />
              </CCol>
              <CCol sm="3">
                <CInput
                  label="Region"
                  name="address_region"
                  placeholder="Ho Chi Minh"
                />
              </CCol>
              <CCol sm="3">
                <CInput
                  label="Country"
                  name="address_country"
                  placeholder="Viet Nam"
                />
              </CCol>
            </CRow>
          </div>

          <div id='qrcode-email-form'>

          </div>

          <div id='qr-colors-section'>

          </div>
        </div>
      </div>
      <div id="qrcode-img" class="col-md-3 text-center">
        <img src="img/brand/qr-logo.png" class="w-100" />
        <CButton id="btn_save_qr" color="primary" size="lg" class="mt-3">
          Download
        </CButton>
      </div>
    </div>
  </div>
</template>
