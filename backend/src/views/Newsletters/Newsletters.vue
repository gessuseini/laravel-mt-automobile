<script setup>
import NewslettersTable from "./NewslettersTable.vue";
import NewsletterModal from "./NewsletterModal.vue";
import {ref} from "vue";
import store from "../../store/index.js";

const DEFAULT_NEWSLETTER = {
    id: '',
    title: '',
    content: ''
}

const showModal = ref(false);
const newsletterModal = ref( {
    id: '',
    title: '',
    content: '',
})

function editNewsletter(newsletter) {
    store.dispatch('getNewsletter', newsletter.id)
        .then(({data}) => {
            newsletterModal.value = data;
            showNewsletterModal();
        })
}

function showNewsletterModal(){
    showModal.value = true;
}

function onModalClose() {
    newsletterModal.value = {...DEFAULT_NEWSLETTER}
}

</script>

<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="text-3xl font-semibold">Newsletters</h1>
        <button type="button"
                @click="showNewsletterModal()"
                class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
            Add new Newsletter
        </button>
    </div>

    <NewsletterModal v-model="showModal" :newsletter="newsletterModal" @close="onModalClose" />
    <NewslettersTable @clickEdit="editNewsletter" />

</template>
