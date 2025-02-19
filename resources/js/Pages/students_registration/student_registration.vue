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
    <!-- Header Section with Islamic geometric pattern background -->
    <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 p-6 islamic-pattern">
      <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
          <!-- Stats Card -->
          <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 border-r border-white/20">
            <h3 class="text-amber-300 text-lg font-medium mb-2">
              <i class="fas fa-users-class ml-2"></i> মোট নিবন্ধিত ছাত্র সংখ্যা
            </h3>
            <span class="text-white text-3xl font-bold">{{ totalApplications }}</span>
          </div>

          <!-- Title with Islamic decoration -->
          <h2 class="text-white text-2xl font-bold text-center">
            ☪️ ৪৮তম কেন্দ্রীয় পরীক্ষা: মারহালা তালিকা
          </h2>

          <!-- Settings Button -->
          <div class="flex justify-end">
            <button
              @click="toggleDialog"
              class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg flex items-center gap-2"
            >
              <i class="fas fa-cog"></i> মারকায সেটিং
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Table Section -->
    <div class="p-6">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-emerald-50">
          <tr>
            <th class="px-6 py-3 text-right text-xl font-medium text-emerald-700">
              <i class="fas fa-school ml-2"></i> মারহালা
            </th>
            <th class="px-6 py-3 text-right text-xl font-medium text-emerald-700">
              <i class="fas fa-calendar-alt ml-2"></i> শুরুর তারিখ
            </th>
            <th class="px-6 py-3 text-right text-xl font-medium text-emerald-700">
              <i class="fas fa-calendar-check ml-2"></i> শেষের তারিখ
            </th>
            <th class="px-6 py-3 text-right text-xl font-medium text-emerald-700">
              <i class="fas fa-user-graduate ml-2"></i> রেজি লিমিট
            </th>
            <th class="px-6 py-3 text-right text-xl font-medium text-emerald-700">
              <i class="fas fa-tasks ml-2"></i> একশন
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="level in levels" :key="level.id">
            <td class="px-6 py-4">{{ level.marhala }}</td>
            <td class="px-6 py-4">{{ level.startDate }}</td>
            <td class="px-6 py-4">{{ level.endDate }}</td>
            <td class="px-6 py-4">
              <span class="font-semibold">{{ level.regLimit }}</span>
            </td>
            <td class="px-6 py-4">
              <div class="flex gap-2">
                <Link
                  :href="route('students_registration.student_reg_table')"
                  class="bg-emerald-500 hover:bg-emerald-600 text-white p-2 rounded"
                >
                  <i class="fas fa-plus-circle"></i>
                </Link>
                <Link
                  :href="route('Markaz.Makaj_change')"
                  class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded"
                >
                  <i class="fas fa-file-alt"></i>
                </Link>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Settings Dialog with Islamic theme -->
    <div v-if="isDialogOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
      <div class="bg-white rounded-lg w-full max-w-2xl mx-4 islamic-border">
        <div class="flex justify-between items-center p-6 border-b border-emerald-200">
          <h3 class="text-xl font-semibold text-emerald-800">
            <i class="fas fa-cog ml-2"></i> মারকায সেটিংস
          </h3>
          <button @click="toggleDialog" class="text-gray-500 hover:text-gray-700">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <!-- Dialog content here -->
        <div class="flex justify-end gap-4 p-6 border-t border-emerald-200">
          <button
            @click="toggleDialog"
            class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded"
          >
            বাতিল
          </button>
          <button
            class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded"
          >
            সংরক্ষণ
          </button>
        </div>
      </div>
    </div>
  </div>
</AuthenticatedLayout>


</template>
