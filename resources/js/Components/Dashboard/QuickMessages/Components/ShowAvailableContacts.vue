<template>
    <div class="show-contacts-contatiner is-modal">
        <button type="button" class="close-view" @click="$emit('close-available-contacts')">
            Close View
        </button>
        <div class="table-container">
            <table>
                <table>
                    <tr>
                        <th class="action"></th>
                        <th>Name</th>
                        <th>Phone Number</th>
                    </tr>
                    <tr v-for="(item, index) in contacts" :key="index">
                        <td class="action">
                            <input type="checkbox" :value="item.contact_number" v-model="contactsChosen" />
                        </td>
                        <td>
                            {{ item.full_name }}
                        </td>
                        <td>{{ item.contact_number }}</td>
                    </tr>
                </table>
            </table>
        </div>
        <div class="preview">
            <h4>Contacts Chosen:</h4>
            {{ contactsChosen.toString() }}
        </div>

        <div class="button" @click="sendData">
            <!-- TODO: Have button emmit something -->
            <a>Add Contact</a>
        </div>
    </div>
</template>
<script>
export default {
    data: function () {
        return {
            showModal: false,
            contactsChosen: [],
        };
    },
    props: {
        contacts: Object,
    },
    methods: {
        sendData() {
            this.$emit("send-data", this.contactsChosen);
        },
    },
};
</script>
<style scoped>
.is-modal {
    position: absolute;
    top: 0;
    box-shadow: 0 0 0 100vmin rgba(0, 0, 0, 0.804);
    height: 70vh;
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
    padding: 0.5rem;
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



.close-view {
    position: absolute;
    top: 0;
    right: 0;
    background-color: red;
    color: white;
    border: none;
    cursor: pointer;
    padding: 0.5rem;
}

table {
    margin: 0 auto;
    width: 90%;
    border-collapse: collapse;
}

th {
    text-align: center;
    width: 100%;
}

tr {
    text-align: center;
    width: 100%;
}

td {
    text-align: center;
    padding: 1rem;
    width: 100%;
}

.preview {
    width: 100%;
    height: 20vh;
    overflow-y: scroll;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 1rem;
}

h4 {
    width: 100%;
    text-align: center;
}

.action {
    width: 50px;
}
</style>
