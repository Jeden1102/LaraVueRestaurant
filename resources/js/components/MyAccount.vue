<template>
    <div>
        Hello!
        <pre>{{userData}}</pre>
            <button @click.prevent="showData" type="submit" class="btn btn-primary">Show Data</button>
        <pre>{{data}}</pre>
    </div>
</template>

<script>
import { mapState } from 'vuex';

export default {
    data(){
        return{
            data:null,
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