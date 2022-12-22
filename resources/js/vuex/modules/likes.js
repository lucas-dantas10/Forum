import Axios from "axios"

export default {
    state: {
        itemsLike: []
    },

    mutations: {
        LIKE (state, curtida) {
            state.itemsLike = curtida;
        },

        ADD_LIKE (state, likes) {
            state.itemsLike.push(likes);
        }
    },

    actions: {
        loadLikes (context, params) {
            Axios.put('/load-likes', params).then(res => {
                context.commit('LIKE', res.data)
            })
        },

        likes(context, params) {
            Axios.put('/likes', params).then(() => {
                context.commit('ADD_LIKE', params)
            });
        }
    }
}