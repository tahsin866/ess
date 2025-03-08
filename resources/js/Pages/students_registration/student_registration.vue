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
    <div class="bg-white rounded-sm shadow-lg overflow-hidden mx-5 mt-5">
  <!-- Header Section with Islamic geometric pattern background -->
  <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 p-6 rounded-t-sm shadow-lg">
    <div class="container mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
        <!-- Stats Card -->


        <!-- Title with Islamic decoration -->
        <h2 class="text-white text-2xl font-bold text-center md:text-3xl">
          ৪৮তম কেন্দ্রীয় পরীক্ষা: মারহালা তালিকা
        </h2>

        <!-- Settings Button -->
        <div class="flex justify-end">
          <button
            @click="toggleDialog"
            class="bg-white/30 hover:bg-white/40 text-white px-6 py-3 rounded-sm shadow-lg flex items-center gap-3"
          >
            <i class="fas fa-cog"></i> মারকায সেটিং
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Table Section -->
  <div class="p-6">
    <table class="min-w-full divide-y divide-gray-200 bg-emerald-50 shadow-lg rounded-sm">
      <thead class="bg-emerald-600 text-white">
        <tr>
          <th class="px-6 py-3 text-xl font-medium text-left">মারহালা</th>
          <th class="px-6 py-3 text-xl font-medium text-left">শুরুর তারিখ</th>
          <th class="px-6 py-3 text-xl font-medium text-left">শেষের তারিখ</th>
          <th class="px-6 py-3 text-xl font-medium text-left">মোট নিবন্ধিত ছাত্র সংখ্যা</th>
          <th class="px-6 py-3 text-xl font-medium text-left">একশন</th>
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
            <div class="flex gap-3 justify-start">
              <Link
                :href="route('students_registration.student_reg_table')"
                class="bg-emerald-600 hover:bg-emerald-700 text-white p-3 rounded-sm transition-all"
              >
              নিবন্ধন করুন
              </Link>
              <Link
                :href="route('Markaz.Makaj_change')"
                class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-sm transition-all"
              >
   নিবন্ধিত তালিকা
              </Link>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Settings Dialog with Islamic theme -->
  <div v-if="isDialogOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-2xl mx-4 shadow-lg p-6">
      <div class="flex justify-between items-center border-b border-emerald-200 mb-6">
        <h3 class="text-xl font-semibold text-emerald-800">
          <i class="fas fa-cog ml-2"></i> মারকায সেটিংস
        </h3>
        <button @click="toggleDialog" class="text-gray-500 hover:text-gray-700">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <!-- Dialog content here -->
      <div class="flex justify-end gap-6 p-6 border-t border-emerald-200">
        <button
          @click="toggleDialog"
          class="px-6 py-3 bg-gray-200 hover:bg-gray-300 rounded-md text-gray-800 transition-all"
        >
          বাতিল
        </button>
        <button
          class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-md transition-all"
        >
          সংরক্ষণ
        </button>
      </div>
    </div>
  </div>
</div>

</AuthenticatedLayout>


</template>
