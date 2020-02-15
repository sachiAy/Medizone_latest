<template>

<div>
    <v-select

    >
    </v-select>
     <v-combobox
          v-model="select"
          :items="items"
          label="Select a favorite activity or create a new one"
          multiple
        ></v-combobox>

    </div>        
        
</template>


<script>
  
    export default {
      

        data(){
            return{
                
                 select: ['Vuetify', 'Programming'],
               
             
               
            }

            
            
             

        },

        methods:{
           
        }

    }


</script>



