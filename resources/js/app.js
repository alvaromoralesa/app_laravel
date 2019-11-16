require('./bootstrap');

window.Vue = require('vue');

Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('tareas-component', require('./components/TareasComponent.vue').default);
Vue.component('lista-component', require('./components/ListaComponent.vue').default);


const app = new Vue({
    el: '#app',
});
