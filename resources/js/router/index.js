require("../bootstrap");

window.Vue = require("vue");
import VueRouter from "vue-router";
Vue.use(VueRouter);

import Booking from "../pages/Booking/Booking.vue";
import SignIn from "../pages/Auth/SignIn.vue";

const routes = [
    {
        name: 'SignIn',
        path: '/',
        meta: { layout: "no-sidebar" },
        component: SignIn
    },
    {
        name: "Booking",
        path: "/booking",
        component: Booking
    }
];

const router = new VueRouter({
    linkActiveClass: "active",
    mode: "history",
    routes
});

export default router;
