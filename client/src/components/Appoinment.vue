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
              v-on:submit:prevent="submitAppointment"
              @change="validate"
            >
              <v-select
                v-model="guest.title"
                :items="items"
                :rules="[v => !!v || 'Item is required']"
                label="Title"
                required
              ></v-select>

              <v-text-field
                v-model="guest.name"
                :counter="50"
                :rules="nameRules"
                label="Name"
                required
              ></v-text-field>

              <v-text-field
                v-model="guest.tel"
                :counter="10"
                :rules="telRules"
                label="Mobile/Tele Number"
                required
              ></v-text-field>

              <v-text-field
                v-model="guest.nicValue"
                :counter="10"
                :rules="nicRules"
                label="NIC/Passport Number"
                required
              ></v-text-field>

              <v-text-field v-model="guest.email" :rules="emailRules" label="E-mail" required></v-text-field>

              <v-checkbox
                v-model="guest.checkbox"
                :rules="[v => !!v || 'You must agree to continue!']"
                label="Do you agree?"
                required
              ></v-checkbox>

              <v-btn
                :disabled="!valid"
                v-if="!loggedIn"
                color="primary"
                class="mr-4"
                @click="submitGuest()"
              >Submit</v-btn>
              <v-btn color="secondary" class="mr-4" @click="reset">Reset Form</v-btn>
            </v-form>
            <v-card>
              <v-simple-table>
                <template v-slot:default>
                  <tbody>
                    <tr>
                      <th class="text-center">Doctor Name</th>
                      <th class="text-center">{{save.dr_name}}</th>
                    </tr>
                    <tr>
                      <th class="text-center">Clinic Name</th>
                      <th class="text-center">{{save.clinic_name}}</th>
                    </tr>
                    <tr>
                      <th class="text-center">Appointment Date</th>
                      <th class="text-center">{{save.appointment_date}}</th>
                    </tr>
                    <tr>
                      <th class="text-center">Appointment time</th>
                      <th class="text-center">{{save.appointment_time}}</th>
                    </tr>
                    <tr>
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
                    </tr>
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
        title: "",
        name: "",
        tel: "",
        nicValue: "",
        email: ""
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

      items: ["Mr.", "Mrs.", "Miss.", "Rev."],
      nameRules: [
        v => !!v || "Name is required",
        v => (v && v.length <= 50) || "Name must be less than 50 characters"
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
      console.log(this.name);
      console.log(this.tel);
      console.log(this.nicValue);
      console.log(this.email);
    },
    getAppointmentDetails(){
      axios
      .get("http://localhost:8000/api/getAppDetails/" + this.$route.params.sid.sid)
      .then(response => {
        this.guest.dr_id = response.data.details.dr_id;
        this.guest.clinic_id = response.data.details.clinic_id;
        this.name.appointment_date = response.data.details.date;
        this.name.appointment_time = response.data.details.time;

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
        this.save.dr_name=response.data.doctors.first_name;
        console.log(response)

      });
      let c_id=localStorage.getItem("c_id");
      axios
      .get("http://localhost:8000/api/getClinicDetails/"+c_id)  //display dr_name
      .then(response => {
        this.save.clinic_name=response.data.clinic.name;
        console.log(response)

      });
  }
};
</script>