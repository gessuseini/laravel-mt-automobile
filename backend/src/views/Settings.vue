<script setup>
import { ref, onMounted } from 'vue';
import { useStore } from 'vuex';

const store = useStore();

const settings = ref({
    website_name: '',
    website_logo: '',
    website_icon: '',
    website_phone_number: '',
    website_domain: '',
    website_contact_address: '',
    website_email: '',
    website_facebook: '',
    website_instagram: '',
    website_twitter: '',
    website_linkedin: '',
    website_theme_color: ''
});

const websiteLogo = ref(null);
const websiteIcon = ref(null);
const notification = ref('');

const fetchSettings = () => {
    store.dispatch('fetchGlobalSettings').then(() => {
        settings.value = store.state.globalSettings;
    });
};

const saveSettings = () => {
    const formData = new FormData();
    formData.append('website_name', settings.value.website_name);
    formData.append('website_phone_number', settings.value.website_phone_number);
    formData.append('website_domain', settings.value.website_domain);
    formData.append('website_contact_address', settings.value.website_contact_address);
    formData.append('website_email', settings.value.website_email);
    formData.append('website_facebook', settings.value.website_facebook);
    formData.append('website_instagram', settings.value.website_instagram);
    formData.append('website_twitter', settings.value.website_twitter);
    formData.append('website_linkedin', settings.value.website_linkedin);
    formData.append('website_theme_color', settings.value.website_theme_color);

    if (websiteLogo.value) {
        formData.append('website_logo', websiteLogo.value);
    }

    if (websiteIcon.value) {
        formData.append('website_icon', websiteIcon.value);
    }

    store.dispatch('updateGlobalSettings', formData).then(() => {
        notification.value = 'Settings have been saved successfully.';
        fetchSettings();
        setTimeout(() => {
            notification.value = '';
        }, 6000); // Hide notification after 6 seconds
    });
};

onMounted(() => {
    fetchSettings();
});
</script>

<template>
    <div class="flex flex-col justify-between mb-3 space-y-4">
        <h1 class="text-3xl font-semibold">Settings</h1>
        <div v-if="notification" class="w-1/4 p-4 mb-4 text-white bg-green-600 rounded-md">
            {{ notification }}
        </div>
        <br />
        <br />
        <div class="flex w-full max-w-4xl space-x-4">
            <!-- Left Column -->
            <div class="w-1/2 space-y-4">
                <div>
                    <label class="block mb-2 font-medium text-gray-700">Website Name</label>
                    <input v-model="settings.website_name" type="text" class="block w-full p-2 border rounded-md" />
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700">Website Domain</label>
                    <input v-model="settings.website_domain" type="text" class="block w-full p-2 border rounded-md" />
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700">Website Phone Number</label>
                    <input v-model="settings.website_phone_number" type="text" class="block w-full p-2 border rounded-md" />
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700">Website Contact Address</label>
                    <input v-model="settings.website_contact_address" type="text" class="block w-full p-2 border rounded-md" />
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700">Website Email</label>
                    <input v-model="settings.website_email" type="text" class="block w-full p-2 border rounded-md" />
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700">Facebook Link</label>
                    <input v-model="settings.website_facebook" type="text" class="block w-full p-2 border rounded-md" />
                </div>
            </div>
            <!-- Right Column -->
            <div class="w-1/2 space-y-4">
                <div>
                    <label class="block mb-2 font-medium text-gray-700">Instagram Link</label>
                    <input v-model="settings.website_instagram" type="text" class="block w-full p-2 border rounded-md" />
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700">Twitter Link</label>
                    <input v-model="settings.website_twitter" type="text" class="block w-full p-2 border rounded-md" />
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700">LinkedIn Link</label>
                    <input v-model="settings.website_linkedin" type="text" class="block w-full p-2 border rounded-md" />
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700">Website Logo</label>
                    <input @change="e => websiteLogo.value = e.target.files[0]" type="file" class="block w-full p-2 border rounded-md" />
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700">Website Icon</label>
                    <input @change="e => websiteIcon.value = e.target.files[0]" type="file" class="block w-full p-2 border rounded-md" />
                </div>
                <div>
                    <label class="block mb-2 font-medium text-gray-700">Website Theme Color</label>
                    <input v-model="settings.website_theme_color" type="color" class="block h-10 p-1 border rounded-md" />
                </div>
            </div>
        </div>
        <div>
            <br />
            <br />
            <button @click="saveSettings" class="w-1/4 px-4 py-2 text-white bg-blue-500 rounded-md">Save Settings</button>
        </div>
    </div>
</template>

<style scoped>
.max-w-4xl {
    max-width: 64rem;
}
.mb-3 {
    margin-bottom: 0.75rem;
}
.space-y-4 > * + * {
    margin-top: 1rem;
}
.space-x-4 > * + * {
    margin-left: 1rem;
}
.p-2 {
    padding: 0.5rem;
}
.border {
    border: 1px solid #ccc;
}
.rounded-md {
    border-radius: 0.375rem;
}
.bg-blue-500 {
    background-color: #3b82f6;
}
.text-white {
    color: #fff;
}
.font-semibold {
    font-weight: 600;
}
</style>
