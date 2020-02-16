<template>
  <div  class="registration">
   
     <v-parallax src="../assets/image1.jpg" max-height="1000" height='100%'>
      <v-card class="container" max-width="60%" max-height="80%" outlined>
      <v-card-title>
        <h2 class="text-center">Clinic Registration</h2>
      </v-card-title>
       
    <v-form >
      <div class="form-group">
        <label for="name" >Clinic name</label>
        <input required v-model="name" type="text" id="name" class="form-control" placeholder="required">
      </div>

       <div class="form-group">
        <label for="regnum" >Clinic registration-number</label>
        <input required v-model="regnum" type="text" id="regno" class="form-control" placeholder="required">
      </div>

       <div class="form-group">
        <label for="email">Clinic email</label>
        <input required v-model="email" type="email" id="email" class="form-control" placeholder="required">
      </div>

       <div class="form-group">
        <label for="addres" >Clinic address</label>
        <input required v-model="addres" type="text" id="addres" class="form-control" placeholder="required">
      </div>

       <div class="form-group">
        <label for="contact" >Clinic contact-no</label>
        <input required v-model="contact" type="number" id="contact" class="form-control" placeholder="required">
      </div>

       <div class="form-group">
        <label for="pasword" >Password</label>
        <input required v-model="pasword" type="password" id="pasword" class="form-control" placeholder="required">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
     <v-col>
          Already registered? Then click below to login,
          <v-btn text primary router-link to="/clinic_login">Clinic Login</v-btn>
          </v-col>
    </v-form>
    </v-card>
     </v-parallax>
   
  </div>
</template>

<script>
import axios from 'axios'

export default{
  name: 'clinic_reg',
  
  data() {
    return {
       name:'',
       regnum:'',
       email:'',
       addres:'',
       contact:'',
       pasword:''
    }
  },
  mounted() {
    this.getclinic_reg()
  },
  methods: {
    
    addNewcliregdet() {
      axios.post('/api/clinic_reg',{ clinic_name: this.name, clinic_regno:this.regnum, email:this.email, clinic_address:this.address, contact_no:this.contact, password:this.pasword })
      .then(response =>{
        this.name='',
        this.regnum='',
        this.email='',
        this.addres='',
        this.contact='',
        this.pasword=''
        console.log(response)
      })
      .catch(error => {
        console.log(error)
      })
    }
  }
}

</script>
<style scoped>
.error {
  color: red;
}

.toolbar {
  color: royalblue;
}

</style>