import App from './components/AppComponent.vue'
import Login from './components/LoginComponent.vue'
import Register from './components/RegisterComponent.vue'
import MyAccount from './pages/MyAccount.vue'
import HomePage from './pages/HomePage.vue'
import Menu from './pages/Menu.vue'
import Product from './pages/Product.vue'
import Checkout from './pages/Checkout.vue'
//admin panel
export const routes = [
    {
		path: '/',
        component: HomePage
    },
	{
		path: '/home',
        component: HomePage
    },
    {
		path:'/login',
        component: Login
    },
	{
		path:'/register',
        component: Register
    },
    {
		path:'/account',
        component: MyAccount
    },
    {
		path:'/menu',
        component: Menu
    },
    {
		path:'/product/:id',
        component: Product
    },
    {
		path:'/checkout',
        component: Checkout
    },
    //admin panel

];