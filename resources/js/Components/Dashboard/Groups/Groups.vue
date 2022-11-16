<script >
import AddGroup from './ComponentsGroups/AddGroup.vue';
import UpdateGroup from './ComponentsGroups/UpdateGroup.vue'
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
        "AddGroup": AddGroup,
        "Link": Link,
        "UpdateGroup": UpdateGroup,
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
        groups: {
            type: Object,
        },
        spec_User: {
            type: Number,
        },
    }

};
</script>
<template lang="">
    <div>
          <a href="#" class="add-contact" v-on:click="isModalShow">Create Group</a>
          <AddGroup v-if="showModal" @close="isModalShow"></AddGroup>
        <UpdateGroup v-if="showModalUpdate" @close-update="isModalShowUpdate" :spec_User="specific_user" :groups="groups">
        </UpdateGroup>
        <div class="table-container">
            <table>
             <tr>
                <th>Group Name</th>
                <th>Group Members</th>
                <th>Actions</th>
             </tr>
            <tr v-for="(item, index) in groups" :key="index">
                    <td>{{ item.group_name }}</td>
                    <td>{{ item.contact_number }}</td>
                    <td>
                        <div class="actions">
                            <Link v-on:click="getSpecificUserId(item.id)"
                                preserve-state>Edit
                            </Link>
                            <Link :href="route('delete-group', [item.id])">Delete</Link>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>

<style lang="">
    
</style>