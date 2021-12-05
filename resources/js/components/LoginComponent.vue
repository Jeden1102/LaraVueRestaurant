<template >
    <div class="container flex mt-8 mb-8 flex-col md:flex-row">
        <div class="w-full md:w-1/2 mx-auto">
            <img  src="/images/hamburger.svg" alt="">
        </div>
    <div class="w-full md:w-1/2  mx-auto mt-4">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input v-model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input v-model="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button @click.prevent="loginUser" type="submit" class="p-2  inline-flex items-center  border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <i class="fas fa-sign-in-alt mr-2"></i>
            Login
            </button>
            <button @click.prevent="loginUser" type="submit" class="p-2 mx-2  inline-flex items-center  border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <router-link to=/register class="text-white" >Register</router-link>
            </button>
        </form>
    </div>
    </div>
</template>
<script>
import axios from 'axios';
import { mapState } from 'vuex';

    export default {
            computed: {
        ...mapState([
            'logged',
            'userData'
        ])
    },
        data(){
            return{
                email :'',
                password:'',
                returnData:[]
            }
        },
        methods: {
            loginUser(){
                let self = this;
                axios.post('/api/login', {
                email: this.email,
                password: this.password
            })
            .then(function (response) {
                self.returnData = response.data;
                self.$store.commit("updateLogged");
                self.$store.commit("setUserData",response.data);
                localStorage.setItem('logged', true);
                localStorage.setItem('userData', JSON.stringify(response.data));
                self.$router.push('account');
            })
            .catch(function (error,response) {
                self.returnData = error.response.data;
            });
            }
        },
        
    }
</script>