<template>
    <div>        
        <a class="dropdown-item" href="#" v-if="notification.data.like">
            <a @click.prevent="markAsRead(notification.id)">lida</a> {{ notification.data.like.post.title }} foi curtido por {{ notification.data.like.user.name }}
        </a>

        <a class="dropdown-item" href="#" v-else>
            <a @click.prevent="markAsRead(notification.id)">lida</a> {{ notification.data.comment.post.title }} foi comentado por {{ notification.data.comment.user.name }}
        </a>
    </div>
</template>

<script>

export default {
    props: ['notification'],

    methods: {
        markAsRead(idNotification) {
            this.$store.dispatch('markAsRead', {id: idNotification});
        }
    }
}
</script>