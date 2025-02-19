<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue'

const desserts = [
  {
    dessert: 'Frozen Yogurt',
    calories: 159,
    fat: 6,
    carbs: 24,
    protein: 4,
  },
]

const search = ref('')
const items = []
</script>

<template>
 <AuthenticatedLayout>
  <div class="mb-8 mx-5 mt-5">
    <div class="bg-white rounded-md shadow-md">
      <!-- Header Section with Islamic Pattern -->
      <header class="bg-emerald-900 p-3 rounded-t-md islamic-pattern">
        <div class="flex justify-between items-center">
          <h2 class="text-amber-300 text-xl font-medium flex items-center gap-2">
            <i class="fas fa-moon"></i>
            ৪৮তম কেন্দ্রীয় পরীক্ষা: মুতাওয়াসসিতা
          </h2>

          <div class="flex gap-4">
            <Link
              :href="route('students_registration.new_stu_reg_Form')"
              class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-md transition-colors duration-200 flex items-center gap-2"
            >
              <i class="fas fa-user-plus"></i>
              <span>নতুন ছাত্র নিবন্ধন</span>
            </Link>

            <button class="inline-flex items-center px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700 transition-colors">
              <i class="fas fa-list-ul mr-2"></i>
              নিবন্ধন তালিকা
            </button>
          </div>
        </div>
      </header>

      <!-- Search Section with Islamic Design -->
      <div class="p-6 bg-emerald-50">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
          <div class="relative">
            <i class="fas fa-school absolute left-3 top-1/2 -translate-y-1/2 text-emerald-600"></i>
            <select class="w-full pl-10 pr-4 py-2 border-2 border-emerald-200 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
              <option value="" disabled selected>মারহালা নির্বাচন করুন</option>
            </select>
          </div>

          <div class="relative">
            <i class="fas fa-calendar-alt absolute left-3 top-1/2 -translate-y-1/2 text-emerald-600"></i>
            <select class="w-full pl-10 pr-4 py-2 border-2 border-emerald-200 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
              <option value="" disabled selected>পাশের সন নির্বাচন করুন</option>
            </select>
          </div>

          <div class="relative">
            <i class="fas fa-building absolute left-3 top-1/2 -translate-y-1/2 text-emerald-600"></i>
            <select class="w-full pl-10 pr-4 py-2 border-2 border-emerald-200 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
              <option value="" disabled selected>বিগত পরীক্ষার বোর্ড নির্বাচন করুন</option>
            </select>
          </div>

          <div class="relative">
            <i class="fas fa-id-card absolute left-3 top-1/2 -translate-y-1/2 text-emerald-600"></i>
            <input
              v-model="search"
              type="text"
              placeholder="রেজিস্ট্রেশন নম্বর"
              class="w-full pl-10 pr-4 py-2 border-2 border-emerald-200 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
            >
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
          <div class="relative">
            <i class="fas fa-scroll absolute left-3 top-1/2 -translate-y-1/2 text-emerald-600"></i>
            <input
              v-model="search"
              type="text"
              placeholder="রোল নম্বর"
              class="w-full pl-10 pr-4 py-2 border-2 border-emerald-200 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
            >
          </div>

          <div class="md:col-start-4 flex gap-4">
            <button class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition-colors flex items-center gap-2">
              <i class="fas fa-search"></i>
              সার্চ করুন
            </button>
            <button class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors flex items-center gap-2">
              <i class="fas fa-undo"></i>
              রেসেট
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</AuthenticatedLayout>

</template>
