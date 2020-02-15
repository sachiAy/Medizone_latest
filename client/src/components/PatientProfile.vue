<template>
  <v-parallax src="../assets/backgroundA.jpg" max-height="1000" height="100%">
    <v-card :loading="loading" class="mx-auto my-12 container" max-width="1000">
      <v-img
        height="400"
        src="https://image.shutterstock.com/image-photo/patient-information-form-document-details-600w-482194549.jpg"
      ></v-img>

      <v-card-title>{{users.first_name}} {{users.last_name}}</v-card-title>

      <v-card-text>
        <v-row align="center" class="mx-0">
          <v-rating :value="4.5" color="amber" dense half-increments readonly size="14"></v-rating>

          <div class="grey--text ml-4">4.5 (413)</div>
        </v-row>

        <div class="my-4 subtitle-1">$ • Italian, Cafe</div>

        <div>Small plates, salads & sandwiches - an intimate setting with 12 indoor seats plus patio seating.</div>
      </v-card-text>

      <v-divider class="mx-4"></v-divider>

      <v-card-title>Appoitnment History</v-card-title>
      <v-card-actions>
        <v-btn color="deep-purple lighten-2" text>Medical History</v-btn>
      </v-card-actions>
    </v-card>
  </v-parallax>
</template>
   

<script>
export default {
  data() {
    return {
      users: "",
      headerLinks: [{ text: "Channel", route: "Channel" }]
    };
  },

  mounted() {
    let token = localStorage.getItem("token");
    if (!token) {
      this.$router.push("/SignIn");
    } else {
      axios
        .get("http://localhost:8000/api/showPatient/" + token)
        .then(response => {
          this.users = response.data.patients;
          Event.$emit("userLoaded", this.users);
        });
    }
  }
};
</script>