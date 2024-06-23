<script setup>
import {ref} from "vue";
import store from "../../store/index.js";
import BookingsTable from "./BookingsTable.vue";
import BookingModal from "./BookingModal.vue";

const DEFAULT_RESERVATION = {
    reservation_id: '',
    reservation_type: '',
    reservation_date: '',
    reservation_time: '',
    reservation_brand: '',
    reservation_model: '',
    reservation_vin_num: '',
    reservation_mileage: '',
    reservation_plate_number: '',
    reservation_year: '',
    reservation_typeApproval: '',
    reservation_description: ''
}

const showModal = ref(false);
const reservationModal = ref( {
    reservation_id: '',
    reservation_type: '',
    reservation_date: '',
    reservation_time: '',
    reservation_brand: '',
    reservation_model: '',
    reservation_vin_num: '',
    reservation_mileage: '',
    reservation_plate_number: '',
    reservation_year: '',
    reservation_typeApproval: '',
    reservation_description: ''
})

function editReservation(reservation) {
    store.dispatch('getReservation', reservation.id)
        .then(({data}) => {
            reservationModal.value = data;
            showReservationModal();
        })
}

function showReservationModal(){
    showModal.value = true;
}

function showTodaysReservations() {
    store.dispatch('getTodaysReservations')
        .then(() => {
            console.log("Today's reservations fetched successfully");
        })
        .catch(error => {
            console.error("Error fetching today's reservations:", error);
        });
}
function onModalClose() {
    reservationModal.value = {...DEFAULT_RESERVATION}
}

</script>

<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="text-3xl font-semibold">Reservations</h1>
        <div>
            <span class="px-2">
                <button type="button"
                        @click="showTodaysReservations()"
                        class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Show today's reservations
                </button>
            </span>
            <span class="px-2">
                <button type="button"
                        @click="showReservationModal()"
                        class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Add new Reservation
                </button>
            </span>
        </div>
    </div>

    <BookingModal v-model="showModal" :reservation="reservationModal" @close="onModalClose" />
    <BookingsTable @clickEdit="editReservation" />

</template>
