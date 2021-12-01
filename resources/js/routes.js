import App from './components/AppComponent.vue'
import Login from './components/LoginComponent.vue'
import Register from './components/RegisterComponent.vue'
import MyAccount from './components/MyAccount.vue'
import HomePage from './pages/HomePage.vue'

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
    }
];