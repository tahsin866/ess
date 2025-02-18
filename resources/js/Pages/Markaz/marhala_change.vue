<template>
    <AuthenticatedLayout>
        <div class=" mx-auto space-y-6 p-6">
      <!-- First Card - Level Selection -->
      <div class="bg-white rounded-md shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-[#141E30] to-[#243B55] px-6 py-3">
          <h2 class="text-xl font-bold text-white">ইলহাক আবেদন ফরম</h2>
        </div>
        <div class="p-6">
          <div class="max-w-xs">
            <label class="block text-sm font-medium text-gray-700 mb-2">মারহাল নির্বাচন করুন</label>
            <select
              v-model="selectedLevel"
              class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            >
              <option value="">নতুন সর্বোচ্চ মারহালা নির্বাচন করুন</option>
              <option v-for="item in items" :key="item.value" :value="item.value">
                {{ item.text }}
              </option>
            </select>
          </div>
        </div>
      </div>

      <!-- Second Card - Student Numbers -->
      <div class="bg-white rounded-md shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-[#141E30] to-[#243B55] px-6 py-3">
          <h2 class="text-xl font-bold text-white">ছাত্র সংখ্যার তথ্য</h2>
        </div>
        <div class="p-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
              <label class="block text-sm font-medium text-gray-700">ফযীলত</label>
              <input
                v-model.number="studentCounts.fazilat"
                type="number"
                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                placeholder="ছাত্র সংখ্যা লিখুন"
              >
            </div>
            <div class="space-y-2">
              <label class="block text-sm font-medium text-gray-700">ইবতেদাইয়্যাহ</label>
              <input
                v-model.number="studentCounts.ibtedaiyyah"
                type="number"
                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                placeholder="ছাত্র সংখ্যা লিখুন"
              >
            </div>
            <div class="space-y-2">
              <label class="block text-sm font-medium text-gray-700">সানাবিয়া উলইয়া</label>
              <input
                v-model.number="studentCounts.sanabiyaUlya"
                type="number"
                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                placeholder="ছাত্র সংখ্যা লিখুন"
              >
            </div>
            <div class="space-y-2">
              <label class="block text-sm font-medium text-gray-700">হিফজুল কোরআন</label>
              <input
                v-model.number="studentCounts.hifz"
                type="number"
                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                placeholder="ছাত্র সংখ্যা লিখুন"
              >
            </div>
            <div class="space-y-2">
              <label class="block text-sm font-medium text-gray-700">মুতাওয়াসসিতা</label>
              <input
                v-model.number="studentCounts.mutawassita"
                type="number"
                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                placeholder="ছাত্র সংখ্যা লিখুন"
              >
            </div>
            <div class="space-y-2">
              <label class="block text-sm font-medium text-gray-700">ক্বিরআত</label>
              <input
                v-model.number="studentCounts.qirat"
                type="number"
                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                placeholder="ছাত্র সংখ্যা লিখুন"
              >
            </div>
          </div>

          <div class="mt-6 max-w-xs">
            <label class="block text-sm font-medium text-gray-700">মোট ছাত্র সংখ্যা</label>
            <input
              :value="totalStudents"
              type="number"
              class="w-full rounded-md border-gray-300 bg-gray-50 shadow-sm"
              disabled
            >
          </div>
        </div>
      </div>

      <!-- Third Card - File Uploads -->
      <div class="bg-white rounded-md shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-[#141E30] to-[#243B55] px-6 py-3">
          <h2 class="text-xl font-bold text-white">প্রয়োজনীয় ডকুমেন্টস</h2>
        </div>
        <div class="p-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
              <label class="block text-xl font-medium text-gray-700">মুহতামিমের পত্র</label>
              <div class="flex items-center justify-center w-full">
                <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                  <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">ফাইল আপলোড করুন</span></p>
                  </div>
                  <input type="file" class="hidden" @change="handleFileUpload($event, 'muhtamim')" />
                </label>
              </div>
            </div>

            <div class="space-y-2">
              <label class="block text-xl font-medium text-gray-700">কমিটি রেজুলেশন ফটোকপি</label>
              <div class="flex items-center justify-center w-full">
                <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                  <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">ফাইল আপলোড করুন</span></p>
                  </div>
                  <input type="file" class="hidden" @change="handleFileUpload($event, 'committee')" />
                </label>
              </div>
            </div>
          </div>

          <div class="mt-8 flex justify-end">
            <button
              @click="submitForm"
              class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center gap-2"
            >
              <span>সাবমিট করুন</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
    </AuthenticatedLayout>
  </template>

  <script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { ref, computed } from 'vue'

  const selectedLevel = ref('')
  const items = [
    { value: 'level1', text: 'Level 1' },
    { value: 'level2', text: 'Level 2' },
    { value: 'level3', text: 'Level 3' },
  ]

  const studentCounts = ref({
    fazilat: 0,
    ibtedaiyyah: 0,
    sanabiyaUlya: 0,
    hifz: 0,
    mutawassita: 0,
    qirat: 0
  })

  const totalStudents = computed(() => {
    return Object.values(studentCounts.value).reduce((sum, count) => sum + (count || 0), 0)
  })

  const handleFileUpload = (event, type) => {
    const file = event.target.files[0]
    // Handle file upload logic here
  }

  const submitForm = () => {
    // Handle form submission
  }
  </script>
