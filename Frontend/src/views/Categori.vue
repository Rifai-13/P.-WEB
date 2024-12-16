<script>
import AppFooter from "../components/AppFooter.vue";
import AppNavbar from "../components/AppNavbar.vue";
import Api from "../api/index.js";

export default {
  name: "Categori",
  components: {
    AppNavbar,
    AppFooter,
  },

  data() {
    return {
      categoris: [], // Data kategori
      products: [], // Data produk
    };
  },

  mounted() {
    this.fetchCategoris();
    this.fetchProducts(); // Mengambil data produk saat mounted
  },

  methods: {
    async fetchCategoris() {
      try {
        // Gunakan Api.get untuk mengambil data kategori
        const response = await Api.get("/api/categoris");
        this.categoris = response.data; // Menyimpan data kategori
        console.log("Categoris loaded:", this.categoris); // Debugging
      } catch (error) {
        console.error("Error fetching categoris:", error);
      }
    },

    async fetchProducts() {
      try {
        // Gunakan Api.get untuk mengambil data produk
        const response = await Api.get("/api/products");
        this.products = response.data; // Menyimpan data produk
        console.log("Products loaded:", this.products); // Debugging
      } catch (error) {
        console.error("Error fetching products:", error);
      }
    },
  },

  computed: {
    groupedProducts() {
      const grouped = this.categoris.map((category) => {
        // Filter produk berdasarkan category_id
        const categoryProducts = this.products.filter(
          (product) => product.categori_id === category.id
        );
        return { category, products: categoryProducts };
      });

      console.log(grouped); // Debugging groupedProducts
      return grouped;
    },
  },

  created() {
    this.fetchCategoris();
    this.fetchProducts(); // Mengambil data kategori dan produk saat created
  },
};
</script>

<template>
  <div>
    <AppNavbar />

    <main>
      <div class="carousel-container">
        <div class="carousel">
          <img src="../assets/image/post1.jpg" alt="" />
          <img src="../assets/image/post2.jpg" alt="" />
          <img src="../assets/image/post3.jpg" alt="" />
          <img src="../assets/image/post4.jpg" alt="" />
          <img src="../assets/image/post5.jpg" alt="" />
          <img src="../assets/image/post6.jpg" alt="" />
        </div>
      </div>

      <div v-for="(group, index) in groupedProducts" :key="index">
        <h2>{{ group.category.jenis }}</h2> <!-- Menampilkan kategori di atas produk -->

        <div class="cards">
          <div class="card" v-for="product in group.products" :key="product.id">
            <img :src="product.image" :alt="product.name" />
            <p>{{ product.name }}</p>
            <br>
            <p id="jenis">{{ group.category.jenis }}</p> <!-- Menampilkan kategori untuk setiap produk -->
            <br>
            <p id="price">Rp {{ product.price.toLocaleString() }}</p>
          </div>
        </div>
      </div>
    </main>

    <AppFooter />
  </div>
</template>
