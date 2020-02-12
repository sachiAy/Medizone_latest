<template>
    <h1>logged out</h1>
</template>

<script>
export default {
    data(){
        return{
          
        }
    },

    
  created(){
       let token = localStorage.getItem('token');
       if(!token){
         return false;
       }
        axios.get("http://localhost:8000/api/logout?api_token="+token)
        .then(response=>{
          localStorage.removeItem('token');
          Event.$emit('logout');
       })
    
  }

}
</script>
