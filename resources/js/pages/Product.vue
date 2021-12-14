<template>
    <div class="container justify-center items-center flex flex-col sm:flex-row">
        <div class="w-1/2 h-full">
            <img src="/images/pizza-home.png"/>
        </div>
        <div class="w-1/2 h-full mx-4">
        <h2>{{product.name}}</h2>
        <h4>{{sumPrice}}<span class="text-red-400" v-if="sumPrice-startPrice>0">(+{{sumPrice-startPrice}})</span>$</h4>
        <b-badge variant="primary">{{product.size}}</b-badge>
        <div v-for="addon in addonsBase" class="flex">
            <b-badge v-if="product[addon] == 1" class="my-1" variant="info">{{addon}}</b-badge>
        </div>
        <p class="w-full break-words ">{{product.desc}}</p>
                    <div>
                        <h3>Addons:</h3>
                        <b-form-checkbox @change="changeAddon" v-for="addon in addonsAll" :key="addon"  :value="addon"  v-model="addonsBase">{{addon}}</b-form-checkbox>
                    </div>


        </div>
    </div>
    
</template>

<script>

export default {
    data(){
        return{
            addonsAll : ["tomato","cheese","paprika","beef","chicken"],
            addonsStart : [],
            addonsBase:[],
            product:null,
            id : this.$route.params.id,
            startPrice : null,
            sumPrice:null,
        }
    },
    methods:{
        changeAddon(){
            let added = 0;
            added = this.addonsBase.length - this.addonsStart.length;
            if(added ==0){
                this.sumPrice = this.startPrice;
            }
            if(added > 0){
                this.sumPrice = this.startPrice;
                this.sumPrice = Number(this.startPrice) + Number(added*2);
            }
        }
    },
    mounted(){
        let productId = this.$route.params.id;
        let self = this;
        axios.get('/api/products/'+productId)
        .then(function (response) {
            self.product = response.data;
            self.sumPrice = response.data.price;
            self.startPrice = response.data.price;
            self.addonsAll.forEach((addon)=>{
                if(self.product[addon] == 1){
                    self.addonsBase.push(addon);
                    self.addonsStart.push(addon);
                }
            })  
        })
        .catch(function (error) {
            console.log(error);
        })
        .then(function () {
        });
    }
}
</script>

<style lang="scss" scoped>



</style>