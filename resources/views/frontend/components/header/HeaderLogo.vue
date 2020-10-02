<template>
    <strong class="logo">
        <router-link :to="{name: 'Home'}"><img :src="$baseUrl+'/saliim.png'" alt="logo"></router-link>
    </strong>
</template>

<script>
export default {
name: "HeaderLogo"
}
</script>

<style scoped>

</style>
