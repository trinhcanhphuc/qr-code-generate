<template>
  <div>
    <v-row>
      <v-col cols="12">
        <v-text-field label="Email" name="email" placeholder="example@email.com" />
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <v-text-field label="Subject" name="subject" placeholder="Greeting!" />
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <v-textarea
          id="qrcode-text"
          label="Body"
          name="body"
          placeholder="Today, I write this email to inform"
          rows="3"
        />
      </v-col>
    </v-row>
  </div>
</template>
