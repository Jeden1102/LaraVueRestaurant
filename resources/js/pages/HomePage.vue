<template>
    <div class="w-full h-full md:h-screen ">
        <!-- BANER -->
        <div class="h-full md:h-3/4 bg-blue-100 image text-white text-center flex items-center relative">
            <div class="h-4/5 bg-black bg-opacity-40 flex items-center justify-center flex-column space-y-8 p-4 md:p-20 border-t border-b border-dotted border-white">
                <h2 class="text-white text-5xl">Welcome to  <span class="text-yellow-600">FOOD</span><span>PENGUIN</span>  </h2>
                <h1 class="other-font text-4xl">Taste our speciall dishes!</h1>
                <p class="text-xl">
                Located at Warsaw. We offer a wide array of fresh food – green pork plate, chimichangas, hamburger, barbacoa plate, pizza, salads, bbq with rice and beans and more. We use the freshest ingredients in preparing our food to provide the best quality and taste. Try our delicious food today! 
                </p>
                <button type="button" class="text-white w-60 bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 mb-3 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 font-bold"><i class="fas fa-utensils"></i> View menu</button>
                <button type="button" class="text-white w-60 bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 mb-3 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 font-bold"><i class="fas fa-calendar-day"></i> Book a table</button>
                
    
            </div>
            <a href="#" class="absolute w-8 h-8 bg-white rounded left-1/2 bottom-2 text-black flex items-center justify-center hover:text-black"><i class="fas fa-arrow-down animate-bounce text-xl"></i></a>
        </div>
        <div>
        </div>
        xyz
    </div>
</template>

<script>

</script>

<style lang="scss" scoped>
.image{
    background-image:url('/images/main.jpg');
    background-position:bottom;
    background-repeat:no-repeat;
    background-size:cover;
}
.other-font{
    font-family: 'Amatic SC', cursive;
}
a:hover{
    text-decoration:none;
}
</style>