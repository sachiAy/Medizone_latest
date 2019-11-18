<template>

  <div>
    <NavBar />
        <v-container>
            <v-card class="container" max-width="600" outlined>
                <v-card-title>Login</v-card-title>

                  <v-form v-model="valid">
                   
                     <v-autocomplete
                     v-model="user.type"
                        :items="type"
                        name="user_type"
                        placeholder="Are you a Doctor/Patient?"
                      ></v-autocomplete>

                      <!-- if user type is 'Doctor' -->
                    <div v-if="user.type === 'Doctor'">
                         
                   

                    <v-text-field 
                    v-model="doctor.reg_no" 
                    label="Registration No" 
                    required
                    ></v-text-field>

                    <v-text-field 
                    :type="show1 ? 'text' : 'password'" 
                    v-model="doctor.password" 
                    label="Password" 
                    required
                    ></v-text-field>
                    </div>

                    <!-- if user type is 'Patient' -->
                    <div v-if="user.type === 'Patient'">
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
                    </div>

                     <!-- if user type is 'Admin' -->
                    <div v-if="user.type === 'Admin'">
                      <v-text-field
                      v-model="admin.admin_no" 
                      label="Admin Number"
                      required
                      ></v-text-field>

                      <v-text-field 
                        :type="show1 ? 'text' : 'password'" 
                        v-model="admin.password" 
                        label="Password" 
                        required
                      ></v-text-field>
                    </div>

                     <!-- if user type is 'Clinic Admin' -->
                    <div v-if="user.type === 'Clinic Admin'">
                      <v-text-field
                      v-model="c_admin.admin_no" 
                      label="Admin Number"
                      required
                      ></v-text-field>

                      <v-text-field 
                        :type="show1 ? 'text' : 'password'" 
                        v-model="c_admin.password" 
                        label="Password" 
                        required
                      ></v-text-field>
                    </div>

                        <div class="error" v-html="error" />
                        <v-row>
                            <v-col >
                                <v-btn 
                                small 
                                @click="Login"
                                >Login</v-btn>
                            </v-col>
                            <v-col>
                                <v-btn 
                                small 
                                @click="clear"
                                >clear</v-btn>
                            </v-col>
                        </v-row>
                        <v-row>
                          <v-col v-if="user.type === 'Patient'">
                            Didn't you Register?
                            <v-btn text primary router-link to="P_SignUp">Sign Up</v-btn>
                          </v-col>
                        </v-row>
                </v-form>
            </v-card>
        </v-container>
    </div>

</template>

<script>

export default {
  data() {
    return {
        valid: true,
        user: { 
          type: ""
          },
        
        type:['Doctor','Patient','Admin','Clinic Admin'],

        doctor: {

          reg_no: "",
          password: "",
          
        },
        patient: {
          email:"",
          password:""
        },

        admin: {
          admin_no:"",
          password:""
        },

        c_admin: {
          admin_no:"",
          password:""
        },

        error: null,
        show1: false,
    }
  },

  methods: {
   Login(event){
        if(this.user.type === 'Doctor'){
          this.$http.post("http://localhost:8000/api/doctorLogin",this.doctor)
        .then(function(response) {   
          if(response.status === 200){
            this.$session.start()
            //this.$session.set(key,value)
            this.$router.push('DoctorProfile')
          }  
        })
        }else if(this.user.type === 'Patient'){
          this.$http.post("http://localhost:8000/api/patientLogin",this.patient)
        .then(function(response) {   
          if(response.status === 200){
            this.$session.start();
            this.$router.push('PatientProfile')
          }  
        })
          console.log(this.user.type)
        }
    },

    clear(event){
      console.log(this.user.type)
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
