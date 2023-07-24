<template>
  <div>
    <v-app-bar density="compact">
      <v-app-bar-title>Laravel Test</v-app-bar-title>
      <v-spacer></v-spacer>
      <template v-if="isAuth">
        <v-btn :to="'/todos'">Todos</v-btn>
        <v-btn @click="logout">logout</v-btn>
      </template>
    </v-app-bar>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  computed: {
    ...mapGetters(["isAuth"]),
  },
  methods: {
    ...mapActions(["isAuthCheck"]),
    ...mapActions("user",["logOutUser"]),
    async logout() {
      localStorage.clear();
      location.reload();
      // await this.logOutUser()
      //   .then((r) => {
      //     const res = r.response.data
      //     if (!isEmpty(res)) {
      //       this.$router.push({ path: "/logout" });
      //       // window.location.reload()
      //     } else {
      //       let errors = decodeLaravelValidationErrors(res.errors);
      //       if (errors) {
      //         this.error = errors;
      //       }
      //     }
      //   })
      //   .catch((e) => {
      //   });
    },
  },
  created() {
    this.isAuthCheck();
  },
};
</script>