<template>
    <li class="nav-item dropdown d-flex align-items-center justify-content-start">
        <div v-if="notifications.length == 0">
            <i class="fa-regular fa-bell" id="bell"></i>
        </div>

        <div v-else>
            <i class="fa-regular fa-bell" id="bells"></i>
        </div>
        
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            ({{ notifications.length }})<span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <notification 
                v-for="notification in notifications" 
                :key="notification.id"
                :notification="notification">            
            </notification>

            <a class="dropdown-item" href="#" @click.prevent="markAllAsRead">
                Limpar Notificações
            </a>
            
        </div>
    </li>
    
</template>


<script>

    export default {

        created() {
            this.$store.dispatch('loadNotifications');
        },  

        computed: {
            notifications() {
                return this.$store.state.notifications.items;
            }
        },

        methods: {
            markAllAsRead() {
                this.$store.dispatch('markAllAsRead');
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

#bells {
    font-size: 25px;
    margin-right: 1rem;
    color: black;
    transition: .5s ease-in-out;
    cursor: pointer;
}
</style>

