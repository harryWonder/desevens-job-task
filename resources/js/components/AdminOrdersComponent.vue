<template>
  <div>
    <!-- Sidebar Template Nav -->
    <AdminSidebar></AdminSidebar>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Orders</h1>
      </div>
      <div class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
          <div class="alert alert-thin alert-danger" v-if="isError">
            Failed To Update The Order Status.
          </div>
          <div class="alert alert-thin alert-success" v-if="isSuccess">
            Order Status Updated successfully.
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>OrderId</th>
                <th>Customer (Phone)</th>
                <th>Amount</th>
                <th>Shipping</th>
                <th>Status</th>
                <th>View</th>
                <th>Approve</th>
              </tr>
            </thead>
            <tbody v-if="orders.length > 0">
              <tr v-for="(order, index) in orders" :key="order.id">
                <td>{{ index + 1 }}</td>
                <td>{{ order.reference }}</td>
                <td>{{ order.customer.phone_number }}</td>
                <td>₦{{ Intl.NumberFormat().format(order.amount) }}</td>
                <td v-if="order.shipping_status"><span class="badge badge-warning">{{ order.shipping_status }}</span></td>
                <td v-if="order.status == 0"><span class="badge badge-warning">Pending</span></td>
                <td v-if="order.status == 1"><span class="badge badge-success">Approved</span></td>
                <td>
                  <a href="#view-order" @click="viewOrder(order.products)" data-toggle="modal" class="btn btn-sm btn-primary">View Order</a>
                </td>
                <td>
                  <a href="javascript:void(0)" v-if="order.status == 0" @click.prevent="approveOrder(order.id, 'approve')" class="btn btn-sm btn-success">Approve Order</a>
                  <a href="javascript:void(0)" v-if="order.status == 1" @click.prevent="approveOrder(order.id, 'disapprove')" class="btn btn-sm btn-success">Approve Order</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="view-order" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Banner</td>
                        <td>Quantity</td>
                        <td>Amount</td>
                      </tr>
                    </thead>
                    <tbody v-if="order.length > 0">
                      <tr v-for="(o, i) in order" :key="o.id">
                        <td>{{ i + 1 }}</td>
                        <td>{{ o.name }}</td>
                        <td>
                          <img :src="o.banner" :alt="o.name" style="width: 40%; border-radius: 4px;">
                        </td>
                        <td>
                          {{ o.cartCount }}
                        </td>
                        <td>
                          ₦{{ Intl.NumberFormat().format(o.amount * parseFloat(o.cartCount)) }}
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script type="text/javascript">
  import AdminSidebar from '../includes/AdminSidebar';
  import LocalStore from '../store/local';
  import axios from 'axios';

  export default {
    data() {
      return {
        isError: false,
        isSuccess: false,
        adminToken: '',
        orders: [],
        order: [],
      }
    },
    components: {
      AdminSidebar
    },
    async mounted() {
      setTimeout(async () => {
        // Time Needed For Vuejs To Fetch From The Store...
        await this.fetchOrders();
      }, 3000);
    },
    created() {
      const __this = this;
      LocalStore.admin().get('adminCredentials').then((doc) => {
        __this.adminToken = doc.token;
      }).catch((e) => {/*....*/})
    },
    methods: {
      async fetchOrders() {
        try {
          let orders = await axios.get(this.$baseUrl + 'admin/orders/', {
            headers: {
              Accept: 'application/json',
              Authorization: 'Bearer ' + this.adminToken,
              'Content-Type': 'application/json',
              'Cache-Control': 'no-cache'
            }
          });

          if (orders.status = 200) {
            this.orders = orders.data.data;
          }
        } catch (e) { this.orders = [] }
      },
      async approveOrder(orderId, type) {
        try {
          let order = await axios.get(this.$baseUrl + 'admin/approve/order/' + orderId + '/' + type, {
            headers: {
              Accept: 'application/json',
              Authorization: 'Bearer ' + this.adminToken,
              'Content-Type': 'application/json',
              'Cache-Control': 'no-cache'
            }
          });

          if (order.status == 200) {
            if (type == 'approve') {
              this.orders = this.orders.map((el) => {
                if (el.id == orderId) {
                  el.status = 1;
                }

                return el;
              });

              this.isError = false;
              this.isSuccess = true;
            } else {
              this.orders = this.orders.map((el) => {
                if (el.id == orderId) {
                  el.status = 0;
                }

                return el;
              });

              this.isError = false;
              this.isSuccess = true;
            }
          }
        } catch (e) {
          this.isError = false;
          this.isSuccess = true;
        }
      },
      viewOrder(products) {
        this.order = JSON.parse(products);
      }
    }
  }
</script>

<style>
.feather {
width: 16px;
height: 16px;
vertical-align: text-bottom;
}

/*
* Sidebar
*/

.sidebar {
position: fixed;
top: 0;
bottom: 0;
left: 0;
z-index: 100; /* Behind the navbar */
padding: 0;
box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
}

.sidebar-sticky {
position: -webkit-sticky;
position: sticky;
top: 48px; /* Height of navbar */
height: calc(100vh - 48px);
padding-top: .5rem;
overflow-x: hidden;
overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

.sidebar .nav-link {
font-weight: 500;
color: #333;
}

.sidebar .nav-link .feather {
margin-right: 4px;
color: #999;
}

.sidebar .nav-link.active {
color: #007bff;
}

.sidebar .nav-link:hover .feather,
.sidebar .nav-link.active .feather {
color: inherit;
}

.sidebar-heading {
font-size: .75rem;
text-transform: uppercase;
}

/*
* Navbar
*/

.navbar-brand {
padding-top: .75rem;
padding-bottom: .75rem;
font-size: 1rem;
background-color: rgba(0, 0, 0, .25);
box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
}

.navbar .form-control {
padding: .75rem 1rem;
border-width: 0;
border-radius: 0;
}

.form-control-dark {
color: #fff;
background-color: rgba(255, 255, 255, .1);
border-color: rgba(255, 255, 255, .1);
}

.form-control-dark:focus {
border-color: transparent;
box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
}

/*
* Utilities
*/

.border-top { border-top: 1px solid #e5e5e5; }
.border-bottom { border-bottom: 1px solid #e5e5e5; }
</style>
