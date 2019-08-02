<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component - {{ mutableValueFromProperty }}</div>

          <div class="card-body">
              I'm an example component {{ variable2 }}.
            <button ref="button" @click="buttonClicked()"  class="btn btn-primary">Click</button>

            <input v-model="mutableValueFromProperty" type="text" >

            <input v-model="variable2" type="text" >

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      variable1: "Name no. ", // inside component available using this.variable1
      variable2: 1, // in <template> available using variable2 (this isn't used, use {{ variable2 }} for printing value to HTML)
      mutableValueFromProperty: this.propFromParentComponent
    };
  },
  computed: {
    thisIsComputedProperty: function() {
      return this.variable1 + this.variable2;
    }
  },
  props: {
    /*
     * in parent component you can pass the value into component using <child-component prop-from-parent-component="valueFromParent" ></child-component>
     */
    propFromParentComponent: {
      required: true,
      type: String,
      default: function() {
        return null;
      }
    }
  },

  watch: {
      variable2: function(oldVal, newVal){
          if(newVal == 10){
              alert('You are lucky boy!!!');
          }
      }
  },

  methods: {
    /*
     * these component methods are callable from component using this.methodName()
     */
    buttonClicked: function() {
      // do something
      this.variable2++;
      this.mutableValueFromProperty = 'čau';
    }
  },

  /*
   * event handler of succesfull component's initiating
   */
  mounted() {
    console.log("Component mounted.");
    console.log(this.$refs);
    this.$refs.button.innerHTML = 'Catch me if you can';
  }
};
</script>
