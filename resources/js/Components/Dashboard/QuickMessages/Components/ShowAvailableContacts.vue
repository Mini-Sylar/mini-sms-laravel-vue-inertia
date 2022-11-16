<template>
    <div class="show-contacts-contatiner is-modal">
        <button type="button" class="close-view" @click="$emit('close-available-contacts')">Close View</button>
        <div class="table-container">
            <table>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                    </tr>
                    <tr v-for="(item, index) in contacts" :key="index">
                        <td>
                            <div class="contains-check">
                                <Checkbox value="Name" class="contact-checkbox"></Checkbox> {{ item.full_name }}
                            </div>
                        </td>
                        <td>{{ item.contact_number }}</td>
                    </tr>
                </table>
            </table>
        </div>
        <div class="button">
            <a>Add Contact</a>
        </div>
    </div>
</template>
<script>
import Checkbox from '@/Components/Checkbox.vue';
export default {
    data: function () {
        return {
            showModal: false,
        };
    },
    components: {
        "Checkbox": Checkbox,
    },
    props: {
        contacts: Object,
    },
   
};
</script>
<style scoped>
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

.table-container {
    height: 25vh;
    overflow-y: scroll;
}

.contact-checkbox {
    margin-right: 1rem;
}

.contains-check {
    display: flex;
    align-items: center;
    justify-content: center;
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