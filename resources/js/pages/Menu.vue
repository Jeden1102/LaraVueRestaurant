<template>
    <div class="container">
        <h2 class="my-4">Pick your favourite food and enjoy the meal !</h2>
     <!--FILTER -->
        <div class="my-4">
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

                </b-card>
            </b-collapse>
        </div>

     <!--FILTER -->

        <b-card no-body>
            <b-tabs pills card horizontal>
            <b-tab v-for="category in productsByCategory" :key="category.id" :title="category.name" active><b-card-text>
                <hr>
                <h3>Products list of {{category.name}} category : </h3>
                <div class="flex flex-wrap justify-center items-center">
                    <div class="p-2 m-2  hover:bg-gray-100 cursor-pointer rounded shadow w-52  relative " v-for="product in category.products" :key="product.id" :title="product.name">
                    <img class="h-3/4 w-full" src="/images/pizza-home.png"/>
                    <p class="font-bold">{{product.name}}</p>
                    <p>{{product.price}}$</p>
                    <p>tom : {{product.tomato}}</p>
                    <p>ch : {{product.chicken}}</p>
                    <p>bef : {{product.beaf}}</p>
                    <button type="button" class="text-white absolute right-2 bottom-2  bg-yellow-600 hover:bg-yellow        focus:ring-4        focus:ring-green-300 font-medium rounded-lg text-sm p-2.5 text-center  dark:bg-green    dark:hover:b     g-green-700       dark:focus:ring-green-800 font-bold"><i class="far fa-eye"></i>Show</button>       
                    <button type="button" class="text-white absolute right-2 top-2   bg-green-700 hover:        bg-green-800 focus:ring-4       focus:ring-green-300 font-medium rounded-lg text-sm p-2.5 text-center  dark:bg-green    -600 dark:hover:bg-green-700      dark:focus:ring-green-800 font-bold"><i class="fas fa-cart-plus"></i></button>      
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
                sizeBase : ["small","medium","large","x-large"],
                sizeFilters : ["small","medium","large","x-large"],
                min:null,
                max:null,


            }
        },
        methods:{
            filterProducts(){
                this.productsByCategory = [];

                this.categoryList.forEach((el)=>{
                    this.max = this.max=="" ? null : this.max;
                    let filtered = this.productList.filter(product => product.category_id ==  el.id);
                    filtered = filtered.filter(product=>Number(product.price) >= Number(this.min));
                    filtered = this.max != null ? filtered.filter(product=>Number(product.price) <= Number(this.max)) : filtered;


                    let productsObj = {
                        id:el.id,
                        name : el.name,
                        products:filtered,
                        amount : filtered.length
                    }
                    this.productsByCategory.push(productsObj);
                })
                console.log(this.productsByCategory);
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
                // console.log(self.categoryList);
                self.categoryList.forEach((el)=>{
                    let filtered = self.productList.filter(product => product.category_id ==  el.id);
                    let productsObj = {
                        id:el.id,
                        name : el.name,
                        products:filtered,
                        amount : filtered.length
                    }
                    self.productsByCategory.push(productsObj);
                })
            })
            .catch(function (error) {
                console.log(error);
            })
            .then(function () {
            });
            //check

        }
    }
</script>

<style lang="scss" scoped>

</style>