<template>
    <div>
        <a href="#" class="add-contact" v-on:click="isModalShow">Add Contact</a>
        <AddContact v-if="showModal" @close="isModalShow"></AddContact>
        <UpdateContact v-if="showModalUpdate" @close-update="isModalShowUpdate" :spec_User="specific_user"
            :contacts="contacts">
        </UpdateContact>
        <div class="table-container">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
                <tr v-for="(item, index) in contacts" :key="index">
                    <td>{{ item.full_name }}</td>
                    <td>{{ item.contact_number }}</td>
                    <td>
                        <div class="actions">
                            <Link v-on:click="getSpecificUserId(item.id)" preserve-state>Edit
                            </Link>
                            <Link :href="route('delete-contact', [item.id])">Delete</Link>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>
<script >
import AddContact from './ComponentsContact/AddContact.vue';
import UpdateContact from './ComponentsContact/UpdateContact.vue';
import { Link } from '@inertiajs/inertia-vue3';

export default {
    data() {
        return {
            showModal: false,
            showModalUpdate: false,
            specific_user: 0,
        };
    },
    components: {
        "AddContact": AddContact,
        "Link": Link,
        "UpdateContact": UpdateContact,
    },
    methods: {
        isModalShow() {
            this.showModal = !this.showModal;
        },
        isModalShowUpdate() {
            this.showModalUpdate = !this.showModalUpdate;
        },
        getSpecificUserId(id) {
            this.specific_user = id;
            this.isModalShowUpdate();
        },
    },
    props: {
        contacts: {
            type: Object,
        },
        spec_User: {
            type: Number,
        },
    }
};
</script>
<style >
.table-container {
    width: 100%;
}

table {
    width: 100%;
}

th {
    width: 20%;
}

td {
    text-align: center;
}

tr {
    width: 100%;
}

.actions {
    display: flex;
    justify-content: center;
    flex-direction: column;
}

.add-contact {
    display: flex;
    justify-content: center;
    padding: 10px 0;
    margin-bottom: 50px;
    border-radius: 25px;
    width: max(20%, 200px);
    background-color: #3b82f6;
    color: #fff;
}
</style>