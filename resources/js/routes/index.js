import CartView from '../views/Cart';
import LoginView from '../views/Login';
import SignupView from '../views/Signup';
import WelcomeView from '../views/Welcome';
import UserOrderView from '../views/UserOrder';
import AdminLoginView from '../views/AdminLogin';
import DriverLoginView from '../views/DriverLogin';
import AdminOrdersView from '../views/AdminOrders';
import DriverOrdersView from '../views/DriverOrders';
import AdminProductView from '../views/AdminProducts';
import AdminCategoryView from '../views/AdminCategory';
import UserDashboardView from '../views/UserDashboard';
import AdminDashboardView from '../views/AdminDashboard';

export default [
  // Application Routes...
  { path: '/cart', name: 'Cart', component: CartView },
  { path: '/', name: 'Welcome', component: WelcomeView },

  // User Routes....
  { path: '/login', name: 'Login', component: LoginView },
  { path: '/user/orders', name: 'UserOrders', component: UserOrderView },
  { path: '/user/dashboard', name: 'UserDashboard', component: UserDashboardView },
  { path: '/register', name: 'Register', component: SignupView, alias: '/signup' },

  // Admin Routes....
  { path: '/admin/login', name: 'AdminLogin', component: AdminLoginView },
  { path: '/admin/orders', name: 'AdminOrders', component: AdminOrdersView },
  { path: '/admin/products', name: 'AdminProduct', component: AdminProductView },
  { path: '/admin/category', name: 'AdminCategoryView', component: AdminCategoryView },
  { path: '/admin/dashboard', name: 'AdminDashboard', component: AdminDashboardView },

  // Driver Routes....
  { path: '/driver/login', name: 'DriverLogin', component: DriverLoginView },
  { path: '/driver/orders', name: 'DriverOrders', component: DriverOrdersView }
];
