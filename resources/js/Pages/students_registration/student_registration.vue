<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const isDialogOpen = ref(false)
const totalApplications = ref(120)

const levels = ref([
  {
    id: 1,
    marhala: 'ফযীলত',
    startDate: '',
    endDate: '',
    regLimit: 50
  },
  {
    id: 2,
    marhala: 'সানাবিয়া উলইয়া',
    startDate: '',
    endDate: '',
    regLimit: 40
  },
  {
    id: 3,
    marhala: 'সানাবিয়া',
    startDate: '',
    endDate: '',
    regLimit: 45
  },
  {
    id: 4,
    marhala: 'মুতাওয়াসসিতা',
    startDate: '',
    endDate: '',
    regLimit: 35
  }
])

const handleAddRegistration = (level) => {
  console.log('Adding registration for:', level.marhala)
}

const handleViewDetails = (level) => {
  console.log('Viewing details for:', level.marhala)
}

const toggleDialog = () => {
  isDialogOpen.value = !isDialogOpen.value
}
</script>

<template>
  <AuthenticatedLayout>
    <div class="bg-white rounded-md shadow-lg overflow-hidden mx-5 mt-5">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-800 to-blue-600 p-6">
      <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
          <!-- Stats Card -->
          <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
            <h3 class="text-yellow-300 text-lg font-medium mb-2">
              মোট নিবন্ধিত ছাত্র সংখ্যা
            </h3>
            <span class="text-white text-3xl font-bold">{{ totalApplications }}</span>
          </div>

          <!-- Title -->
          <h2 class="text-white text-2xl font-bold text-center">
            ৪৮তম কেন্দ্রীয় পরীক্ষা: মারহালা তালিকা
          </h2>

          <!-- Settings Button -->
          <div class="flex justify-end">
            <button
              @click="toggleDialog"
              class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition duration-300"
            >
              মারকায সেটিং
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Table Section -->
    <div class="p-6">
      <table class="min-w-full divide-y divide-gray-200">
        <thead>
          <tr>
            <th class="px-6 py-3 bg-gray-50 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">মারহালা</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">শুরুর তারিখ</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">শেষের তারিখ</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">রেজি লিমিট</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">একশন</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="level in levels" :key="level.id">
            <td class="px-6 py-4 whitespace-nowrap">{{ level.marhala }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <input type="date" v-model="level.startDate" class="border rounded px-2 py-1">
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <input type="date" v-model="level.endDate" class="border rounded px-2 py-1">
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <input
                type="number"
                v-model="level.regLimit"
                class="border rounded w-24 px-2 py-1"
              >
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex gap-2">
                <Link
    :href="route('students_registration.student_reg_table')"
     class="bg-green-500 hover:bg-green-600 text-white p-2 rounded transition duration-300"
  >
    <!-- <span>মারকাজ পরিবর্তন ফরম</span> -->
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                  </svg>
  </Link>
                <!-- <button
                  @click="handleViewDetails(level)"
                  class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded transition duration-300"
                >

                </button> -->



                <Link
    href="route('Markaz.Makaj_change')"
    class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition-colors duration-200 flex items-center gap-2"
  >
    <!-- <span>মারকাজ পরিবর্তন ফরম</span> -->
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                  </svg>
  </Link>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Settings Dialog -->
    <div v-if="isDialogOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
      <div class="bg-white rounded-lg w-full max-w-2xl mx-4">
        <div class="flex justify-between items-center p-6 border-b">
          <h3 class="text-xl font-semibold">মারকায সেটিংস</h3>
          <button @click="toggleDialog" class="text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="p-6">
          <!-- Add your settings form here -->
        </div>
        <div class="flex justify-end gap-4 p-6 border-t">
          <button
            @click="toggleDialog"
            class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded transition duration-300"
          >
            বাতিল
          </button>
          <button
            class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded transition duration-300"
          >
            সংরক্ষণ
          </button>
        </div>
      </div>
    </div>
  </div>
  </AuthenticatedLayout>
</template>
