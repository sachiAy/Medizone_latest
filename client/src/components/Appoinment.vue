<template>

  <div class="Appoinment">
   

    <v-card>
        <v-toolbar-title>Appointment Details</v-toolbar-title>
        
     
      <v-banner single-line>Add following details to submit the appointment</v-banner>
      <v-card-text class="light-blue darken-3"></v-card-text>
    </v-card>
     <v-parallax src="../assets/backgroundA.jpg" max-height="1000" height='100%'>
     
      <v-container >
        <v-spacer></v-spacer>
      <v-card class="container" elevation="12" max-width="600" max-height="1000" outlined>
      <v-flex justify-top>
           
      <v-form ref="form" v-model="valid" lazy-validation v-on:submit:prevent="submitAppointment" @change="validate">
        <v-select
          v-model="guest.title"
          :items="items"
          :rules="[v => !!v || 'Item is required']"
          label="Title"
          required
        ></v-select>

        <v-text-field v-model="guest.name" :counter="10" :rules="nameRules" label="Name" required></v-text-field>

        <v-text-field
          v-model="guest.tel"
          :counter="10"
          :rules="telRules"
          label="Mobile/Tele Number"
          required
        ></v-text-field>
      <!-- <v-radio-group row>
      <v-spacer></v-spacer>
      <v-radio label="NIC"></v-radio>
      <v-radio label="Passport"></v-radio>
      </v-radio-group> -->
            
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



        <v-btn :disabled="!valid" v-if="loggedIn" color="primary" class="mr-4" @click="submitAppointment()">Submit</v-btn>
        <v-btn :disabled="!valid" v-if="!loggedIn" color="primary" class="mr-4" @click="submitGuest()">Submit</v-btn>


        <v-btn color="secondary" class="mr-4" @click="reset">Reset Form</v-btn>
      </v-form>
           </v-flex>
        </v-card>
         </v-container>
         </v-parallax>
        
    
  </div>
</template>


<script>




export default {
   name: "app",
  components: {
    
  },
  data(){
    return {
         valid: true,

         guest:{
           title: "",
           name:"",
            tel: "",
            nicValue: "",
            email:"",
         },
   

    
    items: ["Mr.", "Mrs.", "Miss.", "Rev."],
    nameRules: [
      v => !!v || "Name is required",
      v => (v && v.length <= 10) || "Name must be less than 10 characters"
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
    loggedIn:false,
    }
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
       console.log( this.email);

      
         axios.post("http://localhost:8000/api/getAppointment",this.guest)
          .then(function (response){
            console.log(response)
            
          })
    },

    submitGuest(){

      axios.post("http://localhost:8000/api/submitGuest",this.guest)
      .then()

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

  },
 
};
</script>