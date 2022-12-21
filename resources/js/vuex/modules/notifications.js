import Axios from 'axios';

export default {
    state: {
        items: []
    },

    mutations: {
        LOAD_NOTIFICATION (state, notifications) {
            state.items = notifications;
        },

        MARK_AS_READ (state, idNotification) {
            let index = state.items.filter(notification => {
                return notification.id == idNotification.id;
            });

            state.items.splice(index, 1);
        },

        MARK_ALL_AS_READ (state) {
            state.items = [];
        },

        ADD_NOTIFICATION (state, notification) {
            state.items.push(notification);
        }
    },

    actions: {
        loadNotifications (context) {
            Axios.get('/notifications')
                .then(response => {
                    context.commit('LOAD_NOTIFICATION', response.data);
                }).catch(res => {
                    console.log(res);
                });
        },

        markAsRead (context, params) {
            Axios.put('/notification-read', params).then(() => context.commit('MARK_AS_READ', params));
        },

        markAllAsRead (context) {
            Axios.put('/notification-all-read')
                    .then(() => context.commit('MARK_ALL_AS_READ'));
        }
    }
}