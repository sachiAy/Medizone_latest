<template>
    <v-container >
    <v-spacer>
        <v-card width="500" class="mx-auto">
            <v-card-title>Search</v-card-title>
            <v-card-text>
             <v-combobox
             label="Type your problem"
             :items="items"
             >
             </v-combobox>
            </v-card-text>

            <v-card-text>
             <v-combobox
             label="Type your city"
             :items="items"
             >
             </v-combobox>
            </v-card-text>
        </v-card>
        </v-spacer>
         <div class="row">
        <img v-for="images in images" v-bind:src:"img"/>
        </div>
    </v-container>

   
</template>
<script>
export default {
    data(){
        return{
            items: [
                'hello',
                'hai',
                'Goodbye'
            ],

            images:[ 'https://www.freepik.com/premium-photo/close-up-doctor-front-bright-background_2811134.htm#page=1&query=doctors&position=6'

            ]
        }
    }
}
</script>