<template>
  <div>
    <v-toolbar fixed color="indigo lighten-5">
      <v-app-bar-nav-icon>
        <v-icon @click.stop="drawer = !drawer">mdi-menu</v-icon>
      </v-app-bar-nav-icon>
      <router-link to="/">
        <v-avatar>
          <img src="../assets/medizone.png" alt="medizone" />
        </v-avatar>
      </router-link>
      <v-toolbar-title>MediZone</v-toolbar-title>
      <v-spacer></v-spacer>
      <div class="text-center">
        <v-btn rounded class="ma-2" tile outlined color="blue darken-4" :disabled="isDisabled">
          <router-link to="/appoinmentH">MY BOOKINGS</router-link>
        </v-btn>
        <v-btn rounded class="ma-2" tile outlined color="blue darken-4" :disabled="isDisabled">
          <router-link to="/history">MEDICAL HISTORY</router-link>
        </v-btn>
        <v-btn rounded class="ma-2" tile outlined color="blue darken-4" v-if="!loggedIn">
          <router-link to="/SignIn">SIGNIN</router-link>
        </v-btn>
        <v-btn v-if="loggedIn" class="ma-2" tile outlined color="blue darken-4">
          <router-link to="/logout">LOGOUT</router-link>
        </v-btn>
      </div>
      <v-spacer></v-spacer>
      <!-- <v-btn v-if="loggedIn">{{users.first_name}}</v-btn> -->

      <v-btn text>
        
         <v-textfield v-if="loggedIn">{{users.first_name}}</v-textfield>
          <v-icon v-if="!loggedIn">mdi-account</v-icon>
       
      </v-btn>
    </v-toolbar>
    <v-navigation-drawer v-model="drawer" absolute temporary>
      <v-list-item-avatar size="250">
        <v-img :src="require('../assets/medizone.png')"></v-img>
      </v-list-item-avatar>
      <v-divider></v-divider>
      <v-list>
        <v-tile>
          <v-list-item v-for="link in links" :key="link.text" router :to="link.route">
            <v-list-tile-action>
              <v-icon class="black--text" align="center">
                {{
                link.icon
                }}
              </v-icon>
            </v-list-tile-action>
            <v-list-title-content>
              <v-list-tile-title class="black--text">
                {{
                link.text
                }}
              </v-list-tile-title>
            </v-list-title-content>
          </v-list-item>
        </v-tile>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>
export default {
  data() {
    return {
      flat: true,
      bg: true,
      drawer: null,
      model: null,
      loggedIn: false,
      isPatient:false,
      users: "",

      links: [
        { icon: "mdi-home", text: "HOME", route: "/" },
        { icon: "mdi-account-multiple", text: "DOCTOR", route: "/AllDoctorProfile"},
        { icon: "mdi-account-multiple", text: "CLINICS", route: "/Clinic" },
        { icon: "mdi-account-search", text: "ABOUTUS", route: "/AboutUs" },
        { icon: "mdi-help-circle-outline", text: "HELP", route: "/Doctor" },
        { icon: "mdi-key", text: "TERMS & CONDITIONS", route: "/Terms" }
      ],
    };
  },

  created() {
    Event.$on("login", () => {
      this.loggedIn = true;
    });

    Event.$on("logout", () => {
      this.loggedIn = false;
    });

    Event.$on("userLoaded", $users => {
      this.users = $users;
    });

     Event.$on("isPatient", () => {
      this.isPatient = true;
    });

     Event.$on("logout", () => {
      this.isPatient = false;
    });

    let token = localStorage.getItem("token");
    
    if (token) {
      this.loggedIn = true;
    }

    axios
      .get("http://localhost:8000/api/getUser?api_token=" + token)  //display username
      .then(response => {
        //console.log(response)
        this.users = response.data.user;
      });

  
   if(token){
    axios.get("http://localhost:8000/api/isPatient?api_token="+token) //check isPatient
     .then(response=> {
       let pStatus=response.data.status;
          localStorage.setItem('Pstatus',pStatus);
          console.log(pStatus)
        Event.$emit('Patient');
      if(pStatus=="true"){
         this.isPatient=true;
       }
    })
   }

let isPatient = localStorage.getItem()

   
  },

  computed:{
    isDisabled(){
      return !this.isPatient;
    }
  }
};
</script>
