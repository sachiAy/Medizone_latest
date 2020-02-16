<template>
  <div>
    <v-card class="container">
      <v-parallax src="../assets/image1.jpg" max-height="1000" height="100%">
        <ul class="row">
          <li class="col">
            <v-btn rounded primary>
              <router-link to="/SignIn">SIGN IN</router-link>
            </v-btn>
          </li>
          <li class="col">
            <v-btn rounded primary>
              <router-link :to="{ name: 'Appoinment', params: {sid:this.$route.params}}">GUEST</router-link>
            </v-btn>
          </li>
        </ul>
        <ul class="row">
          <v-card class="container">
            <v-card-title>Why should you Register?</v-card-title>
            <v-card-text>
              <h2>You can get more benefits with this feature...</h2>
            </v-card-text>
            <v-card-text>
              <p>
                Every registered patient can get there Medical History
                <br />and also
                <br />to get a chance to put a rating for their doctor...
              </p>
            </v-card-text>
          </v-card>
        </ul>
      </v-parallax>
    </v-card>
  </div>
</template>

<script>
//import NavBar from "./NavBar"

export default {
  data() {
    return {
      links: [
        { text: "SignIn", route: "SignIn" },
        { text: "Guest", route: "Appoinment" }
      ],
      loggedIn:false

      //dr_id:false,
    };
  },

  created() {
    // Event.$on("dr_id", () => {
    //   this.dr_id = true;
    // });

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

  },

    mounted(){
        let dr_id=localStorage.getItem('dr_id');
      console.log(dr_id);

  },
};
</script>