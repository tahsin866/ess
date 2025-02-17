<script setup>
import { ref } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
const items = ref([
  { id: 1, details: "Example Details 1" },
  { id: 2, details: "Example Details 2" },
]);

const applyForm = () => {
  console.log("Redirecting to apply form...");
};

const editItem = (item) => {
  console.log("Editing item:", item);
};

const viewItem = (item) => {
  console.log("Viewing item:", item);
};

const deleteItem = (item) => {
  console.log("Deleting item:", item);
};
</script>

<template>
    <AuthenticatedLayout>

  <div class="bg-white shadow-md rounded-md overflow-hidden mt-5 mx-3">
    <!-- Card Header -->
    <div class="bg-blue-900 text-white px-4 py-3 flex justify-end">
      <button
        class="px-3 py-2 text-sm bg-blue-600 text-white rounded hover:bg-blue-700"
        @click="applyForm"
      >
        আবেদন করুন
      </button>
    </div>

    <!-- Table Section -->
    <div class="p-4">
      <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
          <thead class="bg-yellow-500 text-white">
            <tr>
              <th class="p-2 border">আবেদন নং</th>
              <th class="p-2 border">আবেদনের তারিখ</th>
              <th class="p-2 border">আবেদনের বিস্তারিত</th>
              <th class="p-2 border">মন্তব্য</th>
              <th class="p-2 border">স্ট্যাটাস</th>
              <th class="p-2 border">করনীয়</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="item in items"
              :key="item.id"
              class="hover:bg-gray-100"
            >
              <td class="p-2 border text-center">55568</td>
              <td class="p-2 border text-center">05/05/2023</td>
              <td class="p-2 border text-center">{{ item.details }}</td>
              <td class="p-2 border text-center">
                <span class="text-blue-600 cursor-pointer">
                  <i class="fas fa-comment-alt"></i>
                </span>
              </td>
              <td class="p-2 border text-center">
                <span class="px-2 py-1 text-xs font-bold text-green-800 bg-green-200 rounded">
                  মন্জুর হয়েছে
                </span>
              </td>
              <td class="p-2 border text-center">
                <div class="flex justify-center space-x-2">
                  <button
                    class="p-1 text-white bg-gray-600 rounded hover:bg-gray-700"
                    @click="editItem(item)"
                  >
                    <i class="fas fa-paper-plane"></i>
                  </button>
                  <button
                    class="p-1 text-white bg-blue-500 rounded hover:bg-blue-600"
                    @click="viewItem(item)"
                  >
                    <i class="fas fa-eye"></i>
                  </button>
                  <button
                    class="p-1 text-white bg-red-500 rounded hover:bg-red-600"
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






    </AuthenticatedLayout>
</template>
