import Vue from 'vue';
import Vuex from 'vuex';

import notifications from './modules/notifications';
import likes from './modules/likes';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        notifications,
        likes
    }
});