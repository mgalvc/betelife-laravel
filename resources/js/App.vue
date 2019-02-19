<template>
    <div id="wrapper">
        <navbar v-if="$store.state.logged"></navbar>
        <router-view></router-view>
    </div>
</template>

<script>
    import Navbar from './components/shared/navbar/Navbar'

    export default {
        components: {
            Navbar
        },
        mounted() {
            if (!this.$store.state.logged) {
                this.$router.replace('/login');
            }
        }
    }
</script>

<style scoped>
    #wrapper {
        width: 70%;
        position: relative;
        margin: 20px auto;
    }
</style>