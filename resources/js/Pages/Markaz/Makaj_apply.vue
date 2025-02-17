<script setup>
import { ref } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import markaz_apply_form from './markaz_apply_form.vue';
import { router } from '@inertiajs/vue3'

const items = ref([
  { id: 1, details: "Example Details 1" },
  { id: 2, details: "Example Details 2" },
]);

const showForm = ref(false);

// Toggle form visibility
const toggleForm = () => {
  showForm.value = !showForm.value;
};

// Handle edit action
const editItem = (item) => {
  console.log("Editing item:", item);
};

// Handle view action
const viewItem = (item) => {
  console.log("Viewing item:", item);
};

// Handle delete action
const deleteItem = (item) => {
  console.log("Deleting item:", item);
};
</script>

<template>
  <AuthenticatedLayout>

      <div class="container mx-auto px-4 mt-5">
        <!-- Form Section -->
        <div v-if="showForm">
          <markaz_apply_form />
          <div class="bg-blue-900 text-white px-4 py-3 flex justify-end mb-3">
            <button
              class="px-3 py-2 text-sm bg-red-600 text-white rounded hover:bg-red-700"
              @click="toggleForm"
              aria-label="Close Form"
            >
            পেছনে যাই
            </button>
          </div>
        </div>

        <!-- Table Section -->
       <div v-else class="bg-white rounded-md shadow-lg">
    <!-- Header with Apply Button -->
    <div class="bg-[#727D73] text-white px-6 py-4 rounded-t-md flex justify-between items-center">
      <h2 class="text-xl font-semibold">আবেদন তালিকা</h2>
      <button
        class="px-4 py-2 text-xl bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200 ease-in-out shadow-md"
        @click="toggleForm"
        aria-label="Apply Now"
      >
        আবেদন করুন
      </button>
    </div>

    <!-- Table Container -->
    <div class="p-6">
      <div class="overflow-x-auto rounded-md border border-gray-200 shadow">
        <table class="w-full">
          <thead>
            <tr class="bg-gradient-to-r from-yellow-500 to-yellow-600">
              <th class="px-4 py-3 text-white font-semibold border-b">আবেদন নং</th>
              <th class="px-4 py-3 text-white font-semibold border-b">আবেদনের তারিখ</th>
              <th class="px-4 py-3 text-white font-semibold border-b">আবেদনের বিস্তারিত</th>
              <th class="px-4 py-3 text-white font-semibold border-b">ছা্ত্র সংখ্যা</th>
              <th class="px-4 py-3 text-white font-semibold border-b">মাদরাসা সংখ্যা</th>
              <th class="px-4 py-3 text-white font-semibold border-b">স্ট্যাটাস</th>
              <th class="px-4 py-3 text-white font-semibold border-b">করনীয়</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            <tr 
              v-for="item in items" 
              :key="item.id" 
              class="hover:bg-gray-50 transition duration-150 ease-in-out border-b"
            >
              <td class="px-4 py-3 text-center">55568</td>
              <td class="px-4 py-3 text-center">05/05/2023</td>
              <td class="px-4 py-3 text-center">{{ item.details }}</td>
               <td class="px-4 py-3 text-center">{{ item.details }}</td>
              <td class="px-4 py-3 text-center">
                <span class="text-blue-600 cursor-pointer hover:text-blue-800">
                  <i class="fas fa-comment-alt"></i>
                </span>
              </td>
              <td class="px-4 py-3 text-center">
                <span class="px-3 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                  মন্জুর হয়েছে
                </span>
              </td>
              <td class="px-4 py-3 text-center">
                <div class="flex justify-center space-x-3">
                  <button
                    class="p-2 text-white bg-gray-600 rounded-lg hover:bg-gray-700 transition duration-200"
                    @click="editItem(item)"
                  >
                    <i class="fas fa-paper-plane"></i>
                  </button>
                  <button
                    class="p-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition duration-200"
                    @click="viewItem(item)"
                  >
                    <i class="fas fa-eye"></i>
                  </button>
                  <button
                    class="p-2 text-white bg-red-500 rounded-lg hover:bg-red-600 transition duration-200"
                    @click="deleteItem(item)"
                  >
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
      </div>
  
  </AuthenticatedLayout>
</template>
