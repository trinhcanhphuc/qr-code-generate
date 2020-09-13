<template>
  <div id="app">
    <v-app>
      <router-link to="/">Home</router-link>|
      <router-link to="/about">About</router-link>
      <router-view />
    </v-app>
  </div>
</template>

<script>
export default {
  name: "App",
};
</script>
