<template>
  <div>
    <CRow>
      <CCol sm="12">
        <CInput
            label="Full Name"
            name="full_name"
            :value="card_form_data.full_name"
            @keyup="updateFormData('full_name', $event.target.value)"
            placeholder="Your Name"
        />
      </CCol>
    </CRow>
    <CRow>
      <CCol sm="12">
        <CInput
            label="Email"
            name="email"
            :value="card_form_data.email"
            @keyup="updateFormData('email', $event.target.value)"
            placeholder="example@email.com"
        />
      </CCol>
    </CRow>
    <CRow>
      <CCol sm="4">
        <CInput
            label="Work Phone"
            name="work_phone"
            :value="card_form_data.work_phone"
            @keyup="updateFormData('work_phone', $event.target.value)"
            placeholder="0963*******"
        />
      </CCol>
      <CCol sm="4">
        <CInput
            label="Private Phone"
            name="private_phone"
            :value="card_form_data.private_phone"
            @keyup="updateFormData('private_phone', $event.target.value)"
            placeholder="0963*******"
        />
      </CCol>
      <CCol sm="4">
        <CInput
            label="Cell Phone"
            name="cell_phone"
            :value="card_form_data.cell_phone"
            @keyup="updateFormData('cell_phone', $event.target.value)"
            placeholder="0963*******"
        />
      </CCol>
    </CRow>
    <CRow>
      <CCol sm="8">
        <CInput
            label="Your Company"
            name="address_label"
            :value="card_form_data.address_label"
            @keyup="updateFormData('address_label', $event.target.value)"
            placeholder="Your Office"
        />
      </CCol>
      <CCol sm="4">
        <CInput
            label="Postcode"
            name="address_postcode"
            :value="card_form_data.address_postcode"
            @keyup="updateFormData('address_postcode', $event.target.value)"
            placeholder="700000"
        />
      </CCol>
    </CRow>
    <CRow>
      <CCol sm="3">
        <CInput
            label="Street"
            name="address_street"
            :value="card_form_data.address_street"
            @keyup="updateFormData('address_street', $event.target.value)"
            placeholder="Nam Ki Khoi Nghia"
        />
      </CCol>
      <CCol sm="3">
        <CInput
            label="Town"
            name="address_town"
            :value="card_form_data.address_town"
            @keyup="updateFormData('address_town', $event.target.value)"
            placeholder="District 1"
        />
      </CCol>
      <CCol sm="3">
        <CInput
            label="Region"
            name="address_region"
            :value="card_form_data.address_region"
            @keyup="updateFormData('address_region', $event.target.value)"
            placeholder="Ho Chi Minh"
        />
      </CCol>
      <CCol sm="3">
        <CInput
            label="Country"
            name="address_country"
            :value="card_form_data.address_country"
            @keyup="updateFormData('address_country', $event.target.value)"
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
    card_form_data: {
      type: Object,
      required: true
    }
  },
  methods: {
    updateFormData(key, value) {
      console.log(key);
      var formData = this.card_form_data;
      formData[key] = value;
      this.$emit("update-card-form-data", formData);
    }
  }
}
</script>
