<template>
    <div>        
        <a class="dropdown-item" href="#">
            <a @click.prevent="markAsRead(notification.id)">lida</a> {{ notification.data.like.post.title }} foi curtido por {{ notification.data.like.user.name }}
        </a>
    </div>
</template>

<script>

export default {
    props: ['notification'],

    methods: {
        markAsRead(idNotification) {
            console.log("id no componente Notification: ", idNotification);
            this.$store.dispatch('markAsRead', {id: idNotification});
        }
    }
}
</script>