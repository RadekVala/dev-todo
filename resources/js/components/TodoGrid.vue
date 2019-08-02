<template>
  <div>
    <div class="row">
      <div v-for="(todo, index) in todos" class="col-sm-6 col-md-4 col-lg-3">
        <div class="card my-3">
          <div
            class="card-header"
            v-bind:class="[todo.status_id == 1 ? 'incompleted' : 'completed']"
          >
            {{ todo.name }}
            <span @click="deleteTodo(todo.id, index)" v-show="index == indexEdited">✗</span>
          </div>

          <div v-on:dblclick="editDescription(index, 'textarea' + index)" class="card-body">
            <div v-show="index == indexEdited">
              <textarea
                v-model="todo.description "
                v-bind:ref="'textarea' + index"
                class="form-control"
                rows="3"
              ></textarea>
              <button
                v-on:click="saveClicked(todo.id, todo.description)"
                type="button"
                class="btn btn-primary btn-sm btn-block"
              >Save</button>
            </div>
            <div v-show="index !== indexEdited">{{ todo.description }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.card-header.completed {
  background-color: aquamarine;
}
.card-header.completed::before {
  content: "✔";
  padding-right: 15px;
}

.card-header span {
  float: right;
  cursor: pointer;
}
</style>

<script>
export default {
  data() {
    return {
      indexEdited: null,
      todos: []
    };
  },

  methods: {
    deleteTodo: function(todoId, index) {
      axios
        .delete("/api/todos/" + todoId)
        .then(response => {
          this.$parent.statusMessageObj = response.data;

          // remove deleted item from components array
          this.indexEdited = null;
          this.todos.splice(index, 1);
        })
        .catch(error => {
          this.$parent.statusMessageObj = error.response.data;
        });
    },
    editDescription: function(index, ref) {
      this.indexEdited = index;
      console.log(this.$refs[ref][0]);
      setTimeout(() => {
        this.$refs[ref][0].focus();
      }, 50);
    },
    loadTodos: function() {
      axios
        .get("/api/todos")
        .then(response => {
          console.log(response.data);

          this.todos = response.data;

          console.log(this.$refs);
          this.$parent.loading = false;
        })
        .catch(error => {
          this.$parent.statusMessageObj = error.response.data;
        });
    },
    saveClicked: function(todoId, description) {
      console.log(description);
      this.indexEdited = null;

      axios
        .put("/api/todos/" + todoId, {
          description: description // pass todo description to API
        })
        .then(response => {
          console.log(response.data);

          this.$parent.statusMessageObj = response.data;
        })
        .catch(error => {
          this.$parent.statusMessageObj = error.response.data;
        });
    }
  },
  mounted() {
    console.log("Component mounted.");

    this.loadTodos();

    this.$eventHub.$on("update-todos", itemTitle => {
      console.log("Todo items are loaded from DB");
      this.todos.unshift({
        created_at: "",
        description: null,
        id: 0,
        name: itemTitle,
        status_id: 1,
        updated_at: "",
        user_id: 1
      });
      //this.loadTodos();
    });
  }
};
</script>
