<template>
    <div class="container">
    <h2 class="m-4">
        Hi!
        {{userData['user']['name']}}
        {{ email }} x {{ name }}
        {{ data }}
    </h2>
  <b-card no-body>
    <b-tabs pills card>
      <b-tab title="User info" active>
      <b-card-text>
    <h2>Account info</h2>

    <div>

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
                                <label for="name">name</label>
                                <input type="name" v-model="user.name" id="name" name="name" class="form-control" :class="{ 'is-invalid': submitted && $v.user.name.$error }" />
                                <div v-if="submitted && $v.user.name.$error" class="invalid-feedback">
                                    <span v-if="!$v.user.name.required">name is required</span>
                                    <span v-if="!$v.user.name.minLength">name must be at least 6 characters</span>
                                </div>
                            </div>

    
                            <div class="form-group">
                                <button class="btn btn-primary">Set</button>
                            </div>
                           <b-alert v-if="info" show variant="success">{{ info }}</b-alert>
                            
                                                                    <div   v-if="errorMsg" class="alert alert-warning" role="alert">
                                            <ul>
                                                <li v-for="error in errorMsg">{{error[0]}}</li>
                                            </ul>
                                        </div>
                        </form>

  </div>
<hr>
  <div class="mt-4">
    <h2>Delivery info</h2>
                        <form @submit.prevent="handleDelivery">
                            <div class="form-group">
                                <label for="city">city</label>
                                <input type="city" v-model="user.city" id="city" name="city" class="form-control" :class="{ 'is-invalid': submitted && $v.user.city.$error }" />
                                <div v-if="submitted && $v.user.city.$error" class="invalid-feedback">
                                    <span v-if="!$v.user.city.required">city is required</span>
                                    <span v-if="!$v.user.city.minLength">Minimum character length is 3</span>
                                </div>
                            </div>
                           <div class="form-group">
                                <label for="street">street</label>
                                <input type="street" v-model="user.street" id="street" name="street" class="form-control" :class="{ 'is-invalid': submitted && $v.user.street.$error }" />
                                <div v-if="submitted && $v.user.street.$error" class="invalid-feedback">
                                    <span v-if="!$v.user.street.required">street is required</span>
                                    <span v-if="!$v.user.street.minLength">Minimum character length is 3</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="number">number</label>
                                <input type="number" v-model="user.number" id="number" name="number" class="form-control" :class="{ 'is-invalid': submitted && $v.user.number.$error }" />
                                <div v-if="submitted && $v.user.number.$error" class="invalid-feedback">
                                    <span v-if="!$v.user.number.required">number is required</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">phone</label>
                                <input type="phone" v-model="user.phone" id="phone" name="phone" class="form-control" :class="{ 'is-invalid': submitted && $v.user.phone.$error }" />
                                <div v-if="submitted && $v.user.phone.$error" class="invalid-feedback">
                                    <span v-if="!$v.user.phone.required">phone is required</span>
                                    <span v-if="!$v.user.phone.minLength">Minimum character length is 7</span>
                                    <span v-if="!$v.user.phone.maxLength">Maximum character length is 11</span>
                                </div>
                            </div>

                                        <div   v-if="deliveryInfo" class="alert alert-success" role="alert">
                                            {{ deliveryInfo }}
                                        </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Set</button>
                            </div>
                        </form>

  </div>
  <hr>
    <div class="mt-4">
    <h2>Change password</h2>
  <form @submit.prevent="handlePassword">
                            <div class="form-group">
                                <label for="oldPassword">Old Password</label>
                                <input type="password" v-model="changePassword.oldPassword" id="oldPassword" name="oldPassword" class="form-control" :class="{ 'is-invalid': submitted && $v.changePassword.oldPassword.$error }" />
                                <div v-if="submitted && $v.changePassword.oldPassword.$error" class="invalid-feedback">
                                    <span v-if="!$v.changePassword.oldPassword.required">Password is required</span>
                                    <span v-if="!$v.changePassword.oldPassword.minLength">Password must be at least 6 characters</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" v-model="changePassword.password" id="password" name="password" class="form-control" :class="{ 'is-invalid': submitted && $v.changePassword.password.$error }" />
                                <div v-if="submitted && $v.changePassword.password.$error" class="invalid-feedback">
                                    <span v-if="!$v.changePassword.password.required">Password is required</span>
                                    <span v-if="!$v.changePassword.password.minLength">Password must be at least 6 characters</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">New Password Repeat</label>
                                <input type="password" v-model="changePassword.confirmPassword" id="confirmPassword" name="confirmPassword" class="form-control" :class="{ 'is-invalid': submitted && $v.changePassword.confirmPassword.$error }" />
                                <div v-if="submitted && $v.changePassword.confirmPassword.$error" class="invalid-feedback">
                                    <span v-if="!$v.changePassword.confirmPassword.required">Confirm Password is required</span>
                                    <span v-else-if="!$v.changePassword.confirmPassword.sameAsPassword">Passwords must match</span>
                                </div>
                            </div>
                                        <div   v-if="pwdInfo" class="alert alert-success" role="alert">
                                            {{ pwdInfo }}
                                        </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Change</button>
                            </div>
                        </form>




  </div>
      </b-card-text>
      </b-tab>
      <b-tab active title="Statistics&History"><b-card-text>
        <stats/>
      </b-card-text></b-tab>
    </b-tabs>
  </b-card>
  
    </div>
