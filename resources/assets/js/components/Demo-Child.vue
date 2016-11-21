<template>
  <div>
    <p>Full Name:: {{ firstName }} {{ lastName }}</p>
    <p><input type="text" v-model="fName" /></p>
  </div>
</template>

<script>
export default {
  // props: ['firstName', 'lastName'],
  props: {
    firstName: String,
    lastName: String
  },
  data() {
    return {
      fName: this.firstName
    };
  },
  ready() {
    // console.log('Component ready.');
  },
  mounted() {
    console.log('Demo-Child Component.');
  }
}
</script>
