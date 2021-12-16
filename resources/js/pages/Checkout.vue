<template>
    <div class="container justify-center  flex flex-col sm:flex-row">
        <!--form-->
        <div>
            <b-card bg-variant="light">
                <b-form-group
                    label="Street:"
                    label-for="nested-street"
                    label-cols-sm="3"
                    label-align-sm="right"
                >
                    <b-form-input id="nested-street"></b-form-input>
                </b-form-group>

                <b-form-group
                    label="City:"
                    label-for="nested-city"
                    label-cols-sm="3"
                    label-align-sm="right"
                >
                    <b-form-select v-model="delivery.city" :options="cities"></b-form-select>
                </b-form-group>
                {{delivery.city}}
                <b-form-group
                    label="Number:"
                    label-for="nested-state"
                    label-cols-sm="3"
                    label-align-sm="right"
                >
                    <b-form-input id="nested-state"></b-form-input>
                </b-form-group>

                <b-form-group
                    label="Phone:"
                    label-for="nested-country"
                    label-cols-sm="3"
                    label-align-sm="right"
                >
                    <b-form-input id="nested-country"></b-form-input>
                </b-form-group>

            </b-card>
        </div>
                <!--cart summary-->
        <div>
            <b-card bg-variant="light">

      <div class="w-screen max-w-md">
        <div class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll ">
          <div class="flex-1 py-6  px-4 sm:px-6">
            <div class="">
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
                </ul>
              </div>
            </div>
          </div>
          <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
            <div class="flex justify-between text-base font-medium text-gray-900">
              <p>Subotal</p>
              <p>${{cartSum}}</p>
            </div>
            <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
            <div class="mt-6">
              <a href="/checkout" class="flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">Checkout</a>
            </div>
            <div class="mt-6 flex justify-center text-sm text-center text-gray-500">
              <p>
                or <button @click="changeCart" type="button" class="text-indigo-600 font-medium hover:text-indigo-500">Continue Shopping<span aria-hidden="true"> &rarr;</span></button>
              </p>
            </div>
          </div>
        </div>

      </div>
      </b-card>

    </div>

    </div>

    
</template>

<script>
import { mapState } from 'vuex';
export default {
    computed: {
    ...mapState([
        'cartItems',
    ])
    },
    data(){
        return{
            cities:[
                {
                    text:"Siedlec/Otmice/Izbicko",
                    value: 10,
                },
                {
                    text:"Kamień Sl/Kamionek",
                    value:0,
                },
                {
                    text:"Kosorowice/Tarnów Opolskie",
                    value:5
                },
            ],
            delivery:{
                city:null,
            }
        }
    }
}
</script>

<style lang="scss" scoped>



</style>