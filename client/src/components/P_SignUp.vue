<template>

  <div>
    <NavBar />
    <v-parallax src="../assets/image1.jpg" max-height="1000" height='100%'>
        <v-container>
            <v-card class="container" max-width="600" outlined>
                <v-card-title>Patient Register</v-card-title>

                  <v-form v-model="valid" @submit.prevent="patientRegister">

                       <v-text-field
                      v-model="patient.first_name"
                      label="First Name"
                      required
                      ></v-text-field>

                       <v-text-field
                      v-model="patient.last_name"
                      label="Last Name"
                      required
                      ></v-text-field>

                      <v-text-field
                      v-model="patient.nic"
                      label="NIC"
                      required
                      ></v-text-field>

                      <v-text-field
                      v-model="patient.birthday"
                      label="Birthday"
                      required
                      ></v-text-field>

                      <!-- <v-select
                    :items="patient.blood_group"
                    label="Blood group"
                    ></v-select> -->
                       <!-- <v-text-field
                      v-model="patient.blood_group"
                      label="blood"
                      required
                      ></v-text-field> -->

                      <v-text-field
                      v-model="patient.address"
                      label="Address"
                      required
                      ></v-text-field>

                      <v-text-field
                      v-model="patient.mobile_no"
                      label="Contact Number"
                      required
                      ></v-text-field>

                      <v-text-field
                      v-model="patient.username"
                      label="Username"
                      required
                      ></v-text-field>

                      <v-text-field
                      v-model="patient.email"
                      label="Email"
                      required
                      ></v-text-field>

                      <v-text-field 
                        :type="show1 ? 'text' : 'password'" 
                        v-model="patient.password" 
                        label="Password" 
                        required
                      ></v-text-field>
               
                        <div class="error" v-html="error" />
                        <v-row>
                            <v-col >
                                <v-btn 
                                small 
                               type="submit"                             
                                >submit</v-btn>
                               
                            </v-col>
                            <v-col>
                                <v-btn 
                                small 
                                @click="clear"
                                >clear</v-btn>
                            </v-col>
                        </v-row>
                            <v-row>
                          <v-col>
                            Did you registered? Then,
                            <v-btn text primary router-link to="SignIn">Sign In</v-btn>
                          </v-col>
                        </v-row>
                </v-form>
            </v-card>
        </v-container>
    </v-parallax>
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
       
        patient: {
          
          first_name:"",
          last_name:"",
          nic:"",
         birthday:"",
          address:"",
         mobile_no:"",
          username:"",
          email:"",
          password:""
        },

        error: null,
        show1: false,
    }
  },

  methods: {
    patientRegister(){
     axios.post("http://localhost:8000/api/PatientRegister",this.patient)
        .then(function(response) {
          console.log(response)
          this.$router.push('/SignIn')
          
        })
    },
    
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
