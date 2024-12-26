<!-- AdminDashboard.vue -->
<script>
import AppNavbar from "../components/AppNavbar.vue";
import Api from "../api/index.js"; // Pastikan Anda memiliki konfigurasi API di file ini
import Categori from "./Categori.vue";

export default {
  name: "AdminDashboard",
  components: {
    AppNavbar,
  },
  data() {
    return {
      products: [],
      categoris: [],
    };
  },
  methods: {
    async fetchProducts() {
      try {
        const response = await Api.get("/api/products");
        this.products = response.data;
      } catch (error) {
        console.error("Error fetching products:", error.message);
      }
    },

    async fetchCategoris() {
      try {
        const response = await Api.get("/api/categoris");
        this.categoris = response.data;
      } catch (error) {
        console.error("Error fetching products:", error.message);
      }
    },
    
  },


  computed: {

    productCount() {
      return this.products.length;
    },
    categorisCount() {
      return this.categoris.length;
    }
  },
  mounted() {
    this.fetchProducts();
    this.fetchCategoris();
  },
};
</script>


<template>
  <div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r shadow-lg">
      <div class="p-6 text-center border-b">
        <h2 class="text-2xl font-bold text-gray-800">Admin Panel</h2>
      </div>
      <nav class="mt-6">
        <ul>
          <li
            class="px-4 py-3 text-gray-600 hover:bg-gray-200 hover:text-gray-800 cursor-pointer flex items-center"
          >
            <i class="fas fa-home mr-2"></i>
            <span>Dashboard</span>
          </li>
          <li
            class="px-4 py-3 text-gray-600 hover:bg-gray-200 hover:text-gray-800 cursor-pointer flex items-center"
          >
            <router-link to="/productcrud" class="flex items-center">
              <i class="fas fa-boxes mr-2"></i>
              <span>Product</span>
            </router-link>
          </li>
          <li
            class="px-4 py-3 text-gray-600 hover:bg-gray-200 hover:text-gray-800 cursor-pointer flex items-center"
          >
          <router-link to="/categoricrud" class="flex items-center">
            <i class="fas fa-cog mr-2"></i>
            <span>Categori</span>
          </router-link>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <header
        class="w-full bg-white shadow-md flex items-center justify-between px-6 py-4"
      >
        <h1 class="text-xl font-semibold text-gray-800">Dashboard</h1>
        <div class="flex items-center space-x-4">
          <div>
            <input
              type="text"
              placeholder="Search..."
              class="border rounded-lg px-3 py-2 text-sm focus:outline-none"
            />
          </div>
          <div class="w-8 h-8 bg-gray-200 rounded-full overflow-hidden">
            <img
              src="https://i.pravatar.cc/150?img=3"
              alt="Avatar"
              class="object-cover"
            />
          </div>
        </div>
      </header>

      <!-- Main Content Area -->
      <main class="flex-1 bg-gray-50 p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <!-- Card 1 -->
          <div
            class="p-6 bg-white rounded-lg shadow-lg flex items-center justify-between"
          >
            <div>
              <h3 class="text-lg font-semibold text-gray-700">Products</h3>
              <p class="text-2xl font-bold mt-2">{{ productCount }}</p>
            </div>
            <i class="fas fa-boxes text-blue-500 text-4xl"></i>
          </div>

          <!-- Card 2 -->
          <div
            class="p-6 bg-white rounded-lg shadow-lg flex items-center justify-between"
          >
            <div>
              <h3 class="text-lg font-semibold text-gray-700">Revenue</h3>
              <p class="text-2xl font-bold mt-2">$12,340</p>
            </div>
            <i class="fas fa-dollar-sign text-green-500 text-4xl"></i>
          </div>

          <!-- Card 3 -->
          <div
            class="p-6 bg-white rounded-lg shadow-lg flex items-center justify-between"
          >
            <div>
              <h3 class="text-lg font-semibold text-gray-700">Categoris</h3>
              <p class="text-2xl font-bold mt-2">{{ categorisCount }}</p>
            </div>
            <i class="fas fa-tags text-yellow-500 text-4xl"></i>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>
