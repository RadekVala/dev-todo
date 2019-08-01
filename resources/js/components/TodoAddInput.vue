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

      axios
        .post("/api/test", {
          name: this.todoTitle // pass todo title to store API
        })
        .then(resp => {
          console.log(resp.data);
        });
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
