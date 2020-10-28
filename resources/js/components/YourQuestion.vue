<template>
  <div class="mx-12 mt-10">
    <h1 class="text-center">How can we help you?</h1>
    <v-row>
      <v-expansion-panels
        multiple
        class="mt-8 mb-5"
      >
        <v-expansion-panel
          v-for="(question, i) in questions"
          :key="i"
        >
          <v-expansion-panel-header>
            <b>{{ question.question }}</b>
          </v-expansion-panel-header>
          <v-expansion-panel-content>
            {{ question.answer }}
          </v-expansion-panel-content>
        </v-expansion-panel>
      </v-expansion-panels>
    </v-row>
  </div>
</template>

<script>
export default {
  name: 'YourQuestion',
  props: {},
  data() {
    return {
      questions: [
        {
          'question': 'How do I make a QR Code?',
          'answer': 'You can use our Free QR Code Generator app.\nAll you need to do is click on the link above and type the data you want to create a QR Code.'
        },
        {
          'question': 'What can I do with a QR Code?',
          'answer': 'You can connect the physical world with the digital. Use QR Codes to share data and information.\n' +
            '\n' +
            'For example: URL, Email Address, Phone Number, SMS, Plain Text, Location, Calendar.\n' +
            '\n'
        },
        {
          'question': 'What makes QR Codes special?',
          'answer': 'QR Codes can store a lot more information than barcodes.\n' +
            '\n' +
            'Unlike common UPC Barcodes, QR Codes are 2-dimensional. It means that the information in a QR code can be stored both vertically and horizontally.'
        },
        {
          'question': 'Is there a scan limit for QR Codes?',
          'answer': 'There are no limits with Pageloot. \n' +
            '\n' +
            'All your QR codes will work forever with us - for free.'
        },
        {
          'question': 'What are Static QR Codes?',
          'answer': 'Static QR Codes link directly to your content. \n' +
            '\n' +
            'You are not able to change the link or contents later - you will need to make a new QR Code. There are no statistics or tracking options. We always recommend using Dynamic QR Codes.'
        },
        {
          'question': 'What is a QR Code?',
          'answer': 'Most common way to interact with a QR Code is with a smartphone camera.\n' +
            '\n' +
            'Some smartphones have a built-in app for scanning QR Codes, other require a special App to be installed. Use our Free Online QR Code Scanner app.'
        },
        {
          'question': 'How to Scan a QR Code?',
          'answer': 'Most common way to interact with a QR Code is with a smartphone camera.\nSome smartphones have a built-in app for scanning QR Codes, other require a special App to be installed. Use our Free Online QR Code Scanner app.'
        },
        {
          'question': 'Can QR Codes Expire?',
          'answer': 'If the QR Code contents needs to be changed, then you must be using Dynamic QR Codes.\n' +
            '\n' +
            'Pageloot\'s QR Codes never expire and they will work forever.'
        },
        {
          'question': 'What are Dynamic QR Codes?',
          'answer': 'Dynamic Codes give you more freedom.\n' +
            '\n' +
            'It is possible to edit the contents later - also after they have been printed! Dynamic QR Codes use short URL forwarding - this means that you can track your users location and scan statistics.\n' +
            '\n'
        },
        {
          'question': 'Why is my QR Code not working?',
          'answer': 'Make sure there is enough contrast between the QR Code and background colors.\n' +
            '\n' +
            'You can try removing the logo in your QR code. Try reducing the data in your QR code when possible.'
        }
      ],
    }
  },
};
</script>
