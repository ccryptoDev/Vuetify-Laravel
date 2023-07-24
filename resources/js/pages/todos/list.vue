<template>
    <v-container>
        <v-row justify="center">
            <v-col cols="12">
                <v-btn
                    color="primary"
                    elevation="2"
                    fab
                    large
                    justify="end"
                    :to="{ name: 'todos-add' }"
                >
                    Add TODO
                </v-btn>
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-col cols="12">
                <v-table fixed-header>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="todo in companiesMapped"
                            :key="`todo_uuid_${todo.uuid}`"
                        >
                            <td>{{ todo.name }}</td>
                            <td>{{ todo.email }}</td>
                            <td>{{ todo.website }}</td>
                            <td>
                                <v-btn
                                    :to="{
                                        name: 'todos-edit',
                                        params: { uuid: todo.uuid },
                                    }"
                                    color="primary"
                                    elevation="2"
                                    fab
                                    justify="start"
                                >
                                    Edit
                                </v-btn>
                            </td>
                            <td>
                                <v-btn
                                    @click="deleteItem(todo.uuid)"
                                    color="primary"
                                    elevation="2"
                                    fab
                                    justify="start"
                                >
                                    Delete
                                </v-btn>
                            </td>
                        </tr>
                    </tbody>
                </v-table>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import { decodeLaravelValidationErrors, isEmpty } from "@/utilities/helper";
export default {
    name: "ListTodos",
    data: () => ({}),
    computed: {
        ...mapGetters("company", ["companiesMapped"]),
        ...mapGetters("status", ["isStatusDataLoaded"]),
    },
    methods: {
    ...mapActions("company", ["deleteTodos"]),
    async deleteItem(id) {
        console.log(id)
      await this.deleteTodos(id)
        .then((r) => {
            this.$router.push({ path: "/todos" });   
        })
        .catch((e) => {
          console.error(e)
        });
    },
  },
};
</script>

<style>
.table {
    padding: 1rem;
    width: 100%;
}
.table thead {
    font-weight: bold;
}
.table td,
.table th {
    padding: 0.8rem;
}
</style>