<template>
  <v-app-bar
    color="white"
    elevation="8"
    fixed
    flat
  >
    <v-container class="py-0 px-2 fill-height">
      <router-link
        to='/'
      >
        <v-avatar
          size="40"
          tile
        >
          <v-img
            src="/img/brand/qr-logo.png"
            alt="QR Generator Logo"
          ></v-img>
        </v-avatar>
      </router-link>
      <v-spacer></v-spacer>
      <v-btn
        v-for="(page, idx) in pages"
        :key="idx"
        text
      >
        <router-link
          :to=page.url
        >
        {{ page.title }}
        </router-link>
      </v-btn>
      <router-link
        v-if="AUTH_USER_NAME"
        to='/profile'
      >
        <v-icon class='ml-3'>
          fas fa-user
        </v-icon>
        {{ AUTH_USER_NAME}}
      </router-link>
    </v-container>
  </v-app-bar>
</template>

<script>
export default {
  name: "Header",
  data() {
    return {
      pages: [
      ],
      AUTH_USER_NAME: AUTH_USER_NAME
    };
  }
}

String.prototype.convertToRGB = function () {
  if (this.length != 6) {
    throw "Only six-digit hex colors are allowed.";
  }

  let aRgbHex = this.match(/.{1,2}/g);
  let aRgb = [
    parseInt(aRgbHex[0], 16),
    parseInt(aRgbHex[1], 16),
    parseInt(aRgbHex[2], 16)
  ];
  return aRgb;
}
</script>
