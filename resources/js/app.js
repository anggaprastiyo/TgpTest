//Admin LTE Theme
require("admin-lte");

//Vue js
import Vue from "vue";
import App from "./App.vue";

//Bootstrap Vue
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

//Vue Router
import VueRouter from "vue-router";
Vue.use(VueRouter);
import router from "./router";

//Sweet Alert
import swal from "sweetalert2";
window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: toast => {
        toast.addEventListener("mouseenter", swal.stopTimer);
        toast.addEventListener("mouseleave", swal.resumeTimer);
    }
});
window.toast = toast;

//Layout
import Default from "./layouts/Default.vue";
import NoSidebar from "./layouts/NoSidebar.vue";
Vue.component("default-layout", Default);
Vue.component("no-sidebar-layout", NoSidebar);

new Vue({
    el: "#app",
    render: h => h(App),
    router
});
