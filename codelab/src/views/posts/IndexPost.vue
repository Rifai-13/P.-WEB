<script setup>
import { ref, onMounted, handleError } from "vue";
import api from "../../api";

// Define state
const posts = ref([]);
const isLoading = ref(true);
const errorMessage = ref("");

// Method fetchDataPosts
const fetchDataPosts = async () => {
  try {
    // Fetch data
    const response = await api.get("/api/posts");

    // Set response data to state "posts"
    posts.value = response.data.data.data;
  } catch (error) {
    // Set error message if API call fails
    errorMessage.value = error.message || "Failed to fetch posts!";
  } finally {
    isLoading.value = false;
  }
};

// Method to delete post
const deletePost = async (id) => {
  if (confirm('Are you sure you want to delete this post?')) {
    try {
      // Call API to delete post
      await api.delete(`/api/posts/${id}`);
      // Re-fetch posts after deletion
      fetchDataPosts();
    } catch (error) {
      // Handle error if delete fails
      console.error('Error deleting post:', error);
      alert('There was an error deleting the post.');
    }
  }
};

// Run hook "onMounted"
onMounted(() => {
  fetchDataPosts();
});
</script>

<template>
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-12">
        <router-link
          :to="{ name: 'posts.CreatePost' }"
          class="btn btn-md btn-success rounded shadow border-0 mb-3"
        >
          ADD NEW POST
        </router-link>
        <div class="card border-0 rounded shadow">
          <div class="card-body">
            <table class=" table table-bordered">
              <thead class="text-center bg-black">
                <tr>
                  <th scope="col">Image</th>
                  <th scope="col">Title</th>
                  <th scope="col">Content</th>
                  <th scope="col" style="width: 15%">Actions</th>
                </tr>
              </thead>
              <tbody>
                <!-- Show Loading -->
                <tr v-if="isLoading">
                  <td colspan="4" class="text-center">
                    <div class="alert alert-info mb-0">Loading...</div>
                  </td>
                </tr>
                <!-- Show Error Message -->
                <tr v-else-if="errorMessage">
                  <td colspan="4" class="text-center">
                    <div class="alert alert-danger mb-0">
                      {{ errorMessage }}
                    </div>
                  </td>
                </tr>
                <!-- Show No Data -->
                <tr v-else-if="posts.length == 0">
                  <td colspan="4" class="text-center">
                    <div class="alert alert-warning mb-0">
                      Data Belum Tersedia!
                    </div>
                  </td>
                </tr>
                <!-- Show Posts -->
                <tr v-else v-for="(post, index) in posts" :key="index">
                  <td class="text-center">
                    <img
                      :src="post.image ? post.image : 'https://via.placeholder.com/200'"
                      width="200"
                      class="rounded-3"
                      alt="Post Image"
                      @error="handleError"
                    />
                  </td>
                  <td>{{ post.title }}</td>
                  <td>{{ post.content }}</td>
                  <td class="text-center">
                    <router-link
                      :to="{ name: 'posts.EditPost', params: { id: post.id } }"
                      class="btn btn-sm btn-primary rounded-sm shadow border-0 me-2"
                    >
                      EDIT
                    </router-link>
                    <button
                      @click="deletePost(post.id)"
                      class="btn btn-sm btn-danger rounded-sm shadow border-0"
                    >
                      DELETE
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