</template>

<script>
import { mapState } from 'vuex';
import { required, email, minLength, sameAs,maxLength } from "vuelidate/lib/validators";
import stats from '../components/stats.vue';
export default {
    components:{
        stats
    },
    data(){
        return{
            info : null,
            data:null,
            errorMsg : null,
            deliveryMsg:null,
            pwdInfo : null,
            deliveryInfo:null,
            //user info
                user: {
                    email: "",
                    name: "",
                    city: "",
                  street: "",
                  number: "",
                  phone: "",
                },

                changePassword:{
                                      password: "",
                    confirmPassword: "",
                    oldPassword: ""
                },
                submitted: false,
                errorMsg : null


        }
    },
    computed: {
        ...mapState([
            'userData',
            'logged'
        ])
    },
    mounted() {
      this.user = this.userData["user"];
      let x = document.querySelector('#testowy___BV_tab_button__');
      console.log(x);
    },
    methods:{
        reloadUserData(){
      this.user = this.userData["user"];
        },
            handleSubmit(e){
                this.submitted = true;
                let self= this;
                // stop here if form is invalid
                this.$v.user.name.$touch();
                this.$v.user.email.$touch();
                if (this.$v.user.name.$invalid || this.$v.user.name.$invalid ) {
                    return;
                }
                //ok
            let token = this.userData["token"];
            var postData = {
            id: this.userData['user']['id'],
            email : this.user.email,
            name:this.user.name,
            token:this.userData["token"]
            };
            let axiosConfig = {
            headers: {
                "Authorization" : `Bearer ${token}`,
            }
            };
            axios.post('/api/editGeneral', postData, axiosConfig)
            .then((res) => {
                self.errorMsg = null;
                self.info = res.data.info;
                self.$store.commit("setUserData",res.data);
                localStorage.setItem('userData', JSON.stringify(res.data));
                self.reloadUserData();
            })
            .catch((err,response) => {
                self.info = null;
                self.errorMsg = err.response.data.errors;

            })
            },
            handleDelivery(e){
                this.submitted = true;
                // stop here if form is invalid
                this.$v.user.city.$touch();
                this.$v.user.street.$touch();
                this.$v.user.number.$touch();
                this.$v.user.phone.$touch();
                if (this.$v.user.city.$invalid || this.$v.user.phone.$invalid || this.$v.user.street.$invalid || this.$v.user.number.$invalid  ) {
                    return;
                }
                //if ok
                let self = this;
                 let token = this.userData["token"];
            var postData = {
            id: this.userData['user']['id'],
            city : this.user.city,
            street:this.user.street,
            number:this.user.number,
            phone:this.user.phone,
            token:this.userData["token"]
            };
            let axiosConfig = {
            headers: {
                "Authorization" : `Bearer ${token}`,
            }
            };
            axios.post('/api/editDelivery', postData, axiosConfig)
            .then((res) => {
                self.deliveryInfo = null;
                self.deliveryInfo = res.data.info;
                self.$store.commit("setUserData",res.data);
                localStorage.setItem('userData', JSON.stringify(res.data));
                self.reloadUserData();
            })
            .catch((err,response) => {
                self.deliveryMsg = err.response.data.errors;
            })
            },
            handlePassword(e){
                this.submitted = true;
                // stop here if form is invalid
                this.$v.changePassword.$touch();
                if (this.$v.changePassword.$invalid) {
                    return;
                }
                 let self = this;
                 let token = this.userData["token"];
            var postData = {
            id: this.userData['user']['id'],
            oldPassword:this.changePassword.oldPassword,
            password:this.changePassword.confirmPassword
            };
            let axiosConfig = {
            headers: {
                "Authorization" : `Bearer ${token}`,
            }
            };
            axios.post('/api/pwdChange', postData, axiosConfig)
            .then((res) => {
                self.pwdInfo = null;
                self.pwdInfo = res.data.info;
            })
            .catch((err,response) => {
                self.pwdInfo = null;
                self.pwdInfo = err.response.data.message;
            })
            }

    },
        validations: {
            user: {
                email: { required, email },
                name: { required, minLength: minLength(4) },
                city:{required,minLength:minLength(3)},
                street:{required,minLength:minLength(3)},
                number:{required},
                phone:{required,minLength:minLength(7),maxLength:maxLength(11)},
            },

            changePassword: {
                password: { required, minLength: minLength(6) },
                confirmPassword: { required, sameAsPassword: sameAs('password') },
                oldPassword: { required, minLength:minLength(6)},
            }
        },
};

</script>

<style lang="scss" scoped>

</style>