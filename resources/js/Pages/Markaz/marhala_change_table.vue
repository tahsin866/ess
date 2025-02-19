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
      <!-- Table Header with Islamic Pattern -->
      <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-4 border-b-4 border-gold-500 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('/images/islamic-pattern.png')]"></div>
        <div class="flex justify-between items-center relative z-10">
          <h2 class="text-2xl font-bold text-white font-arabic">মারহালা আবেদন তালিকা</h2>
          <Link
            :href="route('Markaz.marhala_change')"
            class="px-5 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-md transition-all duration-200 flex items-center gap-2 border border-amber-400"
          >
            <span class="font-arabic">মারহালা পরিবর্তন ফরম</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </Link>
        </div>
      </div>

      <!-- Table Container -->
      <div class="p-6 bg-[url('/images/subtle-pattern.png')] bg-opacity-5">
        <div class="overflow-x-auto">
          <table class="w-full border border-emerald-200 rounded-lg">
            <thead>
              <tr class="bg-gradient-to-r from-emerald-900 to-emerald-800">
                <th class="px-6 py-4 text-white font-arabic">আবেদন নং</th>
                <th class="px-6 py-4 text-white font-arabic">বর্তমান স্তর</th>
                <th class="px-6 py-4 text-white font-arabic">বর্তমান মাদরাসা</th>
                <th class="px-6 py-4 text-white font-arabic">তারিখ</th>
                <th class="px-6 py-4 text-white font-arabic">জয়েনিং তারিক</th>
                <th class="px-6 py-4 text-white font-arabic">স্টাটাস</th>
                <th class="px-6 py-4 text-white font-arabic">একশন</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in items" :key="item.id" class="border-b hover:bg-emerald-50 transition-all duration-200">
                <td class="px-6 py-4 text-center">{{ item.applicationNo }}</td>
                <td class="px-6 py-4 text-center">{{ item.currentLevel }}</td>
                <td class="px-6 py-4 text-center">{{ item.currentMadrasa }}</td>
                <td class="px-6 py-4 text-center">{{ item.date }}</td>
                <td class="px-6 py-4 text-center">{{ item.joiningDate }}</td>
                <td class="px-6 py-4 text-center">
                  <span class="px-4 py-1.5 text-sm font-medium rounded-full"
                        :class="{
                          'bg-emerald-100 text-emerald-800': item.status === 'active',
                          'bg-red-100 text-red-800': item.status === 'inactive'
                        }">
                    {{ item.status }}
                  </span>
                </td>
                <td class="px-6 py-4">
                  <div class="flex justify-center gap-3">
                    <button @click="viewItem(item)"
                            class="p-2 text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-200">
                      <i class="fas fa-eye"></i>
                    </button>
                    <button @click="updateItem(item)"
                            class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-all duration-200">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button @click="deleteItem(item)"
                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200">
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


