<template>
    <div v-if="isDoctor">

    </div>
</template>
<script>
export default {

    data(){
        return{

        }
    },

    created(){

       Event.$on("isDoctor", () => {
      this.isDoctor = true;
    });

       Event.$on("logout", () => {
       this.isDoctor = false;
    });

    let token = localStorage.getItem("token");
    if (token) {
      axios
        .get("http://localhost:8000/api/isDoctor?api_token=" + token)
        .then(response => {
          if (response.data.status == "true") {
            this.isDoctor = true;
            Event.$emit('isDoctor');
          }
        });
    }
    },

    mounted(){

         let token = localStorage.getItem("token");
         axios
        .get("http://localhost:8000/api/retrivePatients?api_token=" + token)
        .then(response => {
         
        });

    },

    methods:{



    }
    
}
</script>