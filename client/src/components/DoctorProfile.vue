<template>
  <v-parallax src="../assets/backgroundA.jpg" max-height="1000" height="100%">
    <v-card :loading="loading" class="mx-auto my-12 container" max-width="1000">
      <v-img
        height="400"
        src="https://image.freepik.com/free-psd/close-up-tablet-held-by-doctor_23-2148316916.jpg"
      ></v-img>

      <v-card-title>{{users.first_name}} {{users.last_name}}</v-card-title>

      <v-card-text>
        <v-row align="center" class="mx-0">
          <v-rating :value="4.5" color="amber" dense half-increments readonly size="14"></v-rating>

          <div class="grey--text ml-4">4.5 (413)</div>
        </v-row>

        <div>Small plates, salads & sandwiches - an intimate setting with 12 indoor seats plus patio seating.</div>
      </v-card-text>

      <v-divider class="mx-4"></v-divider>

      <v-card-title>
        <v-card-actions>
          <ul>
            <li>
              <v-btn color="blue lighten-2">Update Details</v-btn>
              <v-btn color="blue lighten-2">Appointment Schedule</v-btn>
              <v-btn color="blue lighten-2">Add Experiments</v-btn>
            </li>
          </ul>
        </v-card-actions>
      </v-card-title>
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
        .get("http://localhost:8000/api/showDoctor/" + token)
        .then(response => {
          this.users = response.data.doctors;
          Event.$emit("userLoaded", this.users);
        });
    }
  }
};
</script>