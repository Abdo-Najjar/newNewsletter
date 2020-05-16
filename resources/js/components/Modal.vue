<template>
  <div
    class="modal fade"
    :id="getId"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{getTitle}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <slot></slot>     
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Modal",

  props: ["name"],

  computed: {
    getId() {
      return `modal-${this.name}`;
    },

    getTitle() {
      return `créer ${this.name}`;
    }
  },
  data() {
  return{

    isValid : true
 
 }
}

};
</script>