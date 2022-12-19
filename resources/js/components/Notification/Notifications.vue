<template>
    <i class="fa-regular fa-bell" id="bell"></i>
</template>

<script>

export default {
    mounted() {
        console.log("Componente criado");
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