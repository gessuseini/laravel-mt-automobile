<script setup>
import Spinner from "../../components/core/Spinner.vue";
import {computed, onMounted, ref} from "vue";
import store from "../../store";
import {BOOKINGS_PER_PAGE} from "../../constants.js";
import TableHeaderCell from "../../components/core/Table/TableHeaderCell.vue";

const perPage = ref(BOOKINGS_PER_PAGE);
const search = ref('');
const reservations = computed(() => store.state.reservations);

const emit = defineEmits(['clickEdit']);

onMounted(()=> {
    getReservations();
})
function getReservations(url = null) {
    store.dispatch('getReservations', {url, search: search.value, perPage: perPage.value});
}

function deleteReservation(reservation) {
    store.dispatch('deleteReservation', reservation.id)
        .then(res => {
            store.dispatch('getReservations');
    })
}

function editReservation(reservation) {
    emit('clickEdit', reservation);
}

function getForPage(ev, link) {
    ev.preventDefault();
    if (!link.url || link.active) {
        return;
    }

    getReservations(link.url)
}

</script>

<template>

    <div class="bg-white p-4 rounded-2xl shadow">
        <div class="bg-white">
            <div class="flex justify-between">
                <div class="flex items-center">
                    <span class="whitespace-nowrap mr-3">Per Page</span>
                    <select @change="getReservations(null)" v-model="perPage" class="appearance-none relative block w-8 md:w-14 lg:w-16 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="flex items-center">
                    <input v-model="search"
                           @change="getReservations(null)"
                           class="appearance-none block w-20 md:w-48 lg:w-96 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Type to Search reservations"
                    />
                </div>
            </div>
        </div>
        <div class="bg-white pt-5">
            <div class="flex justify-between">
                <Spinner v-if="reservations.loading" />
                <template v-else>
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <TableHeaderCell class="border-b-2 p-2 text-left">ID</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left">Name</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left">Phone NR.</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left" >Type</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left" >Date</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left" >Vehicle</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left" >VIN NR.</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left" >Mileage</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left" >Plate NR.</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left" >Year</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left" >Type Approval</TableHeaderCell>
                            <TableHeaderCell class="border-b-2 p-2 text-left" >Description</TableHeaderCell>
                            <th class="border-b-2 p-2 text-left">Edit</th>
                            <th class="border-b-2 p-2 text-left">Delete</th>
                            <th class="border-b-2 p-2 text-left"></th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(reservation, index) of reservations.data" class="animate-fade-in-down" :style="{'animation-delay': `${index * 0.05}s`}">
                            <td class="border-b p-4">{{ reservation.reservation_id }}</td>
                            <td class="border-b p-4 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">{{ reservation.user_name }}</td>
                            <td class="border-b p-4 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">{{ reservation.phone_number }}</td>
                            <td class="border-b p-4 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">{{ reservation.reservation_type }}</td>
                            <td class="border-b p-4">{{ reservation.reservation_date }}</td>
                            <td class="border-b p-4">{{ reservation.reservation_brand }} {{ reservation.reservation_model }}</td>
                            <td class="border-b p-4">{{ reservation.reservation_vin_num }}</td>
                            <td class="border-b p-4">{{ reservation.reservation_mileage }}</td>
                            <td class="border-b p-4">{{ reservation.reservation_plate_number }}</td>
                            <td class="border-b p-4">{{ reservation.reservation_year }}</td>
                            <td class="border-b p-4">{{ reservation.reservation_typeApproval }}</td>
                            <td class="border-b p-4">{{ reservation.reservation_description }}</td>
                            <td class="border-b"><button @click="editReservation(reservation)" class="bg-gray-700 rounded-lg py-2 px-3 text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg></button></td>
                            <td class="border-b"><button @click="deleteReservation(reservation)" class="bg-red-500 rounded-lg py-2 px-3 text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg></button></td>
                        </tr>
                        </tbody>
                    </table>
                </template>
            </div>
            <div class="flex justify-between items-center mt-5">
                <div>
                    Showing from {{ reservations.from }} to {{ reservations.to }}
                </div>
                <nav
                    v-if="reservations.total > reservations.limit"
                    class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px"
                    aria-label="Pagination"
                >
                    <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                    <a
                        v-for="(link, i) of reservations.links"
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
              i === reservations.links.length - 1 ? 'rounded-r-md' : '',
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
