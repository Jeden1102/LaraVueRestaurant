<template>
    <div class="container relative">
        <h2 class="my-4">Pick your favourite food and enjoy the meal !</h2>
     <!--FILTER -->
        <div class="my-4 relative">
                <div v-if="loading" class="w-full h-96 bg-gray-200 bg-opacity-75 absolute top-0 left-0 z-50 flex items-center justify-center">
        <b-spinner variant="primary" label="Text Centered"></b-spinner>
        </div>
            <b-button  v-b-toggle.collapse-1 variant="primary"><i class="fas fa-filter"></i></b-button>
            <b-collapse id="collapse-1" class="mt-2">
                <b-card >
                <div class="flex justify-evenly flex-wrap">
                    <div>
                        <h3>Addons:</h3>
                        <b-form-checkbox @change="filterProducts" v-for="addon in addonsBase" :key="addon"  :value="addon"  v-model="addonsFilters">{{addon}}</b-form-checkbox>
                    </div>
                    <div>
                        <h3>Size:</h3>
                        <b-form-checkbox @change="filterProducts" v-for="size in sizeBase" :key="size"  :value="size"  v-model="sizeFilters">{{size}}</b-form-checkbox>
                    </div>
                    <div>
                    <h3>Price:</h3>
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input @keyup="filterProducts" placeholder="Min price" v-model="min" type="text" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input @keyup="filterProducts" placeholder="Max price" v-model="max" type="text" class="form-control">
                    </div>
                    </div>

                    </div>
                    <div class="w-full my-2 flex items-center">
                        <b-button @click="resetFilters" class="mx-auto" variant="info">Reset filters</b-button>
                    </div>
                </b-card>
            </b-collapse>
        </div>

     <!--FILTER -->

        <b-card no-body>
            <b-tabs pills card horizontal>
            <b-tab v-for="category in productsByCategory" :key="category.id"  active>
                <template #title>
                {{category.name.toUpperCase()}} <img class="h-8 w-8 mx-auto" :src="'/images/categories_icons/' + category.img" />
            </template>
            <b-card-text>
                <hr>
                <h3>Products list of {{category.name}} category : </h3>
                <div class="flex flex-wrap justify-center items-center">
                
                    <b-alert v-if="category.amount == 0" show variant="primary">Sorry...there's nothing to show...consider changing the filters.
                        <b-button @click="resetFilters" class="mx-auto" variant="info">Reset filters</b-button>
                    </b-alert>
                    <div v-else class="p-2 m-2  hover:bg-gray-100 cursor-pointer rounded shadow w-52 h-80  relative " v-for="product in category.products" :key="product.id" :title="product.name">
                    <img class="h-1/2 w-full" src="/images/pizza-home.png"/>
                    <p class="font-bold">{{product.name}}</p>
                    <p>{{product.price}}$</p>
                    <div v-for="addon in addonsBase" >
                        <b-badge v-if="product[addon] == 1" variant="secondary">{{addon}}</b-badge>
                    </div>
                        <b-badge class="absolute top-2 left-2"  variant="primary">{{product.size}}</b-badge>
                    <a type="button" :href="'/product/' + product.id" class="text-white absolute right-2 bottom-2  bg-yellow-600 hover:bg-yellow        focus:ring-4        focus:ring-green-300 font-medium rounded-lg text-sm p-2.5 text-center  dark:bg-green    dark:hover:b     g-green-700       dark:focus:ring-green-800 font-bold"><i class="far fa-eye"></i>Show</a>       
                    <button @click="addToCart(product)" type="button" class="text-white absolute right-2 top-2   bg-green-700 hover:bg-green-800 focus:ring-4       focus:ring-green-300 font-medium rounded-lg text-sm p-2.5 text-center  dark:bg-green    -600 dark:hover:bg-green-700      dark:focus:ring-green-800 font-bold"><i class="fas fa-cart-plus"></i></button>      
                    </div>      
                </div>


                <p>Showing {{category.amount}} of {{category.amount}}</p>
            </b-card-text></b-tab>
            </b-tabs>
        </b-card>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                categoryList:null,
                productList:null,
                productsByCategory:[],
                addonsBase : ["tomato","cheese","paprika","beef","chicken"],
                addonsFilters : ["tomato","cheese","paprika","beef","chicken"],
                addonsToFilter:[],
                sizeBase : ["small","medium","large","x-large"],
                sizeFilters : ["small","medium","large","x-large"],
                sizeToFilter:[],
                min:null,
                max:null,
                loading:true,
            }
        },
        methods:{
            filterProducts(){
                this.addonsToFilter = this.addonsBase.filter(n => !this.addonsFilters.includes(n))
                this.sizeToFilter = this.sizeBase.filter(n => !this.sizeFilters.includes(n))
                this.productsByCategory = [];

                this.categoryList.forEach((el)=>{
                    this.max = this.max=="" ? null : this.max;
                    let filtered = this.productList.filter(product => product.category_id ==  el.id);
                    //min price
                    filtered = filtered.filter(product=>Number(product.price) >= Number(this.min));
                    //max price
                    filtered = this.max != null ? filtered.filter(product=>Number(product.price) <= Number(this.max)) : filtered;
                    //addons filter
                    this.addonsToFilter.forEach((addon)=>{
                        filtered = filtered.filter(product=>product[addon] == 0);
                    })
                    //size filter
                    this.sizeToFilter.forEach((size)=>{
                        filtered = filtered.filter(product=>product.size != size);
                    })



                    let productsObj = {
                        id:el.id,
                        img:el.category_img,
                        name : el.name,
                        products:filtered,
                        amount : filtered.length
                    }
                    this.productsByCategory.push(productsObj);
                })
            },
            resetFilters(){
                this.addonsFilters = this.addonsBase;
                this.sizeFilters = this.sizeBase;
                this.max = null;
                this.min = null;
                this.filterProducts();
            },
            addToCart(product){
            let addonsList = [];
            this.addonsBase.forEach(addon=>{
                if(product[addon] == 1){
                    addonsList.push(addon);
                }
            })
            let productToBasket = {
                name:product.name,
                id : product.id,
                quantity : 1,
                size: product.size,
                addons:addonsList,
                price:product.price,
                image:product.image_url,
                product_id : Math.random().toString(36).slice(2)
            }
            this.$store.commit('addItemToCart',productToBasket);
            var oldItems = JSON.parse(localStorage.getItem('basket')) || [];
            oldItems.push(productToBasket);
            localStorage.setItem('basket', JSON.stringify(oldItems));
        }
        },
        mounted(){
            let self = this;
            //get cateogries
            axios.get('/api/showCategories')
            .then(function (response) {
                self.categoryList = response.data;
            })
            .catch(function (error) {
                console.log(error);
            })
            .then(function () {
            });
            //get products
            axios.get('/api/products')
            .then(function (response) {
                self.productList = response.data;
                self.loading = false;

            })
            .catch(function (error) {
                console.log(error);
            })
            .then(function () {
            self.filterProducts();
            });
            //check

        }
    }
</script>

<style lang="scss" scoped>

</style>