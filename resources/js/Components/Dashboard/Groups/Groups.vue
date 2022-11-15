<script >
import AddGroup from './ComponentsGroups/AddGroup.vue';


export default {
    data() {
        return {
            showModal: false,
        };
    },
    components: {
        "AddGroup": AddGroup,
    },
    methods: {
        isModalShow() {
            this.showModal = !this.showModal;
        },
        heardModal() {
            console.log("heard event");
        }
    },
};
</script>
<template lang="">
    <div>
          <a href="#" class="add-contact" v-on:click="isModalShow">Create Group</a>
           <AddGroup v-if="showModal" @close="isModalShow"></AddGroup>
        <div class="table-container">
            <table>
             <tr>
                <th>Group Name</th>
                <th>Group Members</th>
                <th>Actions</th>
             </tr>
             <tr>
                <td>Terence Group</td>
                <td>person 1, person 2</td>
                <td>
                    <div class="actions">
                         <a href="#">Edit</a>
                    <a href="#">Delete</a>
                    </div>
                   
                </td>
             </tr>
            </table>
        </div>
    </div>
</template>

<style lang="">
    
</style>