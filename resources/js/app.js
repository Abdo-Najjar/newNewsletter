/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = require('vue');

window.axios = require('axios');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


// import TypeButton from './components/TypeButton.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Vue.component('typebutton' , {

//   template

// });
// //  import TypeButton from "./components/TypeButton.vue";



import TypeButton from './components/TypeButton';
import  Modal from './components/Modal';



const app = new Vue(
  {
    el: '#app',

    components: { 

      'typebutton': TypeButton,
     
      'modal': Modal,
    
    },

    data: {

      buttons: [],
      types: []

    },


    methods: {

      showErrorMessage(message)
      {
        toastr["error"](message)
        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }

      },


      getButtonType(type){

       return this.types.find(element=>element.includes(type));

      }
    },

    mounted()
    {
      axios.get('/types/json')

        .then((response) =>
        {

          response.data.forEach(type=>{

            app.types.push(type.type);

            app.buttons.push({
              type:type.type,
              target:`#modal-${type.type}`
            });

          });


        }
        ).catch((error) =>
        {

          app.showErrorMessage('Something went wrong!');

        });

    }


  }
)