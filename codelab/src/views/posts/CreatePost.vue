<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import api from "../../api";

// Define state untuk form
const title = ref("");
const content = ref("");
const imageFile = ref(null); // Menyimpan file gambar
const isSubmitting = ref(false);
const errorMessage = ref("");

// Router untuk navigasi setelah submit
const router = useRouter();

// Fungsi untuk menangani perubahan file gambar
const handleImageChange = (event) => {
  const file = event.target.files[0]; // Mengambil file yang dipilih
  if (file) {
    // Validasi tipe file gambar
    const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
    if (!validImageTypes.includes(file.type)) {
      errorMessage.value = 'Invalid image type. Please select a JPG, PNG, or GIF image.';
      imageFile.value = null; // Reset file gambar
    } else {
      imageFile.value = file; // Simpan file gambar yang valid
      errorMessage.value = ''; // Reset pesan error
    }
  }
};

// Fungsi untuk mengirim data post
const submitPost = async () => {
  if (isSubmitting.value) return;
  isSubmitting.value = true;

  const formData = new FormData();
  formData.append("title", title.value);
  formData.append("content", content.value);
  if (imageFile.value) {
    formData.append("image", imageFile.value); // Pastikan 'image' adalah parameter yang diterima oleh server
  }

  try {
    // Kirim data ke API dengan FormData untuk menangani file upload
    await api.post("/api/posts", formData, {
      headers: {
        "Content-Type": "multipart/form-data",
        Accept: "application/json",
      },
    });

    // Redirect ke halaman post setelah berhasil
    router.push({ name: "posts.IndexPost" }); // Ganti dengan nama route halaman daftar post Anda
  } catch (error) {
    if (error.response) {
      console.log(error.response.data); // Cek data dari server
      errorMessage.value =
        error.response.data.message || "Failed to create post!";
    } else {
      errorMessage.value = "Failed to connect to server";
    }
  } finally {
    isSubmitting.value = false;
  }
};
</script>

<template>
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card border-0 rounded shadow">
          <div class="card-body">
            <h3 class="mb-3">Create New Post</h3>

            <!-- Error message jika ada -->
            <div v-if="errorMessage" class="alert alert-danger">
              {{ errorMessage }}
            </div>

            <!-- Form untuk input post -->
            <form @submit.prevent="submitPost">
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                  type="text"
                  class="form-control"
                  id="title"
                  v-model="title"
                  required
                />
              </div>

              <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea
                  class="form-control"
                  id="content"
                  v-model="content"
                  rows="4"
                  required
                ></textarea>
              </div>

              <!-- Input gambar -->
              <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input
                  type="file"
                  class="form-control"
                  id="image"
                  @change="handleImageChange"
                  accept="image/*"
                />
              </div>

              <button
                type="submit"
                class="btn btn-primary"
                :disabled="isSubmitting"
              >
                {{ isSubmitting ? "Submitting..." : "Submit" }}
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
