<template>
  <div v-if="isAdmin">
    <NavBar />
    <v-parallax src="../assets/image1.jpg" max-height="1000" height="100%">
      <v-container>
        <v-card class="container" max-width="600" outlined>
          <v-card-title>Register</v-card-title>

          <v-form v-model="valid" ref="form" lazy-validation @submit.prevent="addNewclireg()" @change="validate">
            <v-text-field v-model="clinic.name" label="Clinic Name" required></v-text-field>

            <v-text-field v-model="clinic.regnum" label="Registration No" required></v-text-field>

            <v-text-field v-model="clinic.email" :rules="emailRules" label="Email" required></v-text-field>

            <v-text-field v-model="clinic.clinic_address" label="Clinic address" required></v-text-field>

            <v-text-field v-model="clinic.contact_no"  :counter="10" :rules="telRules" label="Contact number" required></v-text-field>

            <!-- <v-text-field :type="show1 ? 'text' : 'password'" v-model="clinic.password" label="Password" required></v-text-field> -->

            <div class="error" v-html="error" />
            <v-row>
              <v-col>
                <v-btn small color="primary" type="submit">submit</v-btn>
              </v-col>
              <v-col>
                 <v-btn color="secondary" class="mr-4" @click="reset">Reset Form</v-btn>
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

      
      isAdmin:false,
      valid: true,
      model: null,
      clinic: {
        name: "",
        regnum: "",
        email: "",
        clinic_address: "",
        contact_no: "", 
       
      },
      telRules: [
        v => !!v || "Tele Number is required",
        v => (v && v.length == 10) || "Number must have 10 characters"
      ],
       
      emailRules: [
        v => !!v || "E-mail is required",
        v => /.+@.+\..+/.test(v) || "E-mail must be valid"
      ],

      error: null,
      show1: false,
    };
  },

    created(){

       Event.$on("isAdmin", () => {
      this.isAdmin = true;
    });

       Event.$on("logout", () => {
       this.isAdmin = false;
     });

    let token = localStorage.getItem("token");
    if (token) {
      axios
        .get("http://localhost:8000/api/isAdmin?api_token=" + token)
        .then(response => {
          if (response.data.status == "true") {
            this.isAdmin = true;
            Event.$emit('isAdmin');
          }
        });
    }
    },

  methods: {
    addNewclireg() {
      axios
        .post("http://localhost:8000/api/addNewclireg", this.clinic)
        .then(response => {
          console.log(response);
        });
    },
    reset() {
      this.$refs.form.reset();
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
