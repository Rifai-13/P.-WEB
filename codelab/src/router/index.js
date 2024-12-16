import { createRouter, createWebHistory } from "vue-router";

const routes = [
  {
    path: "/",
    name: "Home",
    component: () => import("../views/HomePage.vue"),
  },
  {
    path: "/posts",
    name: "posts.IndexPost",
    component: () => import("../views/posts/IndexPost.vue"),
  },
  {
    path: "/posts/create",
    name: "posts.CreatePost",
    component: () => import("../views/posts/CreatePost.vue"),
  },
  {
    path: "/posts/:id",
    name: "posts.EditPost",
    component: () => import("../views/posts/EditPost.vue"),
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
