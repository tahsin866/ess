<template>
    <AuthenticatedLayout>
        <div class="p-6 space-y-6">
      <!-- Filter Section -->
      <div class="bg-emerald-50 p-6 rounded-sm shadow-md border-t-4 border-emerald-600">
        <div class="relative mb-6">
          <div class="absolute inset-0 bg-emerald-50 opacity-25 pattern-islamic"></div>
          <h2 class="text-xl font-bold text-emerald-800">ফিল্টার অপশন</h2>
        </div>

        <div class="grid grid-cols-4 gap-5">
          <div class="col-span-1">
            <label class="block text-sm font-semibold text-emerald-800 mb-2">বিষয় / কোড</label>
            <input type="text"
                   class="w-full p-2  border-emerald-200 rounded-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white"
                   placeholder="বিষয় / কোড লিখুন">
          </div>

          <div class="col-span-1">
            <label class="block text-sm font-semibold text-emerald-800 mb-2">মারকাযের ধরন</label>
            <select class="w-full p-2 border-emerald-200 rounded-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white">
              <option>নির্বাচন করুন</option>
              <option>লিখিত</option>
              <option>মৌখিক</option>
            </select>
          </div>

          <div class="col-span-1">
            <label class="block text-sm font-semibold text-emerald-800 mb-2">মারহালা নির্বাচন করুন</label>
            <select class="w-full p-2  border-emerald-200 rounded-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white">
              <option>নির্বাচন করুন</option>
            </select>
          </div>
          <div class="col-span-1">
            <label class="block text-sm font-semibold text-emerald-800 mb-2">মাদরাসার ধরন</label>
            <select class="w-full p-2  border-emerald-200 rounded-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white">
              <option>নির্বাচন করুন</option>
              <option>ছাত্র</option>
              <option>ছাত্রী</option>
            </select>
          </div>

          <div class="col-span-1">
            <label class="block text-sm font-semibold text-emerald-800 mb-2">স্ট্যাটাস</label>
            <select class="w-full p-2  border-emerald-200 rounded-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white">
              <option>নির্বাচন করুন</option>
              <option>একটিভ</option>
              <option>ইনেক্টিভ</option>
            </select>
          </div>
        </div>

        <div class="mt-6 flex gap-4">
  <button class="px-6 py-2 bg-gray-500 text-white rounded-sm hover:bg-gray-600 transition-colors duration-200 flex items-center gap-2">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
    </svg>
    রিসেট
  </button>

  <button class="px-6 py-2 bg-emerald-600 text-white rounded-sm hover:bg-emerald-700 transition-colors duration-200 flex items-center gap-2">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
    </svg>
    অনুসন্ধান করুন
  </button>
</div>
      </div>

      <!-- Subject List Table -->
      <div class="bg-emerald-50 p-6 rounded-sm shadow-md border-t-4 border-emerald-600">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-xl font-bold text-emerald-800">বিষয় তালিকা</h2>
          <Link

 :href="route('subjects_for_Admin.subject_setup_list')"
          class="px-6 py-2 bg-emerald-600 text-white rounded-sm hover:bg-emerald-700 transition-colors duration-200 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
 নতুন বিষয় সেটাপ
          </Link>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full table-auto bg-white border border-emerald-200">
            <thead class="bg-emerald-100">
              <tr class="text-emerald-800">
                <th class="border border-emerald-200 p-3 text-sm font-semibold">কোড</th>
                <th class="border border-emerald-200 p-3 text-sm font-semibold">বিষয়</th>
                <th class="border border-emerald-200 p-3 text-sm font-semibold">মারহালা</th>
                <th class="border border-emerald-200 p-3 text-sm font-semibold">মি’ইয়ারী/গায়রে মি’ইয়ারী</th>
                <th class="border border-emerald-200 p-3 text-sm font-semibold">সিলেবাসের ধরন (বালক)</th>
                <th class="border border-emerald-200 p-3 text-sm font-semibold">পিএসসির ধরন (বালিকা)</th>
                <th class="border border-emerald-200 p-3 text-sm font-semibold">নৈর্বাচনিক গ্রুপ</th>
                <th class="border border-emerald-200 p-3 text-sm font-semibold">মারকাযের ধরণ</th>
                <th class="border border-emerald-200 p-3 text-sm font-semibold">বালক/বালিকা</th>
                <th class="border border-emerald-200 p-3 text-sm font-semibold">মোট নাম্বার</th>
                <th class="border border-emerald-200 p-3 text-sm font-semibold">পাশ নম্বর</th>
                <th class="border border-emerald-200 p-3 text-sm font-semibold">স্ট্যাটাস</th>
                <th class="border border-emerald-200 p-3 text-sm font-semibold">কর্মসূচী</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(subject, index) in subjects"
                  :key="index"
                  class="border-b border-emerald-200 hover:bg-emerald-50">
                <td class="border border-emerald-200 p-3">{{ subject.code }}</td>
                <td class="border border-emerald-200 p-3">{{ subject.name }}</td>
                <td class="border border-emerald-200 p-3">{{ subject.department }}</td>
                <td class="border border-emerald-200 p-3">{{ subject.category }}</td>
                <td class="border border-emerald-200 p-3">{{ subject.pscPrimary }}</td>
                <td class="border border-emerald-200 p-3">{{ subject.pscGachi }}</td>
                <td class="border border-emerald-200 p-3">{{ subject.artistic }}</td>
                <td class="border border-emerald-200 p-3">{{ subject.artistic }}</td>
                <td class="border border-emerald-200 p-3">{{ subject.artistic }}</td>
                <td class="border border-emerald-200 p-3">{{ subject.rankType }}</td>
                <td class="border border-emerald-200 p-3">{{ subject.rank }}</td>
                <td class="border border-emerald-200 p-3">
                  <span class="px-3 py-1 bg-emerald-500 text-white rounded-sm">সক্রিয়</span>
                </td>
                <td class="border border-emerald-200 p-3">
                  <button class="px-4 py-1.5 bg-amber-500 text-white rounded-sm hover:bg-amber-600 transition-colors duration-200 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    সংশোধন
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </AuthenticatedLayout>
  </template>

  <script setup>
  import AuthenticatedLayout from '@/Layouts/admin/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue'

  const subjects = ref([
    { code: '101', name: 'সহিহ কুরআন (১ম পত্র)', department: 'অফিস', category: 'বিষয়ধারা', pscPrimary: 'অফিসিক', pscGachi: 'অফিসিক', artistic: '', rankType: 'নির্দিষ্ট', rank: 'উত্তর' },
    { code: '102', name: 'সহিহ কুরআন (২য় পত্র)', department: 'অফিস', category: 'বিষয়ধারা', pscPrimary: 'অফিসিক', pscGachi: 'অফিসিক', artistic: '', rankType: 'নির্দিষ্ট', rank: 'উত্তর' },
    { code: '103', name: 'সহিহ হাদিস (১ম পত্র)', department: 'অফিস', category: 'বিষয়ধারা', pscPrimary: 'অফিসিক', pscGachi: 'অফিসিক', artistic: '', rankType: 'নির্দিষ্ট', rank: 'উত্তর' },
  ])
  </script>

  <style scoped>
  .pattern-islamic {
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l30 30-30 30L0 30z' fill='%23047857' fill-opacity='0.1'/%3E%3C/svg%3E");
    background-size: 30px 30px;
  }
  </style>
