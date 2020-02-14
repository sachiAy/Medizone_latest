<template>
<v-parallax src="../assets/backgroundA.jpg" max-height="1000" height="100%">
    <div class="container">
        <v-card
            elevation="24"
            max-width="1000"
            class="mx-auto"
        >
            <v-carousel
                :continuous="false"
                :cycle="cycle"
                :show-arrows="false"
                hide-delimiter-background
                delimiter-icon="mdi-minus"
                height="400"
                >
                    <v-carousel-item
                        v-for="(item,i) in items"
                        :key="i"
                        :src="item.src"
                        >

                    </v-carousel-item>
            </v-carousel>
        </v-card>
    </div>
</v-parallax>
</template>


<script>
  export default {
     
        data () {
            return {
            
                cycle: true,
            
                items: [
                    {
                       
                        src: 'https://image.freepik.com/free-photo/doctor-with-stethoscope-hands-hospital-background_1423-1.jpg'
                    },
                    {
                        src: 'https://image.freepik.com/free-photo/happy-doctor-holding-clipboard-with-patients_1098-2176.jpg'
                    },
                    {
                        src: 'https://image.freepik.com/free-photo/beautiful-smart-asian-doctor-patient-discussing-explaining-something-with-clipboard_7861-1232.jpg',
                    },
                    {
                        src: 'https://image.freepik.com/free-photo/crop-hands-male-patient-doctor-table_23-2147896793.jpg',
                    },
                ],
            }
        },
    }
</script>

