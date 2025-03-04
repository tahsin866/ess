<template>
   <AuthenticatedLayout>
    <div class="p-6 bg-white shadow-md rounded-sm border-t-4 border-emerald-600 mx-5 mt-5">
      <!-- Islamic Header -->
      <div class="mb-6 text-center relative">
        <div class="absolute inset-0 bg-emerald-50 opacity-25 pattern-islamic"></div>
        <h2 class="text-2xl font-bold text-emerald-800 py-3">বিষয় তথ্য সংযোজন</h2>
      </div>

      <form @submit.prevent="submitForm" class="grid grid-cols-4 gap-6">
        <!-- মাধ্যম -->
        <div class="col-span-1">
          <label class="block text-sm font-semibold text-emerald-800 mb-2">মারহালা নির্বাচন করুন *</label>
          <select v-model="form.medium"
                  class="w-full border-emerald-200 rounded-sm py-2 px-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-emerald-50">
            <option value="">নির্বাচন করুন</option>
            <option value="general">লিখিত </option>
            <option value="madrasa">মৌখিক</option>
          </select>
        </div>

        <!-- ছাত্র / ছাত্রী -->
        <div class="col-span-1">
          <label class="block text-sm font-semibold text-emerald-800 mb-2">বিষয় নির্বাচন করুন *</label>
          <select v-model="form.gender"
                  class="w-full  border-emerald-200 rounded-sm py-2 px-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-emerald-50">
            <option value="male">ছাত্র</option>
            <option value="female">ছাত্রী</option>
          </select>
        </div>

        <!-- বিভাগের ধরন -->
        <div class="col-span-1">
          <label class="block text-sm font-semibold text-emerald-800 mb-2">সিলেবাসের ধরন (বালক) *</label>
          <select v-model="form.department"
                  class="w-full  border-emerald-200 rounded-sm py-2 px-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-emerald-50">
            <option value="">নির্বাচন করুন</option>
            <option value="science">আবশ্যিক</option>
            <option value="arts">নৈর্বাচনিক</option>
          </select>
        </div>

        <!-- মাধ্যমের ধরন -->
        <div class="col-span-1">
          <label class="block text-sm font-semibold text-emerald-800 mb-2">মারকাযের ধরন *</label>
          <select v-model="form.mediumType"
                  class="w-full  border-emerald-200 rounded-sm py-2 px-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-emerald-50">
            <option value="">নির্বাচন করুন</option>
            <option value="bangla">লিখিত</option>
            <option value="english">মৌখিক</option>
          </select>
        </div>

        <!-- বিষয়ের ধরন -->
        <div class="col-span-1">
          <label class="block text-sm font-semibold text-emerald-800 mb-2">বিষয়ের ধরন *</label>
          <select v-model="form.subjectType"

          class="w-full  border-emerald-200 rounded-sm py-2 px-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-emerald-50">
          <option value="">নির্বাচন করুন</option>
          <option value="mandatory">মি’ইয়ারী</option>
            <option value="optional">গায়রে মি’ইয়ারী</option>
          </select>
        </div>

        <!-- মোট মার্ক -->
        <div class="col-span-1">
          <label class="block text-sm font-semibold text-emerald-800 mb-2">মোট মার্ক *</label>
          <input type="number"
                 v-model="form.totalMarks"
                 class="w-full  border-emerald-200 rounded-sm py-2 px-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-emerald-50" />
        </div>

        <!-- পাশ মার্ক -->
        <div class="col-span-1">
          <label class="block text-sm font-semibold text-emerald-800 mb-2">পাশ মার্ক *</label>
          <input type="number"
                 v-model="form.passMarks"
                 class="w-full  border-emerald-200 rounded-sm py-2 px-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-emerald-50" />
        </div>

        <!-- স্ট্যাটাস -->
        <div class="col-span-1">
          <label class="block text-sm font-semibold text-emerald-800 mb-2">স্ট্যাটাস *</label>
          <select v-model="form.status"
                  class="w-full  border-emerald-200 rounded-sm py-2 px-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-emerald-50">
            <option value="active">সক্রিয়</option>
            <option value="inactive">নিষ্ক্রিয়</option>
          </select>
        </div>

        <!-- Submit Button -->
        <div class="col-span-4 flex justify-end mt-4">
          <button type="submit"
                  class="bg-emerald-600 text-white py-2 px-6 rounded-md hover:bg-emerald-700 transition-colors duration-200 flex items-center gap-2 shadow-md">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            সংরক্ষণ করুন
          </button>
        </div>
      </form>
    </div>
   </AuthenticatedLayout>
  </template>

  <script setup>
  import AuthenticatedLayout from '@/Layouts/admin/AuthenticatedLayout.vue';
import { reactive } from 'vue'

  const form = reactive({
    medium: '',
    gender: 'male',
    department: '',
    mediumType: '',
    subjectType: 'mandatory',
    totalMarks: '',
    passMarks: '',
    status: 'active'
  })

  const submitForm = () => {
    console.log('Form Data:', form)
  }
  </script>

  <style scoped>
  .pattern-islamic {
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l30 30-30 30L0 30z' fill='%23047857' fill-opacity='0.1'/%3E%3C/svg%3E");
    background-size: 30px 30px;
  }
  </style>
