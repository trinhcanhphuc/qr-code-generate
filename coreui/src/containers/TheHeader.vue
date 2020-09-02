<template>
  <CHeader fixed with-subheader light>
    <CHeaderBrand class="mx-auto" to="/">
      <CImg
        src="img/brand/qr-logo.png" height=32
        block
      />
      <h3 class="ml-2 mb-0">QR Code Generator</h3>
    </CHeaderBrand>
  </CHeader>
</template>

<script>
import CMenu from './Menu'
import TheHeaderDropdownAccnt from './TheHeaderDropdownAccnt'

export default {
  name: 'TheHeader',
  components: {
    TheHeaderDropdownAccnt,
    CMenu
  }
}
</script>