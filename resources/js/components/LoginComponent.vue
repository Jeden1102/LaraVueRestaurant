<template>
    <div class=container>
    <div class="col-6 mx-auto mt-4">
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
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button @click.prevent="loginUser" type="submit" class="btn btn-primary">Submit</button>
            <pre>
                {{ returnData }}
                {{logged}}

            </pre>
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