<template>
   <AuthenticatedLayout>
    <div class="p-6 bg-[#f8f9fa] min-h-screen mx-5 mt-5">

<!-- Header -->
<div class="bg-[#2d6a4f] text-white p-4 rounded-sm shadow-md mb-4">
  <h1 class="text-2xl font-semibold text-center">মাদ্রাসা ছাত্র তালিকা</h1>
</div>

<!-- Search Filters -->
<div class="bg-white shadow-md rounded-sm p-4 mb-6">
  <div class="grid grid-cols-4 gap-4">
    <div>
      <label class="block text-sm font-medium text-gray-700">বিভাগ</label>
      <select class="mt-1 block w-full border-gray-300 rounded-sm shadow-sm">
        <option>সিলেক্ট</option>
      </select>
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">শ্রেণি</label>
      <select class="mt-1 block w-full border-gray-300 rounded-sm shadow-sm">
        <option>সিলেক্ট</option>
      </select>
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">রেজিস্ট্রেশন নাম্বার</label>
      <input type="text" class="mt-1 block w-full border-gray-300 rounded-sm shadow-sm" />
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">রোল নাম্বার</label>
      <input type="text" class="mt-1 block w-full border-gray-300 rounded-sm shadow-sm" />
    </div>
  </div>

  <div class="mt-4 flex justify-end">
    <button class="bg-[#2d6a4f] text-white px-4 py-2 rounded-sm hover:bg-green-700">সার্চ করুন</button>
  </div>
</div>

<!-- Statistics -->
<div class="flex space-x-4 mb-6">
  <div class="bg-yellow-500 text-white p-1 rounded-sm shadow-md">মোট ছাত্র: ১০০</div>
  <div class="bg-green-500 text-white p-1 rounded-sm shadow-md">উত্তীর্ণ: ৭০</div>
  <div class="bg-red-500 text-white p-1 rounded-sm shadow-md">অনুত্তীর্ণ: ৩০</div>
</div>

<!-- Student Table -->
<div class="bg-white shadow-md rounded-sm overflow-hidden">
  <table class="w-full table-auto">
    <thead class="bg-[#2d6a4f] text-white">
      <tr>
        <th class="p-2">#</th>
        <th class="p-2">ছবি</th>
        <th class="p-2">নাম</th>
        <th class="p-2">শ্রেণি</th>
        <th class="p-2">রোল নাম্বার</th>
        <th class="p-2">রেজিস্ট্রেশন নাম্বার</th>
        <th class="p-2">জন্ম তারিখ</th>
        <th class="p-2">পিতার নাম</th>
        <th class="p-2">মাতার নাম</th>
        <th class="p-2">স্ট্যাটাস</th>
        <th class="p-2">অ্যাকশন</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      <tr v-for="(student, index) in students" :key="index">
        <td class="p-2 text-center">{{ index + 1 }}</td>
        <td class="p-2 text-center">
          <img :src="student.photo" alt="Student" class="w-10 h-10 rounded-full mx-auto" />
        </td>
        <td class="p-2 text-center">{{ student.name }}</td>
        <td class="p-2 text-center">{{ student.class }}</td>
        <td class="p-2 text-center">{{ student.roll }}</td>
        <td class="p-2 text-center">{{ student.registration }}</td>
        <td class="p-2 text-center">{{ student.birthDate }}</td>
        <td class="p-2 text-center">{{ student.father }}</td>
        <td class="p-2 text-center">{{ student.mother }}</td>
        <td class="p-2 text-center">
          <span :class="statusClass(student.status)">{{ student.status }}</span>
        </td>
        <td class="p-2 text-center">
          <Link
           :href="route('nibondon_for_admin.student_detiles_For_nibondon')"
          class="bg-yellow-500 text-white px-3 py-1 rounded-sm text-xs hover:bg-yellow-600">ডিটেইলস</Link>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<!-- Pagination -->
<div class="flex justify-center mt-4 space-x-2">
  <button class="px-3 py-1 bg-green-600 text-white rounded-md">1</button>
  <button class="px-3 py-1 bg-gray-300 rounded-md">2</button>
  <button class="px-3 py-1 bg-gray-300 rounded-md">3</button>
</div>
</div>
   </AuthenticatedLayout>
  </template>

  <script setup>
  import AuthenticatedLayout from '@/Layouts/admin/AuthenticatedLayout.vue'
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'


  const students = ref([
    {
      photo: 'https://via.placeholder.com/40',
      name: 'আহমেদ হাসান',
      class: 'ফাজিল',
      roll: '12345',
      registration: '54321',
      birthDate: '01/01/2000',
      father: 'মোঃ আব্দুল হক',
      mother: 'মোছাঃ ফাতিমা বেগম',
      status: 'উত্তীর্ণ'
    },
    {
      photo: 'https://www.pexels.com/photo/brown-and-green-mountain-view-photo-842711/',
      name: 'মোঃ রশিদ',
      class: 'ফাজিল',
      roll: '12346',
      registration: '54322',
      birthDate: '02/01/2000',
      father: 'মোঃ আব্দুল মালেক',
      mother: 'মোছাঃ রোকেয়া বেগম',
      status: 'অনুত্তীর্ণ'
    }
  ])

  const statusClass = (status) => {
    return status === 'উত্তীর্ণ'
      ? 'bg-green-500 text-white px-2 py-1 rounded-sm text-xs'
      : 'bg-red-500 text-white px-2 py-1 rounded-sm text-xs'
  }
  </script>

  <style scoped>
  /* Optional - Add Islamic font if needed */

  </style>
