<template>
  <div class="history">
    <v-parallax src="../assets/backgroundA.jpg" max-height="1000" height="100%">
      <v-container>
        <v-spacer></v-spacer>
        <v-card class="container" elevation="12" max-width="100%" max-height="100%" outlined>
          <v-flex justify-top>
            <h1 class="text-xl-center">Medical History</h1>
            <router-link to="/appoinmentH">
              <v-btn
                color="light-blue darken-3"
                class="mr-4"
                @click="AppoinmentHistory"
                id="hisbtn"
              >Appoinment History</v-btn>
            </router-link>

            <v-form class="pt-8" v-model="valid">
              <v-row>
                <v-col cols="5" lg="4">
                  <p class="text-xl-left font-weight-bold">Last Appoinment Details</p>
                </v-col>
              </v-row>
              <v-text-field v-model="BP" label="Blood pressure"></v-text-field>
              <v-text-field v-model="SUGAR" label="Sugar Level"></v-text-field>
              <v-text-field v-model="cholesterol" label="Cholesterol Level"></v-text-field>
              <div align="right">
                <v-btn color="primary" align="right" class="mr-4" @click="update">update</v-btn>
              </div>
            </v-form>
          </v-flex>
        </v-card>
      </v-container>
    </v-parallax>
  </div>
</template>

<script>
export default {
  name: "app",
  components: {},
  data(){
    return{
     isPatient:false
     
    }

  },

  created(){
    Event.$on("isPatient", () => {
      this.isPatient = true;
    });

let token = localStorage.getItem('token');
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
  },

  

};
</script>
<style>
</style>