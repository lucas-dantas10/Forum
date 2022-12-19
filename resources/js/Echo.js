import store from './vuex/store';

if (Laravel.user) {
    window.Echo.private(`Àpp.Models.User.${Laravel.user}`)
                .notification(notification => {
                    console.log(notification);
                    store.commit('ADD_NOTIFICATION', notification);
                })
}