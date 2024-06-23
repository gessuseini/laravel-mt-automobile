import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import Login from "../views/Login.vue";
import Home from "../views/Home.vue";
import About from "../views/About.vue";
import Contact from "../views/Contact.vue";
import Services from "../views/Services.vue";
import NotFound from "../views/NotFound.vue";
import RequestPassword from "../views/RequestPassword.vue";
import ResetPassword from "../views/ResetPassword.vue";
import AppLayout from "../components/AppLayout.vue";
import store from "../store";
import Users from "../views/Users/Users.vue";
import Bookings from "../views/Bookings/Bookings.vue";
import Cars from "../views/Cars/Cars.vue";
import Newsletters from '../views/Newsletters/Newsletters.vue';
import Subscribers from '../views/Subscribers/Subscribers.vue';
import Settings from "../views/Settings.vue";
import FAQs from "../views/FAQ/FAQs.vue";

const routes = [
    {
        path: '/',
        redirect: '/app'
    },
    {
        path: "/",
        name: "home",
        component: Home,
    },
    {
        path: "/app",
        name: "app",
        redirect: "/app/dashboard",
        component: AppLayout,
        meta: {
            requiresAuth: true,
        },
        children: [
            {
                path: "dashboard",
                name: "app.dashboard",
                component: Dashboard,
            },
            {
                path: "bookings",
                name: "app.bookings",
                component: Bookings,
            },
            {
                path: "users",
                name: "app.users",
                component: Users,
            },
            {
                path: "cars",
                name: "app.cars",
                component: Cars,
            },
            {
                path: "reports",
                name: "app.reports",
                component: Dashboard,
            },
            {
                path: "newsletters",
                name: "app.newsletters",
                component: Newsletters,
            },
            {
                path: "subscribers",
                name: "app.subscribers",
                component: Subscribers,
            },
            {
                path: "profile",
                name: "app.profile",
                component: Dashboard,
                children: [
                    {
                        path: "settings",
                        name: "app.profile.settings",
                        component: Dashboard,
                    }
                ]
            },
            {
                path: "settings",
                name: "app.settings",
                component: Settings,
            },
            {
                path: "faq",
                name: "app.faq",
                component: FAQs,
            },
        ],
    },
    {
        path: "/login",
        name: "login",
        meta: {
            requiresGuest: true,
        },
        component: Login,
    },
    {
        path: "/about-us",
        name: "about",
        component: About,
    },
    {
        path: "/contact-us",
        name: "contact",
        component: Contact,
    },
    {
        path: "/our-services",
        name: "services",
        component: Services,
    },
    {
        path: "/request-password",
        name: "request-password",
        meta: {
            requiresGuest: true,
        },
        component: RequestPassword,
    },
    {
        path: "/reset-password",
        name: "reset-password",
        meta: {
            requiresGuest: true,
        },
        component: ResetPassword,
    },
    {
        path: "/:pathMatch(.*)",
        name: "notfound",
        component: NotFound,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({ name: "login" });
    } else if (to.meta.requiresGuest && store.state.user.token) {
        next({ name: "app.dashboard" });
    } else {
        next();
    }
});

export default router;
