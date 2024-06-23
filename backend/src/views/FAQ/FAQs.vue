<script setup>
import FAQsTable from "./FAQsTable.vue";
import FAQModal from "./FAQModal.vue";
import { ref } from "vue";
import store from "../../store/index.js";

const DEFAULT_FAQ = {
    id: '',
    question: '',
    answer: ''
};

const showModal = ref(false);
const faqModal = ref({
    id: '',
    question: '',
    answer: ''
});

function editFAQ(faq) {
    store.dispatch('getFAQ', faq.id)
        .then(({ data }) => {
            faqModal.value = data;
            showFAQModal();
        })
        .catch((error) => {
            console.error('Error fetching FAQ:', error);
        });
}

function showFAQModal() {
    showModal.value = true;
}

function onModalClose() {
    faqModal.value = { ...DEFAULT_FAQ };
}
</script>

<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="text-3xl font-semibold">Frequently Asked Questions</h1>
        <button type="button"
                @click="showFAQModal()"
                class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
            Add new FAQ
        </button>
    </div>

    <FAQModal v-model="showModal" :faq="faqModal" @close="onModalClose" />
    <FAQsTable @clickEdit="editFAQ" />

</template>
