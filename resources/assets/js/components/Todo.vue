<template>
  <div>
    <section class="todoapp">
      <header class="header">
        <h1>todos</h1>
        <input class="new-todo" autofocus autocomplete="off" placeholder="What needs to be done?"  v-model="newTodo" @keyup.enter="addTodo">
      </header>
      <section class="main" v-show="todos.length" v-cloak>
        <input class="toggle-all" type="checkbox" v-model="allDone">
        <ul class="todo-list">
          <li v-for="todo in filteredTodos"
            class="todo"
            :key="todo.id"
            :class="{ completed: todo.status, editing: todo == editedTodo }">
            <div class="view">
              <input class="toggle" type="checkbox" v-model="todo.status">
              <label @dblclick="editTodo(todo)">{{ todo.todo }}</label>
              <button class="destroy" @click="removeTodo(todo)"></button>
            </div>
            <input class="edit" type="text"
              v-model="todo.todo"
              v-todo-focus="todo == editedTodo"
              @blur="doneEdit(todo)"
              @keyup.enter="doneEdit(todo)"
              @keyup.esc="cancelEdit(todo)">
          </li>
        </ul>
      </section>
      <footer class="footer" v-show="todos.length" v-cloak>
        <span class="todo-count">
          <strong>{{ remaining }}</strong> {{ remaining | pluralize }} left
        </span>
        <!--ul class="filters">
          <li><a href="#/all" :class="{ selected: visibility == 'all' }">All</a></li>
          <li><a href="#/active" :class="{ selected: visibility == 'active' }">Active</a></li>
          <li><a href="#/completed" :class="{ selected: visibility == 'completed' }">Completed</a></li>
        </ul-->
        <button class="clear-completed" @click="removeCompleted" v-show="todos.length > remaining">
          Clear completed
        </button>
      </footer>
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      newTodo: '',
      todos: [],
      filteredTodos: [],
      allDone: 0,
      remaining: 0,
      completed: 0,
      inCompleted: 0,
      todosLength: 10
    };
  },
  computed: {
    getChkStatus: function(status) {
      if(status == 'Completed') {
        return 'checked';
      } else {
        return '';
      }
    }
  },
  methods: {
    addTodo: function() {
      console.log(this.newTodo);
    },
    getTodoItems: function(page) {
      this.$http.get('/todos').then((response) => {
        this.$set(this, 'todos', response.data.data);
        this.$set(this, 'filteredTodos', response.data.data);
        this.$set(this, 'completed', response.data.completed);
        this.$set(this, 'inCompleted', response.data.inCompleted);
        this.$set(this, 'remaining', response.data.inCompleted);
        this.$set(this, 'todosLength', 2);
      });
    },
    removeCompleted: function() {

    },
    removeTodo: function() {

    },
    editedTodo: function() {

    }
  },
  directives: {
    'todo-focus': function() {

    }
  },
  filters: {
    pluralize: function(v) {
      return ((v == 1) ? 'item' : 'items');
    }
  },
  mounted() {
    // console.log('Todo component mounted.');
    this.getTodoItems();
  }
}
</script>
