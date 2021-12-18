<template>
    <div class="container justify-center space-x-2  flex flex-col sm:flex-row">
        <!--form-->
        <div>
            <b-card bg-variant="light">
                <b-form-group
                    label="Street:"
                    label-for="nested-street"
                    label-cols-sm="3"
                    label-align-sm="right"
                >
                    <b-form-input id="nested-street" v-model="orderDetails.street"></b-form-input>
                </b-form-group>

                <b-form-group
                    label="City:"
                    label-for="nested-city"
                    label-cols-sm="3"
                    label-align-sm="right"
                >
                    <b-form-select @change="setCityAndPrice" v-model="delivery.city" :options="cities"></b-form-select>
                </b-form-group>
                <b-form-group
                    label="Number:"
                    label-for="nested-state"
                    label-cols-sm="3"
                    label-align-sm="right"
                >
                    <b-form-input id="nested-state" v-model="orderDetails.number"></b-form-input>
                </b-form-group>

                <b-form-group
                    label="Phone:"
                    label-for="nested-country"
                    label-cols-sm="3"
                    label-align-sm="right"
                >
                    <b-form-input id="nested-country" v-model="orderDetails.phone"></b-form-input>
                </b-form-group>

                <b-form-group
                    label="Comment to order:"
                    label-for="nested-country"
                    label-cols-sm="3"
                    label-align-sm="right"
                >
                      <b-form-textarea
                        id="textarea-no-resize"
                        placeholder="I like pizza..."
                        rows="3"
                        no-resize
                        v-model="orderDetails.comment"
                      ></b-form-textarea>
                </b-form-group>
                    <label for="example-datepicker">Order date</label>
                  <b-form-datepicker id="example-datepicker" v-model="orderDetails.date" class="mb-2"></b-form-datepicker>
                      <label for="timepicker-buttons">Order time</label>
                      <b-form-timepicker
                        id="timepicker-buttons"
                        now-button
                        reset-button
                        locale="en"
                        v-model="orderDetails.time"
                      ></b-form-timepicker>
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
              <p>Subtotal</p>
              <p>${{cartSum}}</p>
            </div>
            <div v-if="deliveryPrice"  class="flex justify-between text-base font-medium text-gray-900">
              <p>Delivery</p>
              <p>${{deliveryPrice}}</p>
            </div>
            <hr>
              <div  class="flex justify-between text-base font-medium text-gray-900">
              <p>Total</p>
              <p>${{combinedPrice}}</p>
            </div>
            <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes included.</p>
            <div class="mt-6">
              <b-button :disabled="!orderDetails.street || !orderDetails.number || !orderDetails.phone || !delivery.city || !orderDetails.time || !orderDetails.date"   variant="success" @click="submitOrder">Order now</b-button>
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
import axios from 'axios';
export default {
    computed: {
    ...mapState([
        'cartItems',
        'userData',
    ]),
        cartSum(){
      let sum = 0;
      this.cartItems.forEach(el=>{
        sum += el.quantity * el.price;
      })
      return sum;
    },
    combinedPrice(){
      return this.cartSum + this.orderDetails.deliveryPrice;
    }
    },
    data(){
        return{
            cities:[
                {price:10,text:"Siedlec",value: 1},
                {price:12.50,text:"Otmice",value: 2},
                {price:7.50,text:"Izbicko",value: 3},
                {price:1,text:"Kamień Sląski",value: 5},
                {price:1,text:"Kamionek",value: 5},
                {price:15.50,text:"Tarnów Opolski",value: 6},
            ],
            delivery:{
                city:null,
            },
            userInfo :null,
            orderDetails:{
              street:null,
              number:null,
              phone:null,
              comment:null,
              city:null,
              deliveryPrice:null,
              date:null,
              time:null,
              sumPrice : null,
              price:null,
              user_id : null
            }
           
        }
    },
    methods:{
      setCityAndPrice(){
        this.orderDetails.city = this.cities[this.delivery.city-1].text;
        this.orderDetails.deliveryPrice = this.cities[this.delivery.city-1].price;
      },
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
      },
      submitOrder(){
        this.orderDetails.sumPrice = this.combinedPrice;
                this.orderDetails.price = this.cartSum;
        let order = {
          products:this.cartItems,
          details:this.orderDetails
        }
        axios.post('/api/orders', {
            info: order,
          })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error.response.data.message);
          });
      }

    },
    mounted(){
    if(this.$store.state.logged){
      this.userInfo = this.userData.user;
      this.orderDetails.street = this.userData.user.street;
      this.orderDetails.number = this.userData.user.number;
      this.orderDetails.phone = this.userData.user.phone;
      this.orderDetails.user_id = this.userData.user.id;
    }
    }
}
</script>

<style lang="scss" scoped>



</style>