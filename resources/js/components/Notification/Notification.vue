<template>
    <div>        
        <a class="dropdown-item" href="#">
            {{ notification }}
        </a>
    </div>
</template>

<script>

export default {
    props: ['notification'],
}
</script>