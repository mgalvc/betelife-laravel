import Vue from 'vue'
import App from './App'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import SuiVue from 'semantic-ui-vue'
import VueTheMask from 'vue-the-mask'
import { routes } from './routes'
import { storeData } from './store'
import 'vue-awesome/icons'
import Icon from 'vue-awesome/components/Icon'

Vue.use(VueResource);
Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(SuiVue);
Vue.use(VueTheMask);

Vue.component('v-icon', Icon);

const router = new VueRouter({
    routes,
    mode: 'history'
});

const store = new Vuex.Store(storeData);

const app = new Vue({
    el: '#app',
    store,
    router,
    render: h => h(App)
});
