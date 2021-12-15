<template>
    <div>
        <!-- This example requires Tailwind CSS v2.0+ -->
<transition name="fade">

<div  v-if="showCart" class="fixed inset-0 overflow-hidden  z-30" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
  <div class="absolute inset-0  overflow-hidden ">

    <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    <transition name="test">

    <div v-if="showCart" class="fixed inset-y-0 right-0 pl-10 max-w-full  transform transition ease-in-out duration-500 sm:duration-700  flex">

      <div class="w-screen max-w-md">
        <div class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll">
          <div class="flex-1 py-6 overflow-y-auto px-4 sm:px-6">
            <div class="flex items-start justify-between">
              <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                Shopping cart
              </h2>
              <div class="ml-3 h-7 flex items-center">
                <button @click="changeCart"  type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                  <span class="sr-only">Close panel</span>
                  <!-- Heroicon name: outline/x -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>

            <div class="mt-8">
              <div class="flow-root">
                <ul role="list" class="-my-6 divide-y divide-gray-200">
                  <li class="py-6 flex" v-for="product in cartItems" :key="product">
                    <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                      <img src="/images/pizza-home.png" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="w-full h-full object-center object-cover">
                    </div>

                    <div class="ml-4 flex-1 flex flex-col">
                      <div>
                        <div class="flex justify-between text-base font-medium text-gray-900">
                          <h3>
                            <a class="" :href="'/product/' + product.id">
                              {{product.name}}
                            </a>
                          </h3>
                          <p class="ml-4">
                            ${{product.price}}
                          </p>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                          {{product.size}}
                        </p>
                      </div>
                      <div class="flex-1 flex items-end justify-between text-sm">
                        <p class="text-gray-500">
                          Qty {{product.quantity}}
                        </p>

                        <div class="flex">
                          <b-button @click="removeItem(product.product_id)" size="sm" variant="danger">Remove <i class="fas fa-trash-alt"></i></b-button>
                        </div>
                        
                      </div>

                      <div  class="flex space-x-1">
                          <b-badge v-for="addon in product.addons" :key="addon" class="my-1" variant="info">{{addon}}</b-badge>
                      </div>
                    </div>
                  </li>

                  
                  <!-- More products... -->
                </ul>
              </div>
            </div>
          </div>
          <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
            <div class="flex justify-between text-base font-medium text-gray-900">
              <p>Subtotal</p>
              <p>${{cartSum}}</p>
            </div>
            <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
            <div class="mt-6">
              <a href="#" class="flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">Checkout</a>
            </div>
            <div class="mt-6 flex justify-center text-sm text-center text-gray-500">
              <p>
                or <button @click="changeCart" type="button" class="text-indigo-600 font-medium hover:text-indigo-500">Continue Shopping<span aria-hidden="true"> &rarr;</span></button>
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
    </transition>
  </div>
</div>
  </transition>

    </div>
</template>

<script>
import { mapState } from 'vuex';


    export default {
    computed: {
        ...mapState([
            'showCart',
            'cartItems',
        ]),
            cart(){
      return this.$store.state.showCart;
    },
    cartSum(){
      let sum = 0;
      this.cartItems.forEach(el=>{
        sum += el.quantity * el.price;
      })
      return sum;
    }
    },
        methods:{
            removeItem(id){
              console.log(id);
             let items = this.cartItems;
             items =  items.filter(product => product.product_id != id);
            this.$store.state.cartItems = items;
            localStorage.removeItem('basket');
            localStorage.setItem('basket', JSON.stringify(items));
            },
            changeCart(){
            this.$store.commit('changeCart');
                console.log('ok')
            }
        },
              watch: {

        cart(newValue, oldValue) {
    },

  },
    }
</script>

<style lang="scss" scoped>
a{
  color:black !important;
}
a:hover{
  color:orange !important;
  text-decoration:none;
}
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
.test-enter-active, .test-leave-active {
   transform:translateX(0);
  transition: transform .5s;

}
.test-enter, .test-leave-to /* .fade-leave-active below version 2.1.8 */ {
  transform:translateX(100%);
}

</style>