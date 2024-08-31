<template>
 
  <div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">TO Do App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
          </ul>
          <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">+ New Task</button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Task</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" v-model="inputTask" placeholder="Task" aria-label="Task" aria-describedby="basic-addon1">
                  </div>
                  <div class="form-floating">
                    <textarea class="form-control" v-model="inputDesc" placeholder="Add task description" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label style="color: rgb(89, 92, 95)" for="floatingTextarea2">Add task description</label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" @click="saveTask" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
import axios from 'axios';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css'
export default {

  data() {
    return {
      inputTask: '',
      inputDesc: '',
    };
  },
  methods: {
    saveTask() {
      const data = {
        task: this.inputTask,
        desc: this.inputDesc
      };
      const baseURL = import.meta.env.VITE_API_BASE_URL;

      axios.post(`${baseURL}add-task`, data)
        .then(() => {
         toast('Task saved successfully!', {
                 "type": "success",
            autoClose: 1000
          });
        })
        .catch(() => {
         toast('Task not saved !', {
           "type": "warning",
            autoClose: 1000
          });
          
        });

        this.inputTask='';
        this.inputDesc='';

        document.querySelector('#exampleModal').close
        setTimeout(window.location.reload.bind(window.location), 2000);

    }
  }
}
</script>
