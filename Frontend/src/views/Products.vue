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
      products: [],
    };
  },
  mounted() {
    this.fetchProducts();
  },
  methods: {
    async fetchProducts() {
      try {
        const response = await Api.get("/api/products"); // Endpoint API
        console.log(response.data); // Debug respons API
        this.products = response.data; // Simpan data produk
      } catch (error) {
        console.error("Error fetching products:", error);
      }
    },
  },

  created() {
    this.fetchProducts();
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
        <p id="jenis">
          {{ product.categori_id === 1 ? "Women's Shoes" : "Men's Shoes" }}
        </p>
        <br />
        <p id="price">Rp {{ product.price.toLocaleString() }}</p>
      </div>
      <!-- <div class="card">
        <img src="../assets/image/nikejam.png" alt="nikeJam" />
        <p>Nike Jam</p>
        <br />
        <p id="jenis">Women's Shoes</p>
        <br />
        <p id="price">Rp 1,909,000</p>
      </div>
      <div class="card">
        <img src="../assets/image/airjordan.png" alt="nikeJam" />
        <p>Air Jordan 1</p>
        <br />
        <p id="jenis">Men's Shoes</p>
        <br />
        <p id="price">Rp 1,939,000</p>
      </div>
      <div class="card">
        <img src="../assets/image/nikecortez.png" alt="nikeJam" />
        <p>Cortez</p>
        <br />
        <p id="jenis">Men's Shoes</p>
        <br />
        <p id="price">Rp 1,299,000</p>
      </div>
      <div class="card">
        <img src="../assets/image/airforce.png" alt="nikeJam" />
        <p>Nike Air Force</p>
        <br />
        <p id="jenis">Women's Shoes</p>
        <br />
        <p id="price">Rp 1,909,000</p>
      </div>
      <div class="card">
        <img src="../assets/image/killshot.png" alt="nikeJam" />
        <p>Nike Killshot 2</p>
        <br />
        <p id="jenis">Men's Shoes</p>
        <br />
        <p id="price">Rp 1,499,000</p>
      </div>
      <div class="card">
        <img src="../assets/image/pegasus41.png" alt="nikeJam" />
        <p>Nike Pegasus 41</p>
        <br />
        <p id="jenis">Men's Road Runnig Shoes</p>
        <br />
        <p id="price">Rp 2,199,000</p>
      </div>
      <div class="card">
        <img src="../assets/image/dunk.png" alt="nikeJam" />
        <p>Nike Dunk Low Retro</p>
        <br />
        <p id="jenis">Men's Shoes</p>
        <br />
        <p id="price">Rp 1,909,000</p>
      </div>
      <div class="card">
        <img src="../assets/image/v2krun.png" alt="nikeJam" />
        <p>Nike V2K Run</p>
        <br />
        <p id="jenis">Women's Shoes</p>
        <br />
        <p id="price">Rp 1,909,00</p>
      </div> -->
    </div>
  </main>

  <AppFooter />
  </div>
</template>
