<template>
  <v-app-bar
    color="white"
    elevation="8"
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
            alt="QR Tool Logo"
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
          class='text-dark user-select-none'
          style='text-decoration: none;'
          :to=page.url
        >
        {{ page.title }}
        </router-link>
      </v-btn>
      <router-link
        v-if="AUTH_USER_NAME"
        to='/profile'
      >
        <v-avatar
          size="56"
        >
          <v-icon class='ml-3'>
            fas fa-user
          </v-icon>
        </v-avatar>
      </router-link>
      <v-btn
        v-else
        text
        @click="goLogin()"
      >
        Login
      </v-btn>
    </v-container>
  </v-app-bar>
</template>

<script>
export default {
  name: "Header",
  data() {
    return {
      pages: [
        {
          'title': 'About',
          'url': '/about'
        }
      ],
      AUTH_USER_NAME: AUTH_USER_NAME
    };
  },
  methods: {
    goLogin() {
      window.location = '/login';
    }
  }
}
</script>
