<template>
  <div>
    <div class="btn-group">
      <a @click="showModal">
        <i class="fas fa-pencil-alt" style="cursor: pointer;"></i>
      </a>
    </div>
    <b-modal v-model="modalVisible" title="Edit Task" ok-title="Save" @ok="saveTask" centered>
      <b-form-group>
        <b-form-input v-model="inputTask" placeholder="Task"></b-form-input>
      </b-form-group>
      <b-form-group>
        <b-form-textarea v-model="inputDesc" placeholder="Add task description" rows="3"></b-form-textarea>
      </b-form-group>
    </b-modal>
  </div>
</template>

<script>
import axios from 'axios';
import { toast } from 'vue3-toastify';
export default {
  data() {
    return {
      inputTask: '',
      inputDesc: '',
      modalVisible: false
    };
  },
  methods: {
    showModal() {
      this.modalVisible = true;
      this.fill();
    },
    fill(){
      const task_id = this.params?.data?.ID;
      const baseURL = import.meta.env.VITE_API_BASE_URL;
      axios.post(`${baseURL}fetch-task`, { task_id: task_id })
      .then((response)=>{
this.inputDesc=response.data.desc;
this.inputTask=response.data.task;      })
    },
    saveTask() {

      const data = {
        task: this.inputTask,
        desc: this.inputDesc,
        task_id: this.params?.data?.ID
      };

      const baseURL = import.meta.env.VITE_API_BASE_URL;

      axios.post(`${baseURL}update-task`, data)
      .then(()=>{
    
         toast('Task updated successfully!', {
                 "type": "success",
            autoClose: 1000
          });
          setTimeout(window.location.reload.bind(window.location), 2000);

        
      }).catch(() => {
         toast('Task not updated !', {
           "type": "warning",
            autoClose: 1000
          });
          
        });

    
    
    
    }
  }
}
</script>

<style>
/* Optional custom styles */
</style>
