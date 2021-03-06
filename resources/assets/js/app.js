
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.toastr = require('toastr');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

 // Todo app codes - start

Vue.component('todo', require('./components/Todo.vue'));
window.todo = new Vue({
  el: '#mainContent'
});

 // Todo app codes - end

/* Vue.component('example', require('./components/Example.vue')); */

/*
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
*/

/*
Vue.component('demo-component', {
    props: ['arritem'],
    template: '<li>{{ arritem }}</li>'
});

Vue.component('todo-item', {
  props: ['todo'],
  template: '<li>{{ todo.text }}</li>'
});
*/
/*
const app = new Vue({
    el: '#mainContent',
    data: {
      vue_test_message: '\u00A9 2016. All rights reserved.'
    }
});
*/

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
            this.btnClickCnt += 1;
        }
    }
});

window.appDemo = appDemo;
*/

/*
Vue.http.headers.common['X-CSRF-TOKEN'] = $('#token').attr('value');
new Vue({
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
    fillItem: {'title': '', 'description': '', id: ''},
    testTitle: 'DEBUG'
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
    this.getVueItems(this.pagination.current_page);
  },
  mounted: function() {
    this.getVueItems(this.pagination.current_page);
  },
  methods: {
    getVueItems: function(page) {
      this.$http.get('/vueitems?page='+page).then((response) => {
        this.$set(this, 'items', response.data.data.data);
        this.$set(this, 'pagination', response.data.pagination);
      });
    },
    createItem: function() {
      var inp = this.newItem;
      this.$http.post('/vueitems', inp).then((response) => {
        this.changePage(this.pagination.current_page);
        this.newItem = {
          'title': '',
          'description': ''
        };
        $('#create-item').modal('hide');
        toastr.success('Post created!', 'Success Alert', {
          timeout: 5000
        });
      }, (response) => {
        this.formErrors = response.data;
      });
    },
    editItem: function(item) {
      this.fillItem.title = item.title;
      this.fillItem.id = item.id;
      this.fillItem.description = item.description;
      $('#edit-item').modal('show');
    },
    updateItem: function(id) {
      var inp = this.fillItem;
      this.$http.put('/vueitems/' + id, inp).then((response) => {
        this.changePage(this.pagination.current_page);
        this.newItem = {
          'title': '',
          'description': '',
          'id': ''
        };
        $('#edit-item').modal('hide');
        toastr.success('Post updated!', 'Success Alert', {
          timeout: 5000
        });
      }, (response) => {
        this.formErrors = response.data;
      });
    },
    deleteItem: function(item) {
      this.$http.delete('/vueitems/' + item.id).then((response) => {
        this.changePage(this.pagination.current_page);
        toastr.success('Post deleted!', 'Success Alert', {
          timeout: 5000
        });
      });
    },
    changePage: function(page) {
      this.pagination.current_page = page;
      this.getVueItems(page);
    }
  }
});
*/
/*
Vue.component('demo-comp', {
  props: ['hellotxt'],
  template: '<span>This is from demo component. {{ hellotxt }}</span>'
});

Vue.component('demo', require('./components/Demo.vue'));
Vue.component('demoa', require('./components/Demoa.vue'));
*/

/*
Vue.component('demoa', {
  props: ['firstName'],
  template: '<p>Demo 2 component {{ firstName }}</p>'
});
*/
// Vue.component('demo-child', require('./components/Demo-Child.vue'));

/*
var vm = new Vue({
  el: '#mainContent',
  data: {
    cnt: 0,
    message: 'Hello Vue!',
    message2: 'Hello Vue World!',
    message_title: 'Hello Vue!!!',
    show_desc: false,
    desc: 'Hi again!',
    genres: ['Action', 'Romance', 'Thriller'],
    questions: [],
    answers: [],
    faqs: [],
    selQuestion: 0,
    selAnswer: ''
  },
  computed: {
    c_txtUpper: function() {
      return this.message.toUpperCase();
    },
    c_now: function() {
      return Date.now();
    }
  },
  mounted: function() {
    this.getFaqItems();
  },
  updated: function() {
    this.doFaqFunc();
  },
  watch: {
    selQuestion: function(v) {
    }
  },
  methods: {
    handleFaqChange: function() {
      var selIndex = _.findIndex(this.faqs, {id: this.selQuestion});
      if(selIndex == -1) {
        this.selAnswer = '';
      } else {
        this.selAnswer = this.faqs[selIndex].answer;
      }
    },
    getFaqItems: function(page) {
      this.$http.get('/faq?page=1').then((response) => {
        this.$set(this, 'questions', response.data.data.questions);
        this.$set(this, 'answers', response.data.data.answers);
        this.$set(this, 'faqs', response.data.data.faqs);
      });
    },
    setQuestion: function(id) {
      console.log(id);
      this.selQuestion = id;
    },
    doFaqFunc: function() {
      $('p.faq_answer').hide();
      $('p.faq_question a').click(function(e) {
        e.preventDefault();
        $('p.faq_answer').hide();
        $(this).parent().next().show(1000);
      });
    },
    m_txtUpper: function() {
      return this.message.toUpperCase();
    },
    m_now: function() {
      return Date.now();
    },
    sayHello: function() {
      alert('Hello');
    },
    cntUp: function() {
      this.cnt += 1;
    },
    cntDown: function() {
      if(this.cnt != 0)
        this.cnt -= 1;
    }
  },
  filters: {
    toUpper: function (value) {
      return value.toUpperCase();
  }
}
});
window.vm = vm;
*/

/* ECHO codes */
/*
Echo.channel('timeline_channel')
  .listen('CommentAdded', (e) => {
    $('.timelineItems').prepend('<li><p class="bg-info">' + e.timeline.comment + '</p><p class="text-right text-info">by <i>' + e.timeline.author + '</i></p></li>')
  });
*/
