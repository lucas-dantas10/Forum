import Axios from 'axios';

export default {
    state: {
        itens: []
    },

    mutations: {
        LOAD_NOTIFICATION (state, data) {
            state.itens = data
        },

        // ADD_NOTIFICATION (state, notification) {
        //     state.itens.push(notification);
        // }
    },

    actions: {
        loadNotification (context) {
            Axios.get('/notifications')
                .then(response => {
                    context.commit('LOAD_NOTIFICATION', response.data);
                });
        }
    }
}