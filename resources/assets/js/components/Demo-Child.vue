<template>
  <p>Full Name:: {{ firstName }} {{ lastName }}</p>
</template>

<script>
export default {
  props: ['firstName', 'lastName'],
  ready() {
    // console.log('Component ready.');
  },
  mounted() {
    console.log('Demo-Child Component.');
  }
}
</script>
