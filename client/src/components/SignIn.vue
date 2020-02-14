<template>

  <div>
    <NavBar />
    <v-parallax src="../assets/backgroundA.jpg" max-height="1000" height='100%'>
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
                      v-model="admin.username" 
                      label="Username"
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
                      v-model="clinicadmin.username" 
                      label="Username"
                      required
                      ></v-text-field>

                      <v-text-field 
                        :type="show1 ? 'text' : 'password'" 
                        v-model="clinicadmin.password" 
                        label="Password" 
                        required
                      ></v-text-field>
                    </div>

                        <div class="error" v-html="error" />
                        <v-row>
                            <v-col >
                                <v-btn 
                                small 
                                @click="logItIn()"
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
    </v-parallax>
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
          username:"",
          password:""
        },

        clinicadmin: {
          username:"",
          password:""
        },

        error: null,
        show1: false,
    }
  },

  methods: {

    	logItIn(){
        
        if(this.user.type=="Doctor"){           //doctor login
          	axios.post('http://localhost:8000/api/login',this.doctor)
				.then(response => {
          let Token=response.data.doctor.api_token;
          localStorage.setItem('token',Token);
          //console.log(Token)
          Event.$emit("login"); 
          this.$router.push('/DoctorProfile');
          //this.$router.push({ name: this.doctor, params: {  }});

				});
        }else if(this.user.type=="Patient"){      //patient login
          	axios.post('http://localhost:8000/api/login',this.patient)
				.then(response => {
          let Token=response.data.patient.api_token;
          localStorage.setItem('token',Token);
          Event.$emit("login"); 
          this.$router.push('/PatientProfile');
				});
        }else if(this.user.type=="Admin"){    //main_admin login
        	axios.post('http://localhost:8000/api/login',this.admin)
				.then(response => {
          console.log(response)
          let Token=response.data.main_admin.api_token;
          localStorage.setItem('token',Token);
          Event.$emit("login"); 
          this.$router.push('/PatientProfile');
				});
        }else{    //clinic_admin login
          	axios.post('http://localhost:8000/api/login',this.clinicadmin)
				.then(response => {
          console.log(response)
          let Token=response.data.clinic_admin.api_token;
          localStorage.setItem('token',Token);
          Event.$emit("login"); 
          this.$router.push('/PatientProfile');
				});
        }
			
			}
   },

    clear(event){
      console.log(this.user.type)
    }

}

</script>

