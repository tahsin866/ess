<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';

  const items = [
    {
      id: 1,
      applicationNo: 'APP001',
      currentLevel: 'স্তর ১',
      currentMadrasa: 'মাদরাসা নাম ১',
      date: '2024-01-15',
      joiningDate: '2024-02-01',
      status: 'active'
    },
    // Add more items as needed
  ]

  const viewItem = (item) => {
    // Implement view logic
  }

  const updateItem = (item) => {
    // Implement update logic
  }

  const deleteItem = (item) => {
    // Implement delete logic
  }
  </script>


<template>
 <AuthenticatedLayout>
    <div class="bg-white rounded-md shadow-lg overflow-hidden mx-5 mt-5">
      <!-- Table Header -->
      <div class="bg-gradient-to-r from-blue-800 to-blue-600 px-6 py-3">
        <div class="flex justify-between items-center">
  <h2 class="text-xl font-bold text-white">মারকায আবেদন তালিকা</h2>
  <Link
    :href="route('Markaz.Makaj_change')"
    class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition-colors duration-200 flex items-center gap-2"
  >
    <span>মারকাজ পরিবর্তন ফরম</span>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </Link>
</div>

</div>

      <!-- Table Container -->
      <div class="p-6">
        <div class="overflow-x-auto">
          <table class="w-full border border-gray-200 rounded-lg">
            <thead>
              <tr class="bg-gradient-to-r from-[#141E30] to-[#243B55]">
                <th class="px-6 py-4 text-white font-semibold">আবেদন নং</th>
                <th class="px-6 py-4 text-white font-semibold">বর্তমান স্তর</th>
                <th class="px-6 py-4 text-white font-semibold">বর্তমান মাদরাসা</th>
                <th class="px-6 py-4 text-white font-semibold">তারিখ</th>
                <th class="px-6 py-4 text-white font-semibold">জয়েনিং তারিক</th>
                <th class="px-6 py-4 text-white font-semibold">স্টাটাস</th>
                <th class="px-6 py-4 text-white font-semibold">একশন</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in items" :key="item.id" class="border-b hover:bg-gray-50 transition-colors duration-200">
                <td class="px-6 py-4 text-center">{{ item.applicationNo }}</td>
                <td class="px-6 py-4 text-center">{{ item.currentLevel }}</td>
                <td class="px-6 py-4 text-center">{{ item.currentMadrasa }}</td>
                <td class="px-6 py-4 text-center">{{ item.date }}</td>
                <td class="px-6 py-4 text-center">{{ item.joiningDate }}</td>
                <td class="px-6 py-4 text-center">
                  <span class="px-3 py-1 text-sm font-medium rounded-full"
                        :class="{
                          'bg-green-100 text-green-800': item.status === 'active',
                          'bg-red-100 text-red-800': item.status === 'inactive'
                        }">
                    {{ item.status }}
                  </span>
                </td>
                <td class="px-6 py-4">
                  <div class="flex justify-center gap-2">
                    <button @click="viewItem(item)"
                            class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                      <i class="fas fa-eye"></i>
                    </button>
                    <button @click="updateItem(item)"
                            class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors duration-200">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button @click="deleteItem(item)"
                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-200">
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


