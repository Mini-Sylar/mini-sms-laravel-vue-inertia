<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import QuickLinks from "@/Components/Dashboard/Navigation/QuickLinks.vue";
import Contacts from "@/Components/Dashboard/Contacts/Contacts.vue";
import Groups from "@/Components/Dashboard/Groups/Groups.vue";
import { ref, computed } from 'vue'

const view = ref("contacts");
const changeView = (whichView) => {
    view.value = whichView;
}
const props = defineProps({
    contacts: Object,
})

</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="quick-links">
                            <QuickLinks @groups="changeView('groups')" @contacts="changeView('contacts')"
                                @quick-messages=""></QuickLinks>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Layout Goes Here -->
            <main>
                <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="main-layout">
                                <Contacts v-if="view === 'contacts'" v-bind:contacts="contacts"
                                ></Contacts>
                                <Groups v-else-if="view === 'groups'"></Groups>
    
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </AuthenticatedLayout>
</template>
