<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    name: '',
    phone_number: '',
});

const submit = () => {
    form.post(route('add-contact'), {
        onFinish: () => form.reset('name', 'name_confirmation'),
    });
    console.log("submitted");
};
</script>

<template>
    <div class="is-modal show">
        <button type="button" class="close-view" @click="$emit('close')">Close View</button>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                    autocomplete="name" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="contact" value="contact" />
                <TextInput id="contact" type="text" class="mt-1 block w-full" v-model="form.phone_number" required
                    autocomplete="username" />
                <InputError class="mt-2" :message="form.errors.phone_number" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Add Contact
                </PrimaryButton>
            </div>
        </form>
    </div>
</template>


<style scoped>
.hide {
    visibility: hidden;
}

.is-modal {
    position: absolute;
    top: 0;
    box-shadow: 0 0 0 100vmin rgba(0, 0, 0, 0.804);
    height: 50vh;
    background-color: whitesmoke;
    padding: 5rem;
    z-index: 11;
    left: 0;
    right: 0;
    width: 50vw;
    margin: 0 auto;
    top: 15%;
    border-radius: 25px;
}

.close-view {
    position: absolute;
    top: 0;
    right: 0;
    background-color: red;
    color: white;
    border: none;
    cursor: pointer;
    padding: .5rem;
}
</style>