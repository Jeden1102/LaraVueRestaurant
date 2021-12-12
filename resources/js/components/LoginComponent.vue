<template >
    <div class="container flex mt-8 mb-8 flex-col md:flex-row">
        <div class="w-full md:w-1/2 mx-auto">
            <img  src="/images/hamburger.svg" alt="">
        </div>
    <div class="w-full md:w-1/2  mx-auto mt-4">
                        <form @submit.prevent="handleSubmit">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" v-model="user.email" id="email" name="email" class="form-control" :class="{ 'is-invalid': submitted && $v.user.email.$error }" />
                                <div v-if="submitted && $v.user.email.$error" class="invalid-feedback">
                                    <span v-if="!$v.user.email.required">Email is required</span>
                                    <span v-if="!$v.user.email.email">Email is invalid</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" v-model="user.password" id="password" name="password" class="form-control" :class="{ 'is-invalid': submitted && $v.user.password.$error }" />
                                <div v-if="submitted && $v.user.password.$error" class="invalid-feedback">
                                    <span v-if="!$v.user.password.required">Password is required</span>
                                    <span v-if="!$v.user.password.minLength">Password must be at least 6 characters</span>
                                </div>
                            </div>

                                        <div   v-if="errorMsg" class="alert alert-warning" role="alert">
                                            {{ errorMsg }}
                                        </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Login</button>
                            </div>
                        </form>
    </div>
    </div>
</template>
<script>
import axios from 'axios';
import { mapState } from 'vuex';
import { required, email, minLength, sameAs } from "vuelidate/lib/validators";


    export default {
            computed: {
        ...mapState([
            'logged',
            'userData'
        ])
    },
        data(){
            return{
                user: {
                    email: "",
                    password: "",
                },
                submitted: false,
                errorMsg : null
            }
            
        },
                validations: {
            user: {
                email: { required, email },
                password: { required, minLength: minLength(6) },
            }
        },
        methods: {
            handleSubmit(e){

                           this.submitted = true;

                // stop here if form is invalid
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return;
                }

                let self = this;
                axios.post('/api/login', {
                email: this.user.email,
                password: this.user.password,
            })
            .then(function (response) {
                self.returnData = response.data;
                self.$store.commit("updateLogged");
                self.$store.commit("setUserData",response.data);
                localStorage.setItem('logged', true);
                localStorage.setItem('userData', JSON.stringify(response.data));
                self.$router.push('/?logged');
            })
            .catch(function (error,response) {

                self.errorMsg = error.response.data.message
                console.log(self.errorMsg);
            });
            }
        },
        
    }
</script>