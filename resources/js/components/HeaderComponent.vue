<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <router-link to=/ class=navbar-brand>Navbar</router-link>
        <button class=navbar-toggler type=button data-toggle=collapse data-target=#navbarSupportedContent aria-controls=navbarSupportedContent aria-expanded=false aria-label="Toggle navigation">
            <span class=navbar-toggler-icon></span>
            
        </button>

        <div class="collapse navbar-collapse" id=navbarSupportedContent>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <router-link to=/home class=nav-link>Home</router-link>
                </li>
                <li v-if="!logged" class=nav-item>
                    <router-link to=/login class=nav-link>Login</router-link>
                </li>
                <li v-if="!logged" class=nav-item>
                    <router-link to=/register class=nav-link>Register</router-link>
                </li>
                <li v-if="logged" class=nav-item>
                    <router-link to=/account class=nav-link>My account</router-link>
                </li>
                <li v-if="logged" class=nav-item>
                    <button @click="logoutUser" type="submit"  class="btn btn-primary">Logout</button>
                    
                </li>
            </ul>
        </div>
        </nav>
</template>

<script>
import { mapState } from 'vuex';

export default {

  computed: {
    logged() {
      return this.$store.state.logged;
    },
  },
    methods:{
        logoutUser(){
        this.$store.commit('updateLogged');
        localStorage.removeItem('logged');
        localStorage.removeItem('userData');
        }

    },
      watch: {
    logged(newValue, oldValue) {
      
    },
  },

};

</script>

<style lang="scss" scoped>

</style>