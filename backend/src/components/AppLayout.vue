<template>
    <div v-if="currentUser.id" class="min-h-full flex">
        <!-- Sidebar -->
        <Sidebar :class="{ '-ml-[200px]': !sidebarOpened }" />
        <div class="flex-1">
            <!-- Header -->
            <Navbar @toggle-sidebar="toggleSidebar" />
            <!-- Content -->
            <main class="m-5 p-5"><router-view></router-view></main>
        </div>
    </div>

    <div v-else class="min-h-full bg-white flex items-center justify-center">
        <Spinner />
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from "vue";
import Sidebar from "../components/Sidebar.vue";
import Navbar from "../components/Navbar.vue";
import Spinner from "../components/core/Spinner.vue";
import store from "../store";

const { title } = defineProps({
    title: String,
});

const currentUser = computed( () => store.state.user.data);

const sidebarOpened = ref(true);

function toggleSidebar() {
    sidebarOpened.value = !sidebarOpened.value;
}

onMounted(() => {
    store.dispatch('getUser');
    sideBarHandler();
    window.addEventListener("resize", sideBarHandler);
});

onUnmounted(() => {
    window.removeEventListener("resize", sideBarHandler);
});

function sideBarHandler() {
    if (window.outerWidth <= 768) {
        sidebarOpened.value = false;
    } else {
        sidebarOpened.value = true;
    }
}

const emit = defineEmits(["submit"]);
</script>

<style scoped></style>
