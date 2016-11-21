<template>
  <p>Demo 2 component {{ firsta }}</p>
</template>

<script>
export default {
  props:  ['firsta'],
  ready() {
    // console.log('Component ready.');
  },
  mounted() {
    console.log('Demoa Component.');
  }
}
</script>
