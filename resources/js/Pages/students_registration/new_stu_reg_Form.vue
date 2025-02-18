<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue'


const selectedDate = ref('')
const items = ref([])

const formData = ref({
  nameBangla: '',
  nameEnglish: '',
  nameArabic: '',
  motherNameBangla: '',
  motherNameEnglish: '',
  motherNameArabic: '',
  fatherNameBangla: '',
  fatherNameEnglish: '',
  fatherNameArabic: '',
  birthRegNo: '',
  nidNo: '',
  guardianName: '',
  guardianMobile: '',
  postOffice: '',
  village: ''
})

const onSubmit = () => {
  console.log(formData.value)
}
</script>

<template>
  <AuthenticatedLayout>
    <div class="space-y-6 mx-5 mt-5">
    <!-- Personal Information Card -->
    <div class="bg-white rounded-lg shadow">
      <div class="bg-[#243b55] px-6 py-4 rounded-t-lg">
        <h5 class="text-white text-lg font-medium">ব্যক্তিগত তথ্য</h5>
      </div>

      <div class="p-6">
        <form class="space-y-6">
          <!-- Name Fields -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">নাম (বাংলা)</label>
              <input
                v-model="formData.nameBangla"
                type="text"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="নাম (বাংলা)"
              >
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">নাম (ইংরেজি)</label>
              <input
                v-model="formData.nameEnglish"
                type="text"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="নাম (ইংরেজি)"
              >
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">নাম (আরবি)</label>
              <input
                v-model="formData.nameArabic"
                type="text"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="নাম (আরবি)"
              >
            </div>
          </div>

          <!-- Mother's Name Fields -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">মাতার নাম (বাংলা)</label>
              <input
                v-model="formData.motherNameBangla"
                type="text"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="মাতার নাম (বাংলা)"
              >
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">মাতার নাম (ইংরেজি)</label>
              <input
                v-model="formData.motherNameEnglish"
                type="text"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="মাতার নাম (ইংরেজি)"
              >
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">মাতার নাম (আরবি)</label>
              <input
                v-model="formData.motherNameArabic"
                type="text"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="মাতার নাম (আরবি)"
              >
            </div>
          </div>

          <!-- Date and Registration Fields -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
              <input
                v-model="selectedDate"
                type="date"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              >
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">জন্ম-নিবন্ধন নম্বর</label>
              <input
                v-model="formData.birthRegNo"
                type="text"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="জন্ম-নিবন্ধন নম্বর"
              >
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">জাতীয় পরিচয়পত্র নম্বর</label>
              <input
                v-model="formData.nidNo"
                type="text"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="জাতীয় পরিচয়পত্র নম্বর"
              >
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Required Information Card -->
    <div class="bg-white rounded-lg shadow">
      <div class="bg-[#243b55] px-6 py-4 rounded-t-lg">
        <h5 class="text-white text-lg font-medium">প্রয়োজনীয় তথ্য</h5>
      </div>

      <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">নিয়মিত</label>
            <input
              type="text"
              disabled
              class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-100"
              placeholder="মোট ছাত্র সংখ্যা"
            >
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">বোর্ড</label>
            <input
              type="text"
              disabled
              class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-100"
              placeholder="মোট ছাত্র সংখ্যা"
            >
          </div>
        </div>

        <div class="mt-6">
          <h4 class="text-yellow-600 font-medium mb-4">নির্বাচনি কিতাব সিলেক্ট করুন</h4>
          <div class="flex space-x-6">
            <label class="flex items-center space-x-2">
              <input type="checkbox" class="form-checkbox">
              <span>হিদায়া ১ম খন্ড</span>
            </label>

            <label class="flex items-center space-x-2">
              <input type="checkbox" class="form-checkbox">
              <span>হিদায়া ২য় খন্ড</span>
            </label>
          </div>
        </div>
      </div>
    </div>

    <!-- Address Card -->
    <div class="bg-white rounded-lg shadow">
      <div class="bg-[#243b55] px-6 py-4 rounded-t-lg">
        <h5 class="text-white text-lg font-medium">ঠিকানা</h5>
      </div>

      <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">বিভাগ</label>
            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option v-for="item in items" :key="item" :value="item">{{ item }}</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">জেলা</label>
            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option v-for="item in items" :key="item" :value="item">{{ item }}</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">থানা/উপজেলা</label>
            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option v-for="item in items" :key="item" :value="item">{{ item }}</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <!-- Attachment Card -->
    <div class="bg-white rounded-lg shadow">
      <div class="bg-[#243b55] px-6 py-4 rounded-t-lg">
        <h5 class="text-white text-lg font-medium">সংযক্তি</h5>
      </div>


    </div>
  </div>
  </AuthenticatedLayout>
</template>
