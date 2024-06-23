<script setup>
import SubscribersTable from "./SubscribersTable.vue";
import SubscriberModal from "./SubscriberModal.vue";
import { ref } from "vue";
import store from "../../store/index.js";

const DEFAULT_SUBSCRIBER = {
    id: '',
    email: ''
};

const showModal = ref(false);
const subscriberModal = ref({
    id: '',
    email: ''
});

function editSubscriber(subscriber) {
    store.dispatch('getSubscriber', subscriber.id)
        .then(({ data }) => {
            subscriberModal.value = data;
            showSubscriberModal();
        })
        .catch((error) => {
            console.error('Error fetching subscriber:', error);
        });
}

function showSubscriberModal() {
    showModal.value = true;
}

function onModalClose() {
    subscriberModal.value = { ...DEFAULT_SUBSCRIBER };
}
</script>

<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="text-3xl font-semibold">Subscribers</h1>
        <button type="button"
                @click="showSubscriberModal()"
                class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
            Add new Subscriber
        </button>
    </div>

    <SubscriberModal v-model="showModal" :subscriber="subscriberModal" @close="onModalClose" />
    <SubscribersTable @clickEdit="editSubscriber" />

</template>
