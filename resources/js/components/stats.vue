<template>
    <div >
      <b-card no-body>
            <b-tabs pills card vertical>
            <b-tab title="Your orders" active><b-card-text>
                <b-card v-for="order in ordersList" :key="order.id">
                {{order}}
                <p>Order time : {{order.date}} - {{order.time}}</p>
                </b-card>
            </b-card-text></b-tab>
            <b-tab title="History"><b-card-text>Tab contents 2</b-card-text></b-tab>
            <b-tab title="Fun facts"><b-card-text>Tab contents 3</b-card-text></b-tab>
            </b-tabs>
     </b-card>
    </div>
</template>

<script>

import axios from 'axios';
import { mapState } from 'vuex';

export default {
    computed: {
        ...mapState([
            'userData',
        ])
    },
    data(){
        return{
            ordersList:null,
        }
    },
    mounted(){
        let self = this;
            let token = this.userData["token"];
            console.log(token)
            var postData = {
            id: this.userData['user']['id'],
            };
            let axiosConfig = {
            headers: {
                "Authorization" : `Bearer ${token}`,
            }
            };
            axios.post('/api/getStats', postData, axiosConfig)
            .then((res) => {
                self.ordersList = res.data.ordersList;
                console.log(res)
            })
            .catch((err) => {
                console.log(err.response);
            })
    }
};

</script>

