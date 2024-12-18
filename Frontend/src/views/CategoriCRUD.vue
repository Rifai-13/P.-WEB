<template>
  <div
    class="min-h-screen bg-gray-100 py-8 px-6 flex justify-center overflow-auto"
  >
    <div class="bg-white shadow-xl rounded-lg w-full max-w-5xl p-6">
      <h1 class="text-4xl font-semibold text-center text-gray-700 mb-10">
        Kategori CRUD
      </h1>

      <!-- Form Tambah Kategori -->
      <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-6">
          Tambah Kategori Baru
        </h2>
        <form @submit.prevent="addCategory" class="space-y-4">
          <div>
            <label class="block text-gray-600">Nama Kategori</label>
            <input
              v-model="newCategory"
              type="text"
              placeholder="Masukkan nama kategori"
              class="w-full p-3 border border-gray-300 rounded-md"
              required
            />
          </div>
          <button
            type="submit"
            class="w-full py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition"
          >
            Tambah Kategori
          </button>
        </form>
      </div>

      <!-- Form Edit Kategori -->
      <div v-if="editCategory" class="bg-white p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-6">Edit Kategori</h2>
        <form @submit.prevent="updateCategory" class="space-y-4">
          <div>
            <label class="block text-gray-600">Nama Kategori</label>
            <input
              v-model="editCategory.jenis"
              type="text"
              placeholder="Masukkan nama kategori"
              class="w-full p-3 border border-gray-300 rounded-md"
              required
            />
          </div>
          <button
            type="submit"
            class="w-full py-3 bg-green-600 text-white rounded-md hover:bg-green-700 transition"
          >
            Update Kategori
          </button>
        </form>
      </div>

      <!-- Tabel Kategori -->
      <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold text-gray-700 mb-6">
          Daftar Kategori
        </h2>
        <div class="overflow-x-auto">
          <table class="min-w-full table-auto border-collapse">
            <thead class="bg-gray-200">
              <tr>
                <th
                  class="py-3 px-4 text-sm font-semibold text-gray-600 border"
                >
                  No
                </th>
                <th
                  class="py-3 px-4 text-sm font-semibold text-gray-600 border"
                >
                  Nama Kategori
                </th>
                <th
                  class="py-3 px-4 text-sm font-semibold text-gray-600 border"
                >
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(category, index) in categories"
                :key="category.id"
                class="border-t"
              >
                <td class="py-4 px-4 text-sm text-gray-700 border">
                  {{ index + 1 }}
                </td>
                <td class="py-4 px-4 text-sm text-gray-700 border">
                  {{ category.jenis }}
                </td>
                <td class="py-4 px-4 text-sm text-center border space-x-2">
                  <button
                    @click="editCategory = { ...category }"
                    class="py-2 px-4 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition"
                  >
                    Edit
                  </button>
                  <button
                    @click="deleteCategory(category.id)"
                    class="py-2 px-4 bg-red-500 text-white rounded-md hover:bg-red-600 transition"
                  >
                    Hapus
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div
          v-if="categories.length === 0"
          class="text-center text-gray-500 mt-4"
        >
          Belum ada kategori yang terdaftar.
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Api from "../api/index.js"; 

export default {
  name: "CategoriCRUD",
  data() {
    return {
      categories: [], // Menyimpan kategori yang diambil dari API
      newCategory: "", // Input kategori baru
      editCategory: null, // Kategori yang sedang diedit
    };
  },
  methods: {
    // Fungsi untuk mengambil data kategori dari API
    async fetchCategories() {
      try {
        const response = await Api.get("/api/categoris");
        console.log(response.data); // Pastikan data diterima
        this.categories = response.data; // Simpan data di state
      } catch (error) {
        console.error("Error fetching categories:", error.message);
      }
    },

    // Fungsi untuk menambahkan kategori baru
    async addCategory() {
      if (!this.newCategory.trim()) {
        alert("Nama kategori tidak boleh kosong!");
        return;
      }
      try {
        const response = await Api.post("/api/categoris", {
          jenis: this.newCategory,
        });
        this.categories.push(response.data);
        this.newCategory = ""; // Reset input kategori baru
      } catch (error) {
        console.error("Error adding category:", error.message);
      }
    },

    // Fungsi untuk menghapus kategori
    async deleteCategory(id) {
    //   if (!confirm("Anda yakin ingin menghapus kategori ini?")) return;
      try {
        await Api.delete(`/api/categoris/${id}`);
        this.categories = this.categories.filter(
          (category) => category.id !== id
        );
      } catch (error) {
        console.error("Error deleting category:", error.message);
      }
    },

    // Fungsi untuk memperbarui kategori
    async updateCategory() {
      if (!this.editCategory || !this.editCategory.jenis.trim()) {
        alert("Nama kategori tidak boleh kosong!");
        return;
      }
      try {
        const response = await Api.put(
          `/api/categoris/${this.editCategory.id}`,
          { jenis: this.editCategory.jenis }
        );
        const index = this.categories.findIndex(
          (c) => c.id === response.data.id
        );
        this.categories[index] = response.data; // Perbarui kategori yang ada
        this.editCategory = null; // Reset form edit
      } catch (error) {
        console.error("Error updating category:", error.message);
      }
    },
  },
  mounted() {
    this.fetchCategories();
  },
};
</script>

<style scoped>
/* Tambahkan gaya tambahan jika diperlukan */
</style>
