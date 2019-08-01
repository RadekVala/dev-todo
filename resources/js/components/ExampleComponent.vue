<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>

          <div class="card-body">I'm an example component.</div>
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
  methods: {
    /*
     * these component methods are callable from component using this.methodName()
     */
    componentMethod: function() {
      // do something
    }
  },

  /*
  * event handler of succesfull initiating of component
  */
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
