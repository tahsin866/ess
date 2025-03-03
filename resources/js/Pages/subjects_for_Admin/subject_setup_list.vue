<template>
    <AuthenticatedLayout>
        <div class="bg-white rounded-sm shadow-md p-6 border-t-4 border-emerald-600 mx-5 mt-5">
    <!-- Header with Islamic Pattern -->
    <div class="relative mb-8">
      <div class="absolute inset-0 bg-emerald-50 opacity-25 pattern-islamic"></div>
      <h2 class="text-2xl font-bold text-center text-emerald-800 py-4">মারহালা তথ্য</h2>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="w-full border-collapse mb-8">
        <thead>
          <tr class="bg-emerald-50">
            <th class="border border-emerald-200 p-3 text-left text-emerald-800">মারহালার নাম</th>
            <th class="border border-emerald-200 p-3 text-center text-emerald-800">মোট কিতাব</th>
            <th class="border border-emerald-200 p-3 text-center text-emerald-800">একটিভ কিতাব</th>
            <th class="border border-emerald-200 p-3 text-center text-emerald-800">ইনএকটিভ কিতাব</th>
            <th class="border border-emerald-200 p-3 text-center text-emerald-800">অ্যাকশন</th>
          </tr>
        </thead>
        <tbody>
          <tr class="hover:bg-emerald-50">
            <td class="border border-emerald-200 p-3 font-semibold text-emerald-700">তাকমীল</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">১২</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">৮</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">৪</td>
            <td class="border border-emerald-200 p-3">
                <div class="flex justify-center gap-3">
                <Link

                  :href="route('subjects_for_Admin.subject_setup')"
                  class="flex items-center px-3 py-1.5 bg-emerald-600 text-white rounded hover:bg-emerald-700 transition-colors duration-200"
                >
                  <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                  </svg>
                  বিষয় সেটাপ করুন
                </Link>
              </div>
            </td>
          </tr>
          <tr class="hover:bg-emerald-50">
            <td class="border border-emerald-200 p-3 font-semibold text-emerald-700">ফযিলত</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">১২</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">৮</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">৪</td>
            <td class="border border-emerald-200 p-3">
                <div class="flex justify-center gap-3">
                <Link

                  :href="route('Mrahala_for_Admin.marhala_setup_list')"
                  class="flex items-center px-3 py-1.5 bg-emerald-600 text-white rounded hover:bg-emerald-700 transition-colors duration-200"
                >
                  <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                  </svg>
                  বিষয় সেটাপ করুন
                </Link>
              </div>
            </td>
          </tr>
          <tr class="hover:bg-emerald-50">
            <td class="border border-emerald-200 p-3 font-semibold text-emerald-700">সানাবিয়া উলইয়া</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">১২</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">৮</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">৪</td>
            <td class="border border-emerald-200 p-3">
                <div class="flex justify-center gap-3">
                <Link

                  :href="route('Mrahala_for_Admin.marhala_setup_list')"
                  class="flex items-center px-3 py-1.5 bg-emerald-600 text-white rounded hover:bg-emerald-700 transition-colors duration-200"
                >
                  <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                  </svg>
                  বিষয় সেটাপ করুন
                </Link>
              </div>
            </td>
          </tr>
          <tr class="hover:bg-emerald-50">
            <td class="border border-emerald-200 p-3 font-semibold text-emerald-700">সানাবিয়া</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">১২</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">৮</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">৪</td>
            <td class="border border-emerald-200 p-3">
                <div class="flex justify-center gap-3">
                <Link

                  :href="route('Mrahala_for_Admin.marhala_setup_list')"
                  class="flex items-center px-3 py-1.5 bg-emerald-600 text-white rounded hover:bg-emerald-700 transition-colors duration-200"
                >
                  <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                  </svg>
                  বিষয় সেটাপ করুন
                </Link>
              </div>
            </td>
          </tr>
          <tr class="hover:bg-emerald-50">
            <td class="border border-emerald-200 p-3 font-semibold text-emerald-700">ইবতেদাইয়্যাহ</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">১২</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">৮</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">৪</td>
            <td class="border border-emerald-200 p-3">
                <div class="flex justify-center gap-3">
                <Link

                  :href="route('Mrahala_for_Admin.marhala_setup_list')"
                  class="flex items-center px-3 py-1.5 bg-emerald-600 text-white rounded hover:bg-emerald-700 transition-colors duration-200"
                >
                  <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                  </svg>
                  বিষয় সেটাপ করুন
                </Link>
              </div>
            </td>
          </tr>
          <tr class="hover:bg-emerald-50">
            <td class="border border-emerald-200 p-3 font-semibold text-emerald-700">হিফজুল কোরান</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">১২</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">৮</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">৪</td>
            <td class="border border-emerald-200 p-3">
                <div class="flex justify-center gap-3">
                <Link

                  :href="route('Mrahala_for_Admin.marhala_setup_list')"
                  class="flex items-center px-3 py-1.5 bg-emerald-600 text-white rounded hover:bg-emerald-700 transition-colors duration-200"
                >
                  <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                  </svg>
                  বিষয় সেটাপ করুন
                </Link>
              </div>
            </td>
          </tr>
          <tr class="hover:bg-emerald-50">
            <td class="border border-emerald-200 p-3 font-semibold text-emerald-700">ইলমুত তাজবিদ ওয়াল ক্বিরাত</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">১২</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">৮</td>
            <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">৪</td>
            <td class="border border-emerald-200 p-3">
              <div class="flex justify-center gap-3">
                <Link

                  :href="route('Mrahala_for_Admin.marhala_setup_list')"
                  class="flex items-center px-3 py-1.5 bg-emerald-600 text-white rounded hover:bg-emerald-700 transition-colors duration-200"
                >
                  <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                  </svg>
                  বিষয় সেটাপ করুন
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
  import AuthenticatedLayout from '@/Layouts/admin/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue'


  const stats = ref({
    marhalaName: 'তাকমীল',
    totalBooks: 12,
    activeBooks: 8,
    inactiveBooks: 4
  })

  const handleEdit = () => {
    // Edit logic here
  }

  const handleAdd = () => {
    // Add logic here
  }
  </script>

  <style scoped>
  .pattern-islamic {
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l30 30-30 30L0 30z' fill='%23047857' fill-opacity='0.1'/%3E%3C/svg%3E");
    background-size: 30px 30px;
  }
  </style>
