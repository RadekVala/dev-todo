<template>
  <div>
    <div class="input-group mb-3">
      <input
        v-model="todoTitle"
        type="text"
        class="form-control"
        placeholder="New Todo name"
        aria-label="New Todo name"
        aria-describedby="button-new-todo"
      />
      <div class="input-group-append">
        <button
          @click="addTodoClicked()"
          class="btn btn-outline-secondary"
          type="button"
          id="button-new-todo"
        >Add new Todo</button>
      </div>
    </div>
  </div>
</template>

<style>
    h1 {
        color: black;
    }
</style>

<script>
export default {
  data() {
    return {
      todoTitle: ""
    };
  },

  methods: {
    /*
     * these component methods are callable from component using this.methodName()
     */
    addTodoClicked: function() {
      console.log(this.todoTitle);
      if (this.todoTitle.length > 0) {
        // Todos in grid should be updated - reload DB
        this.$eventHub.$emit("update-todos", this.todoTitle);

        //this.$parent.loading = true;
        axios
          .post("/api/todos", {
            name: this.todoTitle // pass todo title to store API
          })
          .then(response => {
            console.log(response.data);

            this.$parent.statusMessageObj = response.data;

            this.todoTitle = "";
          })
          .catch(error => {
            this.$parent.statusMessageObj = error.response.data;
          });
      }
    }
  },
  mounted() {
    console.log("Component mounted.");

    console.log(this.$root);
  }
};
</script>
