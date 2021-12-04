<template>
    <div>
<div class="relative  overflow-hidden mt-8 shadow-lg">
    <div class="max-w-7xl mx-auto">
      <div class="relative z-10 pb-8 bg-gray-100 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
        <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-gray-100 transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
          <polygon points="50,0 100,0 50,100 0,100" />
        </svg>
  
        <div>
          <div class="relative pt-6 px-4 sm:px-6 lg:px-8">

          </div>
  


        </div>
  
        <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
          <div class="sm:text-center lg:text-left">
            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
              <span class="block xl:inline">What clients say about</span>
              <span class="block text-yellow-600 xl:inline">FoodPenguin</span>

            </h1>
            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
              Here are some reviews our clients say about our amazing restaurant, don't be afraid, leave a review as well :)
            </p>
            <div class="swiper-container  my-2 overflow-hidden">
                <div id="example">
                <carousel-3d  :perspective="0" :space="250" :display="3">
                    <slide class="border-white shadow-lg bg-white flex items-center justify-center"  v-for="(slide, i) in slides" :index="i" :key="id">
                        <div class="flex w-full h-full items-center justify-center flex-col p-4 text-center">
                            <h3 class="title other-font">John Doe</h3>
                            <p>Best restaurant I've ever was in. The food is brilliant, waiterer and waitress nice and funny :) Definetly would recommend this place!</p>
                            <div class="flex space-x-1">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                            <p class="mt-8">2021-12-12</p>
                        </div>

                    </slide>
                </carousel-3d>
                </div>
              
            </div>

          </div>
        </main>
      </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 shadow-lg">
      <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="/images/happy.jpg" alt="">
    </div>
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
.other-font{
    font-family: 'Amatic SC', cursive;
}
</style>