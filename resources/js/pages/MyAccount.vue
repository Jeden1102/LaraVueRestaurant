<template>
    <div>
    <h2 class="m-4">
        Hi!
        {{userData['user']['name']}}
        {{ email }} x {{ name }}
    </h2>
  <b-card no-body>
    <b-tabs pills card>
      <b-tab title="User info" active>
      <b-card-text>
    <h2>Account info</h2>

    <div>

    <b-form @submit="test()" >
      <b-form-group
        id="input-group-1"
        label="Email address:"
        label-for="input-1"
        description="We'll never share your email with anyone else."
      >
        <b-form-input
          id="input-1"
          type="email"
          placeholder="Enter email"
          required
          v-model.trim="$v.name.$model"
        ></b-form-input>
      </b-form-group>
  <div class="error" v-if="!$v.name.required">Field is required</div>
  <div class="error" v-if="!$v.name.minLength">Name must have at least {{$v.name.$params.minLength.min}} letters.</div>
      <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
        <b-form-input
          id="input-2"
          placeholder="Enter name"
          required
                    v-model="name"
        ></b-form-input>
      </b-form-group>
      

      <b-button type="submit" variant="primary">Submit</b-button>
    </b-form>

  </div>
<hr>
  <div class="mt-4">
    <h2>Delivery info</h2>

    <b-form @submit="test()" >
      <b-form-group
        id="input-group-1"
        label="City:"
        label-for="input-1"
      >
        <b-form-input
          id="input-1"
          type="text"
          placeholder="Opole"
          required
          v-model="city"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Street:" label-for="input-2">
        <b-form-input
          id="input-2"
          placeholder="Ozimska"
          required
                    v-model="street"
        ></b-form-input>
      </b-form-group>
      <b-form-group id="input-group-2" label="Number:" label-for="input-2">
        <b-form-input
          id="input-2"
          placeholder="12/14"
          required
                    v-model="number"
        ></b-form-input>
      </b-form-group>
      <b-form-group id="input-group-2" label="Phone number:" label-for="input-2">
        <b-form-input
          id="input-2"
          placeholder="123456789"
          required
                    v-model="phone"
        ></b-form-input>
      </b-form-group>
      <b-button type="submit" variant="primary">Submit</b-button>
    </b-form>

  </div>
  <hr>
    <div class="mt-4">
    <h2>Change password</h2>

    <b-form @submit="test()" >
      <b-form-group
        id="input-group-1"
        label="Old password:"
        label-for="input-1"
      >
        <b-form-input
          id="input-1"
          type="text"
          placeholder="*********"
          required
          v-model="pwdOld"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="New password:" label-for="input-2">
        <b-form-input
          id="input-2"
                    placeholder="*********"
          required
                    v-model="newPwd"
        ></b-form-input>
      </b-form-group>
      <b-form-group id="input-group-2" label="Repeat new password:" label-for="input-2">
        <b-form-input
          id="input-2"
                   placeholder="*********"
          required
                    v-model="newPwdRepeat"
        ></b-form-input>
      </b-form-group>

      <b-button type="submit" variant="primary">Submit</b-button>
    </b-form>

  </div>
      </b-card-text>
      </b-tab>
      <b-tab title="Statistics&History"><b-card-text>Tab contents 2</b-card-text></b-tab>
    </b-tabs>
  </b-card>
  
    </div>
</template>

<script>
import { mapState } from 'vuex';
import { required, minLength, between,email } from 'vuelidate/lib/validators'
export default {
    data(){
        return{
            data:null,
            //user info
            email:'',
            name:'',
            city:'',
            street:'',
            number:0,
            phone:0,
            pwdOld : '',
            newPwd:'',
            newPwdRepeat:'',


        }
    },
    computed: {
        ...mapState([
            'userData',
            'logged'
        ])
    },
    mounted() {
      this.email = this.userData["user"]["email"]
      this.name = this.userData["user"]["name"]
    },
    methods:{
        showData(){
            let token = this.userData["token"];
                let self = this;
                axios.get('/api/products', 
                { headers: {"Authorization" : `Bearer ${token}`}
            })
            .then(function (response) {
                self.data = response.data;
            })
            .catch(function (error,response) {
                self.returnData = error.response.data;
            });
        },
        test(){
          console.log(this.email);
          console.log(this.name);
        }
    },
    validations: {
    name: {
      required,
      minLength: minLength(4)
    },
      email: {
      required,
      type:email,
      minLength: minLength(4)
    },

  }
};

</script>

<style lang="scss" scoped>

</style>