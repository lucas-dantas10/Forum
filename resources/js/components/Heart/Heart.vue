<template>
    <div class="d-flex align-item center" v-if="this.likes > 0">
        <i class="fa-regular fa-heart" @click.prevent="like"></i>  
        <p class="contador">{{ loadLikes }}</p>
    </div>

    <div class="d-flex align-item center" v-else>
        <i class="fa-regular fa-heart" id="card" @click.prevent="like"></i>  
        <p class="contador">{{ loadLikes }}</p>
    </div>
    

</template>

<script>
export default {

    props: ['id', 'likes'],

    created() {
        this.$store.dispatch('loadLikes', {
            idPost: this.id
        });
    },  

    methods: {
        like() {
            this.$store.dispatch("likes", {
                idPost: this.id,
                like: this.likes
            });
        }   
    },

    computed: {
        loadLikes() {
            return this.likes;
        }
    }

}
</script>

<style>
.contador {
    font-size: 19px;
    color: black;
}

#card {
    color: wheat;
}
</style>