<template>
  <div>
    <nav class="st-nav navbar main-nav navigation fixed-top" id="main-nav">
      <div class="container"><ul class="st-nav-menu nav navbar-nav">
        <li class="st-nav-section nav-item">
          <a href="#main" class="navbar-brand">
            <img src="img/logo.png" alt="Dashcore" class="logo logo-sticky d-block d-md-none">
            <img src="img/logo-light.png" alt="Dashcore" class="logo d-none d-md-block">
          </a>
        </li>
        <li class="st-nav-section st-nav-primary nav-item">
          <a @click.prevent="isActiveModel('Home')" :class="[isActive == 'Home' ? 'active-link' : '']" class="st-root-link nav-link margin-extra" href="javascript:void(0)">Home </a>
          <template v-if="categories.length > 0">
            <a v-for="category in categories" :key="category.id" href="javascript:void(0)" :class="[isActive == category.name ? 'active-link' : '']" class="st-root-link nav-link margin-extra" @click.prevent="isActiveModel(category.name)">{{ category.name }}</a>
          </template>
        </li>
        <li class="st-nav-section st-nav-secondary nav-item">
          <a class="btn btn-rounded btn-outline mr-3 px-3" href="" target="_blank" v-if="!isLoggedIn">
            <i class="fas fa-sign-in-alt d-none d-md-inline mr-md-0 mr-lg-2"></i> <span class="d-md-none d-lg-inline">Login</span>
          </a>
          <a class="btn btn-rounded btn-outline mr-3 px-3" href="" target="_blank" v-if="!isLoggedIn">
            <i class="fas fa-user-plus d-none d-md-inline mr-md-0 mr-lg-2"></i> <span class="d-md-none d-lg-inline">Signup</span>
          </a>
          <a class="btn btn-rounded btn-outline mr-3 px-3" href="" target="_blank" v-if="isLoggedIn">
            <i class="fas fa-user-plus d-none d-md-inline mr-md-0 mr-lg-2"></i> <span class="d-md-none d-lg-inline">Dashboard</span>
          </a>
          <a class="btn btn-rounded btn-solid px-3" href="signup.html" target="_blank">
            <i class="fas fa-shopping-cart d-none d-md-inline mr-md-0 mr-lg-2"></i> <span class="d-md-none d-lg-inline">Cart</span>
            <sup class="badge badge-danger" v-if="cartCount > 0">{{ cartCount }}</sup>
          </a>
        </li>
          <!-- Mobile Navigation -->
          <li class="st-nav-section st-nav-mobile nav-item">
            <button class="st-root-link navbar-toggler" type="button">
              <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            </button>
            <div class="st-popup">
              <div class="st-popup-container">
                <a class="st-popup-close-button">Close</a>
                <div class="st-dropdown-content-group">
                  <a @click.prevent="isActiveModel('Home')" :class="[isActive == 'Home' ? 'active-link' : '']" class="st-root-link nav-link margin-extra" href="javascript:void(0)">Home </a>
                  <template v-if="categories.length > 0">
                    <a v-for="category in categories" :key="category.id" href="javascript:void(0)" :class="[isActive == category.name ? 'active-link' : '']" class="st-root-link nav-link margin-extra" @click.prevent="isActiveModel(category.name)">{{ category.name }}</a>
                  </template>
                    <a @click.prevent="isActiveModel('Login')" :class="[isActive == 'Login' ? 'active-link' : '']" class="st-root-link nav-link margin-extra" href="javascript:void(0)">Login </a>
                      <a @click.prevent="isActiveModel('Signup')" :class="[isActive == 'Signup' ? 'active-link' : '']" class="st-root-link nav-link margin-extra" href="javascript:void(0)">Signup </a>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>

<script type="text/javascript">
  import LocalStore from '../store/local';
  import eventBus from '../utils/eventBus';
  import axios from 'axios';

  export default {
    data() {
      return {
        categories: [],
        isLoggedIn: false,
        cartCount: 0,
        isActive: 'Home'
      }
    },
    async mounted() {
      let __this = this;

      // Load Up The Cart data...
      LocalStore.cart().get('cartList')
      .then((doc) => {
        let products = JSON.parse(doc.products);
        __this.cartCount = products.length;
      }).catch((e) => {/* Fail Silently... */});

      // Save To The Cart...
      await this.fetchCategories();
      eventBus.$on('addToCart', function(product) {
        let productExists = false;
        LocalStore.cart().get('cartList')
        .then((doc) => {
          let savedDocs = JSON.parse(doc.products);
          savedDocs = savedDocs.filter((el) => {
            // check if the product already exists...
            if (el.id == product.id) {

              // check if the cartCount is <= product quantity...
              if (parseInt(el.cartCount) <= parseInt(product.quantity) && parseInt(el.cartCount) <= 5) {
                el.cartCount += 1;
                productExists = true;
              }
            }
            return el;
          });

          // check if the does not exist in the cart...
          if (!productExists) {
            __this.cartCount += 1;
            product.cartCount = 1;

            savedDocs.push(product);
            return LocalStore.cart().put({
              _id: 'cartList',
              _rev: doc._rev,
              products: JSON.stringify(savedDocs)
            });
          }

          // Update The Local Store.....
          return LocalStore.cart().put({
            _id: 'cartList',
            _rev: doc._rev,
            products: JSON.stringify(savedDocs)
          });
        }).catch((e) => {
          // Initialize a new cart...
          product.cartCount = 1;
          const Products = [product];
          __this.cartCount += 1;
          return LocalStore.cart().put({
            _id: 'cartList',
            products: JSON.stringify(Products)
          });
        });
      });
    },
    created() {
      // check if the customer is logged in...
      let __this = this;
      LocalStore.customer().get('customer')
      .then((doc) => {
        __this.isLoggedIn = true;
      }).catch((e) => {
        __this.isLoggedIn = false;
      });
    },
    methods: {
      async fetchCategories() {
        try {
          const Categories = await axios.get(this.$baseUrl + 'fetch/categories', {
            headers: {
              Accept: 'application/json',
              'Cache-Control': 'no-cache'
            }
          });

          if (Categories.status = 200) {
            this.categories = Categories.data.data;
            this.isActive = 'Home';
            return;
          }
        } catch (e) {/* Fail Silently... */}
      },
      isActiveModel(activeLink) {
        // Change The Style && Pass Data With The Event Bus...
        this.isActive = activeLink;
      }
    }
  }
</script>

<style scoped>
  .margin-extra {
    margin: auto 15px;
  }
  .active-link {
    color: black !important;
  }
  .navbar-brand {
    background-color: transparent !important;
    box-shadow: none !important
  }
</style>
