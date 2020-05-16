<template>
  <div class="d-inline-block">
    <button
      type="button"
      class="btn btn-primary py-2 mr-2 create-component-btn"
      :data-target="target"
      data-toggle="modal"
    >créer {{button.type}}</button>
  </div>
</template>

<script>
export default {
  name: "Typebutton",

  props: ["button"],

  computed: {
    target() {
      return `#modal-${this.button.type}`;
    }
  }
};
</script>