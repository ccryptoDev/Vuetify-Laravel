<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="12">
        <v-btn
          color="primary"
          elevation="2"
          fab
          large
          justify="center"
          :to="{ name: 'todos-list' }"
        >
          All Todos
        </v-btn>
      </v-col>
      <v-col cols="12" md="4">
        <TodoForm :isEdit="true" />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import TodoForm from '@/components/todos/todoForm.vue'
export default {
  name: "EditTodo",
  components: {
    TodoForm
  },
};
</script>

<style>
</style>