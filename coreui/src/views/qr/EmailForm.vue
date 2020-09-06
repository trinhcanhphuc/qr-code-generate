<template>
  <div>
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
</template>
