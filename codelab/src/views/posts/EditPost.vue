<script setup>
import { ref, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
import api from "../../api";

const router = useRouter();
const route = useRoute();

const image = ref("");
const title = ref("");
const content = ref("");
const errors = ref([]);
const isLoading = ref(false);

onMounted(async () => {
  if (!route.params.id) {
    router.push({ path: "/posts" });
    return;
  }

  isLoading.value = true;
  try {
    const response = await api.get(`/api/posts/${route.params.id}`);
    title.value = response.data?.data?.title || "";
    content.value = response.data?.data?.content || "";
  } catch {
    errors.value = ["Failed to fetch post data."];
  } finally {
    isLoading.value = false;
  }
});

const handleFileChange = (e) => {
  image.value = e.target.files[0];
};

const updatePost = async () => {
  let formData = new FormData();
  formData.append("image", image.value);
  formData.append("title", title.value);
  formData.append("content", content.value);
  formData.append("_method", "PATCH");

  try {
    await api.post(`/api/posts/${route.params.id}`, formData);
    router.push({ path: "/posts" });
  } catch (error) {
    errors.value = error.response?.data.errors || ["An unknown error occurred."];
  }
};
</script>

<template>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div v-if="isLoading" class="text-center">Loading...</div>
        <div v-else class="card border-0 rounded shadow">
          <div class="card-body">
            <form @submit.prevent="updatePost()">
              <div class="mb-3">
                <label class="form-label fw-bold">Image</label>
                <input type="file" class="form-control" @change="handleFileChange($event)" />
                <div v-if="errors.image" class="alert alert-danger mt-2">
                  <span>{{ errors.image[0] }}</span>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Title</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="title"
                  placeholder="Title Post"
                />
                <div v-if="errors.title" class="alert alert-danger mt-2">
                  <span>{{ errors.title[0] }}</span>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Content</label>
                <textarea
                  class="form-control"
                  v-model="content"
                  rows="5"
                  placeholder="Content Post"
                ></textarea>
                <div v-if="errors.content" class="alert alert-danger mt-2">
                  <span>{{ errors.content[0] }}</span>
                </div>
              </div>
              <button
                type="submit"
                class="btn btn-md btn-primary rounded-sm shadow border-0"
              >
                Update
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
