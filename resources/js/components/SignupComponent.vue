<template>
  <div>
    <div class="container-fluid">
      <div class="row align-items-center">
            <div class="col-md-6 col-lg-7 fullscreen-md d-flex justify-content-center align-items-center overlay gradient gradient-purple-navy alpha-7 image-background cover" style="background-image:url(https://picsum.photos/1920/1200/?random&gravity=south)">
                <div class="content">
                    <h2 class="display-4 display-md-3 text-contrast mt-4 mt-md-0">Welcome to <span class="bold d-block">Desevens</span></h2>
                    <p class="lead text-contrast">Create An Account</p>
                </div>
            </div>
            <div class="col-md-5 col-lg-4 ml-2">
                <div class="login-form mt-md-0">
                    <h1 class="text-darker bold">Signup</h1>
                    <p class="text-secondary mt-0 mb-0 mb-md-6">Create An Account or <a href="register.html" class="text-primary bold">Login</a></p>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mb-3" v-if="isSuccess">
                      <small class="alert alert-success alert-thin" role="alert">Account Created Successfully!</small>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mb-3" v-if="isLoading">
                      <small class="alert alert-warning alert-thin" role="alert">Loading... Please Wait!</small>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mb-3" v-if="isError">
                      <small class="alert alert-danger alert-thin" role="alert">Verify The Email/Phone Number Does Not Exist.</small>
                    </div>
                    <form class="cozy" style="margin-top: -2%;" method="post" @submit.prevent="createAccount" novalidate>
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6">
                          <label class="control-label bold small text-uppercase text-secondary">Firstname</label>
                            <div class="form-group has-icon">
                              <input type="text" name="firstname" v-model="user.firstName" class="form-control form-control-rounded" placeholder="Your First Name" required>
                              <i class="icon fas fa-user"></i>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6">
                          <label class="control-label bold small text-uppercase text-secondary">Last Name</label>
                          <div class="form-group has-icon">
                            <input type="text" name="lastname" v-model="user.lastName" class="form-control form-control-rounded" placeholder="Your Last Name" required>
                            <i class="icon fas fa-user"></i>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6">
                          <label class="control-label bold small text-uppercase text-secondary">Email Address</label>
                          <div class="form-group has-icon">
                            <input type="email" name="emailAddress" v-model="user.emailAddress" class="form-control form-control-rounded" placeholder="Your Email Address" required>
                            <i class="icon fas fa-envelope"></i>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6">
                          <label class="control-label bold small text-uppercase text-secondary">Phone Number</label>
                          <div class="form-group has-icon">
                            <input type="tel" name="phoneNumber" v-model="user.phoneNumber" class="form-control form-control-rounded" placeholder="Your Phone Number" required>
                            <i class="icon fas fa-telephone"></i>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                          <label class="control-label bold small text-uppercase text-secondary">Password</label>
                          <div class="form-group has-icon">
                            <input type="password" v-model="user.password" name="password" class="form-control form-control-rounded" placeholder="Your Password" required>
                            <i class="icon fas fa-lock"></i>
                          </div>
                        </div>
                      </div>
                        <div class="form-group d-flex align-items-center justify-content-between">
                          <a href="forgot.html" class="text-warning small" v-if="isSuccess">Resend Token</a>
                        <div class="ajax-button">
                          <button type="submit" class="btn btn-primary btn-rounded">Create Account
                          <i class="fas fa-long-arrow-alt-right ml-2"></i></button>
                        </div>
                      </div>
                    </form>
            </div>
        </div>
    </div>
   </div>
  </div>
</template>

<script type="text/javascript">
  import axios from 'axios';

  export default {
    data() {
      return {
        user: {
          firstName: '',
          lastName: '',
          emailAddress: '',
          phoneNumber: '',
          password: ''
        },
        isSuccess: false,
        isLoading: false,
        isError: false
      }
    },
    mounted() {
      const __this = this;
      LocalStore.customer().get('customer').then((doc) => {
        __this.$router.push({
          name: 'UserOrders'
        });
      }).catch((e) => {/*....*/});
    },
    methods: {
      async createAccount() {
        try {
          this.isError = false;
          this.isLoading = true;
          let createAccount = await axios.post(this.$baseUrl + 'create/customer', this.user, {
            headers: {
              Accept: 'application/json',
              'Content-Type': 'application/json',
              'Cache-Control': 'no-cache'
            }
          });

          this.isError = false;
          this.isLoading = false;
          if (createAccount.status == 201) {
            // Clear The Form Fields && Show A Message...
            this.user.firstName = '';
            this.user.lastName = '';
            this.user.emailAddress = '';
            this.user.phoneNumber = '';
            this.user.password = '';

            this.isSuccess = true;
          }
        } catch (e) {
          this.isLoading = false;
          this.isError = true;
        }
      }
    }
  }
</script>

<style scoped>

</style>
