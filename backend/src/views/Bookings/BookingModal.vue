<template>
    <TransitionRoot as="template" :show="show">
        <Dialog @click="closeModal" as="div" class="relative z-10" @close="show = false">
            <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in duration-200"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-black bg-opacity-70 transition-opacity" />
            </TransitionChild>

            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                    <TransitionChild
                        as="template"
                        enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100"
                        leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                        <DialogPanel
                            class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-[400px] sm:w-full"
                        >
                            <Spinner
                                v-if="loading"
                                class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"
                            />
                            <header class="py-3 px-4 flex justify-between items-center">
                                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                    {{ reservation.id ? `Edit Reservation: ${props.reservation.reservation_brand} ${props.reservation.reservation_model}` : 'Add New Reservation' }}
                                </DialogTitle>
                                <button
                                    @click="closeModal"
                                    class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </header>
                            <form @submit.prevent="onSubmit">
                                <div class="bg-white px-4 pt-5 pb-4">
                                    <CustomInput class="mb-2" type="date" v-model="reservation.reservation_date" label="Reservation Date" />
                                    <CustomInput class="mb-2" v-model="reservation.reservation_type" label="Reservation Type" />
                                    <CustomInput class="mb-2" v-model="reservation.reservation_brand" label="Reservation Brand" />
                                    <CustomInput class="mb-2" v-model="reservation.reservation_model" label="Reservation Model" />
                                    <CustomInput class="mb-2" v-model="reservation.reservation_vin_num" label="VIN Number" />
                                    <CustomInput class="mb-2" v-model="reservation.reservation_mileage" label="Mileage" />
                                    <CustomInput class="mb-2" v-model="reservation.reservation_plate_number" label="Plate Number" />
                                    <CustomInput class="mb-2" v-model="reservation.reservation_year" label="Year" />
                                    <CustomInput class="mb-2" v-model="reservation.reservation_typeApproval" label="Type Approval" />
                                    <CustomInput type="textarea" class="mb-2" v-model="reservation.reservation_description" label="Description" />

                                    <!-- Search input for users -->
                                    <label for="searchUser" class="block text-sm font-medium text-gray-700">Search User</label>
                                    <input
                                        v-model="searchQuery"
                                        @input="searchUsers"
                                        type="text"
                                        id="searchUser"
                                        class="mt-1 mb-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        placeholder="Search by name or email"
                                    />

                                    <!-- Display search results -->
                                    <ul v-if="searchResults.length > 0">
                                        <li v-for="user in searchResults" :key="user.id" @click="selectUser(user)">
                                            {{ user.name }} - {{ user.email }}
                                        </li>
                                    </ul>
                                </div>
                                <footer class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button
                                        type="submit"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-indigo-500 text-base font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500"
                                    >
                                        Submit
                                    </button>
                                    <button
                                        type="button"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                        @click="closeModal"
                                        ref="cancelButtonRef"
                                    >
                                        Cancel
                                    </button>
                                </footer>
                            </form>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import { ref, onUpdated, defineProps, defineEmits, computed } from 'vue';
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue';
import CustomInput from '../../components/core/CustomInput.vue';
import store from '../../store/index.js';
import Spinner from '../../components/core/Spinner.vue';
import { getUsers, createReservation, updateReservation } from '../../store/actions'; // Import actions from your store

const reservation = ref({
    id: props.reservation.id,
    reservation_date: props.reservation.reservation_date,
    reservation_type: props.reservation.reservation_type,
    reservation_brand: props.reservation.reservation_brand,
    reservation_model: props.reservation.reservation_model,
    reservation_vin_num: props.reservation.reservation_vin_num,
    reservation_mileage: props.reservation.reservation_mileage,
    reservation_plate_number: props.reservation.reservation_plate_number,
    reservation_year: props.reservation.reservation_year,
    reservation_typeApproval: props.reservation.reservation_typeApproval,
    reservation_description: props.reservation.reservation_description,
    created_by: props.reservation.created_by,
    updated_by: props.reservation.updated_by
});

const loading = ref(false);
const searchQuery = ref('');
const searchResults = ref([]);

const props = defineProps({
    modelValue: Boolean,
    reservation: {
        required: true,
        type: Object
    }
});

const emit = defineEmits(['update:modelValue', 'close']);

const show = computed({
    get: () => props.modelValue,
    set: value => emit('update:modelValue', value)
});

onUpdated(() => {
    reservation.value = {
        id: props.reservation.id,
        reservation_date: props.reservation.reservation_date,
        reservation_type: props.reservation.reservation_type,
        reservation_brand: props.reservation.reservation_brand,
        reservation_model: props.reservation.reservation_model,
        reservation_vin_num: props.reservation.reservation_vin_num,
        reservation_mileage: props.reservation.reservation_mileage,
        reservation_plate_number: props.reservation.reservation_plate_number,
        reservation_year: props.reservation.reservation_year,
        reservation_typeApproval: props.reservation.reservation_typeApproval,
        reservation_description: props.reservation.reservation_description,
        created_by: props.reservation.created_by,
        updated_by: props.reservation.updated_by
    };
});

const closeModal = () => {
    show.value = false;
    emit('close');
}

const onSubmit = () => {
    loading.value = true;
    if (reservation.value.id) {
        updateReservation(reservation.value)
            .then(response => {
                loading.value = false;
                if (response.status === 200) {
                    // TODO show notification
                    store.dispatch('getReservations');
                    closeModal();
                }
            })
            .catch(error => {
                loading.value = false;
                console.error('Error updating reservation:', error);
            });
    } else {
        createReservation(reservation.value)
            .then(response => {
                loading.value = false;
                if (response.status === 201) {
                    // TODO show notification
                    store.dispatch('getReservations');
                    closeModal();
                }
            })
            .catch(error => {
                loading.value = false;
                console.error('Error creating reservation:', error);
            });
    }
}

const searchUsers = () => {
    if (searchQuery.value.trim() === '') {
        searchResults.value = [];
        return;
    }
    getUsers({ search: searchQuery.value })
        .then(response => {
            searchResults.value = response.data;
        })
        .catch(error => {
            console.error('Error fetching users:', error);
        });
}

const selectUser = (user) => {
    reservation.value.userId = user.id;
}

</script>


<style scoped>
/* Add your custom styles here */
</style>
