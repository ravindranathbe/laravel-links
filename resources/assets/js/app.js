
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

// Vue.component('example', require('./components/Example.vue'));

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

/*
Vue.component('demo-component', {
    props: ['arritem'],
    template: '<li>{{ arritem }}</li>'
    // props: ['todox'],
    // template: '<li>{{ todox.text }}</li>'
});

Vue.component('todo-item', {
  props: ['todo'],
  template: '<li>{{ todo.text }}</li>'
});
*/

const app = new Vue({
    el: '#mainContent',
    data: {
      vue_test_message: '\u00A9 2016. All rights reserved.'
    }
});

/*
var appDemo = new Vue({
    el: '#vueDemo',
    data: {
        msg1: 'Hello World!!!',
        bool1: false,
        arr1: ['One', 'Two', 'Three'],
        arr2: ['One', 'Two', 'Three'],
        btnClickCnt: 0,
        styleCnt: 'color: #FF0000;',
        msg2: 'Type something',
        todos: [
          { text: 'Learn JavaScript' },
          { text: 'Learn Vue' },
          { text: 'Build something awesome' }
        ]
    },
    methods: {
        sayHi: function() {
            // alert('Hi!');
            this.btnClickCnt += 1;
        }
    }
});

window.appDemo = appDemo;
*/

/*
Vue.http.headers.common['X-CSRF-TOKEN'] = $('#token').attr('value');
new Vue({
  // el: '#manage-vue',
  el: '#mainContent',
  data: {
    items: [],
    pagination: {
      total: 0,
      per_page: 2,
      from: 1,
      to: 0,
      current_page: 1
    },
    offset: 4,
    formErrors: {},
    formErrorsEdit: {},
    newItem: {'title': '', 'description': ''},
    fillItem: {'title': '', 'description': '', id: ''}
  },
  computed: {
    isActivated: function() {
      return this.pagination.current_page;
    },
    pagesNumber: function() {
      if(!this.pagination.to) {
        return [];
      }
      var from = this.pagination.current_page - this.offset;
      if(from < 1) {
        from = 1;
      }
      var to = from + (this.offset * 2);
      if(to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }
      var pagesArray = [];
      while(from <= to) {
        pagesArray.push(from);
        from++;
      }
      return pagesArray;
    }
  },
  ready: function() {
    console.log('debug');
    this.getVueItems(this.pagination.current_page);
  },
  methods: {
    getVueItems: function(page) {
      this.$http.get('/vueitems?page='+page).then((response) => {
        this.$set('items', response.data.data.data);
        this.$set('pagination', response.data.pagination);
      });
    },
    createItem: function() {

    }
  }
});
*/
