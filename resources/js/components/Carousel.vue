<template>
<div class="h-96  w-full py-4 ">
        <h2 class="text-center other-font">Try our specialls!</h2>
            <div id="example" class="my-auto relative bg-white">
        <carousel-3d :autoplay="true" :autoplay-timeout="5000" :controls-visible="true" :clickable="false">
            <slide class="border-white shadow-lg" v-for="(slide, i) in slides" :index="i" :key="id">
            <figure class="h-3/4 ">
                <img class="w-full h-full" src="https://ocdn.eu/images/pulscms/MmE7MDA_/06d3b49c0634ba5de867c761bb0cdaf4.jpeg">
            </figure>
            <div class="absolute left-0 bottom-0 p-2 h-1/4 bg-white  w-full">
                <h3>Margharitta</h3>
                <p>9.99$</p>
            </div>
            <button type="button" class="text-white absolute right-2 bottom-2  bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm p-2.5 text-center  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 font-bold"><i class="far fa-eye"></i>Show</button>
            <button type="button" class="text-white absolute right-2 top-2   bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm p-2.5 text-center  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 font-bold"><i class="fas fa-cart-plus"></i></button>
            </slide>
        </carousel-3d>
        </div>
    </div>
</template>

<script>
import { Carousel3d, Slide } from 'vue-carousel-3d';

export default {
    data(){
        return{
            slides:7
        }
    },
  components: {
    Carousel3d,
    Slide
  }
};
</script>

<style lang="scss" scoped>
.test{
    color:red;
}


</style>