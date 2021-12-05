<template>
<div class="h-96  w-full py-4 ">
        <h2 class="text-center other-font">Try our specialls!</h2>
            <div id="example" class="my-auto relative ">
        <carousel-3d :autoplay="true" :autoplay-timeout="5000" :controls-visible="true" :clickable="false">
            <slide class="border-white shadow-lg" v-for="(slide, i) in slides" :key="i" :index="Number(i)">
            <figure class="h-3/4 ">
                <img class="w-full h-full" src="https://ocdn.eu/images/pulscms/MmE7MDA_/06d3b49c0634ba5de867c761bb0cdaf4.jpeg">
            </figure>
            <div class="absolute left-0 bottom-0 p-2 h-1/4 bg-white  w-full">
                <h3>{{ slide.name }}</h3>
                <p>{{slide.price}}$</p>
            </div>
            <button type="button" class="text-white absolute right-2 bottom-2  bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm p-2.5 text-center  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 font-bold"><i class="far fa-eye"></i>Show</button>
            <button type="button" class="text-white absolute right-2 top-2   bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm p-2.5 text-center  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 font-bold"><i class="fas fa-cart-plus"></i></button>
            </slide>
           
        </carousel-3d>
        </div>
        <!-- <pre>{{speciallProducts}}</pre> -->
        <!-- <div v-for="product in speciallProducts">
            {{ product.id }}
        </div> -->
    </div>
</template>

<script>
import { Carousel3d, Slide } from 'vue-carousel-3d';
import axios from 'axios';
export default {
    data(){
        return{
            slides:7,
            speciallProducts :  [
                {ab:"def"},
                {ab:"def"},
            ]
        }
    },
  components: {
    Carousel3d,
    Slide
  },
  mounted () {
    axios
      .get('api/productsSpecialls')
      .then(response => {
        this.speciallProducts = response.data
        console.log(this.speciallProducts)
      })
      .catch(error => {
        console.log(error)
        this.errored = true
      })
      .finally(() => this.loading = false)
  }
};
</script>

<style lang="scss" scoped>
.test{
    color:red;
}


</style>