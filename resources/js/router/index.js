// /resources/js/router/index.js
import routes from 'vue-auto-routing';

window.Vue = require('vue');
import Router from 'vue-router';

Vue.use(Router)

export default new Router({
  routes,
  mode: 'history',
  base: '/',
});
