<template>
  <div>
    <a @click =statustoggle :class="['btn', 'btn-sm', 'btn-extra-small', statusText=='Completed' ? 'btn-success' : 'btn-primary']">{{ statusText }}</a>
  </div>
</template>

<script>
import axios from 'axios';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css'
export default {
  props: ['params'],
  data(){
    return{
        isClicked:'',
     
    }
  },
  methods:{
    // changeBtn() {
    //   console.log(this.params.data.ID);
    //     if(this.statusText=='Incomplete') {  
    //        this.isClicked = !this.isClicked;
    //         this.params.value="Complete";
    //     }else{
    //         this.isClicked = !this.isClicked;
    //         this.params.value='Incomplete';
    //     }

    //     },

    statustoggle(){
     
      const task_id =this.params.data.ID;
      const baseURL = import.meta.env.VITE_API_BASE_URL;
      axios.post(`${baseURL}toggle-status`,{ task_id: task_id })
      .then((response)=>{
        if(response.data.task_status=='Incomplete') {  
            this.isClicked=response.data.task_status;
           
           toast('Task status changed !', {
           "type": "success",
            autoClose: 1000,
            "position": "top-center",
            
          });
          setTimeout(window.location.reload.bind(window.location), 2000);

          
          }else{
            this.isClicked=response.data.task_status;
            toast('Task status changed !', {
           "type": "success",
            autoClose: 900,
            "position": "top-center",

          });
          setTimeout(window.location.reload.bind(window.location), 1700);

            }
            
        


      }).catch((error)=>{
        toast('Something went wrong !', {
           "type": "error",
            autoClose: 1000,
            "position": "top-center",
          });
      })


    }

  },
  computed: {
    statusText() {
      return this.params.value === 'Completed' ? 'Completed' : 'Incomplete';
    }
  }

};
</script>

<style scoped>
.btn-extra-small {
  padding: 0.1rem 0.2rem;
  font-size: 0.7rem;
}
</style>
