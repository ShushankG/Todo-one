<template>
  <!-- The AG Grid component -->
  <div class="gc">

    <ag-grid-vue
      :rowData="rowData"
      :columnDefs="colDefs"
      style="height: 598px; width: 2000px;"
      class="ag-theme-quartz"
      @grid-ready="onGridReady"

    >
    </ag-grid-vue>
  </div>
 
</template>

<script>
import { ref } from 'vue';
import "ag-grid-community/styles/ag-grid.css"; // Mandatory CSS required by the Data Grid
import "ag-grid-community/styles/ag-theme-quartz.css"; // Optional Theme applied to the Data Grid
import { AgGridVue } from "ag-grid-vue3"; // Vue Data Grid Component
import axios from 'axios';
import CustomButtonComponent from "./CustomButtonComponent.vue";
import EditButtonComponent from "./EditBtnComponent.vue";
import DeleteComponent from "./DeleteComponent.vue";

export default {
  components: {
    AgGridVue,
    CustomButtonComponent,
    EditButtonComponent,
    DeleteComponent

    },
  data() {
    return {
       TaskData : [],
      rowData: [],
      colDefs: [
        {
            field: 'ID',
            filter:'agTextColumnFilter'
        },
        {
            field: 'Task',
            filter:'agTextColumnFilter'

            
        },
        {
            field: 'Description',
            filter:'agTextColumnFilter'

          
        },
        {
            field: 'Status',
           
            filter:'agTextColumnFilter',
            cellRenderer: "CustomButtonComponent",
          
        },
        {
            field: 'Delete',
            filter:'agTextColumnFilter',
            cellRenderer: "DeleteComponent",
         
          
          
        },
        {
            field: 'Edit',
            width:345,
            cellRenderer: "EditButtonComponent",

          
        }

      ],
    };
  },
  methods:{
    async getAllTask(){
      const baseURL = import.meta.env.VITE_API_BASE_URL;

      // const baseURL = import.meta.env.VITE_API_BASE_URL;
const endpoint = `${baseURL}task-list`;
console.log('Fetching from:', endpoint);

        await axios.get(`${baseURL}task-list`)
        .then((response)=>{
          this.TaskData= response.data;
          this.rowData = this.TaskData.map(task => ({
          ID: task.id,
          Task: task.task_name,
          Description: task.task_description,
          Status: task.status,
          
        }));
          // console.log(this.TaskData[0]);
        }).catch((error)=>{
          console.log(error);
        });
      },
      onGridReady(params) {
      this.gridApi = params.api;
    }

  },
  mounted(){
    this.getAllTask();
  }
};
</script>

<style>
.gc {
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
