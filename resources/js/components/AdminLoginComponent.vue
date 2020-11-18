<template id="">
  <div class="overflow-hidden">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-md-5 col-lg-4 mx-auto mt-4">
          <div class="login-form mt-5 mt-md-0">
            <router-link :to="{ name: 'Welcome' }"><img src="img/logo.png" class="logo img-responsive mr-4 styled-logo mb-3 mb-md-3" alt="Application Logo"></router-link>
            <h1 class="text-darker bold">Admin Login</h1>
            <p class="text-secondary mt-0 mb-4">Login to your admin account?</p>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mb-2" v-if="hasError">
              <div class="alert alert-danger alert-thin" role="alert">Email Address / Password Mismatch!</div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mb-2" v-if="hasSuccess">
              <div class="alert alert-success alert-thin" role="alert">Login Successful!</div>
            </div>
            <form @submit.prevent="login()" method="post" class="cozy"
                  action=""
                  ><label class="control-label bold small text-uppercase text-secondary">Email</label>
              <div class="form-group has-icon shadow-lg"><input v-model="admin.emailAddress" type="text"
                       id="login_email"
                       name="Login[email]"
                       class="form-control"
                       placeholder="Your admin email"
                       required> <i class="icon fa fa-user"></i></div><label class="control-label bold small text-uppercase text-secondary">Password</label>
              <div class="form-group has-icon shadow-lg"><input v-model="admin.password" type="password"
                       id="login_password"
                       name="Login[password]"
                       class="form-control form-control"
                       placeholder="Your password"
                       required> <i class="icon fa fa-lock"></i></div>
              <div class="form-group d-flex align-items-center justify-content-between">
                <div class="ajax-button">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-paper-plane"></i> Login
                  </button>
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
  import LocalStore from '../store/local';

  export default {
    async mounted() {
      const __this = this;
      LocalStore.admin().get('adminCredentials').then((doc) => {
        __this.$router.push({
          name: 'AdminCategoryView'
        });
      }).catch((e) => {/*....*/});
    },
    data() {
      return {
        admin: {
          emailAddress: '',
          password: ''
        },
        hasError: false,
        hasSuccess: false
      }
    },
    methods: {
      async login() {
        try {
          let loginRequest = await axios.post(this.$baseUrl + 'login/admin', this.admin, {
            headers: {
              Accept: 'application/json',
              'Content-Type': 'application/json',
              'Cache-Control': 'no-cache'
            }
          });

          console.log(loginRequest);
          if (loginRequest.status == 200) {
            // Create The Token And Authenticate The Admin...
            this.hasSuccess = true;
            this.hasError = false;

            const __this = this;
            // Push The Token && Other User Details To The Local Store...
            LocalStore.admin().get('adminCredentials')
            .then((doc) => {
              return LocalStore.admin().put({
                _id: 'adminCredentials',
                token: loginRequest.data.access_token,
                email: loginRequest.data.data.email,
                roles: loginRequest.data.data.roles
              });
            }).then((doc) => {
              console.log(/*...*/);
            }).catch(e => {
              if (e.status == 404) {
                LocalStore.admin().post({
                  _id: 'adminCredentials',
                  token: loginRequest.data.access_token,
                  email: loginRequest.data.data.email,
                  roles: loginRequest.data.data.roles
                });
              }
            });

            this.$router.push({
              name: 'AdminCategoryView'
            });
          }
        } catch (e) {this.hasError = true; }
      }
    }
  }
</script>

<style scoped>

</style>
