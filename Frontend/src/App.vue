
<script>

import AppNavbar from './components/AppNavbar.vue';

export default {
    name: 'App',
    components: {
        AppNavbar,
      
    }
}

</script>

<template>
  <div>
    <AppNavbar />
      
    <router-view></router-view>
  </div>
  
</template>
