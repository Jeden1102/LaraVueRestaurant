<template class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <router-link to=/ class=navbar-brand>
<img class="col-6" src="/images/logo.png" alt="">
        </router-link>
        <button class=navbar-toggler type=button data-toggle=collapse data-target=#navbarSupportedContent aria-controls=navbarSupportedContent aria-expanded=false aria-label="Toggle navigation">
            <span class=navbar-toggler-icon></span>
            
        </button>
        <div class="collapse navbar-collapse" id=navbarSupportedContent>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <router-link to=/home class=nav-link>Home</router-link>
                </li>
                <li class="nav-item ">
                    <router-link to=/menu class=nav-link>Menu</router-link>
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
        <button class="w-10 h-10 bg-yellow-600 text-white flex items-center justify-center bg-red-200 rounded-full"  @click="changeCart"><i class="fas fa-shopping-basket text-2xl mx-8 cart-icon"></i></button>
        
        </nav>
</template>

<script>
import { mapState } from 'vuex';

export default {

  computed: {
    logged() {
      return this.$store.state.logged;
    },
    cart(){
      return this.$store.state.showCart;
    }
  },
    methods:{
        changeCart(){
            this.$store.commit('changeCart');
            console.log('ok')
                        let wholeBox = document.querySelector('#cartBox');
            wholeBox.classList.toggle("hidden-cart-box");
        },
        logoutUser(){
        this.$store.commit('updateLogged');
        localStorage.removeItem('logged');
        localStorage.removeItem('userData');
        },


    },
      watch: {
    logged(newValue, oldValue) {
      
    },
        cart(newValue, oldValue) {
      
    },
  },

};

</script>

<style lang="scss" scoped>
.active{
  color:red !important;
}
</style>