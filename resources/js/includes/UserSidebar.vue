<template>
  <div>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Desevens</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" @click.prevent="logout()" href="#">Sign out</a>
        </li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <router-link class="nav-link active" :to="{ name: 'UserOrders' }">
                  <span data-feather="home"></span>
                  Orders
                </router-link>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</template>

<script type="text/javascript">
import LocalStore from '../store/local';
import axios from 'axios';

export default {
  mounted() {
    let __this = this;
    LocalStore.customer().get('customer').then(async (doc) => {
      await axios.get(this.$baseUrl + '/v1/user', {
        headers: {
          Authorization: 'Bearer ' + doc.accessToken
        }
      }).then((doc) => {/*  */}).catch((e) => {
        __this.$router.push({
          name: 'Welcome'
        });
      });
    }).catch((e) => {
      __this.$router.push({
        name: 'Welcome'
      });
    });
  },
  methods: {
    logout() {
      LocalStore.customer().delete();
      this.$router.push({
        name: 'Welcome'
      });
    }
  }
}
</script>
