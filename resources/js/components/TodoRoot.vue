<template>
  <div>
    <todo-add-input></todo-add-input>
  </div>
</template>

<script>
export default {
  data() {
    return {
      todoTitle: "",
    };
  },

  methods: {
    /*
     * these component methods are callable from component using this.methodName()
     */
     addTodoClicked: function() {
      console.log(this.todoTitle);
    },
  },
  mounted() {
      console.log("todo-root Component mounted.");
    }
};
</script>
