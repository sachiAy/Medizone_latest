<template>
  <div class="Appoinment">
     <v-alert v-if="!loggedIn" type="error">
    Unauthorized...
    </v-alert>
    <div v-if="loggedIn">
    <v-card>
      <v-card-text class="light-blue darken-3"></v-card-text>
    </v-card>
    <v-parallax src="../assets/backgroundA.jpg" max-height="1000" height="100%">
      <v-container>
        <v-spacer></v-spacer>
        <v-card class="container" elevation="12" max-width="600" max-height="1000" outlined>
          <v-flex justify-top>
            <v-form @submit.prevent="submitAppointment">
              <v-card max-width="500" class="mx-auto">
                <v-list-item>
                  <v-list-item-avatar color="grey"></v-list-item-avatar>
                  <v-list-item-content>
                    <v-list-item-title class="headline">Appointment Details</v-list-item-title>
                    <v-list-item-subtitle>Check following details before submit the appointment</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>

                <v-simple-table>
                  <template v-slot:default>
                    <tbody>
            
                      <tr>
                        <th class="text-center">Doctor Name</th>
                        <th class="text-center">{{guest.dr_name}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Clinic Name</th>
                        <th class="text-center">{{guest.clinic_name}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Appointment Date</th>
                        <th class="text-center">{{guest.appointment_date}}</th>
                      </tr>
                       <tr>
                        <th class="text-center">Appointment time</th>
                        <th class="text-center">{{guest.appointment_time}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Patient's First Name</th>
                        <th class="text-center">{{guest.first_name}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Patient's Last Name</th>
                        <th class="text-center">{{guest.last_name}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Patient's Mobile No</th>
                        <th class="text-center">{{guest.mobile_no}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Patient's Email Address</th>
                        <th class="text-center">{{guest.email}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Patient's NIC</th>
                        <th class="text-center">{{guest.NIC}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">
                        
                             <v-btn color="primary" type="submit">submit</v-btn>

                               <router-link :to="{ name: 'FinalPage', params:{a_id:guest.a_id}}">View appointment
                                </router-link>
                        
                         
                        </th>
                        <!-- <th class="text-center">
                          <v-btn color="secondary" @click="reset">Update</v-btn>
                        </th> -->
                      </tr>
                    </tbody>
                  </template>
                </v-simple-table>
                <v-alert v-if="status==true" type="success">Appointment submitted!</v-alert>
              </v-card>
            </v-form>
          </v-flex>
        </v-card>
      </v-container>
    </v-parallax>
    </div>
  </div>
</template>


<script>
export default {
  data: () => ({
    guest: {
      a_id:"",
      dr_id:"",
      clinic_id:"",
      dr_name: "",
      clinic_name: "",
      appointment_date: "",
      appoinment_time:"",
      patient_id: "",
      first_name: "",
      last_name: "",
      mobile_no: "",
      email: "",
      NIC: ""
    },


    fillable: {
      dr_name: "",
      patient_firstname: "",
      patient_lastname: "",
      clinic_name: ""
    },
    status: false,
    loggedIn: false,
    appoinment_id: "",
    appRules: [v => !!v || "appoinment no is required"],

    drRules: [v => !!v || "dr is required"],

    pRules: [v => !!v || "patient id is required"],

    cRules: [v => !!v || "clinic id is required"],

    fnRules: [v => !!v || "first name is required"],

    lnRules: [v => !!v || "last name is required"],

    telRules: [
      v => !!v || "Tele Number is required",
      v => (v && v.length == 10) || "Number must have 10 characters"
    ],

    nicRules: [
      v => !!v || "NIC Number is required",
      v => (v && v.length == 10) || "Number must have 10 characters"
    ],

    emailRules: [
      v => !!v || "E-mail is required",
      v => /.+@.+\..+/.test(v) || "E-mail must be valid"
    ],

    checkbox: false
  }),

  created() {
    Event.$on("login", () => {
      this.loggedIn = true;
    });

    Event.$on("logout", () => {
      this.loggedIn = false;
    });
    let token = localStorage.getItem("token");
    if (token) {
      this.loggedIn = true;
    }
  },

  mounted() {
    axios
      .get("http://localhost:8000/api/getAppDetails/" + this.$route.params.sid)
      .then(response => {
        this.guest.dr_id = response.data.details.dr_id;
        this.guest.clinic_id = response.data.details.clinic_id;
        this.guest.appointment_date = response.data.details.date;
        this.guest.appointment_time = response.data.details.time;

        let d_id=this.guest.dr_id;
        localStorage.setItem("d_id",d_id);
        let c_id=this.guest.clinic_id
        localStorage.setItem("c_id",c_id);


        console.log(this.guest.dr_id);
      });

    let token = localStorage.getItem("token");
    axios
      .get("http://localhost:8000/api/getUser?api_token=" + token) //display username
      .then(response => {
        this.guest.patient_id = response.data.user.patient_id;
        this.guest.first_name = response.data.user.first_name;
        this.guest.last_name = response.data.user.last_name;
        this.guest.mobile_no = response.data.user.mobile_no;
        this.guest.email = response.data.user.email;
        this.guest.NIC = response.data.user.nic;
      });

      let id=localStorage.getItem("d_id");
     axios
      .get("http://localhost:8000/api/viewDoctorDetails/"+id)  //display dr_name
      .then(response => {
        this.guest.dr_name=response.data.doctors.first_name;
        console.log(response)

      });
      let c_id=localStorage.getItem("c_id");
      axios
      .get("http://localhost:8000/api/getClinicDetails/"+c_id)  //display dr_name
      .then(response => {
        this.guest.clinic_name=response.data.clinic.name;
        console.log(response)

      });


  },

  methods: {
    validate() {
      if (this.$refs.form.validate()) {
        this.snackbar = true;
      }
    },

    submitAppointment() {
      axios
        .post("http://localhost:8000/api/addAppointment", this.guest)
        .then(response => {
          console.log(response)
          if (response) {
            this.status = true;
          }
          this.guest.a_id=response.data.appointment.id;
         console.log(this.guest.a_id)
        });
    }
  },
  name: "app",
  components: {}
};
</script>