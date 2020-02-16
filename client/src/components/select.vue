<template>

<div>
   
      <!-- <select v-model="user.author">
          <option v-for="item in items">{{item}}</option>
      </select> -->
    <h1>Author: {{user.author}}</h1>

     <v-text-field 
                    v-model="user.author" 
                    label="Contact No" 
                    required
                    ></v-text-field>
   
  
   <v-btn 
                                small 
                                @click="send()"                               
                                >submit</v-btn>
    </div>        
        
</template>


<script>
  
    export default {
      

        data(){
            return{
                user:{
                    author:""
                },
                
                  items: ['Foo', 'Bar', 'Fizz', 'Buzz'], 
             
               
            }
 
        },

        methods:{
            send(){
                axios.post("http://localhost:8000/api/add",{
                    author:""
                })
                .then(response=>{
                    console.log(response);
                })
            }
           
        }

    }


</script>



