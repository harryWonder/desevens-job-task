<template>
  <div>
    <!-- Sidebar Template Nav -->
    <AdminSideNav></AdminSideNav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Category</h1>
      </div>
      <div class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
          <div class="row">
            <ul class="nav nav-tabs">
              <li class="nav-item"><a href="#createCategory" data-toggle="tab" class="nav-link active">Create Category</a></li>
              <li class="nav-item"><a href="#manageCategory" data-toggle="tab" class="nav-link">Manage Categories</a></li>
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
          <div class="tab-content" id="tabContent">
            <!-- Categories Notifications.... -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12" v-if="isSuccess">
              <div class="alert alert-success alert-thin" role="alert">Category Created Successfully!</div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12" v-if="isError">
              <div class="alert alert-danger alert-thin" role="alert">Could Not Create The Category! Verify The Name Does Not Exist.</div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12" v-if="isUpdated">
              <div class="alert alert-success alert-thin" role="alert">Category Updated Successfully!</div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12" v-if="isNotUpdated">
              <div class="alert alert-danger alert-thin" role="alert">Could Not Update The Category!</div>
            </div>
            <!-- Categories Notifications.... -->
            <div class="tab-pane fade show active" id="createCategory">
              <div class="card">
                <div class="card-body">
                  <form action="" @submit.prevent="createCategory()" method="post">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6">
                      <label for="">Category Name</label>
                      <input type="text" v-model="category.name" placeholder="Category Name" class="form-control">
                    </div>
                    <div class="col-xs-12 col-sm-12 mt-2 col-md-12 col-xl-12 col-lg-12">
                      <button class="btn btn-md btn-success" type="submit">Create Category</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="tab-pane show fade" id="manageCategory">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Category Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody v-if="categories.length > 0">
                    <tr v-for="(cat, index) in categories" :key="cat.id">
                      <td>
                        {{ index + 1 }}
                      </td>
                      <td>
                        {{ cat.name }}
                      </td>
                      <td v-if="cat.status == 1"><span class="text-success">Enabled</span></td>
                      <td v-if="cat.status == 0"><span class="text-success">Disabled</span></td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#update-category" data-toggle="modal" @click.prevent="openCategory(cat)">Update</a>
                            <a class="dropdown-item" href="#" v-if="cat.status == 1" @click.prevent="updateCategoryStatus(cat.slug, 'disable')">Disable</a>
                            <a class="dropdown-item" href="#" v-if="cat.status == 0" @click.prevent="updateCategoryStatus(cat.slug, 'enable')">Enable</a>
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
    <div class="modal fade" id="update-category" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                <form action="" @submit.prevent="saveUpdatedCategory()" method="post">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                    <label for="">Category Name</label>
                    <input type="text" v-model="updateCategory.name" placeholder="Category Name" class="form-control">
                  </div>
                  <div class="col-xs-12 col-sm-12 mt-2 col-md-12 col-xl-12 col-lg-12">
                    <button class="btn btn-md btn-success" type="submit">Update Category</button>
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
        category: {
          name: ''
        },
        updateCategory: {
          name: '',
          slug: '',
        },
        adminToken: '',
        isSuccess: false,
        isUpdated: false,
        isNotUpdated: false,
        isError: false,
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
      }, 3000);
    },
    created() {
      const __this = this;
      LocalStore.admin().get('adminCredentials').then((doc) => {
        __this.adminToken = doc.token;
      }).catch((e) => {/*....*/})
    },
    methods: {
      async createCategory() {
        await axios.post(this.$baseUrl + '/admin/create/category', this.category, {
          headers: {
            Accept: 'application/json',
            Authorization: 'Bearer ' + this.adminToken,
            'Content-Type': 'application/json',
            'Cache-Control': 'no-cache'
          }
        }).then((doc) => {
          if (doc.status == 201) {
            this.categories.push(doc.data.data);

            //Notifications... 45700734861
            this.isSuccess = true;
            this.isError = false;

            // clear the timeout...
            setTimeout(() => {
              this.isSuccess = false;
              this.isError = false;
            }, 3000);
          }
        }).catch((e) => {
          // Error Messages...
          this.isSuccess = false;
          this.isError = true;

          // clear the timeout...
          setTimeout(() => {
            this.isSuccess = false;
            this.isError = false;
          }, 3000);
        });
      },
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
      openCategory(cat) {
        this.updateCategory.name = cat.name;
        this.updateCategory.slug = cat.slug;
      },
      async saveUpdatedCategory() {
        await axios.post(this.$baseUrl + 'admin/update/category', this.updateCategory, {
          headers: {
            Accept: 'application/json',
            Authorization: 'Bearer ' + this.adminToken,
            'Content-Type': 'application/json',
            'Cache-Control': 'no-cache'
          }
        }).then((doc) => {
          if (doc.status == 200) {
            this.categories = this.categories.filter((el) => {
              if (el.id == doc.data.data.id) {
                el.name = doc.data.data.name;
                el.slug = doc.data.data.slug;
              }
              return el;
            });

            //Notifications... 45700734861
            this.isUpdated = true;
            this.isNotUpdated = false;

            // Close Modal Popup...
            $('#update-category').modal('hide');

            // clear the timeout...
            setTimeout(() => {
              this.isUpdated = false;
              this.isNotUpdated = false;
            }, 3000);
          }
        }).catch((e) => {
          // Error Messages...
          this.isUpdated = false;
          this.isNotUpdated = true;

            // Close Modal Popup...
          $('#update-category').modal('hide');

          // clear the timeout...
          setTimeout(() => {
            this.isUpdated = false;
            this.isNotUpdated = false;
          }, 3000);
        });
      },
      async updateCategoryStatus(slug, status) {
        await axios.get(this.$baseUrl + `admin/update/category/${slug}/${status}`, {
          headers: {
            Accept: 'application/json',
            Authorization: 'Bearer ' + this.adminToken,
            'Content-Type': 'application/json',
            'Cache-Control': 'no-cache'
          }
        }).then((doc) => {
          if (doc.status == 200) {
            this.categories = this.categories.filter((el) => {
              if (el.id == doc.data.data.id) {
                el.status = doc.data.data.status;
              }
              return el;
            });

            //Notifications... 45700734861
            this.isUpdated = true;
            this.isNotUpdated = false;

            // Close Modal Popup...
            $('#update-category').modal('hide');

            // clear the timeout...
            setTimeout(() => {
              this.isUpdated = false;
              this.isNotUpdated = false;
            }, 3000);
          }
        }).catch((e) => {
          // Error Messages...
          this.isUpdated = false;
          this.isNotUpdated = true;

          // Close Modal Popup...
          $('#update-category').modal('hide');

          // clear the timeout...
          setTimeout(() => {
            this.isUpdated = false;
            this.isNotUpdated = false;
          }, 3000);
        });
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
