<template>
  <div
    class="min-h-screen bg-gray-100 py-8 px-6 flex justify-center overflow-auto"
  >
    <div
      class="bg-white shadow-xl rounded-lg w-full max-w-5xl p-6 overflow-hidden"
    >
      <h1 class="text-4xl font-semibold text-center text-gray-700 mb-10">
        Product CRUD
      </h1>

      <!-- Form untuk Tambah Produk -->
      <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-6">
          Add New Product
        </h2>
        <form @submit.prevent="createProduct" class="space-y-6">
          <div>
            <label class="block text-gray-600">Name</label>
            <input
              v-model="form.name"
              type="text"
              class="w-full p-3 border border-gray-300 rounded-md"
              required
            />
          </div>

          <div>
            <label class="block text-gray-600">Price</label>
            <input
              v-model="form.price"
              type="text"
              inputmode="numeric"
              class="w-full p-3 border border-gray-300 rounded-md"
              required
            />
          </div>

          <div>
            <label class="block text-gray-600">Image</label>
            <input
              @change="onFileChange"
              type="file"
              class="w-full p-3 border border-gray-300 rounded-md"
              accept="image/*"
              required
            />
          </div>

          <div>
            <label class="block text-gray-600">Category ID</label>
            <input
              v-model="form.categori_id"
              type="text"
              inputmode="numeric"
              class="w-full p-3 border border-gray-300 rounded-md"
              required
            />
          </div>

          <button
            type="submit"
            class="w-full py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-300"
          >
            Add Product
          </button>
        </form>

        <!-- Preview Image yang Dipilih -->
        <div v-if="form.image" class="mt-6 text-center">
          <p class="text-gray-600">Image Preview:</p>
          <img
            :src="imagePreview"
            alt="Image Preview"
            class="w-32 h-32 object-cover rounded-lg mt-3 shadow-md"
          />
        </div>
      </div>

      <!-- Tabel untuk Menampilkan Daftar Produk -->
      <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold text-gray-700 mb-6">Product List</h2>
        <div class="overflow-x-auto">
          <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
              <tr>
                <th class="py-3 px-4 text-sm font-semibold text-gray-600">
                  ID
                </th>
                <th class="py-3 px-4 text-sm font-semibold text-gray-600">
                  Name
                </th>
                <th class="py-3 px-4 text-sm font-semibold text-gray-600">
                  Price
                </th>
                <th class="py-3 px-4 text-sm font-semibold text-gray-600">
                  Image
                </th>
                <th class="py-3 px-4 text-sm font-semibold text-gray-600">
                  Actions
                </th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="product in products"
                :key="product.id"
                class="border-t"
              >
                <td class="py-4 px-4 text-sm text-gray-700">
                  {{ product.id }}
                </td>
                <td class="py-4 px-4 text-sm text-gray-700">
                  {{ product.name }}
                </td>
                <td class="py-4 px-4 text-sm text-gray-700">
                  {{ product.price }}
                </td>
                <td class="py-4 px-4 text-sm">
                  <img
                    :src="product.image"
                    alt="Product Image"
                    class="w-16 h-16 object-cover rounded-lg"
                  />
                </td>
                <td class="py-4 px-4 text-sm text-center space-x-2">
                  <button
                    @click="openEditForm(product)"
                    class="py-2 px-4 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition duration-300"
                  >
                    Edit
                  </button>
                  <button
                    @click="deleteProduct(product.id)"
                    class="py-2 px-4 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-300"
                  >
                    Delete
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Form untuk Edit Produk -->
      <div
        v-if="editFormVisible"
        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50"
      >
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
          <h2 class="text-xl font-semibold text-gray-700 mb-6">Edit Product</h2>
          <form @submit.prevent="updateProduct" class="space-y-6">
            <div>
              <label class="block text-gray-600">Name</label>
              <input
                v-model="editForm.name"
                type="text"
                class="w-full p-3 border border-gray-300 rounded-md"
                required
              />
            </div>

            <div>
              <label class="block text-gray-600">Price</label>
              <input
                v-model="editForm.price"
                type="text"
                inputmode="numeric"
                class="w-full p-3 border border-gray-300 rounded-md"
                required
              />
            </div>

            <div>
              <label class="block text-gray-600">Image</label>
              <input
                @change="onEditFileChange"
                type="file"
                class="w-full p-3 border border-gray-300 rounded-md"
                accept="image/*"
              />
            </div>

            <div>
              <label class="block text-gray-600">Category ID</label>
              <input
                v-model="editForm.categori_id"
                type="text"
                inputmode="numeric"
                class="w-full p-3 border border-gray-300 rounded-md"
                required
              />
            </div>

            <div v-if="editForm.imagePreview" class="mt-4 text-center">
              <p class="text-gray-600">Image Preview:</p>
              <img
                :src="editForm.imagePreview"
                alt="Edit Image Preview"
                class="w-32 h-32 object-cover rounded-lg mt-3 shadow-md"
              />
            </div>

            <div class="flex justify-end space-x-4">
              <button
                type="button"
                @click="closeEditForm"
                class="py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-300"
              >
                Cancel
              </button>
              <button
                type="submit"
                class="py-2 px-4 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-300"
              >
                Save Changes
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Api from "../api/index.js"; // Gantilah dengan path yang sesuai dengan struktur folder Anda

