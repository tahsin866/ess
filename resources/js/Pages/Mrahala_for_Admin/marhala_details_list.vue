<template>
    <AuthenticatedLayout>
      <div class="bg-[#f8f9fa] rounded-sm shadow-md p-6 border-t-4 border-emerald-600 mx-5 mt-5">
        <div class="relative mb-8">
          <div class="absolute inset-0 bg-emerald-50 opacity-25 pattern-islamic"></div>
          <h2 class="text-2xl font-bold  text-center text-emerald-800 py-4">মারহালা তথ্য</h2>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full border-collapse mb-8">
            <thead>
              <tr class="bg-emerald-100">
                <th class="border border-emerald-200 p-3 text-xl">মারহালা নাম</th>
                <th class="border border-emerald-200 p-3 text-xl">মোট বিষয়</th>
                <th class="border border-emerald-200 p-3 text-xl">পুরুষ</th>
                <th class="border border-emerald-200 p-3 text-xl">মহিলা</th>
                <th class="border border-emerald-200 p-3 text-xl">উভয়</th>
                <th class="border border-emerald-200 p-3 text-xl">অ্যাকশন</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="marhala in marhalas" :key="marhala.id" class="hover:bg-emerald-50 text-xl">
                <td class="border border-emerald-200 p-3 font-semibold text-emerald-700">{{ marhala.marhala_name_bn }}</td>
                <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">{{ marhala.total_subjects }}</td>
                <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">{{ marhala.male_subjects }}</td>
                <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">{{ marhala.female_subjects }}</td>
                <td class="border border-emerald-200 p-3 text-center font-bold text-emerald-700">{{ marhala.both_subjects }}</td>
                <td class="border border-emerald-200 p-3">
                  <div class="flex justify-center gap-3">
                    <Link
                      :href="route('Mrahala_for_Admin.marhala_edit', { marhala: marhala.id })"
                      class="flex items-center px-3 py-1.5 bg-emerald-600 text-white rounded hover:bg-emerald-700 transition-colors duration-200"
                    >
                      <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2h11a2 2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                      সংশোধন
                    </Link>
                    <Link
                      :href="route('Mrahala_for_Admin.marhala_setup_list', { id: marhala.id })"
                      class="flex items-center px-3 py-1.5 bg-emerald-600 text-white rounded hover:bg-emerald-700 transition-colors duration-200"
                    >
                      <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                      </svg>
                      নতুন যোগ করুন
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
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import { Link } from '@inertiajs/vue3';

  const marhalas = ref([]);

  const fetchMarhalas = async () => {
      try {
          const response = await axios.get('/api/get-marhala-list');
          marhalas.value = response.data;
      } catch (error) {
          console.error('Error fetching marhalas:', error);
      }
  };

  onMounted(() => {
      fetchMarhalas();
  });
  </script>
