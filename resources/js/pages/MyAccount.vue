<template>
    <div>
    <h2 class="m-4">
        Hi!
        {{userData['user']['name']}}
    </h2>
  <b-card no-body>
    <b-tabs pills card>
      <b-tab title="Tab 1" active>
      <b-card-text>
        <div>
    <b-form  >
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
          :value="userData['user']['email']"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
        <b-form-input
          id="input-2"
          placeholder="Enter name"
          required
          :value="userData['user']['name']"
        ></b-form-input>
      </b-form-group>
      

      <b-button type="submit" variant="primary">Submit</b-button>
    </b-form>

  </div>
      </b-card-text>
      </b-tab>
      <b-tab title="Tab 2"><b-card-text>Tab contents 2</b-card-text></b-tab>
    </b-tabs>
  </b-card>
    </div>
</template>

<script>
import { mapState } from 'vuex';

export default {
    data(){
        return{
            data:null,
            //user info
            form:{
              email: userData.email,
                name: "",
                food: null,
                checked: [],
                show:true
            }

        }
    },
    computed: {
        ...mapState([
            'userData',
            'logged'
        ])
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
        }
    }
};

</script>

<style lang="scss" scoped>

</style>