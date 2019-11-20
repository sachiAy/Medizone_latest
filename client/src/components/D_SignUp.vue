<template>

  <div>
    <NavBar />
    <v-parallax src="../assets/image1.jpg" max-height="1000" height='100%'>
        <v-container>
            <v-card class="container" max-width="600" outlined>
                <v-card-title>Doctor Register</v-card-title>

                  <v-form v-model="valid">

                     <v-text-field 
                    v-model="doctor.username" 
                    label="Username" 
                    required
                    ></v-text-field>

                    <v-text-field 
                    v-model="doctor.reg_no" 
                    label="Registration No" 
                    required
                    ></v-text-field>

                    <v-text-field 
                    v-model="doctor.first_name" 
                    label="First Name" 
                    required
                    ></v-text-field>

                    <v-text-field 
                    v-model="doctor.last_name" 
                    label="Last Name" 
                    required
                    ></v-text-field>

                    <v-text-field 
                    v-model="doctor.NIC" 
                    label="NIC" 
                    required
                    ></v-text-field>

                    <v-text-field 
                    v-model="doctor.birthday" 
                    label="Birthday" 
                    required
                    ></v-text-field>

                    <v-text-field 
                    v-model="doctor.specialty" 
                    label="Specialty" 
                    required
                    ></v-text-field>

                    <v-text-field 
                    v-model="doctor.contact_no" 
                    label="Contact No" 
                    required
                    ></v-text-field>

                    <v-text-field 
                    v-model="doctor.email" 
                    label="Email" 
                    required
                    ></v-text-field>

                    <v-text-field 
                    :type="show1 ? 'text' : 'password'" 
                    v-model="doctor.password" 
                    label="Password" 
                    required
                    ></v-text-field>
                  

                        <div class="error" v-html="error" />
                        <v-row>
                            <v-col >
                                <v-btn 
                                small 
                                @click="doctorRegister"                               
                                >submit</v-btn>
                            </v-col>
                            <v-col>
                                <v-btn small @click="reset()">clear</v-btn>
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

        doctor: {
          username:"",
          reg_no: "",
          first_name: "",
          last_name:"",
          NIC:"",
          birthday:"",
          specialty:"",
          contact_no:"",
          email: "",
          password: "",
          
        },

        error: null,
        show1: false,
    }
  },
 reset() {
      this.$refs.form.reset();
    },
  methods: {
      doctorRegister(){
        this.$http.post("http://localhost:8000/api/doctorRegister",this.doctor)
          .then(function(response) {
            //this.$router.push('SignIn')
            console.log(response.body.token)
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
