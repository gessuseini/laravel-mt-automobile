<script setup>
import CarsTable from "./CarsTable.vue";
import CarModal from "./CarModal.vue";
import {ref} from "vue";
import store from "../../store/index.js";

const DEFAULT_CAR = {
    id: '',
    vehicle_brand: '',
    vehicle_model: '',
    vehicle_mileage: '',
    vehicle_year: '',
    vehicle_image: '',
    vehicle_transmission: '',
    vehicle_description: '',
    vehicle_price: ''
}

const showModal = ref(false);
const carModal = ref( {
    id: '',
    vehicle_brand: '',
    vehicle_model: '',
    vehicle_mileage: '',
    vehicle_year: '',
    vehicle_image: '',
    vehicle_transmission: '',
    vehicle_description: '',
    vehicle_price: '',
})

function editCar(car) {
    store.dispatch('getCar', car.id)
        .then(({data}) => {
            carModal.value = data;
            showCarModal();
        })
}

function showCarModal(){
    showModal.value = true;
}

function onModalClose() {
    carModal.value = {...DEFAULT_CAR}
}

</script>

<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="text-3xl font-semibold">Cars</h1>
        <button type="button"
                @click="showCarModal()"
                class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
            Add new Car
        </button>
    </div>

    <CarModal v-model="showModal" :car="carModal" @close="onModalClose" />
    <CarsTable @clickEdit="editCar" />

</template>
