<template>
    <div class="container flex mt-8 mb-8 flex-col md:flex-row">
                <div class="w-full md:w-1/3 mx-auto">
            <img  src="/images/cooking.svg" alt="">
        </div>
    <div class=" w-full md:w-1/2 col-6 mx-auto mt-4">

                        <form @submit.prevent="handleSubmit">
                            <div class="form-group">
                                <label for="name"> Name</label>
                                <input type="text" v-model="user.name" id="name" name="name" class="form-control" :class="{ 'is-invalid': submitted && $v.user.name.$error }" />
                                <div v-if="submitted && !$v.user.name.required" class="invalid-feedback">Name is required</div>
                                <div v-if="submitted && !$v.user.name.minLength" class="invalid-feedback">Name has to be at least 4 characters long</div>
                            </div>

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
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" v-model="user.confirmPassword" id="confirmPassword" name="confirmPassword" class="form-control" :class="{ 'is-invalid': submitted && $v.user.confirmPassword.$error }" />
                                <div v-if="submitted && $v.user.confirmPassword.$error" class="invalid-feedback">
                                    <span v-if="!$v.user.confirmPassword.required">Confirm Password is required</span>
                                    <span v-else-if="!$v.user.confirmPassword.sameAsPassword">Passwords must match</span>
                                </div>
                            </div>
                                        <div   v-if="errorMsg" class="alert alert-warning" role="alert">
                                            <ul>
                                                <li v-for="error in errorMsg">{{error[0]}}</li>
                                            </ul>
                                        </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Register</button>
                            </div>
                        </form>

        </div>
    </div>

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
                    name: "",
                    email: "",
                    password: "",
                    confirmPassword: ""
                },
                submitted: false,
                errorMsg : null
            }
        },
                validations: {
            user: {
                name: { required,minLength: minLength(4) },
                email: { required, email },
                password: { required, minLength: minLength(6) },
                confirmPassword: { required, sameAsPassword: sameAs('password') }
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
                axios.post('/api/register', {
                email: this.user.email,
                password: this.user.password,
                password_confirmation : this.user.confirmPassword,
                name : this.user.name,
            })
            .then(function (response) {
                self.returnData = response.data;
                self.$store.commit("updateLogged");
                self.$store.commit("setUserData",response.data);
                localStorage.setItem('logged', true);
                localStorage.setItem('userData', JSON.stringify(response.data));
                self.$router.push('/?registered');
            })
            .catch(function (error,response) {

                self.errorMsg = error.response.data.errors;
                console.log(self.errorMsg);
            });
            }
        },
        
    }
</script>