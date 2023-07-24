<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="12" md="6">
        <v-form
          ref="form"
          v-model="valid"
          lazy-validation
          @submit.prevent="login"
        >
          <v-text-field type="email" v-model="form.email" label="E-mail" />
          <v-text-field
            type="password"
            v-model="form.password"
            label="Password"
          />
          <formValidationMessage
            :error="error"
            :success="success"
            class="mb-3"
          />

          <v-btn color="success" class="mr-4" @click="login"> Login </v-btn>

          <v-btn 
            color="error" 
            class="mr-4" 
            :to="{
                      name: 'signup',
                  }"
          > Signup </v-btn>
        </v-form>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapActions } from "vuex";
import { decodeLaravelValidationErrors, isEmpty } from "@/utilities/helper";
export default {
  data: () => ({
    form: {},
    success: null,
    error: null,
  }),
  methods: {
    ...mapActions("user", ["loginUser"]),
    ...mapActions(["isAuthCheck"]),
    async login() {
      await this.loginUser(this.form)
        .then((r) => {
          const res = r.data
          if (!isEmpty(res)) {
            this.isAuthCheck();
            // this.$router.push({ path: "/todos" });
            location.href='/todos';
          } else {
            alert(r.response.data.message)
          }
        })
        .catch((e) => {
          console.error(e)
        });
    },
    reset() {
      this.form = {
        email: null,
        password: null,
      };
      this.error = null;
    },
  },
  created() {
    this.reset();
  },
};
</script>