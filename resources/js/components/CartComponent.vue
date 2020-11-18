<template>
  <div>
    <Nav></Nav>
    <main class="overflow-hidden">
        <section class="page header bg-dark section">
            <div class="container">
                <div class="row gap-y align-items-center text-center text-md-left">
                    <div class="col-md-10">
                        <h1 class="regular text-contrast">Your cart</h1>
                        <p class="mb-0 text-muted">Complete Your Order</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Cart Products -->
        <section class="section">
            <div class="container pt-0 mt-n8">
                <div class="row">
                    <div class="col-lg-8 pt-8">
                      <template v-if="carts.length > 0">
                        <div class="row border-bottom py-4" v-for="cart in carts" :key="cart.id">
                            <div class="col-md-8 col-lg-9 col-xl-10">
                                <div class="media d-block text-center d-sm-flex text-sm-left"><a class="mr-sm-4" href="javascript:;"><img :src="cart.banner" class="img-responsive mx-auto" style="max-width: 120px" alt=""></a>
                                    <div class="media-body"><a class="product-category text-muted font-xs" href="javascript:;">{{ cart.category.name }} &amp; {{ cart.name }}</a>
                                        <h6 class="product-title bold"><a href="javascript:;" class="text-darker">{{ cart.name }}</a></h6>
                                        <p class="my-0 text-muted small">{{ cart.description }}</p>
                                        <div class="text-primary light lead mt-3">₦{{ Intl.NumberFormat().format(cart.amount * cart.cartCount) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-2">
                                <form class="form text-center text-sm-left">
                                    <div class="form-group mb-0"><label class="control-label font-sm text-dark" for="q1">Quantity</label> <select class="form-control" @change="getProduct()" v-model="cart.cartCount"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></div>
                                    <button
                                        class="btn btn-link px-0 text-danger" type="button"><i class="fas fa-times mr-2"></i> Remove</button>
                                </form>
                            </div>
                        </div>
                      </template>
                    </div>
                    <!-- Sidebar-->
                    <aside class="col-lg-4 pt-0 pt-lg-0" v-if="totalCost > 0">
                        <div class="card shadow border-0 rounded-lg">
                            <div class="card-body">
                                <h6 class="text-darker">Shipping to</h6>
                                <hr class="my-4">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mb-3" v-if="isError">
                                  <small class="alert alert-danger alert-thin" role="alert">Operation Failed.</small>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mb-3" v-if="isSuccess">
                                  <small class="alert alert-success alert-thin" role="alert">Redirecting... Please Wait.</small>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mb-3" v-if="isLoading">
                                  <small class="alert alert-danger alert-thin" role="alert">Loading... Please Wait.</small>
                                </div>
                                <small>Enter Your Shipping Address</small>
                                <p class="form-control text-muted" v-model="shipping" contenteditable="true"></p>
                                <div class="d-flex flex-wrap">
                                    <p class="bold text-darker text-uppercase">Total</p>
                                    <p class="h5 bold price ml-sm-auto">₦{{ Intl.NumberFormat().format(totalCost) }}</p>
                                </div>
                                <a class="btn btn-primary btn-block mt-4" @click.prevent="makeOrder()" href="javascript:void(0)"><i class="fas fa-credit-card mr-2"></i>Make Payment</a></div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>
  </div>
</template>

<script type="text/javascript">
  import LocalStore from '../store/local';
  import eventBus from '../utils/eventBus';
  import Nav from '../includes/Nav';
  import axios from 'axios';

  export default {
    data() {
      return {
        carts: [],
        shipping: '',
        token: '',
        isError: false,
        totalCost: 0,
        isLoading: false,
        isSuccess: false,
        emailAddress: '',
        isLoggedIn: false,
      }
    },
    async mounted() {
      let __this = this;
      // Check For Customers...
      LocalStore.customer().get('customer')
      .then((doc) => {
        __this.isLoggedIn = true,
        __this.token = doc.accessToken,
        __this.emailAddress = doc.emailAddress;
      }).catch((e) => {
        __this.isLoggedIn = false;
        __this.emailAddress = '';
      });

      // Fetch Products From The Cart...
      LocalStore.cart().get('cartList')
      .then((doc) => {
        let products = JSON.parse(doc.products);
        __this.carts = products;
        for (let i = 0; i < products.length; i++) {
          __this.totalCost += parseFloat(products[i].cartCount) * parseFloat(products[i].amount);
        }
      });
    },
    created() {
      // check if the customer is logged in...
      let __this = this;
      LocalStore.customer().get('customer')
      .then((doc) => {
        console.log(doc);
        __this.isLoggedIn = true;
        __this.emailAddress = doc.emailAddress;
      }).catch((e) => {
        __this.isLoggedIn = false;
        __this.emailAddress = doc.emailAddress;
      });
    },
    methods: {
      getProduct() {
        // This Init...
        let __this = this;
        this.totalCost = 0;

        // Update From The Cart...
        LocalStore.cart().get('cartList')
        .then((doc) => {
          let products = JSON.parse(doc.products);
          for (let i = 0; i < products.length; i++) {
            __this.totalCost += parseFloat(products[i].cartCount) * parseFloat(products[i].amount);
          }
        });
      },
      async makeOrder() {
        try {
          this.isError = false;
          this.isLoading = true;
          let transactionInit = await axios.post(this.$baseUrl + 'user/purchase', {
            products: this.carts,
            amount: this.totalCost,
            shipping: this.shipping,
            emailAddress: this.emailAddress
          }, {
            headers: {
              Accept: 'application/json',
              Authorization: 'Bearer ' + this.token,
              'Content-Type': 'application/json',
              'Cache-Control': 'no-cache'
            }
          });

          window.location.href = transactionInit.data.data.data.authorization_url;
          this.isSuccess = true;
        } catch (e) {this.isError = true;}
      }
    },
    components: {
      Nav
    }
  }
</script>

<style media="screen">

</style>
