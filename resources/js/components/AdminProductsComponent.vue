<template>
  <div>
    <!-- Sidebar Template Nav -->
    <AdminSideNav></AdminSideNav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
      </div>
      <div class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
          <div class="row">
            <ul class="nav nav-tabs">
              <li class="nav-item"><a href="#createProduct" data-toggle="tab" class="nav-link active">Create Products</a></li>
              <li class="nav-item"><a href="#manageProduct" data-toggle="tab" class="nav-link">Manage Products</a></li>
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
          <div class="tab-content" id="tabContent">
            <!-- Categories Notifications.... -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12" v-if="isSuccess">
              <div class="alert alert-success alert-thin" role="alert">Product Created Successfully!</div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12" v-if="isLoading">
              <div class="alert alert-warning alert-thin" role="alert">Loading.... Please Wait!</div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12" v-if="isError">
              <div class="alert alert-danger alert-thin" role="alert">Could Not Create The Product!</div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12" v-if="isDeleted">
              <div class="alert alert-success alert-thin" role="alert">Product Deleted Successfully!</div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12" v-if="isNotDeleted">
              <div class="alert alert-danger alert-thin" role="alert">Could Not Delete The Product!</div>
            </div>
            <!-- Categories Notifications.... -->
            <div class="tab-pane fade show active" id="createProduct">
              <div class="card">
                <div class="card-body">
                  <form action="" method="post" id="createProductForm" @submit.prevent="createProduct()">
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6 mt-2 mb-2">
                        <label for="">Product Name</label>
                        <input type="text"v-model="product.name" name="name" required placeholder="Product Name" class="form-control">
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6 mt-2 mb-2">
                        <label for="">Product Quantity</label>
                        <input type="number" v-model="product.quantity" name="quantity" required placeholder="Product Quantity" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6 mt-2 mb-2">
                        <label for="">Product Category</label>
                        <select id="" v-model="product.category" name="category_id" required class="form-control">
                          <option value="">Choose an option</option>
                          <template v-if="categories.length > 0">
                            <option v-for="cat in categories" :value="cat.id">{{ cat.name }}</option>
                          </template>
                        </select>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6 mt-2 mb-2">
                        <label for="">Delivery Time</label>
                        <input type="text" v-model="product.delivery_time" name="delivery_time" required id="" placeholder="Delivery Time" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6 mt-2 mb-2">
                        <label for="">Product Amount</label>
                        <input type="number" v-model="product.amount" name="amount" required id="" placeholder="Product Amount" class="form-control">
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6 mt-2 mb-2">
                        <label for="">Product Banner</label>
                        <input type="file" name="banner" required id="" placeholder="Product Banner" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-2 mb-2">
                        <label for="">Product Description</label>
                        <ckeditor required v-model="product.description" placeholder="Enter A Description..." :config="editorConfig"></ckeditor>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 mt-2 col-md-12 col-xl-12 col-lg-12">
                      <button class="btn btn-md btn-success" type="submit">Create Product</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="tab-pane show fade" id="manageProduct">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Product Name</th>
                      <th>Amount</th>
                      <th>Delivery Time</th>
                      <th>Quantity</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody v-if="products.length > 0">
                    <tr v-for="(prod, index) in products" :key="prod.id">
                      <td>{{ index + 1 }}</td>
                      <td>{{ prod.name }}</td>
                      <td>₦{{ Intl.NumberFormat().format(prod.amount) }}</td>
                      <td>{{ prod.delivery_time }}</td>
                      <td>{{ Intl.NumberFormat().format(prod.quantity) }}</td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#update-product" data-toggle="modal" @click.prevent="openProduct(prod)">Update</a>
                            <a class="dropdown-item" href="javascript:void(0)" @click.prevent="deleteProduct(prod.id)">Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="update-product" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                <!-- Categories Notifications.... -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12" v-if="isUpdated">
                  <div class="alert alert-success alert-thin" role="alert">Product Updated Successfully!</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12" v-if="isLoadingUpdated">
                  <div class="alert alert-warning alert-thin" role="alert">Loading.... Please Wait!</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12" v-if="isNotUpdated">
                  <div class="alert alert-danger alert-thin" role="alert">Could Not Update The Product!</div>
                </div>
                <!-- Categories Notifications.... -->
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                <form action="" method="post" id="updateProductForm" @submit.prevent="saveUpdatedProduct()">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6 mt-2 mb-2">
                      <label for="">Product Name</label>
                      <input type="text"v-model="updateProduct.name" name="name" required placeholder="Product Name" class="form-control">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6 mt-2 mb-2">
                      <label for="">Product Quantity</label>
                      <input type="number" v-model="updateProduct.quantity" name="quantity" required placeholder="Product Quantity" class="form-control">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6 mt-2 mb-2">
                      <label for="">Product Category</label>
                      <select id="" v-model="updateProduct.category" name="category_id" required class="form-control">
                        <option value="">Choose an option</option>
                        <template v-if="categories.length > 0">
                          <option v-for="cat in categories" :value="cat.id">{{ cat.name }}</option>
                        </template>
                      </select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6 mt-2 mb-2">
                      <label for="">Delivery Time</label>
                      <input type="text" v-model="updateProduct.delivery_time" name="delivery_time" required id="" placeholder="Delivery Time" class="form-control">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6 mt-2 mb-2">
                      <label for="">Product Amount</label>
                      <input type="number" v-model="updateProduct.amount" name="amount" required id="" placeholder="Product Amount" class="form-control">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6 mt-2 mb-2">
                      <label for="">Product Banner</label>
                      <input type="file" name="banner" required id="" placeholder="Product Banner" class="form-control">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-2 mb-2">
                      <label for="">Product Description</label>
                      <ckeditor required v-model="updateProduct.description" placeholder="Enter A Description..." :config="editorConfig"></ckeditor>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 mt-2 col-md-12 col-xl-12 col-lg-12">
                    <button class="btn btn-md btn-success" type="submit">Update Product</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script type="text/javascript">
  import AdminSideNav from '../includes/AdminSidebar';
  import LocalStore from '../store/local';
  import axios from 'axios';

  export default {
    data() {
      return {
        product: {
          description: '',
          name: '',
          quantity: '',
          delivery_time: '',
          category: '',
          amount: '',
          description: ''
        },
        updateProduct: {
          id: '',
          name: '',
          amount: '',
          category: '',
          quantity: '',
          description: '',
          delivery_time: '',
        },
        products: [],
        editorConfig: {},
        adminToken: '',
        isDeleted: false,
        isNotDeleted: false,
        isSuccess: false,
        isError: false,
        isLoading: false,
        isUpdated: false,
        isLoadingUpdated: false,
        isNotUpdated: false,
        categories: []
      }
    },
    components: {
      AdminSideNav
    },
    async mounted() {
      setTimeout(async () => {
        // Time Needed For Vuejs To Fetch From The Store...
        await this.fetchCategories();
        await this.fetchProducts();
      }, 3000);
    },
    async created() {
      const __this = this;
      LocalStore.admin().get('adminCredentials').then((doc) => {
        console.log(doc);
        __this.adminToken = doc.token;
      }).catch((e) => {/*....*/})
    },
    methods: {
      async fetchCategories() {
        await axios.get(this.$baseUrl + 'admin/fetch/categories', {
          headers: {
            Accept: 'application/json',
            Authorization: 'Bearer ' + this.adminToken,
            'Content-Type': 'application/json',
            'Cache-Control': 'no-cache'
          }
        }).then((docs) => {
          if (docs.status == 200) {
            this.categories = docs.data.data;
          }
        }).catch((e) => { this.categories = [] });
      },
      async createProduct() {
        const fData = new FormData(document.getElementById('createProductForm'));
        fData.append('description', this.product.description);

        // Show Some Notification....
        this.isLoading = true;

        await axios.post(this.$baseUrl + 'admin/create/product', fData, {
          headers: {
            Accept: 'multipart/form-data',
            Authorization: 'Bearer ' + this.adminToken,
            'Content-Type': 'multipart/form-data',
            'Cache-Control': 'no-cache'
          }
        }).then((doc) => {
          if (doc.status == 201) {
            // Show Some Notification....
            this.isLoading = false;
            this.isSuccess = true;
            this.isError = false;

            // Push The Product....
            this.products.push(doc.data.data);

            // Clear The Product Field...
            this.product.name = '';
            this.product.quantity = '';
            this.product.delivery_time = '';
            this.product.category = '';
            this.product.amount = '';
            this.product.description = '';

            // clear the timeout...
            setTimeout(() => {
              this.isLoading = false;
              this.isSuccess = false;
              this.isError = false;
            }, 3000);
          }
        }).catch((e) => {
          console.log(e);
          // Show Some Notification....
          this.isError = true;
          this.isSuccess = false;
          this.isLoading = false;

          // clear the timeout...
          setTimeout(() => {
            this.isLoading = false;
            this.isSuccess = false;
            this.isError = false;
          }, 3000);
        });
      },
      async saveUpdatedProduct() {
        const fData = new FormData(document.getElementById('updateProductForm'));
        fData.append('description', this.updateProduct.description);

        // Show Some Notification....
        this.isLoadingUpdated = true;

        await axios.post(this.$baseUrl + 'admin/update/product/' + this.updateProduct.id, fData, {
          headers: {
            Accept: 'multipart/form-data',
            Authorization: 'Bearer ' + this.adminToken,
            'Content-Type': 'multipart/form-data',
            'Cache-Control': 'no-cache'
          }
        }).then(async (doc) => {
          if (doc.status == 200) {
            // Show Some Notification....
            this.isUpdated = true;
            this.isNotUpdated = false;
            this.isLoadingUpdated = false;

            // Update The Products....
            await this.fetchProducts();

            // Close Modal Popup...
            $('#update-product').modal('hide');

            // Clear The Product Field...
            this.updateProduct.name = '';
            this.updateProduct.quantity = '';
            this.updateProduct.delivery_time = '';
            this.updateProduct.category = '';
            this.updateProduct.amount = '';
            this.updateProduct.description = '';

            // clear the timeout...
            setTimeout(() => {
              this.isUpdated = true;
              this.isNotUpdated = false;
              this.isLoadingUpdated = false;
            }, 3000);
          }
        }).catch((e) => {
          // Show Some Notification....
          this.isUpdated = false;
          this.isNotUpdated = true;
          this.isLoadingUpdated = false;

          // Close Modal Popup...
          $('#update-product').modal('hide');

          // clear the timeout...
          setTimeout(() => {
            this.isUpdated = false;
            this.isNotUpdated = true;
            this.isLoadingUpdated = false;
          }, 3000);
        });
      },
      async fetchProducts() {
        await axios.get(this.$baseUrl + 'admin/fetch/products', {
          headers: {
            Accept: 'multipart/form-data',
            Authorization: 'Bearer ' + this.adminToken,
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
      async deleteProduct(id) {
        await axios.delete(this.$baseUrl + 'admin/delete/product/' + id, {
          headers: {
            Accept: 'multipart/form-data',
            Authorization: 'Bearer ' + this.adminToken,
            'Content-Type': 'multipart/form-data',
            'Cache-Control': 'no-cache'
          }
        }).then((doc) => {
          if (doc.status == 200) {
            this.isDeleted = true;

            // Update The products record....
            this.products = this.products.filter((el) => {
              if (el.id != id) return true;
            });

            // clear the notification....
            setTimeout(() => {
              this.isDeleted = false;
              this.isNotDeleted = false;
            }, 3000);
          }
        }).catch((e) => {
          // clear the notification....
          this.isNotDeleted = true;

          setTimeout(() => {
            this.isDeleted = false;
          }, 3000);
        });
      },
      openProduct(prod) {
        this.updateProduct.id = prod.id;
        this.updateProduct.name = prod.name;
        this.updateProduct.quantity = prod.quantity;
        this.updateProduct.delivery_time = prod.delivery_time;
        this.updateProduct.category = prod.category_id;
        this.updateProduct.amount = prod.amount;
        this.updateProduct.description = prod.description;
      }
    }
  }
</script>

<style scoped>

</style>
