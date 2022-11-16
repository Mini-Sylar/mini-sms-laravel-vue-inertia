<template>
    <div class="main-quick-container ">
        <ShowAvailableContacts v-bind:contacts="contacts" @close-available-contacts="isModalShow" v-if="showModal">
        </ShowAvailableContacts>
        <!-- <ShowAvailableGroup></ShowAvailableGroup> -->
        <div class="add-from-container">
            <a v-on:click="isModalShow">Add from Contacts</a>
            <a>Add from Groups</a>
        </div>
        <div class="message-container">
            <div class="text-container">
                <textarea name="" id="" cols="30" rows="10" placeholder="Enter Message Here"></textarea>
            </div>
            <div class="contacts-container">
                <textarea name="" id="" cols="30" rows="10" placeholder="Enter Contacts Here"></textarea>
            </div>
        </div>
        <div class="send-message">
            <!-- TODO: replace with link -->
            <a href="#">Send Message</a>
        </div>
    </div>
</template>
<script>
import ShowAvailableContacts from './Components/ShowAvailableContacts.vue';
// import ShowAvailableGroup from './Components/ShowAvailableGroup.vue';

export default {
    data() {
        return {
            showModal: false,
            specific_user: 0,
        };
    },
    components: {
        "ShowAvailableContacts": ShowAvailableContacts,
        // "ShowAvailableGroup": ShowAvailableGroup,
    },
    props: {
        contacts: Object,
        groups: Object,
    },
    methods: {
        isModalShow() {
            this.showModal = !this.showModal;
            console.log(this.showModal);
        },
        isModalShowUpdate() {
            this.showModalUpdate = !this.showModalUpdate;
        },
    }
}
</script>
<style scoped>
.main-quick-container {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.add-from-container a {
    display: block;
}

.message-container {
    display: flex;
    gap: 2rem;
    width: 100%;
    height: 50%;
}

textarea {
    width: 100%;
    resize: none;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 1rem;
}

a {
    display: block;
    width: max(20%, 200px);
    height: 100%;
    background-color: #3b82f6;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    border-radius: 25px;
    text-decoration: none;
    cursor: pointer;
    margin-block: 1rem;
}
</style>