<template>
  <div>
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
            :value="work_phone"
            @keyup="updateWorkPhone($event.target.value)"
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
</template>

<script>
export default {
  name: "CardForm",
  props: {
    work_phone: {
      required: true
    }
  },
  methods: {
    updateWorkPhone(phone) {
      this.$emit("update-work-phone", phone);
    }
  }
}
</script>
