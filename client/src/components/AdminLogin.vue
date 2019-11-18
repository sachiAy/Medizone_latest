<template>

  <div>
    <NavBar />
        <v-container>
            <v-card class="container" max-width="600" outlined>
                <v-card-title>Admin Login</v-card-title>

                  <v-form v-model="valid">
                    
                     <v-autocomplete
                     v-model="user.type"
                        :items="types"
                        name="user_type"
                        placeholder="Are you a Admin/Clinic Admin?"
                      ></v-autocomplete>

                      <!-- if user type is 'Doctor' -->
                    <div v-if="user.type === 'Admin'">
                         
                   

                    <v-text-field 
                    v-model="admin.admin_no" 
                    label="Admin Card" 
                    required
                    ></v-text-field>

                    <v-text-field 
                    :type="show1 ? 'text' : 'password'" 
                    v-model="admin.password" 
                    label="Password" 
                    required
                    ></v-text-field>
                    </div>

                    <!-- if user type is 'Patient' -->
                    <div v-if="user.type === 'Clinic Admin'">
                      <v-text-field
                      v-model="clinicAdmin.admin_no"
                      label="Clinic Admin card"
                      required
                      ></v-text-field>

                      <v-text-field 
                        :type="show1 ? 'text' : 'password'" 
                        v-model="clinicAdmin.password" 
                        label="Password" 
                        required
                      ></v-text-field>
                    </div>

                        <div class="error" v-html="error" />
                        <v-row>
                            <v-col >
                                <v-btn 
                                small 
                                @click="doctorLogin"
                                >Login</v-btn>
                            </v-col>
                            <v-col>
                                <v-btn small @click="clear">clear</v-btn>
                            </v-col>
                        </v-row>
                        <v-row>
                          <v-col>
                            Didn't you Register?
                            <v-btn text primary router-link to="SignUp">Sign Up</v-btn>
                          </v-col>
                        </v-row>
                </v-form>
            </v-card>
        </v-container>
    </div>

</template>

<script>

export default {
  components: {
    //NavBar
  },
  data() {
    return {
        valid: true,
        user: { "type": ""},
        //user: { "type": "patient"},
        types:['Admin','Clinic Admin'],

        doctor: {
          
         admin_no: "",
          password: "",
          
        },

        clinicAdmin: {
          admin_no:"",
          password:""
        },

        error: null,
        show1: false,
    }
  },

  methods: {
    doctorLogin(){
      this.$http.post("http://localhost:8000/api/doctorLogin",this.doctor)
        .then(function(response) {
          this.$router.push('about')
        })
    },
    patientRegister(){
      console.log('patient form submitted')
    }
  }

  }


</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.error {
  color: red;
}

.toolbar {
  color: royalblue;
}
</style>
