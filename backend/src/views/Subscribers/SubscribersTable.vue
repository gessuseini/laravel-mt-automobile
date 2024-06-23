<script setup>
import Spinner from "../../components/core/Spinner.vue";
import { computed, onMounted, ref } from "vue";
import store from "../../store";
import { SUBSCRIBERS_PER_PAGE } from "../../constants.js";
import TableHeaderCell from "../../components/core/Table/TableHeaderCell.vue";

const perPage = ref(SUBSCRIBERS_PER_PAGE);
const search = ref('');
const subscribers = computed(() => store.state.subscribers);

const emit = defineEmits(['clickEdit']);

onMounted(() => {
    getSubscribers();
});

function getSubscribers(url = null) {
    store.dispatch('getSubscribers', { url, search: search.value, perPage: perPage.value });
}

function deleteSubscriber(subscriber) {
    store.dispatch('deleteSubscriber', subscriber.id)
        .then(() => {
            store.dispatch('getSubscribers');
        })
        .catch((error) => {
            console.error('Failed to delete subscriber:', error);
        });
}

function editSubscriber(subscriber) {
    emit('clickEdit', subscriber);
}

function getForPage(ev, link) {
    ev.preventDefault();
    if (!link.url || link.active) {
        return;
    }

    getSubscribers(link.url);
}
</script>

<template>
    <div class="bg-white p-4 rounded-2xl shadow">
        <div class="bg-white">
            <div class="flex justify-between">
                <div class="flex items-center">
                    <span class="whitespace-nowrap mr-3">Per Page</span>
                    <select @change="getSubscribers(null)" v-model="perPage" class="appearance-none relative block w-8 md:w-14 lg:w-16 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="flex items-center">
                    <input v-model="search"
                           @change="getSubscribers(null)"
                           class="appearance-none block w-20 md:w-48 lg:w-96 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Type to Search subscribers"
                    />
                </div>
            </div>
        </div>
        <div class="bg-white pt-5">
            <div class="flex justify-between">
                <Spinner v-if="subscribers.loading" />
                <template v-else>
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <TableHeaderCell class="border-b-2 p-2 text-left">ID</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left" >Email</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left" >Last updated at</TableHeaderCell>
                            <th class="border-b-2 p-2 text-left">Edit</th>
                            <th class="border-b-2 p-2 text-left">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(subscriber, index) of subscribers.data" class="animate-fade-in-down" :style="{'animation-delay': `${index * 0.05}s`}">
                            <td class="border-b p-4">{{ subscriber.id }}</td>
                            <td class="border-b p-4">{{ subscriber.email }}</td>
                            <td class="border-b p-4">{{ subscriber.updated_at }}</td>
                            <td class="border-b"><button @click="editSubscriber(subscriber)" class="bg-gray-700 rounded-lg py-2 px-3 text-white">Edit</button></td>
                            <td class="border-b"><button @click="deleteSubscriber(subscriber)" class="bg-red-500 rounded-lg py-2 px-3 text-white">Delete</button></td>
                        </tr>
                        </tbody>
                    </table>
                </template>
            </div>
            <div class="flex justify-between items-center mt-5">
                <div>
                    Showing from {{ subscribers.from }} to {{ subscribers.to }}
                </div>
                <nav
                    v-if="subscribers.total > subscribers.limit"
                    class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px"
                    aria-label="Pagination"
                >
                    <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                    <a
                        v-for="(link, i) of subscribers.links"
                        :key="i"
                        :disabled="!link.url"
                        href="#"
                        @click="getForPage($event, link)"
                        aria-current="page"
                        class="relative inline-flex items-center px-4 py-2 border text-sm font-medium whitespace-nowrap"
                        :class="[
              link.active
                ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600'
                : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50',
              i === 0 ? 'rounded-l-md' : '',
              i === subscribers.links.length - 1 ? 'rounded-r-md' : '',
              !link.url ? ' bg-gray-100 text-gray-700': ''
            ]"
                        v-html="link.label"
                    >
                    </a>
                </nav>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
