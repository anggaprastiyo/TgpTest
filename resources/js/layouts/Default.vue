<template>
    <div class="wrapper">
        <Navbar />
        <Sidebar />
        <div class="content-wrapper">
            <router-view> </router-view>
        </div>
        <Footer />
    </div>
</template>

<script>
import Navbar from "../components/Navbar";
import Footer from "../components/Footer";
import Sidebar from "../components/Sidebar";

export default {
    components: { Navbar, Footer, Sidebar },
};
</script>
