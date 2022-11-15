<template>
    <div>
        <button type="button" @click="$emit('quick-messages')">Quick Messages</button>
        <button type="button" @click="$emit('contacts')">Contacts</button>
        <button type="button" @click="$emit('groups')">Groups</button>
    </div>
</template>


<script setup>
const emits = defineEmits(['quick-messages', 'contacts', 'groups']);
</script>


<style scoped>
div {
    width: 100%;
    display: flex;
    justify-content: space-evenly;
}
</style>
