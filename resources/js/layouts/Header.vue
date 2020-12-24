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
          class='text-dark user-select-none nounderline'
          :to=page.url
        >
        {{ page.title }}
        </router-link>
      </v-btn>
      <v-menu
        bottom
        min-width="200px"
        rounded
        offset-y
        v-if="AUTH_USER_NAME"
      >
        <template v-slot:activator="{ on }">
          <v-btn
            icon
            x-large
            v-on="on"
          >
            <v-avatar
              size="48"
            >
              <span class="headline">
                <v-icon>mdi-account</v-icon>
              </span>
            </v-avatar>
          </v-btn>
        </template>
        <v-card>
          <v-list-item-content class="justify-center">
            <div class="mx-auto text-center">
              <router-link
                class='text-dark user-select-none nounderline'
                to='/profile'
              >
                <v-avatar
                  size="48"
                >
                  <span class="headline">
                    <v-icon>mdi-account-circle</v-icon>
                  </span>
                </v-avatar>
                {{ AUTH_USER_NAME }}
              </router-link>
              <v-divider class="my-3"></v-divider>
              <v-btn
                depressed
                rounded
                text
                @click="goLogout()"
              >
                <v-icon>
                  mdi-logout
                </v-icon>
                Logout
              </v-btn>
            </div>
          </v-list-item-content>
        </v-card>
      </v-menu>
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

      ],
      AUTH_USER_NAME: AUTH_USER_NAME
    };
  },
  methods: {
    goLogin() {
      window.location = '/login';
    },
    goLogout() {
      window.location = '/logout';
    }
  }
}
</script>
