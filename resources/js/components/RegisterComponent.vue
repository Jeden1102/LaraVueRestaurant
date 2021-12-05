<template>
    <div class="container flex mt-8 mb-8 flex-col md:flex-row">
                <div class="w-full md:w-1/3 mx-auto">
            <img  src="/images/cooking.svg" alt="">
        </div>
    <div class=" w-full md:w-1/2 col-6 mx-auto mt-4">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input v-model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input v-model="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input v-model="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm password</label>
                <input v-model="confPassword" type="password" class="form-control" id="exampleInputPassword1">
            </div>


            <button @click.prevent="loginUser" type="submit" class="p-2 mx-2  inline-flex items-center  border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-sign-in-alt mr-2"></i>
            Register
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
                confPassword:'',
                name:'',
                returnData:[]
            }
        },
        methods: {
            loginUser(){
                let self = this;
                axios.post('/api/register', {
                email: this.email,
                password: this.password,
                password_confirmation : this.confPassword,
                name : this.name,
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