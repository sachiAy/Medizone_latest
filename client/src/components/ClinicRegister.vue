<template>
  <div  class="registration">
  <br>
    <h2 class="text-center">Clinic Registration</h2>
    <form>
       <br><br>
      <div class="form-group">
        <label for="name" >Clinic name</label>
        <input required v-model="name" type="text" id="name" class="form-control" placeholder="required">
      </div>

       <br>
       <div class="form-group">
        <label for="regnum" >Clinic registration-number</label>
        <input required v-model="regnum" type="text" id="regno" class="form-control" placeholder="required">
      </div>

       <br>
       <div class="form-group">
        <label for="email">Clinic email</label>
        <input required v-model="email" type="text" id="email" class="form-control" placeholder="required">
      </div>

       <br>
       <div class="form-group">
        <label for="addres" >Clinic address</label>
        <input required v-model="addres" type="text" id="addres" class="form-control" placeholder="required">
      </div>

       <br>
       <div class="form-group">
        <label for="contact" >Clinic contact-no</label>
        <input required v-model="contact" type="text" od="contact" class="form-control" placeholder="required">
      </div>

      <br>
       <div class="form-group">
        <label for="pasword" >Password</label>
        <input required v-model="pasword" type="text" id="pasword" class="form-control" placeholder="required">
      </div>

      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios'

export default{
  
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
    this.getcliregdet()
  },
  methods: {
    addNewcliregdet() {
      axios.post('/api/cliregdet',{ clinic_name: this.name, clinic_regno:this.regnum, email:this.email, clinic_address:this.address, contact_no:this.contact, password:this.pasword }).then(res =>{
        this.name='',
        this.regnum='',
        this.email='',
        this.addres='',
        this.contact='',
        this.pasword=''
        console.log(res)
      })
      .catch(er => {
        console.log(er)
      })
    }
  }
}

</script>
