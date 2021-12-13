<template>
    <div class="container">
        <h2 class="my-4">Pick your favourite food and enjoy the meal !</h2>
     <!--FILTER -->
        <div class="my-4">
            <b-button  v-b-toggle.collapse-1 variant="primary"><i class="fas fa-filter"></i></b-button>
            <b-collapse id="collapse-1" class="mt-2">
                <b-card>
                <p class="card-text">Collapse contents Here</p>
 
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
                    <div class="p-2 m-2  hover:bg-gray-100 cursor-pointer rounded shadow w-52 h-72 relative " v-for="product in category.products" :key="product.id" :title="product.name">
                    <img class="h-3/4 w-full" src="/images/pizza-home.png"/>
                    <p class="font-bold">{{product.name}}</p>
                    <p>{{product.price}}$</p>
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
                console.log(self.productsByCategory)
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