<template>
  <div id="app" class="d-flex flex-column" style="height: 100%;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
      <div class="container-fluid">
        <!-- Link ke Home -->
        <router-link :to="{ name: 'Home' }" class="navbar-brand"
          >HOME</router-link
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Menu Utama -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- Link ke Index Post -->
            <li class="nav-item">
              <router-link
                :to="{ name: 'posts.IndexPost' }"
                class="nav-link active"
                aria-current="page"
              >
                POSTS
              </router-link>
            </li>
          </ul>
          <!-- Login Button -->
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <a href="#" target="_blank" class="btn btn-success">LOGIN</a>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Render Router View -->
    <router-view></router-view>
  </div>
</template>
