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

    <div class="container-fluid mx-5 mt-8">
    <!-- Form Section -->
    <div v-if="showForm">
      <markaz_apply_form />
      <div class="bg-gradient-to-r from-blue-900 to-blue-800 text-white px-6 py-2 flex justify-end mb-3 rounded-b-md shadow-lg">
        <button
          class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200 flex items-center gap-2 shadow-md"
          @click="toggleForm"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
          </svg>
          পেছনে যাই
        </button>
      </div>
    </div>

    <!-- Table Section -->
    <div v-else class="bg-white rounded-md shadow-xl">
      <!-- Header with Apply Button -->
      <div class="bg-gradient-to-r from-blue-800 to-blue-600 text-white px-8 py-3 rounded-t-md flex justify-between items-center">
        <h2 class="text-2xl font-bold">আবেদন তালিকা</h2>
        <button
          class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200 flex items-center gap-2 shadow-md"
          @click="toggleForm"
        >
          <svg class="w-5 " fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
          </svg>
          আবেদন করুন
        </button>
      </div>

      <!-- Table Container -->
      <div class="p-8">
        <div class="overflow-hidden rounded-md border border-gray-200 shadow-md">
          <table class="w-full">
            <thead>
              <tr class="bg-gradient-to-r from-[#141E30] to-[#243B55]">
                <th class="px-6 py-4 text-white font-semibold">আবেদন নং</th>
                <th class="px-6 py-4 text-white font-semibold">আবেদনের তারিখ</th>
                <th class="px-6 py-4 text-white font-semibold">আবেদনের বিস্তারিত</th>
                <th class="px-6 py-4 text-white font-semibold">ছা্ত্র সংখ্যা</th>
                <th class="px-6 py-4 text-white font-semibold">মাদরাসা সংখ্যা</th>
                <th class="px-6 py-4 text-white font-semibold">স্ট্যাটাস</th>
                <th class="px-6 py-4 text-white font-semibold">করনীয়</th>
              </tr>
            </thead>
            <tbody class="bg-white">
              <tr
                v-for="item in items"
                :key="item.id"
                class="hover:bg-gray-50 transition duration-200 border-b"
              >
                <td class="px-6 py-4 text-center font-medium">55568</td>
                <td class="px-6 py-4 text-center">05/05/2023</td>
                <td class="px-6 py-4 text-center">{{ item.details }}</td>
                <td class="px-6 py-4 text-center">{{ item.details }}</td>
                <td class="px-6 py-4 text-center">
                  <span class="text-blue-600 cursor-pointer hover:text-blue-800">
                    <i class="fas fa-comment-alt"></i>
                  </span>
                </td>
                <td class="px-6 py-4 text-center">
                  <span class="px-4 py-2 text-sm font-medium text-green-800 bg-green-100 rounded-full">
                    মন্জুর হয়েছে
                  </span>
                </td>
                <td class="px-6 py-4 text-center">
                  <div class="inline-flex rounded-lg shadow-sm overflow-hidden">
                    <button
                      class="p-2.5 text-white bg-gray-600 hover:bg-gray-700 transition duration-200"
                      @click="editItem(item)"
                    >
                      <i class="fas fa-paper-plane"></i>
                    </button>
                    <button
                      class="p-2.5 text-white bg-blue-500 hover:bg-blue-600 transition duration-200"
                      @click="viewItem(item)"
                    >
                      <i class="fas fa-eye"></i>
                    </button>
                    <button
                      class="p-2.5 text-white bg-red-500 hover:bg-red-600 transition duration-200"
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
