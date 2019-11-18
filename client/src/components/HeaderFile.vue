<template>
  <div>
    <v-toolbar fixed>
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
              rounded
              color="primary"
              dark
              v-for="link in headerLinks"
              :key="link.text"
              router
              :to="link.route"
            >{{link.text}}</v-btn>
         
          </div>
          <v-spacer></v-spacer>
          {{ username }}
      <v-btn icon>
        <v-icon>mdi-account</v-icon>
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
                <v-icon class="black--text" align="center">{{link.icon}}</v-icon>
              </v-list-tile-action>
              <v-list-title-content>
                <v-list-tile-title class="black--text">{{link.text}}</v-list-tile-title>
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

      links: [
        { icon: "mdi-home", text: "HOME", route: "/" },
        { icon: "mdi-needle", text: "DOCTOR", route: "Doctor" },
        { icon: "mdi-needle", text: "CLINICS", route: "Clinic" },
        { icon: "mdi-needle", text: "ABOUTUS", route: "AboutUs" },
        { icon: "mdi-needle", text: "HELP", route: "Doctor" },
        { icon: "mdi-needle", text: "TERMS & CONDITIONS", route: "Terms" },
        

      ],
      headerLinks: [
        { text: "My bookings", route: "Terms" },
        { text: "Medical history", route: "history" },
        { text: "SignIn", route: "SignIn" },

      ]
    };
  }
};
</script>