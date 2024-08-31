<template>
  <div>
    <div class="btn-group">
      <a
        class="text-danger btn-flat btn-sm"
        @click="openConfirmModal"
      >
        <i class="fa fa-trash"  style="cursor: pointer;"></i>
      </a>
    </div>

    <!-- Confirmation Modal -->
    <b-modal
      v-model="showConfirmModal"
      title="Delete task"
      size="sm"
      ok-title="YES"
      cancel-title="NO"
      ok-variant="danger"
      @ok="handleConfirm"
      @cancel="handleCancel"
      centered
    >
     Are you sure ?
    </b-modal>
  </div>
</template>
<script>
import { ref } from 'vue';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import axios from 'axios';

export default {
  data() {
    return {
      showConfirmModal: false,
    };
  },
  methods: {
    openConfirmModal() {
      this.showConfirmModal = true;
    },
    handleConfirm() {
      // Handle the confirm action (e.g., delete operation)
      this.deletetsk();
    },
    handleCancel() {
  
    },
    deletetsk() {
      const task_id = this.params?.data?.ID;
      if (!task_id) {
        console.error('Task ID is missing');
        return;
      }

      const baseURL = import.meta.env.VITE_API_BASE_URL;
      axios.post(`${baseURL}delete-task`, { task_id: task_id })
        .then(() => {
          toast('Task deleted successfully!', {
            type: 'success',
            autoClose: 1000,
            position: 'top-center',
          });
          setTimeout(() => window.location.reload(), 2000);
        })
        .catch(() => {
          toast('Something went wrong!', {
            type: 'error',
            autoClose: 1000,
            position: 'top-center',
          });
          setTimeout(() => window.location.reload(), 2000);
        });
    },
  },
};

</script>