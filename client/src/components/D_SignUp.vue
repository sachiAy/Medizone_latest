<template>
  <div>
    <NavBar />
    <v-parallax src="../assets/image1.jpg" max-height="1000" height="100%">
      <v-container>
        <v-card class="container" max-width="600" outlined>
          <v-card-title>Doctor Register</v-card-title>

          <v-form v-model="valid" ref="form" @submit.prevent="addDoctor">
            <v-text-field v-model="doctor.username" label="Username" required></v-text-field>

            <v-text-field v-model="doctor.reg_no" label="Registration No" required></v-text-field>

            <v-text-field v-model="doctor.first_name" label="First Name" required></v-text-field>

            <v-text-field v-model="doctor.last_name" label="Last Name" required></v-text-field>

            <v-text-field v-model="doctor.NIC" label="NIC" required></v-text-field>
            <v-menu
              ref="menu"
              v-model="menu"
              :close-on-content-click="false"
              transition="scale-transition"
              offset-y
              min-width="290px"
            >
              <template v-slot:activator="{ on }">
                <v-text-field
                  v-model="doctor.birthday"
                  label="Birthday"
                  prepend-icon="event"
                  readonly
                  v-on="on"
                ></v-text-field>
              </template>
              <v-date-picker
                ref="picker"
                v-model="doctor.birthday"
                :max="new Date().toISOString().substr(0, 10)"
                min="1950-01-01"
                @change="save"
              ></v-date-picker>
            </v-menu>
            <v-select
              :items="specialty"
              label="Specialty"
              name="specialty"
              v-model="doctor.specialty"
              :key="doctor.dr_id"
            ></v-select>

            <v-text-field v-model="doctor.contact_no" label="Contact No" required></v-text-field>

            <v-text-field v-model="doctor.email" label="Email" required></v-text-field>

            <v-text-field
              :type="show1 ? 'text' : 'password'"
              v-model="doctor.password"
              label="Password"
              required
            ></v-text-field>

            <div class="error" v-html="error" />
            <v-row>
              <v-col>
                <v-btn small type="submit">submit</v-btn>
              </v-col>
              <v-col>
                <v-btn small @click="reset">
                  Clear
                  <v-icon right>mdi-close-circle</v-icon>
                </v-btn>
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
      model: null,
      doctor: {
        username: "",
        reg_no: "",
        first_name: "",
        last_name: "",
        NIC: "",
        birthday: "",
        specialty: "",
        contact_no: "",
        email: "",
        password: ""
      },
      specialty: [
        "Anaesthetists නිර්වින්දන විශේෂඥ",
        "Arthritis",
        "Cardiologist හෘද රෝග වෛද්‍ය",
        "Chest Specialist පපු විශේෂඥ ",
        "Children Dentist ළමා දන්ත  වෛද්‍ය",
        "Dental Surgeon දන්ත ශල්‍ය වෛද්‍ය",
        "ENT and Neck උගුර කන නාසය හිස සහ බෙල්ල පිලිබඳ වෛද්‍ය",
        "ENT Surgeon උගුර කන නාසය පිලිබඳ ශල්‍ය වෛද්‍ය",
        "Facial Surgeon රුපලාවන්‍ය චර්ම රෝග",
        "GENERAL PHYSICIAN",
        "NEURO PHYSICIAN",
        "NEURO SURGEON",
        "PAEDIATRICIAN  ළමා වෛද්‍ය"
      ],

      error: null,
      show1: false,
      menu: false
    };
  },

  watch: {
    menu(val) {
      val && setTimeout(() => (this.$refs.picker.activePicker = "YEAR"));
    }
  },

  methods: {
    addDoctor() {
      axios
        .post("http://localhost:8000/api/DoctorRegister", this.doctor)
        .then(response => {
          console.log(response);
        });
    },

    reset() {
      this.$refs.form.reset();
    },

    save(date) {
      this.$refs.menu.save(date);
    }
  }
};
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
