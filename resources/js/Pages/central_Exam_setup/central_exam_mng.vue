<template>
    <AuthenticatedLayout>
        <div class="p-6 bg-[#f8f9fa] min-h-screen">
      <!-- Filter Section -->
      <div class="bg-emerald-50 border border-emerald-100 p-6 rounded-sm mb-6 shadow-sm">
        <h2 class="font-bold text-xl mb-6 text-emerald-800 flex items-center">
          <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
          </svg>
          ফিল্টার করুন
        </h2>

        <div class="grid grid-cols-12 gap-6">
          <div class="col-span-12 md:col-span-6">
            <label class="block text-emerald-700 text-sm font-medium mb-2">কেন্দ্রীয় পরীক্ষার নাম</label>
            <input
              type="text"
              v-model="filters.examName"
              class="w-full  border-emerald-200 rounded-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
              placeholder="কেন্দ্রীয় পরীক্ষার নাম লিখুন"
            />
          </div>

          <div class="col-span-12 md:col-span-6">
            <label class="block text-emerald-700 text-sm font-medium mb-2">স্ট্যাটাস</label>
            <select
              v-model="filters.status"
              class="w-full  border-emerald-200 rounded-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
            >
              <option value="">সকল স্ট্যাটাস</option>
              <option value="active">সক্রিয়</option>
              <option value="inactive">নিষ্ক্রিয়</option>
            </select>
          </div>
        </div>

        <div class="flex justify-end space-x-4 mt-6">
          <button
            @click="resetFilters"
            class="bg-gray-100 text-gray-700 px-6 py-2 rounded-sm hover:bg-gray-200 transition-colors duration-200 flex items-center gap-2 border border-gray-300"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            রিসেট
          </button>
          <button
            @click="searchExams"
            class="bg-emerald-600 text-white px-6 py-2 rounded-sm hover:bg-emerald-700 transition-colors duration-200 flex items-center gap-2"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            অনুসন্ধান করুন
          </button>
        </div>
      </div>

      <!-- Exam List Header -->
      <div class="bg-white p-6 rounded-lg mb-6 flex justify-between items-center shadow-sm border border-gray-100">
        <h2 class="font-bold text-xl text-emerald-800 flex items-center">
          <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
          কেন্দ্রীয় পরীক্ষা তালিকা
        </h2>
        <button class="bg-emerald-600 text-white px-6 py-2 rounded-sm hover:bg-emerald-700 transition-colors duration-200 flex items-center gap-2">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
          নতুন কেন্দ্রীয় পরীক্ষা
        </button>
      </div>

      <!-- Exam Table -->
      <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full table-auto text-sm">
          <thead>
            <tr class="bg-emerald-50 text-emerald-800">
              <th class="px-6 py-3 text-left font-semibold">কেন্দ্রীয় পরীক্ষার নাম</th>
              <th class="px-6 py-3 text-left font-semibold">ক্রম</th>
              <th class="px-6 py-3 text-left font-semibold">ইয়ার</th>
              <th class="px-6 py-3 text-left font-semibold">হিজরি</th>
              <th class="px-6 py-3 text-left font-semibold">স্ট্যাটাস</th>
              <th class="px-6 py-3 text-left font-semibold">করনীয়</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            <tr v-for="exam in filteredExams" :key="exam.id" class="hover:bg-gray-50 transition-colors duration-200">
              <td class="px-6 py-4">{{ exam.name }}</td>
              <td class="px-6 py-4">{{ exam.serial }}</td>
              <td class="px-6 py-4">{{ exam.year }}</td>
              <td class="px-6 py-4">{{ exam.hijri }}</td>
              <td class="px-6 py-4">
                <span
                  :class="exam.status === 'active' ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700'"
                  class="px-3 py-1 rounded-full text-xs font-medium"
                >
                  {{ exam.status === 'active' ? 'সক্রিয়' : 'নিষ্ক্রিয়' }}
                </span>
              </td>
              <td class="px-6 py-4 space-x-2">
                <button class="bg-amber-500 text-white px-4 py-1.5 rounded-sm hover:bg-amber-600 transition-colors duration-200 text-sm">সংশোধনী</button>
                <Link
                         :href="route('central_Exam_setup.nibondon_setup')"
                class="bg-emerald-500 text-white px-4 py-1.5 rounded-sm hover:bg-emerald-600 transition-colors duration-200 text-sm">নিবন্ধন সেটআপ</Link >
                <Link

                    :href="route('central_Exam_setup.ontorvukti_setup')"
                class="bg-blue-500 text-white px-4 py-1.5 rounded-sm hover:bg-blue-600 transition-colors duration-200 text-sm">অন্তর্ভুক্তি সেটআপ</Link>
                <Link
                  :href="route('central_Exam_setup.others_setup')"
                class="bg-indigo-500 text-white px-4 py-1.5 rounded-sm hover:bg-indigo-600 transition-colors duration-200 text-sm">অন্যান্য সেটআপ</Link>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- Pagination -->
        <div class="flex justify-between items-center px-6 py-4 bg-gray-50 border-t border-gray-100">
          <span class="text-sm text-gray-600">মোট {{ filteredExams.length }} টি এন্ট্রি দেখানো হচ্ছে</span>
          <div class="flex space-x-2">
            <button class="px-4 py-2 border border-gray-300 rounded-sm bg-white text-gray-700 hover:bg-gray-50 transition-colors duration-200">← পূর্ববর্তী</button>
            <button class="px-4 py-2 border border-emerald-500 rounded-sm bg-emerald-500 text-white hover:bg-emerald-600 transition-colors duration-200">১</button>
            <button class="px-4 py-2 border border-gray-300 rounded-sm bg-white text-gray-700 hover:bg-gray-50 transition-colors duration-200">পরবর্তী →</button>
          </div>
        </div>
      </div>
    </div>
    </AuthenticatedLayout>
  </template>
<script setup>
import AuthenticatedLayout from '@/Layouts/admin/AuthenticatedLayout.vue'
import { Link } from '@inertiajs/vue3'
import { ref, computed } from 'vue'



const filters = ref({
  examName: '',
  status: '',
})

const exams = ref([
  { id: 1, name: '৪৩তম কেন্দ্রীয় পরীক্ষা', serial: 1431, year: 2025, hijri: 1446, status: 'active' },
  { id: 2, name: '৪২তম কেন্দ্রীয় পরীক্ষা', serial: 1430, year: 2024, hijri: 1445, status: 'active' },
  { id: 3, name: '৪১তম কেন্দ্রীয় পরীক্ষা', serial: 1429, year: 2023, hijri: 1444, status: 'active' },
  { id: 4, name: '৪০তম কেন্দ্রীয় পরীক্ষা', serial: 1428, year: 2022, hijri: 1443, status: 'active' },
  { id: 5, name: '৩৯তম কেন্দ্রীয় পরীক্ষা', serial: 1427, year: 2027, hijri: 1442, status: 'active' },
])

const filteredExams = computed(() => {
  return exams.value.filter((exam) => {
    return (
      (filters.value.examName === '' || exam.name.includes(filters.value.examName)) &&
      (filters.value.status === '' || exam.status === filters.value.status)
    )
  })
})

function resetFilters() {
  filters.value.examName = ''
  filters.value.status = ''
}

function searchExams() {
  // In real project, you can trigger an API call here if needed.
  console.log('Filters:', filters.value)
}
</script>
