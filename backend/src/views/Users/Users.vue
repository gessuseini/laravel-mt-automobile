<script setup>
import {ref} from "vue";
import store from "../../store/index.js";
import UserModal from "./UserModal.vue";
import UsersTable from "./UsersTable.vue";

const DEFAULT_USER = {
    id: '',
    name: '',
    email: ''
}

const showModal = ref(false);
const userModal = ref( {
    id: '',
    name: '',
    email: '',
})

function editUser(user) {
    store.dispatch('getSpecificUser', user.id)
        .then(({data}) => {
            userModal.value = data;
            showUserModal();
        })
}

function showUserModal(){
    showModal.value = true;
}

function onModalClose() {
    userModal.value = {...DEFAULT_USER}
}

</script>

<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="text-3xl font-semibold">Users</h1>
        <button type="button"
                @click="showUserModal()"
                class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
            Add new User
        </button>
    </div>

    <UserModal v-model="showModal" :user="userModal" @close="onModalClose" />
    <UsersTable @clickEdit="editUser" />

</template>
