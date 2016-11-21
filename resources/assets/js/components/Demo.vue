<template>
  <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
          <div class="panel-heading">Welcome {{ firstName }} {{ lastName }}</div>

          <div class="panel-body">
              <!--I'm an example component! {{ data1 }}-->
              <!--demoa v-bind:firsta="firstName"></demoa-->

              <form>
                <label>Firstname</label>
                <input type="text" v-model.lazy="firstName" name="firstName" /><br />
                <label>Lastname</label>
                <input type="text" v-model="lastName" name="lastName" />
              </form>
              <demo-child v-bind:first-name="firstName" v-bind:last-name="lastName"></demo-child>
          </div>
      </div>
  </div>
</template>

<script>
export default {
  data() {
      return {
          data1: 'd1',
          firstName: '',
          lastName: ''
      };
  },
  ready() {
    // console.log('Component ready.');
  },
  mounted() {
    console.log('Demo component mounted.');
  }
}
</script>
