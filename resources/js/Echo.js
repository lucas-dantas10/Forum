import store from './vuex/store';
import swal from 'sweetalert';

if (Laravel.user) {
    window.Echo.private(`App.User.${Laravel.user.id}`)
                .notification(not => {
                    if (not.data.like.post.user_id == Laravel.user.id)  {
                        console.log(not);
                    }

                    swal({
                        title: 'Nova Curtida',
                        text: `O usuário ${not.data.like.user.name} curtiu seu post ${not.data.like.post.title}`,
                        icon: 'info',
                    })

                    store.commit('ADD_NOTIFICATION', not);
                    
                });
}