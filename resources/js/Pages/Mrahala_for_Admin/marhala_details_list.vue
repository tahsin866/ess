<template>
    <AuthenticatedLayout>
      <div class="bg-[#f8f9fa] rounded-sm shadow-md p-6 border-t-4 border-emerald-600 mx-5 mt-5">
        <h2 class="text-2xl font-bold text-center text-emerald-800 py-4">মারহালা তথ্য</h2>
        <div class="overflow-x-auto">
          <table class="w-full border-collapse mb-8">
            <thead>
              <tr class="bg-emerald-50">
                <th class="border border-emerald-200 p-3 text-left text-emerald-800">মারহালার নাম</th>
                <th class="border border-emerald-200 p-3 text-center text-emerald-800">মোট কিতাব</th>
                <th class="border border-emerald-200 p-3 text-center text-emerald-800">ছাত্র</th>
                <th class="border border-emerald-200 p-3 text-center text-emerald-800">ছাত্রী</th>
                <th class="border border-emerald-200 p-3 text-center text-emerald-800">উভয়</th>
                <th class="border border-emerald-200 p-3 text-center text-emerald-800">অ্যাকশন</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="marhala in props.marhalas" :key="marhala.id" class="hover:bg-emerald-50">
                <td class="border border-emerald-200 p-3 font-semibold text-emerald-700">
                  {{ marhala.marhala_name_bn }}
                </td>
                <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">
                  {{ marhala.total_subjects }}
                </td>
                <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">
                  {{ marhala.male_subjects }}
                </td>
                <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">
                  {{ marhala.female_subjects }}
                </td>
                <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">
                  {{ marhala.both_subjects }}
                </td>
                <td class="border border-emerald-200 p-3">
                  <div class="flex justify-center gap-3">
                    <Link :href="route('marhalas.edit', marhala.id)"
                          class="flex items-center px-3 py-1.5 bg-emerald-600 text-white rounded hover:bg-emerald-700">
                      <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                      সংশোধন
                    </Link>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>


<script setup>
import { defineProps } from 'vue'
import AuthenticatedLayout from '@/Layouts/admin/AuthenticatedLayout.vue'
import { Link } from '@inertiajs/vue3'

// 'marhalas' প্রপার্টি সঠিকভাবে ডিফাইন করুন
const props = defineProps({
    marhalas: Array
})

 // সঠিকভাবে ডাটা দেখানোর জন্য কনসোল লগ ব্যবহার করুন
</script>
