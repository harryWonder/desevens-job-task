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
          <a class="st-root-link nav-link" href="index.html">Home </a>
          <a class="st-root-link item-products st-has-dropdown nav-link" data-dropdown="blocks">Blocks </a>
          <a class="st-root-link item-products st-has-dropdown nav-link" data-dropdown="pages">Pages </a>
          <a class="st-root-link item-company st-has-dropdown nav-link" data-dropdown="components">UI Components </a>
          <a class="st-root-link item-blog st-has-dropdown nav-link" data-dropdown="blog">Blog </a>
          <a class="st-root-link item-shop st-has-dropdown nav-link" href="shop/" data-dropdown="shop">Shop</a>
        </li>
        <li class="st-nav-section st-nav-secondary nav-item">
          <a class="btn btn-rounded btn-outline mr-3 px-3" href="login.html" target="_blank">
            <i class="fas fa-sign-in-alt d-none d-md-inline mr-md-0 mr-lg-2"></i> <span class="d-md-none d-lg-inline">Login</span>
          </a>
          <a class="btn btn-rounded btn-solid px-3" href="signup.html" target="_blank">
            <i class="fas fa-user-plus d-none d-md-inline mr-md-0 mr-lg-2"></i> <span class="d-md-none d-lg-inline">Signup</span>
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
                  <h4 class="text-uppercase regular">Pages</h4>
                  <a class="regular text-primary" href="about.html"><i class="far fa-building mr-2"></i> About </a>
                  <a class="regular text-success" href="contact.html"><i class="far fa-envelope mr-2"></i> Contact </a>
                  <a class="regular text-warning" href="pricing.html"><i class="fas fa-hand-holding-usd mr-2"></i> Pricing </a>
                  <a class="regular text-info" href="faqs.html"><i class="far fa-question-circle mr-2"></i> FAQs</a>
                </div>
                <div class="st-dropdown-content-group border-top bw-2">
                  <h4 class="text-uppercase regular">Components</h4>
                  <div class="row">
                    <div class="col mr-4">
                      <a target="_blank" href="components/alert.html">Alerts</a>
                      <a target="_blank" href="components/badge.html">Badges</a>
                      <a target="_blank" href="components/button.html">Buttons</a>
                      <a target="_blank" href="components/color.html">Colors</a>
                      <a target="_blank" href="components/accordion.html">Accordion</a>
                      <a target="_blank" href="components/cookie-law.html">Cookielaw</a>
                    </div>
                    <div class="col mr-4">
                      <a target="_blank" href="components/overlay.html">Overlay</a>
                      <a target="_blank" href="components/progress.html">Progress</a>
                      <a target="_blank" href="components/lightbox.html">Lightbox</a>
                      <a target="_blank" href="components/tab.html">Tabs</a>
                      <a target="_blank" href="components/tables.html">Tables</a>
                      <a target="_blank" href="components/typography.html">Typography</a>
                    </div>
                  </div>
                </div>
                <div class="st-dropdown-content-group bg-light b-t">
                  <a href="login.html">Sign in <i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="st-dropdown-root">
        <div class="st-dropdown-bg">
          <div class="st-alt-bg"></div>
        </div>
        <div class="st-dropdown-arrow"></div>
        <div class="st-dropdown-container">
          <div class="st-dropdown-section" data-dropdown="blocks">
            <div class="st-dropdown-content">
              <div class="st-dropdown-content-group">
                <div class="row">
                  <div class="col mr-4">
                    <a class="dropdown-item" target="_blank" href="blocks/call-to-action.html">Call to actions</a>
                    <a class="dropdown-item" target="_blank" href="blocks/contact.html">Contact</a>
                    <a class="dropdown-item" target="_blank" href="blocks/counter.html">Counters</a>
                    <a class="dropdown-item" target="_blank" href="blocks/faqs.html">FAQs</a>
                  </div>
                  <div class="col mr-4">
                    <a class="dropdown-item" target="_blank" href="blocks/footer.html">Footers</a>
                    <a class="dropdown-item" target="_blank" href="blocks/form.html">Forms</a>
                    <a class="dropdown-item" target="_blank" href="blocks/navbar.html">Navbar</a>
                    <a class="dropdown-item" target="_blank" href="blocks/navigation.html">Navigation</a>
                  </div>
                  <div class="col">
                    <a class="dropdown-item" target="_blank" href="blocks/pricing.html">Pricing</a>
                    <a class="dropdown-item" target="_blank" href="blocks/slider.html">Sliders</a>
                    <a class="dropdown-item" target="_blank" href="blocks/team.html">Team</a>
                    <a class="dropdown-item" target="_blank" href="blocks/testimonial.html">Testimonials</a>
                  </div>
                </div>
              </div>
              <div class="st-dropdown-content-group">
                <h3 class="link-title"><i class="fas fa-long-arrow-alt-right icon"></i> Coming soon</h3>
                <div class="ml-5">
                  <span class="dropdown-item text-secondary">Dividers </span>
                  <span class="dropdown-item text-secondary">Gallery </span>
                  <span class="dropdown-item text-secondary">Screenshots</span>
                </div>
              </div>
            </div>
          </div>
          <div class="st-dropdown-section" data-dropdown="pages">
            <div class="st-dropdown-content">
              <div class="st-dropdown-content-group">
                <div class="mb-4">
                  <h3 class="text-darker light text-nowrap">
                    <span class="bold regular">Useful pages</span> you'll need</h3>
                    <p class="text-secondary mt-0">Get a complete design stack</p>
                  </div>
                  <div class="row">
                    <div class="col">
                      <ul class="mr-4">
                        <li>
                          <h4 class="text-uppercase regular">Error</h4>
                        </li>
                        <li>
                          <a target="_blank" href="403.html">403 Error</a>
                        </li>
                        <li>
                          <a target="_blank" href="404.html">404 Error</a>
                        </li>
                        <li>
                          <a target="_blank" href="405.html">405 Error</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col">
                      <ul class="mr-4">
                        <li><h4 class="text-uppercase regular">User</h4></li>
                        <li><a target="_blank" href="login.html">Login</a></li>
                        <li><a target="_blank" href="register.html">Register</a></li>
                        <li><a target="_blank" href="forgot.html">Forgot</a></li>
                      </ul>
                    </div>
                    <div class="col">
                      <ul>
                        <li>
                          <h4 class="text-uppercase regular">Extra</h4>
                        </li>
                        <li>
                          <a target="_blank" href="pricing.html">Pricing</a>
                        </li>
                        <li>
                          <a target="_blank" href="terms.html">Terms</a>
                        </li>
                        <li>
                          <a target="_blank" href="faqs.html">FAQ</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="st-dropdown-content-group">
                  <a class="dropdown-item bold" href="about.html"><i class="far fa-building icon"></i> About </a>
                  <a class="dropdown-item bold" href="contact.html"><i class="far fa-envelope icon"></i> Contact </a>
                  <a class="dropdown-item bold" href="pricing.html"><i class="fas fa-hand-holding-usd icon"></i> Pricing</a>
                </div>
              </div>
            </div>
            <div class="st-dropdown-section" data-dropdown="components">
              <div class="st-dropdown-content">
                <div class="st-dropdown-content-group">
                  <a class="dropdown-item" target="_blank" href="components/color.html">
                    <div class="media mb-4">
                      <i class="fas fa-palette mr-2 bg-primary rounded-circle icon-md text-contrast center-flex"></i>
                      <div class="media-body">
                        <h3 class="link-title m-0">Colors</h3>
                        <p class="m-0 text-secondary">Get to know DashCore color options</p>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" target="_blank" href="components/accordion.html">
                    <div class="media mb-4">
                      <i class="fas fa-bars mr-2 bg-primary rounded-circle icon-md text-contrast center-flex"></i>
                      <div class="media-body">
                        <h3 class="link-title m-0">Accordion</h3>
                        <p class="m-0 text-secondary">Useful accordion elements</p>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" target="_blank" href="components/cookie-law.html">
                    <div class="media mb-4"><i class="fas fa-cookie-bite mr-2 bg-primary rounded-circle icon-md text-contrast center-flex"></i>
                      <div class="media-body">
                        <h3 class="link-title m-0">CookieLaw</h3>
                        <p class="m-0 text-secondary">Comply with the hideous EU Cookie Law</p>
                      </div>
                    </div>
                  </a>
                  <h4 class="text-uppercase regular">Huge components list</h4>
                  <div class="row">
                    <div class="col mr-4">
                      <a class="dropdown-item" target="_blank" href="components/alert.html">Alerts</a>
                      <a class="dropdown-item" target="_blank" href="components/badge.html">Badges</a>
                      <a class="dropdown-item" target="_blank" href="components/button.html">Buttons</a>
                    </div>
                    <div class="col mr-4">
                      <a class="dropdown-item" target="_blank" href="components/overlay.html">Overlay</a>
                      <a class="dropdown-item" target="_blank" href="components/progress.html">Progress</a>
                      <a class="dropdown-item" target="_blank" href="components/lightbox.html">Lightbox</a>
                    </div>
                    <div class="col mr-4">
                      <a class="dropdown-item" target="_blank" href="components/tab.html">Tabs</a>
                      <a class="dropdown-item" target="_blank" href="components/tables.html">Tables</a>
                      <a class="dropdown-item" target="_blank" href="components/typography.html">Typography</a>
                    </div>
                  </div>
                </div>
                <div class="st-dropdown-content-group">
                  <a class="dropdown-item" target="_blank" href="components/wizard.html">Wizard <span class="badge badge-pill badge-primary">New</span></a>
                  <span class="dropdown-item d-flex align-items-center text-muted">Timeline <i class="fas fa-ban ml-auto"></i></span> <span class="dropdown-item d-flex align-items-center text-muted">Process <i class="fas fa-ban ml-auto"></i></span>
                </div>
              </div>
            </div>
            <div class="st-dropdown-section" data-dropdown="blog">
              <div class="st-dropdown-content">
                <div class="st-dropdown-content-group">
                  <div class="row">
                    <div class="col mr-4">
                      <h4 class="regular text-uppercase">Full width</h4>
                      <a class="dropdown-item" target="_blank" href="blog/blog-post.html">Single post</a>
                      <a class="dropdown-item" target="_blank" href="blog/blog-grid.html">Posts Grid</a>
                    </div>
                    <div class="col mr-4">
                      <h4 class="regular text-uppercase">Sidebar left</h4>
                      <a class="dropdown-item" target="_blank" href="blog/blog-post-sidebar-left.html">Single post</a>
                      <a class="dropdown-item" target="_blank" href="blog/blog-grid-sidebar-left.html">Posts Grid</a>
                    </div>
                    <div class="col mr-4">
                      <h4 class="regular text-uppercase">Sidebar right</h4>
                      <a class="dropdown-item" target="_blank" href="blog/blog-post-sidebar-right.html">Single post</a>
                      <a class="dropdown-item" target="_blank" href="blog/blog-grid-sidebar-right.html">Posts Grid</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="st-dropdown-section" data-dropdown="shop">
              <div class="st-dropdown-content">
                <div class="st-dropdown-content-group">
                  <a class="dropdown-item" target="_blank" href="shop/home.html">
                    <div class="media align-items-center">
                      <div class="bg-success text-contrast icon-md center-flex rounded-circle mr-3">
                        <i class="fas fa-shopping-basket"></i>
                      </div>
                      <div class="media-body">
                        <h3 class="link-title m-0">Home</h3>
                        <p class="m-0 text-secondary">Online store home with an outstanding UX</p>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item" target="_blank" href="shop/cart.html">
                    <div class="media align-items-center">
                      <div class="bg-info text-contrast icon-md center-flex rounded-circle mr-3">
                        <i class="fas fa-shopping-cart"></i>
                      </div>
                      <div class="media-body">
                        <h3 class="link-title m-0">Cart</h3>
                        <p class="m-0 text-secondary">Online store shopping cart</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="st-dropdown-content-group">
                  <h3 class="link-title">
                    <i class="fas fa-money-check-alt icon"></i> Checkout</h3>
                    <div class="ml-5">
                      <a class="dropdown-item text-secondary" target="_blank" href="shop/checkout-customer.html">Customer <i class="fas fa-angle-right ml-2"></i> </a>
                      <a class="dropdown-item text-secondary" target="_blank" href="shop/checkout-shipping.html">Shipping Information <i class="fas fa-angle-right ml-2"></i> </a>
                      <a class="dropdown-item text-secondary" target="_blank" href="shop/checkout-payment.html">Payment Methods <i class="fas fa-angle-right ml-2"></i> </a>
                      <a class="dropdown-item text-secondary" target="_blank" href="shop/checkout-confirmation.html">Order Review <i class="fas fa-angle-right ml-2"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </nav>
        <main class="overflow-hidden">
          <!-- Shop Hero Slider -->
          <section class="section">
            <div class="swiper-container shop-home-slider" data-sw-effect="fade">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="container-fluid pt-6 pb-9 py-md-0" style="background-color: rgb(0, 157, 206);">
                    <div class="row gap-y align-items-center">
                      <div class="col-md-6 col-lg-6 px-0 order-md-2">
                        <img class="img-responsive ml-auto" style="max-height: 620px;" src="img/shop/home/blue-headphones.jpg" alt="...">
                      </div>
                        <div class="col-md-6 col-lg-4 ml-lg-auto">
                          <div class="text-center text-lg-left text-lg-nowrap">
                            <h4 class="text-light font-weight-light mb-0 pb-1">What you were waiting for?</h4>
                            <h1 class="text-contrast bold display-4">The Headphones Collection</h1>
                            <p class="lead text-light pb-3">Discover our selection of the best Headphones</p>
                            <a class="btn btn-primary" href="javascript:;">Shop Now <i class="fas fa-chevron-right ml-2 mr-n1"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="container-fluid pt-6 pb-9 py-md-0" style="background-color: rgb(92, 216, 217);">
                      <div class="row gap-y align-items-center">
                        <div class="col-md-6 col-lg-6 px-0 order-md-2">
                          <img class="img-responsive ml-auto" style="max-height: 620px;" src="img/shop/home/app-deals.jpg" alt="...">
                        </div>
                        <div class="col-md-6 col-lg-4 ml-lg-auto">
                          <div class="text-center text-lg-left text-lg-nowrap">
                            <h4 class="text-light font-weight-light mb-0 pb-1">Download the App</h4>
                            <h1 class="text-contrast bold display-4">Shop on the Go</h1>
                            <p class="lead text-light pb-3">Get the best of our store at your fingertips</p>
                            <a class="btn btn-primary" href="javascript:;">Shop Now <i class="fas fa-chevron-right ml-2 mr-n1"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="container-fluid pt-6 pb-9 py-md-0" style="background-color: rgb(240, 197, 87);"><div class="row gap-y align-items-center">
                      <div class="col-md-6 col-lg-6 px-0 order-md-2">
                        <img class="img-responsive ml-auto" style="max-height: 620px;" src="img/shop/home/happy-girl.jpg" alt="...">
                      </div>
                      <div class="col-md-6 col-lg-4 ml-lg-auto">
                        <div class="text-center text-lg-left text-lg-nowrap">
                          <h4 class="text-light font-weight-light mb-0 pb-1">Enjoy your world</h4>
                          <h1 class="text-contrast bold display-4">What&#39;s makes you happy</h1>
                          <p class="lead text-light pb-3">We have all the products to make your life easier</p>
                          <a class="btn btn-primary" href="javascript:;">Shop Now <i class="fas fa-chevron-right ml-2 mr-n1"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="container-fluid pt-6 pb-9 py-md-0" style="background-color: rgb(226, 162, 113);">
                    <div class="row gap-y align-items-center">
                      <div class="col-md-6 col-lg-6 px-0 order-md-2">
                        <img class="img-responsive ml-auto" style="max-height: 620px;" src="img/shop/home/enjoy.jpg" alt="...">
                      </div>
                      <div class="col-md-6 col-lg-4 ml-lg-auto">
                        <div class="text-center text-lg-left text-lg-nowrap">
                          <h4 class="text-light font-weight-light mb-0 pb-1">Get them all</h4>
                          <h1 class="text-contrast bold display-4">Best performing products</h1>
                          <p class="lead text-light pb-3">We have what you&#39;re looking for in all tech industry</p>
                          <a class="b
                          tn btn-primary" href="javascript:;">Shop Now <i class="fas fa-chevron-right ml-2 mr-n1"></i>
                        </a>
                      </div>
                    </div></div>
                  </div>
                </div>
              </div>
              <div class="swiper-pagination highlight-active text-md-right pr-md-6 pb-5 mb-5 mb-md-0"></div>
              <!-- navigation buttons -->
              <div class="swiper-button-prev rounded-circle bg-contrast shadow">
                <i data-feather="arrow-left"></i>
              </div>
              <div class="swiper-button-next rounded-circle bg-contrast shadow">
                <i data-feather="arrow-right"></i>
              </div>
            </div>
          </section>
          <!-- Deals -->
          <section class="section bg-light mt-n6">
            <div class="container bring-to-front pt-0">
              <div class="row gap-y">
                <div class="col-xl-8 col-lg-9">
                  <div class="shadow-box shadow-hover bg-contrast p-3 rounded h-100">
                    <p class="text-darker bold mt-0 d-flex">Weekend Deals
                      <a href="javascript:;" class="small text-muted ml-auto">View more</a>
                    </p>
                    <div class="row no-gutters text-center">
                      <div class="col-6 col-sm-3 d-flex flex-column pl-0 pr-2">
                        <a href="javascript:;" class="shadow-box p-2">
                          <img src="img/shop/products/earphones.jpg" class="img-responsive rounded" alt="">
                          <p class="mb-0 d-flex flex-wrap align-items-center">$<span class="price text-darker bold ml-1 mr-auto">12.15</span>
                            <span class="badge badge-danger">25% Off</span>
                          </p>
                        </a>
                      </div>
                      <div class="col-6 col-sm-3 d-flex flex-column px-2">
                        <a href="javascript:;" class="shadow-box p-2">
                          <img src="img/shop/products/speaker.jpg" class="img-responsive rounded" alt="">
                          <p class="mb-0 d-flex flex-wrap align-items-center">$<span class="price text-darker bold ml-1 mr-auto">1.45</span>
                            <span class="badge badge-danger">15% Off</span>
                          </p>
                        </a>
                      </div>
                      <div class="col-6 col-sm-3 d-flex flex-column px-2">
                        <a href="javascript:;" class="shadow-box p-2">
                          <img src="img/shop/products/headphone.jpg" class="img-responsive rounded" alt="">
                          <p class="mb-0 d-flex flex-wrap align-items-center">$<span class="price text-darker bold ml-1 mr-auto">19.99</span>
                            <span class="badge badge-danger">45% Off</span>
                          </p>
                        </a>
                      </div>
                      <div class="col-6 col-sm-3 d-flex flex-column px-2">
                        <a href="javascript:;" class="shadow-box p-2">
                          <img src="img/shop/products/vrglasses.jpg" class="img-responsive rounded" alt="">
                          <p class="mb-0 d-flex flex-wrap align-items-center">$<span class="price text-darker bold ml-1 mr-auto">29.99</span> <span class="badge badge-danger">18% Off</span></p>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-3">
                  <div class="shadow-box shadow-hover bg-contrast p-3 rounded h-100">
                    <p class="bold text-darker mt-0">Register to get the best deals</p>
                    <p class="text-muted mb-5">By registering you accept the <a href="#!">Terms and Conditions</a> policy</p>
                    <form class="form">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Full Name">
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Offers -->
          <section class="section bg-light border-bottom">
            <div class="container pt-0">
              <div class="row gap-y">
                <div class="col-md-6">
                  <div class="rounded bg-info shadow image-background off-left-background lift-hover p-4 pl-6 pl-md-9" style="background-image: url(img/shop/products/vrglasses.png)">
                    <div class="pl-lg-3">
                      <h3 class="bold text-contrast mt-0">VR Glasses</h3>
                      <p class="text-light mt-0">Discover what&#39;s new on Virtual Reality</p>
                      <a href="#!" class="btn btn-contrast">Shop VR Glasses</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="rounded bg-primary shadow image-background off-left-background lift-hover p-4 pl-6 pl-md-9" style="background-image: url(img/shop/products/monitor.png)">
                    <div class="pl-lg-3">
                      <h3 class="bold text-contrast mt-0">Monitors</h3>
                      <p class="text-light mt-0">$30 Off on selected monitors</p>
                      <a href="#!" class="btn btn-contrast">Shop Monitors</a>
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
                <span class="text-primary bold">Discover</span>
                <h3>What's Trending Now</h3>
              </div>
              <div class="row gap-y">
                <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
                  <div class="card product-card border-0">
                    <a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;"><i class="far fa-heart"></i> </a>
                    <a class="card-img-top d-block overflow-hidden" href="javascript:;">
                      <img src="img/shop/products/computerconnection.png" class="img-responsive mx-auto" alt="">
                    </a>
          <div class="card-body">
            <a class="product-category text-muted font-xs" href="javascript:;">Wireless &amp; Bluetooth</a>
            <h3 class="product-title font-sm">
              <a href="javascript:;" class="text-darker">Bluetooh Mouse</a>
            </h3>
            <div class="center-flex justify-content-between flex-wrap">
              <div class="product-price d-flex align-items-end">
                <div class="text-primary light lead"><span>$25.</span> <sup>00</sup></div>
                <del class="text-muted light strike-through ml-2"><span>$45.</span> <sup>00</sup></del>
              </div>
                <div class="product-rating small text-alternate">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
            </div>
            <div class="card-body card-body-hidden">
              <button class="btn btn-primary btn-block mb-2" type="button">
                <i data-feather="shopping-cart" class="mr-1" width="16"></i>
                Add to Cart
              </button>
              <div class="text-center">
                <a class="font-ms small text-muted" href="#quick-view" data-toggle="modal">
                  <i data-feather="eye" class="mr-1" width="14"></i>Quick view</a>
                </div>
              </div>
            </div>
            <hr class="d-sm-none">
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
            <div class="card product-card border-0">
              <a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;"><i class="far fa-heart"></i>
              </a>
              <a class="card-img-top d-block overflow-hidden" href="javascript:;">
                <img src="img/shop/products/externalharddrive.png" class="img-responsive mx-auto" alt="">
              </a>
              <div class="card-body">
                <a class="product-category text-muted font-xs" href="javascript:;">Computer &amp; Electronics</a>
                <h3 class="product-title font-sm">
                  <a href="javascript:;" class="text-darker">External Hard Drive</a>
                </h3>

                <div class="center-flex justify-content-between flex-wrap">
                  <div class="product-price d-flex align-items-end">
                    <div class="text-primary light lead">
                      <span>$78.</span> <sup>00</sup>
                    </div>
                  </div>
                  <div class="product-rating small text-alternate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                  </div>
                </div>
              </div>
              <div class="card-body card-body-hidden">
                <button class="btn btn-primary btn-block mb-2" type="button">
                  <i data-feather="shopping-cart" class="mr-1" width="16"></i>Add to Cart
                </button>
                <div class="text-center">
                  <a class="font-ms small text-muted" href="#quick-view" data-toggle="modal">
                    <i data-feather="eye" class="mr-1" width="14"></i>Quick view
                  </a>
                </div>
              </div>
            </div>
            <hr class="d-sm-none">
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
            <div class="card product-card border-0">
              <a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;">
                <i class="far fa-heart"></i>
              </a>
              <a class="card-img-top d-block overflow-hidden" href="javascript:;">
                <img src="img/shop/products/modernspeakers.jpg" class="img-responsive mx-auto" alt="">
              </a>
              <div class="card-body">
                <a class="product-category text-muted font-xs" href="javascript:;">Speakers</a>
                <h3 class="product-title font-sm">
                  <a href="javascript:;" class="text-darker">Modern Speakers</a>
                </h3>
                <div class="center-flex justify-content-between flex-wrap">
                  <div class="product-price d-flex align-items-end">
                    <div class="text-primary light lead"><span>$124.</span> <sup>00</sup>
                    </div>
                    <del class="text-muted light strike-through ml-2"><span>$154.</span> <sup>00</sup></del>
                  </div>
                  <div class="product-rating small text-alternate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                  </div>
                </div>
              </div>
              <div class="card-body card-body-hidden">
                <button class="btn btn-primary btn-block mb-2" type="button">
                  <i data-feather="shopping-cart" class="mr-1" width="16"></i>
                  Add to Cart
                </button>
                <div class="text-center">
                  <a class="font-ms small text-muted" href="#quick-view" data-toggle="modal">
                    <i data-feather="eye" class="mr-1" width="14"></i>Quick view
                  </a>
                </div>
              </div>
            </div>
            <hr class="d-sm-none">
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
            <div class="card product-card border-0">
              <a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;">
                <i class="far fa-heart"></i>
              </a>
              <a class="card-img-top d-block overflow-hidden" href="javascript:;">
                <img src="img/shop/products/vrglassesdual.png" class="img-responsive mx-auto" alt="">
              </a>
              <div class="card-body">
                <a class="product-category text-muted font-xs" href="javascript:;">Virtual Reality</a>
                <h3 class="product-title font-sm">
                  <a href="javascript:;" class="text-darker">Virtual Reality Glasses</a>
                </h3>
                <div class="center-flex justify-content-between flex-wrap">
                  <div class="product-price d-flex align-items-end">
                    <div class="text-primary light lead"><span>$145.</span> <sup>00</sup>
                    </div>
                  </div>
                  <div class="product-rating small text-alternate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                </div>
              </div>
              <div class="card-body card-body-hidden">
                <button class="btn btn-primary btn-block mb-2" type="button">
                  <i data-feather="shopping-cart" class="mr-1" width="16"></i>Add to Cart</button>
                  <div class="text-center">
                    <a class="font-ms small text-muted" href="#quick-view" data-toggle="modal">
                      <i data-feather="eye" class="mr-1" width="14"></i>Quick view</a>
                    </div>
                  </div>
                </div>
                <hr class="d-sm-none">
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
                <div class="card product-card border-0">
                  <a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;">
                    <i class="far fa-heart"></i>
                  </a>
                  <a class="card-img-top d-block overflow-hidden" href="javascript:;">
                    <img src="img/shop/products/dualshock.png" class="img-responsive mx-auto" alt="">
                  </a>
                  <div class="card-body">
                    <a class="product-category text-muted font-xs" href="javascript:;">Gaming &amp; Consoles
                    </a>
                    <h3 class="product-title font-sm">
                      <a href="javascript:;" class="text-darker">Dual Shock Controller</a>
                    </h3>
                    <div class="center-flex justify-content-between flex-wrap">
                      <div class="product-price d-flex align-items-end">
                        <div class="text-primary light lead"><span>$87.</span> <sup>00</sup>
                        </div>
                        <del class="text-muted light strike-through ml-2"><span>$54.</span> <sup>00</sup>
                        </del>
                      </div>
                      <div class="product-rating small text-alternate"><i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                       </div>
                     </div>
                   </div>
                   <div class="card-body card-body-hidden">
                     <button class="btn btn-primary btn-block mb-2" type="button">
                       <i data-feather="shopping-cart" class="mr-1" width="16"></i>Add to Cart
                     </button>
                     <div class="text-center">
                       <a class="font-ms small text-muted" href="#quick-view" data-toggle="modal">
                         <i data-feather="eye" class="mr-1" width="14"></i>Quick view
                       </a>
                     </div>
                   </div>
                 </div>
                 <hr class="d-sm-none">
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
                 <div class="card product-card border-0">
                   <a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;">
                     <i class="far fa-heart"></i>
                   </a>
                   <a class="card-img-top d-block overflow-hidden" href="javascript:;">
                     <img src="img/shop/products/wiredmouse.png" class="img-responsive mx-auto" alt="">
                   </a>
                   <div class="card-body">
                     <a class="product-category text-muted font-xs" href="javascript:;">Computer &amp; Electronics
                     </a>
                     <h3 class="product-title font-sm">
                       <a href="javascript:;" class="text-darker">Wired Classic Mouse</a>
                     </h3>
                     <div class="center-flex justify-content-between flex-wrap">
                       <div class="product-price d-flex align-items-end">
                         <div class="text-primary light lead"><span>$12.</span> <sup>00</sup>
                         </div>
                       </div>
                       <div class="product-rating small text-alternate">
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                         <i class="far fa-star"></i>
                       </div>
                     </div>
                   </div>
                   <div class="card-body card-body-hidden">
                     <button class="btn btn-primary btn-block mb-2" type="button">
                       <i data-feather="shopping-cart" class="mr-1" width="16"></i>Add to Cart
                     </button>
                     <div class="text-center">
                       <a class="font-ms small text-muted" href="#quick-view" data-toggle="modal">
                         <i data-feather="eye" class="mr-1" width="14"></i>Quick view
                       </a>
                     </div>
                   </div>
                 </div>
                 <hr class="d-sm-none">
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
                 <div class="card product-card border-0">
                   <a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;">
                     <i class="far fa-heart"></i>
                   </a>
                   <a class="card-img-top d-block overflow-hidden" href="javascript:;">
                     <img src="img/shop/products/audioclassicmic.png" class="img-responsive mx-auto" alt="">
                   </a>
                   <div class="card-body">
                     <a class="product-category text-muted font-xs" href="javascript:;">Professional Audio</a>
                     <h3 class="product-title font-sm">
                       <a href="javascript:;" class="text-darker">Classic Microphone</a>
                     </h3>
                     <div class="center-flex justify-content-between flex-wrap">
                       <div class="product-price d-flex align-items-end">
                         <div class="text-primary light lead">
                           <span>$25.</span> <sup>00</sup>
                         </div>
                         <del class="text-muted light strike-through ml-2"><span>$54.</span> <sup>00</sup>
                         </del>
                       </div>
                       <div class="product-rating small text-alternate">
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                         <i class="far fa-star"></i>
                       </div>
                     </div>
                   </div>
                   <div class="card-body card-body-hidden">
                     <button class="btn btn-primary btn-block mb-2" type="button">
                       <i data-feather="shopping-cart" class="mr-1" width="16"></i>Add to Cart
                     </button>
                     <div class="text-center">
                       <a class="font-ms small text-muted" href="#quick-view" data-toggle="modal">
                         <i data-feather="eye" class="mr-1" width="14"></i>Quick view</a>
                       </div>
                     </div>
                   </div>
                   <hr class="d-sm-none">
                 </div>
                 <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
                   <div class="card product-card border-0">
                     <a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;">
                       <i class="far fa-heart"></i>
                     </a>
                     <a class="card-img-top d-block overflow-hidden" href="javascript:;">
                       <img src="img/shop/products/wireless-headphones.png" class="img-responsive mx-auto" alt=""></a>
                       <div class="card-body">
                         <a class="product-category text-muted font-xs" href="javascript:;">Wireless &amp; Bluetooth</a>
                         <h3 class="product-title font-sm"><a href="javascript:;" class="text-darker">Wireless Headphones
                         </a>
                       </h3>
                       <div class="center-flex justify-content-between flex-wrap">
                         <div class="product-price d-flex align-items-end">
                           <div class="text-primary light lead"><span>$45.</span> <sup>00</sup>
                           </div>
                         </div>
                         <div class="product-rating small text-alternate"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                         </div>
                       </div>
                     </div>
                     <div class="card-body card-body-hidden">
                       <button class="btn btn-primary btn-block mb-2" type="button">
                         <i data-feather="shopping-cart" class="mr-1" width="16"></i>Add to Cart</button>
                         <div class="text-center">
                           <a class="font-ms small text-muted" href="#quick-view" data-toggle="modal">
                             <i data-feather="eye" class="mr-1" width="14"></i>Quick view</a>
                           </div>
                         </div>
                       </div>
                       <hr class="d-sm-none">
                     </div>
                   </div>
                   <div class="text-center pt-3">
                     <a class="btn btn-outline-primary" href="javascript:;">More products <i class="fas fa-chevron-right ml-1"></i>
                     </a>
                   </div>
                 </div>
               </section>
               <!-- CTA Promo -->
               <section class="bg-light edge bottom-right">
                 <div class="container">
                   <div class="row align-items-center">
                     <div class="col-md-6 text-center">
                       <h2 class="mb-3">35% Off on Tech Gadgets</h2>
                       <a href="javascript:;" class="btn btn-lg btn-primary">Shop Now</a>
                     </div>
                     <div class="col-md-6">
                       <p class="mt-0 text-muted">All popular technology gadgets are up to 35% off. Shop now for your favorites tablets, smartphones, watches and more"</p>
                       <nav class="nav">
                         <a href="javascript:;" class="nav-link nav-item dotted px-0 mx-2 ml-0">Tablets</a>
                         <a href="javascript:;" class="nav-link nav-item dotted px-0 mx-2">Smartphones</a>
                         <a href="javascript:;" class="nav-link nav-item dotted px-0 mx-2">Watches</a>
                       </nav>
                     </div>
                   </div>
                 </div>
               </section>
               <!-- Promos --><section class="section"><div class="container bring-to-front"><div class="row gap-y"><div class="col-lg-3 promo-column"><div class="rounded promo-block zoom-background"><div class="absolute top right bottom left image-background cover overlay overlay-dark alpha-1 w-100 h-100" style="background-image: url(img/shop/products/wearable.jpg)">

               </div><div class="content position-relative p-4">
                 <h4 class="text-contrast mt-0">Wearable</h4>
                 <p class="text-light mt-0">Smart electronic devices for your day to day life.</p>
                 <a href="javascript:;" class="btn btn-contrast">Shop Wearable</a>
               </div>
             </div>
             <div class="rounded promo-block zoom-background mt-4"><div class="absolute top right bottom left image-background cover overlay overlay-dark alpha-1 w-100 h-100" style="background-image: url(img/shop/products/innovative.jpg)">
             </div>
             <div class="content position-relative p-4">
               <h4 class="text-contrast mt-0">Innovative</h4>
               <p class="text-light mt-0">Make your life easeier with these smart solutions.</p>
               <a href="javascript:;" class="btn btn-contrast">Shop Innovative</a>
             </div>
           </div>
         </div>
         <div class="col-lg-6 promo-column">
           <div class="rounded promo-block zoom-background">
             <div class="absolute top right bottom left image-background cover overlay overlay-light alpha-3 w-100 h-100" style="background-image: url(img/shop/products/smartphone.jpg)">
             </div>
             <div class="content position-relative p-4">
               <h4 class="text-darker mt-0">Smartphones</h4>
               <p class="text-dark mt-0">Your personal smartphone are just one click away.</p>
               <a href="javascript:;" class="btn btn-contrast">Shop Smartphones</a>
             </div>
           </div>
         </div>
         <div class="col-lg-3 promo-column">
           <div class="rounded promo-block zoom-background"><div class="absolute top right bottom left image-background cover overlay overlay-light alpha-3 w-100 h-100" style="background-image: url(img/shop/products/wifi.jpg)">
             </div>
             <div class="content position-relative p-4">
               <h4 class="text-darker mt-0">Wifi</h4>
               <p class="text-dark mt-0">Exclusive high quality wifi technology to extend your network.</p>
               <a href="javascript:;" class="btn btn-contrast">Shop Wifi
               </a>
             </div>
           </div>
           <div class="rounded promo-block zoom-background mt-4">
             <div class="absolute top right bottom left image-background cover overlay overlay-dark alpha-1 w-100 h-100" style="background-image: url(img/shop/products/headphones-yellow-bg.jpg)"></div>
             <div class="content position-relative p-4">
                  <h4 class="text-contrast mt-0">Headphones</h4>
                  <p class="text-light mt-0">Enjoy your favorite playlist with an amazing sound quality.</p>
                  <a href="javascript:;" class="btn btn-contrast">Shop Headphones</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        </section>
        <!-- Banners -->
        <section class="container pb-4 mb-md-3">
          <div class="row gap-y">
            <div class="col-md-8">
              <div class="banner banner-right-image bg-gray-light-gradient rounded">
                <div class="shapes">
                  <div class="shape shape-circle">
                    <div data-aos="fade-left"></div>
                  </div>
                </div>
                <div class="bring-to-front d-flex align-items-center">
                  <div class="py-4 py-md-5 px-4 text-center text-sm-left">
                    <h4 class="light mb-2">Hurry up! Limited time offer</h4>
                    <h3 class="mb-4">Pro Graphic Tablets</h3>
                    <a class="btn btn-primary" href="#">Shop Now</a>
                  </div>
                  <img class="d-block ml-auto img-responsive" src="img/shop/products/tablet-with-pen.png" alt="">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="banner banner-shapes bg-gray-light-gradient rounded h-100">
                <div class="shapes">
                  <div class="shape shape-ring shape-ring-1 top left"></div>
                  <div class="shape shape-ring shape-ring-2 bottom right"></div>
                  <div class="shape shape-ring shape-ring-3 bottom right"></div>
                  <div class="shape shape-circle">
                    <div></div>
                  </div>
                </div>
                <div class="bring-to-front d-flex flex-column justify-content-center">
                  <div class="py-4 py-md-5 px-4 text-center">
                    <h5 class="mb-2">Get up to 50% Off Today</h5>
                    <p class="text-muted">On branded gadgets</p>
                    <a class="btn btn-primary" href="#">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Brands -->
        <section class="brands">
          <div class="container">
            <div class="section-heading">
              <span class="text-primary bold">Brands</span>
              <h3>We work with</h3>
            </div>
            <div class="row gap-y">
              <div class="col-6 col-sm-4 col-md-3">
                <div class="card border-0 shadow-sm shadow-hover lift-hover">
                  <div class="card-body py-4">
                    <a href="#">
                      <img class="d-block mx-auto" style="max-height: 64px;" src="img/shop/brands/1.svg" alt="">
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3">
                <div class="card border-0 shadow-sm shadow-hover lift-hover">
                  <div class="card-body py-4">
                    <a href="#">
                      <img class="d-block mx-auto" style="max-height: 64px;" src="img/shop/brands/2.svg" alt="">
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3">
                <div class="card border-0 shadow-sm shadow-hover lift-hover">
                  <div class="card-body py-4">
                    <a href="#">
                      <img class="d-block mx-auto" style="max-height: 64px;" src="img/shop/brands/3.svg" alt="">
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3">
                <div class="card border-0 shadow-sm shadow-hover lift-hover">
                  <div class="card-body py-4">
                    <a href="#"><img class="d-block mx-auto" style="max-height: 64px;" src="img/shop/brands/4.svg" alt="">
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3">
                <div class="card border-0 shadow-sm shadow-hover lift-hover">
                  <div class="card-body py-4">
                    <a href="#">
                      <img class="d-block mx-auto" style="max-height: 64px;" src="img/shop/brands/5.svg" alt="">
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3">
                <div class="card border-0 shadow-sm shadow-hover lift-hover">
                  <div class="card-body py-4">
                    <a href="#">
                      <img class="d-block mx-auto" style="max-height: 64px;" src="img/shop/brands/6.svg" alt="">
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-md-3">
                <div class="card border-0 shadow-sm shadow-hover lift-hover"><div class="card-body py-4"><a href="#">
                  <img class="d-block mx-auto" style="max-height: 64px;" src="img/shop/brands/7.svg" alt="">
                </a>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-4 col-md-3">
            <div class="card border-0 shadow-sm shadow-hover lift-hover">
              <div class="card-body py-4">
                <a href="#">
                  <img class="d-block mx-auto" style="max-height: 64px;" src="img/shop/brands/8.svg" alt="">
                </a>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-4 col-md-3">
            <div class="card border-0 shadow-sm shadow-hover lift-hover">
              <div class="card-body py-4">
                <a href="#">
                  <img class="d-block mx-auto" style="max-height: 64px;" src="img/shop/brands/9.svg" alt="">
                </a>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-4 col-md-3">
            <div class="card border-0 shadow-sm shadow-hover lift-hover">
              <div class="card-body py-4">
              <a href="#">
                <img class="d-block mx-auto" style="max-height: 64px;" src="img/shop/brands/10.svg" alt="">
              </a>
            </div>
          </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
          <div class="card border-0 shadow-sm shadow-hover lift-hover">
            <div class="card-body py-4">
              <a href="#">
                <img class="d-block mx-auto" style="max-height: 64px;" src="img/shop/brands/11.svg" alt="">
              </a>
            </div>
          </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
          <div class="card border-0 shadow-sm shadow-hover lift-hover">
            <div class="card-body py-4">
              <a href="#">
                <img class="d-block mx-auto" style="max-height: 64px;" src="img/shop/brands/12.svg" alt="">
              </a>
            </div>
          </div>
        </div>
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
  export default {}
</script>

<style media="screen">

</style>
