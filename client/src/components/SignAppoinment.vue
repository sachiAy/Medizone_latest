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
            <v-form v-on:submit:prevent="submitAppointment">
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
                        <th class="text-center">Doctor ID</th>
                        <th class="text-center">{{guest.dr_id}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Clinic ID</th>
                        <th class="text-center">{{guest.clinic_id}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Appointment Date</th>
                        <th class="text-center">{{guest.appointment_date}}</th>
                      </tr>
                      <tr>
                        <th class="text-center">Patient ID</th>
                        <th class="text-center">{{guest.patient_id}}</th>
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
                          <v-btn color="primary" @click="submitAppointment()">Submit</v-btn>
                        </th>
                        <th class="text-center">
                          <v-btn color="secondary" @click="reset">Update</v-btn>
                        </th>
                      </tr>
                    </tbody>
                  </template>
                </v-simple-table>
                <v-alert v-if="status==true" type="success">I'm a success alert.</v-alert>
              </v-card>
            </v-form>
            <!-- <v-select
          v-model="select"
          :items="items"
          :rules="[v => !!v || 'Item is required']"
          label="Title"
          required
        ></v-select>
    <v-text-field v-model="appoinment_id" :rules="appRules" label="Appoinment no" required></v-text-field>
      
      <v-text-field  v-model="dr_id" :rules="drRules" label="Dr" required></v-text-field>
      <v-text-field v-model="patient_id" :rules="pRules" label="patient id" required></v-text-field>
      <v-text-field v-model="clinic_id" :rules="cRules" label="clinic id" required></v-text-field>
        <v-text-field v-model="first_name" :rules="fnRules" label="first_name" required></v-text-field>
        <v-text-field v-model="last_name" :rules=" lnRules" label="last_name" required></v-text-field>

        <v-text-field
          v-model="mobile_no"
          :counter="10"
          :rules="telRules"
          label="Mobile/Tele Number"
          required
        ></v-text-field>
      <v-radio-group row>
      <v-spacer></v-spacer>
      <v-radio label="NIC"></v-radio>
      <v-radio label="Passport"></v-radio>
      </v-radio-group>
            
        <v-text-field
          v-model="NIC"
          :counter="10"
          :rules="nicRules"
          label="NIC/Passport Number"
          required
        ></v-text-field>

        <v-text-field v-model="email" :rules="emailRules" label="E-mail" required></v-text-field>

        <v-checkbox
          v-model="checkbox"
          :rules="[v => !!v || 'You must agree to continue!']"
          label="Do you agree?"
          required
            ></v-checkbox>-->
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
      dr_id: "",
      clinic_id: "",
      appointment_date: "",
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

    console.log(this.guest);

    //   this.var.id=this.guest.dr_id
    //   console.log(this.var.id)
    //  axios
    //  .get("http://localhost:8000/api/viewDoctorDetails/"+this.guest.dr_id)  //display dr_name
    //  .then(response => {
    //    console.log(response)

    //  });
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
          if (response) {
            this.status = true;
          }
        });
    }
  },
  name: "app",
  components: {}
};
</script>