<script setup>
import Spinner from "../../components/core/Spinner.vue";
import {computed, onMounted, ref} from "vue";
import store from "../../store";
import {USERS_PER_PAGE} from "../../constants.js";
import TableHeaderCell from "../../components/core/Table/TableHeaderCell.vue";

const perPage = ref(USERS_PER_PAGE);
const search = ref('');
const users = computed(() => store.state.users);

const emit = defineEmits(['clickEdit']);

onMounted(()=> {
    getUsers();
})
function getUsers(url = null) {
    store.dispatch('getUsers', {url, search: search.value, perPage: perPage.value});
}

function deleteUser(user) {
    store.dispatch('deleteUser', user.id)
        .then(res => {
            store.dispatch('getUsers');
    })
}

function editUser(user) {
    emit('clickEdit', user);
}

function getForPage(ev, link) {
    ev.preventDefault();
    if (!link.url || link.active) {
        return;
    }

    getUsers(link.url)
}

</script>

<template>

    <div class="bg-white p-4 rounded-2xl shadow">
        <div class="bg-white">
            <div class="flex justify-between">
                <div class="flex items-center">
                    <span class="whitespace-nowrap mr-3">Per Page</span>
                    <select @change="getUsers(null)" v-model="perPage" class="appearance-none relative block w-8 md:w-14 lg:w-16 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="flex items-center">
                    <input v-model="search"
                           @change="getUsers(null)"
                           class="appearance-none block w-20 md:w-48 lg:w-96 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Type to Search users"
                    />
                </div>
            </div>
        </div>
        <div class="bg-white pt-5">
            <div class="flex justify-between">
                <Spinner v-if="users.loading" />
                <template v-else>
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <TableHeaderCell class="border-b-2 p-2 text-left">User ID</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left">Name</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left">Phone Number</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left" >Email</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left" >Admin Permission</TableHeaderCell>
                            <th class="border-b-2 p-2 text-left">Edit</th>
                            <th class="border-b-2 p-2 text-left">Delete</th>
                            <th class="border-b-2 p-2 text-left"></th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(user, index) of users.data" class="animate-fade-in-down" :style="{'animation-delay': `${index * 0.05}s`}">
                            <td class="border-b p-4">{{ user.id }}</td>
                            <td class="border-b p-4 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">{{ user.name }}</td>
                            <td class="border-b p-4 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">{{ user.phone_number }}</td>
                            <td class="border-b p-4 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">{{ user.email }}</td>
                            <td class="border-b p-4 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">{{ user.is_admin ? 'Yes' : 'No'}}</td>
                            <td class="border-b"><button @click="editUser(user)" class="bg-gray-700 rounded-lg py-2 px-3 text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg></button></td>
                            <td class="border-b"><button @click="deleteUser(user)" class="bg-red-500 rounded-lg py-2 px-3 text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg></button></td>
                        </tr>
                        </tbody>
                    </table>
                </template>
            </div>
            <div class="flex justify-between items-center mt-5">
                <div>
                    Showing from {{ users.from }} to {{ users.to }}
                </div>
                <nav
                    v-if="users.total > users.limit"
                    class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px"
                    aria-label="Pagination"
                >
                    <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                    <a
                        v-for="(link, i) of users.links"
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
              i === users.links.length - 1 ? 'rounded-r-md' : '',
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
