<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import LandingVue from '@/Components/LandingPage/Landing.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<template>

    <Head title="Welcome" />

    <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline is-a-link">Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline is-a-link is-register">Register
                </Link>
            </template>
        </div>
        <main>
            <LandingVue></LandingVue>
        </main>

    </div>

</template>

<style>
.is-a-link {
    text-decoration: none;
    font-size: clamp(16px, 1vw, 24px);
}

.is-register {
    color: #1a202c;
    font-weight: 700;
    padding: 10px 20px;
    background-color: #ff8e00;
    border-radius: 25px;
}
</style>