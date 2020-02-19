<template>
  <div class="Appoinment">
    <v-card>
      <v-toolbar-title>Appointment Details</v-toolbar-title>

      <v-banner single-line>Add following details to submit the appointment</v-banner>
      <v-card-text class="light-blue darken-3"></v-card-text>
    </v-card>
    <v-parallax src="../assets/backgroundA.jpg" max-height="1000" height="100%">
      <v-container>
        <v-spacer></v-spacer>
        <v-card class="container" elevation="12" max-width="600" max-height="1000" outlined>
          <v-flex justify-top>
            <v-form
              ref="form"
              v-model="valid"
              lazy-validation
             @submit.prevent="submitAppointment"
              @change="validate"
            >
              <v-select
                v-model="title"
                :items="items"
                :rules="[v => !!v || 'Item is required']"
                label="Title"
                required
              ></v-select>

              <v-text-field
                v-model="guest.first_name"
                :counter="50"
                :rules="nameRules"
                label="First Name"
                required
              ></v-text-field>

              <v-text-field
                v-model="guest.last_name"
                :counter="50"
                :rules="nameRules"
                label="Last Name"
                required
              ></v-text-field>

              <v-text-field
                v-model="guest.patient_id"
                :counter="3"
                :rules="pRules"
                label="patient number"
                required
              ></v-text-field>

              <v-text-field
                v-model="guest.mobile_no"
                :counter="10"
                :rules="telRules"
                label="Mobile/Tele Number"
                required
              ></v-text-field>

              <v-text-field v-model="guest.email" :rules="emailRules" label="E-mail" required></v-text-field>
              <v-text-field v-model="guest.NIC" :rules="nicRules" label="NIC" required></v-text-field>

              <v-checkbox
                v-model="checkbox"
                :rules="[v => !!v || 'You must agree to continue!']"
                label="Do you agree?"
                required
              ></v-checkbox>

              <v-btn
                :disabled="!valid"
                v-if="!loggedIn"
                color="primary"
                class="mr-4"
                type="submit"
              >Submit</v-btn>
              <v-alert v-if="status==true" type="success">Appointment submitted!</v-alert>
              <v-btn color="secondary" class="mr-4" @click="reset">Reset Form</v-btn>
            </v-form>
            <v-card>
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
                    <!-- <tr> 
                      <th class="text-center">Patient's First Name</th>
                      <th class="text-center">{{save.first_name}}</th>
                    </tr>
                    <tr>
                      <th class="text-center">Patient's Last Name</th>
                      <th class="text-center">{{save.last_name}}</th>
                    </tr>
                    <tr>
                      <th class="text-center">Patient's Mobile No</th>
                      <th class="text-center">{{save.mobile_no}}</th>
                    </tr>
                    <tr>
                      <th class="text-center">Patient's Email Address</th>
                      <th class="text-center">{{save.email}}</th>
                    </tr>
                    <tr>
                      <th class="text-center">Patient's NIC</th>
                      <th class="text-center">{{save.NIC}}</th>
                    </tr>
                    <tr>
                      <th class="text-center">
                        <v-btn color="primary" type="submit">submit</v-btn>
                      </th>
                      <th class="text-center">
                        <v-btn color="secondary" @click="reset">Update</v-btn>
                      </th>
                    </tr>-->
                  </tbody>
                </template>
              </v-simple-table>
            </v-card>
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
  data() {
    return {
      valid: true,

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

      save: {
        dr_name:"",
        clinic_name:"",
        appointment_date:"",
        appointment_time:"",
        name:"",
       tel:"",
        email:"",
       nicValue:"",
      
      },
      status: false,

      items: ["Mr.", "Mrs.", "Miss.", "Rev."],
      nameRules: [
        v => !!v || "Name is required",
        v => (v && v.length <= 50) || "Name must be less than 50 characters"
      ],
       pRules: [
        v => !!v || "Name is required",
        v => (v && v.length <= 3) || "patient_id must be less than 3 characters"
      ],

      telRules: [
        v => !!v || "Tele Number is required",
        v => (v && v.length == 10) || "Number must have 10 characters"
      ],

      nicRules: [
        v => !!v || "NIC/Passport Number is required",
        v => (v && v.length == 10) || "Number must have 10 characters"
      ],
      emailRules: [
        v => !!v || "E-mail is required",
        v => /.+@.+\..+/.test(v) || "E-mail must be valid"
      ],

      checkbox: false,
      loggedIn: false
    };
  },

  mounted(){

     axios
      .get("http://localhost:8000/api/getAppDetails/" + this.$route.params.sid)
      .then(response => {
        //this.guest.dr_id = response.data.details.dr_id;
        //this.guest.clinic_id = response.data.details.clinic_id;
        this.guest.appointment_date = response.data.details.date;
        this.guest.appointment_time = response.data.details.time;
        

        console.log(this.guest.appointment_date)

        let d_id=response.data.details.dr_id;
        localStorage.setItem("d_id",d_id);
        let c_id=response.data.details.clinic_id;
        localStorage.setItem("c_id",c_id);
    
        console.log(d_id);
        
      });
  },

  methods: {
    validate() {
      if (this.$refs.form.validate()) {
        this.snackbar = true;
      }
    },
    reset() {
      this.$refs.form.reset();
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
    },
    getAppointmentDetails(){
      axios
      .get("http://localhost:8000/api/getAppDetails/" + this.$route.params.sid)
      .then(response => {
        this.guest.dr_id = response.data.details.dr_id;
        this.guest.clinic_id = response.data.details.clinic_id;
        this.save.appointment_date = response.data.details.date;
        this.save.appointment_time = response.data.details.time;

        let d_id=response.data.details.dr_id;
        localStorage.setItem("d_id",d_id);
        let c_id=this.response.data.details.clinic_id;
        localStorage.setItem("c_id",c_id);
    
        console.log(do_id);
      });
      
      },

    submitGuest() {
     
        
          this.save = this.guest;
        
    }
  },

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
  }
};
</script>