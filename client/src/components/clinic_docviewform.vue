<template>
  <div  class="CliDoctor_app_detail">
   
     <v-parallax src="../assets/image1.jpg" max-height="1000" height='100%'>
     <v-container >
    <v-card>
        <v-card class="container"  max-width="600" max-height="600" outlined>
        <v-card-title>Clinic Doctor-Appointment details</v-card-title>
       <v-banner single-line>The doctor entering must registered through your clinic </v-banner>
    </v-card>    
        <v-spacer></v-spacer>
        <v-flex justify-top>
             <v-form v-model="valid">
                 <v-text-field 
                    v-model="regnum"  label="Clinic registration-number" required
                 ></v-text-field>
                  <v-text-field 
                    v-model="doc_id"  label="Doctor ID" required
                 ></v-text-field>
                  <v-text-field 
                    v-model="doc_name"  label="Doctor name" placeholder="You can enter only the registered doctor through your clinic" required
                 ></v-text-field>
                  <v-text-field 
                    v-model="appdate"  label="Appointment date" placeholder="Enter the date to view" required
                 ></v-text-field>

                <v-col class="text-center" cols="12" sm="4">
                 <div class="my-2">
                     <v-btn text color="primary" router-link to="/clinic_docviewtable" >Submit</v-btn>
                 </div>
              </v-col>
            </v-form>
        </v-flex>
      </v-card>
     </v-container>
     </v-parallax>
   </div>
  
</template>

<script>
import axios from 'axios'
export default {
data() {
    return {
       regnum:'',
       doc_id:'',
       doc_name:'',
       appdate:''
    }
  },

  methods :{
     mounted(){
         axios.get('http://localhost:8000/api/ClinicRegister', this.regnum)
        .then(response=>{
           this.regnum = response.data.regnum
        })
        .catch(error =>{
           console.log(error)
        });

        axios.get('http://localhost:8000/api/DoctorRegister', this.doc_id,this.doc_name)
        .then(response=>{
           this.doc_id = response.data.doc_id,
           this.doc_name = response.data.doc_name
        })
        .catch(error =>{
           console.log(error)
        });

         axios.get('http://localhost:8000/api/Appointment', this.appdate)
        .then(response=>{
           this.appdate = response.data.appdate
        })
        .catch(error =>{
           console.log(error)
        });
     }
  }
}
</script>

<style>

</style>