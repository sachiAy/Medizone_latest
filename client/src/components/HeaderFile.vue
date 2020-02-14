<template>
  <div>
    <v-toolbar fixed color="indigo lighten-5">
      <v-app-bar-nav-icon>
        <v-icon @click.stop="drawer = !drawer">mdi-menu</v-icon>
      </v-app-bar-nav-icon>
      <v-avatar>
        <img src="../assets/medizone.png" alt="medizone" />
      </v-avatar>
      <v-toolbar-title>MediZone</v-toolbar-title>
      <v-spacer></v-spacer>
      <div class="text-center">
        <v-btn
          class="ma-2" tile outlined color="blue darken-4"
          v-for="link in headerLinks"
          :key="link.text"
          router
          :to="link.route"
          >{{ link.text }}</v-btn>
          <v-btn  
            rounded
            class="ma-2" tile outlined color="blue darken-4"
            v-if="!loggedIn"
            >
            <router-link to="SignIn">
          SignIn
        </router-link>
           </v-btn>
              <v-btn  v-if="loggedIn"
             class="ma-2" tile outlined color="blue darken-4"
                  ><router-link to="logout">logout</router-link> </v-btn>
      </div>
      <v-spacer></v-spacer>
    
      <v-btn icon>
        <router-link to="PatientProfile">
          <v-icon>mdi-account</v-icon>
        </router-link>
        
      </v-btn>
    </v-toolbar>
    <v-navigation-drawer v-model="drawer" absolute temporary>
      <v-list-item-avatar size="250">
        <v-img :src="require('../assets/medizone.png')"></v-img>
      </v-list-item-avatar>
      <v-divider></v-divider>
      <v-list>
        <v-tile>
          <v-list-item
            v-for="link in links"
            :key="link.text"
            router
            :to="link.route"
          >
            <v-list-tile-action>
              <v-icon class="black--text" align="center">{{
                link.icon
              }}</v-icon>
            </v-list-tile-action>
            <v-list-title-content>
              <v-list-tile-title class="black--text">{{
                link.text
              }}</v-list-tile-title>
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
      loggedIn:false,

      links: [
        { icon: "mdi-home", text: "HOME", route: "/" },
        {
          icon: "mdi-account-multiple",
          text: "DOCTOR",
          route: "AllDoctorProfile"
        },
        { icon: "mdi-account-multiple", text: "CLINICS", route: "Clinic" },
        { icon: "mdi-account-search", text: "ABOUTUS", route: "AboutUs" },
        { icon: "mdi-help-circle-outline", text: "HELP", route: "Doctor" },
        { icon: "mdi-key", text: "TERMS & CONDITIONS", route: "Terms" }
      ],
      headerLinks: [
        { text: "My bookings", route: "appoinmentH" },
        { text: "Medical history", route: "history" },
     
      ]
    };
  },

  // mounted:{
  //   logout(){
  //      let token = localStorage.getItem('token');
  //       axios.get("http://localhost:8000/api/logout?api_token="+token)
  //       .then(response=>{
  //         localStorage.removeItem('token');
  //      })
  //   }
  // },

  created(){

    Event.$on('login', ()=>{
      this.loggedIn=true;
    });

     Event.$on('logout', ()=>{
      this.loggedIn=false;
    });
    
       let token = localStorage.getItem('token');
      if(token){
        this.loggedIn=true;
      }
  }

    // mounted(){
    //    let token = localStorage.getItem('token');
    //    axios.get("http://localhost:8000/api/logout?api_token="+token)
    //    .then(response=>{
    //      localStorage.removeItem('token');
    //    })
     
      
    // },
};
</script>
