<template>
  <div>
    <Nav></Nav>
    <main class="overflow-hidden">
      <!-- Shop Hero Slider -->
      <section class="section">
        <div class="swiper-container shop-home-slider" data-sw-effect="fade">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="container-fluid pt-6 pb-9 py-md-0" style="background-color: rgb(0, 157, 206);">
                <div class="row align-items-center">
                  <div class="col-md-6 col-lg-6 px-0 order-md-2">
                    <img class="img-responsive ml-auto overlay" style="max-height: 820px;" src="img/shop/home/brooke-lark-HlNcigvUi4Q-unsplash.jpg" alt="...">
                  </div>
                    <div class="col-md-6 col-lg-4 ml-lg-auto">
                      <div class="text-left text-lg-left text-lg-nowrap move-left">
                        <h4 class="text-light font-weight-light mb-0 pb-0">What are you waiting for?</h4>
                        <h1 class="text-contrast bold display-4">Food Is Served.</h1>
                        <p class="lead text-light pb-3">At the Desevens, we cook the best food.</p>
                        <a class="btn btn-primary" href="javascript:;">Order Now <i class="fas fa-chevron-right ml-2 mr-n1"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </section>
      <!-- Trending Products -->
      <section class="trending-now">
        <div class="container">
          <div class="section-heading">
            <h3>Breakfast Menu</h3>
            <span class="text-primary bold">The Best, But Only for you.</span>
          </div>
          <div class="row gap-y">
            <template v-if="products.length > 0">
              <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover" v-for="product in products" :key="product.id">
                <div class="card product-card border-0">
                  <a class="card-img-top d-block overflow-hidden" href="javascript:;">
                    <img :src="product.banner" class="img-responsive mx-auto" alt="product.name">
                  </a>
              <div class="card-body">
                <a class="product-category text-muted font-xs" href="javascript:;">{{ product.category.name }} &amp; {{ product.name }}</a>
                <h3 class="product-title font-sm">
                <a href="javascript:;" class="text-darker">{{ product.name }}</a>
                </h3>
                <div class="center-flex justify-content-between flex-wrap">
                  <div class="product-price d-flex align-items-end">
                    <div class="text-primary light lead">
                      <span>₦{{ Intl.NumberFormat().format(product.amount) }}</span>
                    </div>
                  </div>
                  <div class="product-rating small text-alternate" v-if="parseInt(product.amount) <= 5000">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="product-rating small text-alternate" v-if="parseInt(product.amount) >= 10000">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="product-rating small text-alternate" v-if="parseInt(product.amount) >= 15000">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                </div>
              </div>
                <div class="card-body card-body-hidden">
                  <button class="btn btn-primary btn-block mb-2" @click="addTocart(product)" type="button">
                    <i data-feather="shopping-cart" class="mr-1" width="16"></i>
                    Add to Cart
                  </button>
                </div>
              </div>
              <hr class="d-sm-none">
            </div>
            </template>
          </div>
        </div>
      </section>
      <div class="position-relative">
        <div class="shape-divider shape-divider-bottom shape-divider-fluid-x text-dark">
          <svg viewBox="0 0 2880 48" xmlns="http://www.w3.org/2000/svg"><path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z"></path>
          </svg>
        </div>
      </div>
    </main>
  </div>
</template>

<script type="text/javascript">
  import eventBus from '../utils/eventBus';
  import Nav from '../includes/Nav';
  import axios from 'axios';

  export default {
    data() {
      return {
        categoryId: '',
        products: []
      }
    },
    async mounted() {
      await this.fetchProducts();
    },
    methods: {
      async fetchProducts() {
        await axios.get(this.$baseUrl + 'fetch/products', {
          headers: {
            Accept: 'multipart/form-data',
            'Content-Type': 'multipart/form-data',
            'Cache-Control': 'no-cache'
          }
        }).then((docs) => {
          if (docs.status == 200) {
            this.products = docs.data.data;
          }
        }).catch((e) => {
          this.products = [];
        });
      },
      addTocart(product) {
        eventBus.$emit('addToCart', product);        
      }
    },
    components: {
      Nav
    }
  }
</script>

<style media="screen">
  .overlay {
    filter: brightness(45%);
  }
  .move-left {
    margin-left: -19% !important;
  }
</style>
