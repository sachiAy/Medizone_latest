<template>
<div>
   
    <v-card class="container">
         <v-parallax src="../assets/image1.jpg" max-height="1000" height='100%'>
        <v-card-title>
             <h1>Admin Dashboard</h1>
        </v-card-title>
       
    <ul class="row">
        <li class="col">
             <v-btn rounded primary>
                  <router-link to="/AllDoctorProfile_Admin">Doctor Profiles</router-link>
             </v-btn>
        </li>
        <li class="col">
              <v-btn rounded primary>
            <router-link to="/ClinicRegister">Add Clinic</router-link>
              </v-btn>
        </li>
         <li class="col">
              <v-btn rounded primary @click="logout()">
           Logout
              </v-btn>
        </li>
    </ul>
     </v-parallax>
    </v-card>
     
   
</div>
   
</template>

<script>
export default {
    data(){
        return{

        }
    },
     beforeCreate: function() {
        if(!this.$session.exists()){
            this.$router.push('SignIn')
        }
    },
    methods: {
        logout(){
            this.$session.destroy()
            this.$router.push('SignIn')
        }
    }
}
</script>