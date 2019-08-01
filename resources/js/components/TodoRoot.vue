<template>
  <div>
    <div
      v-bind:class="messageShow +' alert alert-'+messageType"
      role="alert"
    >{{ statusMessageObj.message }}</div>
    <todo-add-input></todo-add-input>

    <todo-grid ref="grid"></todo-grid>
  </div>
</template>

<style scoped>
.alert {
  position: absolute;
  top: 20px;
  left: 50%;
  right: 50%;
  width: 400px;
  margin-left: -200px;
}
</style>

<script>
import { setTimeout } from "timers";
export default {
  data() {
    return {
      todoTitle: "test",
      messageType: "success",
      messageShow: "fade",
      statusMessageObj: {}
    };
  },

  watch: {
    statusMessageObj: function(newObj, oldObj) {
      console.log("OBJ", newObj);
      if (newObj.errors) {
        this.messageType = "danger";
      } else {
        this.messageType = "success";
      }

      // show status dialog
      this.messageShow = "";
      setTimeout(() => {
        this.messageShow = "fade";
      }, 5000);
    }
  },

  methods: {
    /*
     * these component methods are callable from component using this.methodName()
     */
    addTodoClicked: function() {
      console.log(this.todoTitle);
    }
  },
  mounted() {
    console.log("todo-root Component mounted.");
  }
};
</script>
