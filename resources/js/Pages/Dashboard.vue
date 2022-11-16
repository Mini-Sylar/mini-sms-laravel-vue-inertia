<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import QuickLinks from "@/Components/Dashboard/Navigation/QuickLinks.vue";
import Contacts from "@/Components/Dashboard/Contacts/Contacts.vue";
import Groups from "@/Components/Dashboard/Groups/Groups.vue";
import QuickMessages from "@/Components/Dashboard/QuickMessages/QuickMessages.vue";
import { ref } from 'vue'

const view = ref("quick-messages");
const viewTitle = ref("Quick Messages");
const changeView = (whichView) => {
    view.value = whichView;
    viewTitle.value = whichView.charAt(0).toUpperCase() + whichView.slice(1);
}
const props = defineProps({
    contacts: Object,
    groups: Object,
})

</script>

<template>

    <Head :title="viewTitle" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ view.charAt(0).toUpperCase() + view.slice(1) }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="quick-links">
                            <QuickLinks @groups="changeView('groups')" @contacts="changeView('contacts')"
                                @quick-messages="changeView('quick-messages')"></QuickLinks>
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
                                <QuickMessages v-if="view === 'quick-messages'" v-bind:contacts="contacts"
                                    v-bind:groups="groups">
                                </QuickMessages>
                                <Contacts v-if="view === 'contacts'" v-bind:contacts="contacts"></Contacts>
                                <Groups v-else-if="view === 'groups'" v-bind:groups="groups"></Groups>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </AuthenticatedLayout>
</template>
