<template>
    <div class="main-quick-container ">
        <ShowAvailableContacts v-bind:contacts="contacts" @close-available-contacts="isModalShow" v-if="showModal"
            @send-data="receivedIndividualContacts">
        </ShowAvailableContacts>
        <ShowAvailableGroup v-bind:groups="groups" @close-available-group="isModalShowGroup" v-if="showModalGroup"
            @send-data="receivedIndividualContacts">
        </ShowAvailableGroup>
        <!-- <ShowAvailableGroup></ShowAvailableGroup> -->
        <div class="add-from-container">
            <a v-on:click="isModalShow">Add from Contacts</a>
            <a v-on:click="isModalShowGroup">Add from Groups</a>
        </div>
        <div class="message-container">
            <div class="text-container">
                <textarea name="" id="" cols="30" rows="10" placeholder="Enter Message Here"></textarea>
            </div>
            <div class="contacts-container">
                <textarea name="" id="" cols="30" rows="10" placeholder="Enter Contacts Here"
                    v-model="contactsChosen"></textarea>
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
import ShowAvailableGroup from './Components/ShowAvailableGroup.vue';

export default {
    data() {
        return {
            showModal: false,
            showModalGroup: false,
            specific_user: 0,
            contactsChosen: [],
        };
    },
    components: {
        "ShowAvailableContacts": ShowAvailableContacts,
        "ShowAvailableGroup": ShowAvailableGroup,
    },
    props: {
        contacts: Object,
        groups: Object,
    },
    methods: {
        isModalShow() {
            this.showModal = !this.showModal;
        },
        isModalShowGroup() {
            this.showModalGroup = !this.showModalGroup;
        },
        receivedIndividualContacts(data) {
            console.log("heard emit");
            this.contactsChosen += data + ", ";
            console.log(data);
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