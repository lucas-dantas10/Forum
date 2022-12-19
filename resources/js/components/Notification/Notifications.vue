<template>
    <li class="nav-item dropdown d-flex align-items-center justify-content-start">
        <i class="fa-regular fa-bell" id="bell"></i>
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            ({{ notifications.length }})<span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            {{ notifications }}
            <!-- <notification 
                v-for="notification in notifications" 
                :key="notification.id"
                :notification="notification">            
            </notification> -->

            <a class="dropdown-item" href="#" @click.prevent="markAllAsRead">
                Limpar Notificações
            </a>
            
        </div>
    </li>
    
</template>

<script>

    export default {
        created () {
            this.$store.dispatch('loadNotification');
        },

        computed: {
            notifications() {                
                return this.$store.state.notifications.itens;
            }
        }
    }
</script>

<style>
 #bell {
    font-size: 25px;
    margin-right: 1rem;
    color: wheat;
    transition: .5s ease-in-out;
    cursor: pointer;
}

#bell:hover {
    color: black;
}
</style>