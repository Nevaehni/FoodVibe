require('./bootstrap');
window.Vue = require('vue');

Vue.component('nav-component', require('./components/NavComponent.vue').default);
Vue.component('restaurant-component', require('./components/RestaurantsComponent.vue').default);
Vue.component('restaurantpage-component', require('./components/RestaurantComponent.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);

const app = new Vue({
    el: '#app',
});
