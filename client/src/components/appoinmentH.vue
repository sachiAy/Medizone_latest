<template>
  <div v-if="loggedIn">
    <v-parallax src="../assets/backgroundA.jpg" max-height="1500" height="100%">
      <v-card class="container" elevation="12" max-width="100%" max-height="100%" outlined>
        <h1>Appoinment History</h1>
        <b-table table-variant="info" :items="items" :fields="fields"></b-table>
      </v-card>
    </v-parallax>
  </div>
</template>

<script>
export default {
  name: "app",
  components: {},

  data() {
    return {
      loggedIn:false,
      fields: [
        "appointment_date",
        "doctor_name",
        "treatments",
        "special notes"
      ],
      items: [
        {
          appointment_date: 2018 / 2 / 4,
          doctor_name: "Dickerson",
          treatments: "acne",
          special_notes: "hgjh"
        },
        {
          appointment_date: 2018 / 2 / 4,
          doctor_name: "Dickerson",
          treatments: "acne",
          special_notes: "kjhuyuf"
        },
        {
          appointment_date: 2018 / 2 / 4,
          doctor_name: "Dickerson",
          treatments: "acne",
          special_notes: "kjhuyuf"
        },
        {
          appointment_date: 2018 / 2 / 4,
          doctor_name: "Dickerson",
          treatments: "acne",
          special_notes: "kjhuyuf"
        },
        {
          appointment_date: 2018 / 2 / 4,
          doctor_name: "Dickerson",
          treatments: "acne",
          special_notes: "kjhuyuf"
        },
        {
          appointment_date: 2018 / 2 / 4,
          doctor_name: "Dickerson",
          treatments: "acne",
          special_notes: "kjhuyuf"
        },
        {
          appointment_date: 2018 / 2 / 4,
          doctor_name: "Dickerson",
          treatments: "acne",
          special_notes: "kjhuyuf"
        }
      ]
    };
  },

  created(){
      Event.$on("login", () => {
      this.loggedIn = true;
    });

    Event.$on("logout", () => {
      this.loggedIn = false;
    });
    let token = localStorage.getItem("token");
    if (token) {
      this.loggedIn = true;
    }
  }
};
</script>

<style>
</style>