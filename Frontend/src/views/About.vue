
<script>

import AppFooter from '../components/AppFooter.vue';
import AppNavbar from '../components/AppNavbar.vue';

export default {
    name: 'About',
    components: {
        AppNavbar,
        AppFooter
    }
}

</script>


<template>
    <div>
    <AppNavbar />
    <main>
        <div class="about-me">
            <img src="../assets/image/about.jpg" alt="">
            <div class="text">
                <h1>About Me</h1>
                <p> 
                    StyleSport is a shoe store that offers a high-quality collection for every need, from casual to formal. We prioritize comfort, modern design, and affordable prices. Find the best shoes to step forward with confidence with us!
                </p>
            </div>
        </div>
    </main>
    <AppFooter />
</div>
</template>