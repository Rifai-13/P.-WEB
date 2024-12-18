<script>
import AppFooter from "../components/AppFooter.vue";
import AppNavbar from "../components/AppNavbar.vue";
import Api from "../api/index.js";

export default {
  name: "Products",
  components: {
    AppFooter,
    AppNavbar,
  },
  data() {
    return {
      products: [], // Data produk
      categories: [], // Data kategori
    };
  },
  mounted() {
    this.fetchCategories();
    this.fetchProducts();
  },
  methods: {
    // Fungsi untuk mengambil data produk dari API
    async fetchProducts() {
      try {
        const response = await Api.get("/api/products"); // Endpoint API untuk produk
        console.log(response.data); // Debug respons API
        this.products = response.data; // Simpan data produk
      } catch (error) {
        console.error("Error fetching products:", error);
      }
    },
    
    // Fungsi untuk mengambil data kategori dari API
    async fetchCategories() {
      try {
        const response = await Api.get("/api/categoris"); // Endpoint API untuk kategori
        this.categories = response.data; // Simpan data kategori
      } catch (error) {
        console.error("Error fetching categories:", error);
      }
    },
    
    // Fungsi untuk mendapatkan nama kategori berdasarkan categori_id
    getCategoryName(categoriId) {
      const category = this.categories.find(c => c.id === categoriId);
      return category ? category.jenis : "Unknown Category"; // Menampilkan nama kategori
    },
  },
};
</script>

<template>
  <div>
    <AppNavbar />

    <main>
      <div class="container1">
        <div class="content">
          <div class="content1">
            <img src="../assets/image/poster1.jpg" alt="Poster 1" />
            <div class="text">
              <h1>Famous Muiches</h1>
              <button>Shop Now</button>
            </div>
          </div>
          <div class="content2">
            <img src="../assets/image/poster2.jpg" alt="Poster 2" />
            <div class="text">
              <h1>Special Muiches</h1>
              <button>Shop Now</button>
            </div>
          </div>
        </div>
      </div>

      <div class="bar-pro">
        <h2>Product</h2>
        <h2>Filter <i class="mage--filter"></i></h2>
      </div>

      <div class="cards">
        <div class="card" v-for="product in products" :key="product.id">
          <img :src="product.image" :alt="product.name" />
          <p>{{ product.name }}</p>
          <br />
          <!-- Menampilkan nama kategori berdasarkan categori_id -->
          <p id="jenis">{{ getCategoryName(product.categori_id) }}</p>
          <br />
          <p id="price">Rp {{ product.price.toLocaleString() }}</p>
        </div>
      </div>
    </main>

    <AppFooter />
  </div>
</template>
