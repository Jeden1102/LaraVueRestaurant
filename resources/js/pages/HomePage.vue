<template>
<div>
    <div class="w-full main-box ">
        <!-- BANER -->
    <div class=" flex  justify-center sm:mt-4">
        <div class="flex flex-col h-full sm:flex-row w-screen sm:items-center">
            <div class="sm:w-96 bg-gradient-to-r from-yellow-200 to-yellow-300  overflow-hidden w-3/4 sm:w-full md:w-1/2 rounded-tr-3xl rounded-br-3xl h-full mt-8 flex justify-center items-center ">
                <img class="w-3/4  h-3/4" src="/images/pizza-home.png" alt="">
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-4 md md:m-20 sm:w-3/4 flex items-center flex-col" >
                <h1 class="mb-6 text-gray-600 text-center font-bold tracking-wider text-3xl sm:mb-8 ">
                    Your favourite <span class="text-yellow-600 ">Food</span> now avaiable on-line delivered fresh and hot <span class="text-green-600">without</span>  going out home !
                </h1>
                <p class="font-light text-center text-xl px-2">
                    Since 1973, The Spot Restaurant has been the go-to diner for residents of Binghamton, NY. Our diner serves breakfast all day, in addition to wholesome and flavorful dining options for lunch and dinner. From burgers to salads, seafood to pastas, you’ll find all kinds of hearty meals prepared fresh at The Spot Restaurant. Our diner also has a full bakery with delicious baked goods and other treats, including our famous cheesecake. Sounds delicious, right?
                </p>
                <div class="flex space-x-4">
                <a  >
                    <button type="button" class="p-6 mt-8 inline-flex items-center  border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        Order Now !
                      </button>
                </a>
                <a  >
                    <button type="button" class="p-6 mt-8 inline-flex items-center  border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-clock mr-2"></i>
                        Book table !
                      </button>
                </a>
                </div>

            </div>
        </div>
    </div>

    </div>
            <Carousel/>
            <Features/>
            <Reviews/>
</div>

</template>

<script>
import Carousel from '../components/Carousel.vue';
import Features from '../components/Features.vue';
import Reviews from '../components/Reviews.vue';
export default {
    components: {
        Carousel,
        Features,
        Reviews
    },
}
</script>

<style lang="scss" scoped>

.other-font{
    font-family: 'Amatic SC', cursive;
}
a:hover{
    text-decoration:none;
}

</style>