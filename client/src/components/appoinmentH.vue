<template>
    <div>
    
      <v-card>
         <h1>Appoinment History</h1>
    <b-table table-variant="info"
        
        :items="items"
        :fields="fields"
        
      
    >
   
    </b-table>
      </v-card>
   
   
  </div>
</template>

<script>



export default {
    name: 'app',
  components: {
    },

    data() {
      return {
        fields: ['appointment_date', 'doctor_name', 'treatments','special notes'],
        items: [
          { appointment_date: 2018/2/4, doctor_name: 'Dickerson', treatments: 'acne',special_notes: '' },
          
        ]
        
       
      };
    }
  

    
};
</script>

<style>

</style>