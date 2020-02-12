<template>

  <div>
    <NavBar />
    <v-parallax src="../assets/image1.jpg" max-height="1000" height='100%'>
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
                      v-model="c_admin.c_admin_no" 
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
          admin_no:"",
          password:""
        },

        c_admin: {
          c_admin_no:"",
          password:""
        },

        error: null,
        show1: false,
    }
  },

  methods: {

    	logItIn(){
				axios.post('http://localhost:8000/api/login',this.doctor)
				.then(response => {
          let Token=response.data.doctor.api_token;
          localStorage.setItem('token',Token);
          console.log(Token);
          this.$router.push('/DoctorProfile');
				});
			}
   },


    clear(event){
      console.log(this.user.type)
    }

}

</script>