export default {
  name: "ProductCRUD",
  data() {
    return {
      form: {
        name: "",
        price: "",
        image: null,
        categori_id: "",
      },
      editForm: {
        id: null,
        name: "",
        price: "",
        image: null,
        categori_id: "",
        imagePreview: null,
      },
      products: [], // Menampung daftar produk
      imagePreview: null, // Menyimpan URL sementara untuk preview gambar
      editFormVisible: false, // Menampilkan atau menyembunyikan form edit
    };
  },
  methods: {
    // Handle input file untuk tambah produk
    onFileChange(e) {
      this.form.image = e.target.files[0];
      const reader = new FileReader();
      reader.onload = (event) => {
        this.imagePreview = event.target.result;
      };
      reader.readAsDataURL(this.form.image);
    },

    // Handle input file untuk edit produk
    onEditFileChange(e) {
      this.editForm.image = e.target.files[0];
      const reader = new FileReader();
      reader.onload = (event) => {
        this.editForm.imagePreview = event.target.result;
      };
      reader.readAsDataURL(this.editForm.image);
    },

    // Mengambil data produk
    async fetchProducts() {
      try {
        const response = await Api.get("/api/products");
        this.products = response.data;
      } catch (error) {
        console.error("Error fetching products:", error.message);
      }
    },

    // Menambahkan produk baru
    async createProduct() {
      const formData = new FormData();
      formData.append("name", this.form.name);
      formData.append("price", this.form.price);
      formData.append("image", this.form.image);
      formData.append("categori_id", this.form.categori_id);

      try {
        await Api.post("/api/products", formData, {
          headers: { "Content-Type": "multipart/form-data" },
        });
        this.fetchProducts(); // Menyegarkan daftar produk
        this.resetForm(); // Reset form setelah produk ditambahkan
      } catch (error) {
        console.error("Error creating product:", error.message);
        alert("Failed to create product. Please try again.");
      }
    },

    // Menghapus produk
    async deleteProduct(id) {
      try {
        await Api.delete(`/api/products/${id}`);
        this.fetchProducts(); // Menyegarkan daftar produk setelah penghapusan
      } catch (error) {
        console.error("Error deleting product:", error.message);
        alert("Failed to delete product. Please try again.");
      }
    },

    // Menampilkan form edit untuk produk
    openEditForm(product) {
      this.editForm.id = product.id;
      this.editForm.name = product.name;
      this.editForm.price = product.price;
      this.editForm.imagePreview = product.image;
      this.editForm.categori_id = product.categori_id;
      this.editFormVisible = true;
    },

    // Menutup form edit tanpa menyimpan perubahan
    closeEditForm() {
      this.editFormVisible = false;
    },

    // Mengupdate produk
    async updateProduct() {
      // Membuat FormData dan menambahkan data yang diperlukan
      const formData = new FormData();
      formData.append("name", this.editForm.name);
      formData.append("price", this.editForm.price);
      if (this.editForm.image) {
        formData.append("image", this.editForm.image);
      }
      formData.append("categori_id", this.editForm.categori_id);
      formData.append("_method", "PUT"); // Menambahkan _method untuk memberi tahu API bahwa ini adalah request PUT

      try {
        const response = await Api.post(
          `/api/products/${this.editForm.id}`,
          formData,
          {
            headers: { "Content-Type": "multipart/form-data" },
          }
        );
        console.log("Update response:", response); // Log respons untuk debug
        this.fetchProducts(); // Menyegarkan daftar produk setelah update
        this.closeEditForm(); // Menutup form edit
      } catch (error) {
        console.error("Error updating product:", error.message);
        alert("Failed to update product. Please try again.");
      }
    },

    // Mereset form setelah menambahkan produk baru
    resetForm() {
      this.form.name = "";
      this.form.price = "";
      this.form.image = null;
      this.form.categori_id = "";
      this.imagePreview = null;
    },
  },
  mounted() {
    this.fetchProducts();
  },
};
</script>

