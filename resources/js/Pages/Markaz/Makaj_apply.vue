<script setup>
import { ref, onMounted } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import markaz_apply_form from './markaz_apply_form.vue';
import { Link, router } from '@inertiajs/vue3'
import axios from 'axios';

const agreements = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get('/api/markaz/get-table-data');
        agreements.value = response.data.agreements;
    } catch (error) {
        console.error('Error fetching data:', error);
    }
});




const submitApplication = (id) => {
    if (confirm("আপনি কি নিশ্চিত যে এই আবেদনটি সাবমিট করতে চান?")) {
        router.post(route('markaz.submit', id), {}, {
            preserveScroll: true,
            onSuccess: () => {
                alert("আবেদন সফলভাবে সাবমিট করা হয়েছে!");
            }
        });
    }
};

const openMenu = ref(false)
</script>

<template>
  <AuthenticatedLayout>
    <div class="container-fluid mx-5 mt-8 overflow-x-auto max-w-full ">
      <!-- Form Section -->

      <!-- Table Section -->
      <div class="bg-white rounded-sm shadow-xl">
        <!-- Header with Islamic Pattern -->
        <div class="bg-gradient-to-r from-emerald-900 to-emerald-800 text-white px-8 py-3 rounded-t-sm flex justify-between items-center relative overflow-hidden">
          <div class="absolute inset-0 opacity-10 pattern-islamic"></div>
          <h2 class="text-2xl font-bold flex items-center gap-2">

            আবেদন তালিকা
          </h2>
        <Link
    :href="route('Markaz.markaz_agreement_form')"
    class="inline-flex items-center justify-center gap-2 px-6 py-2 text-base font-medium text-white bg-gradient-to-r from-emerald-600 to-emerald-700 rounded-sm hover:from-emerald-700 hover:to-emerald-800 transform hover:scale-105 transition-all duration-200 shadow-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"

>
    <i class="fas fa-plus-circle text-lg"></i>
    <span style="font-family: 'SolaimanLipi', sans-serif;">আবেদন করুন</span>
</Link>

        </div>

        <!-- Table Container -->
        <div class="p-8">
        <div class="overflow-hidden rounded-sm border border-emerald-100 shadow-md">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-emerald-900 to-emerald-800">
                        <th class="px-6 py-4 text-white font-semibold whitespace-nowrap">আবেদন নং</th>
                        <th class="px-6 py-4 text-white font-semibold whitespace-nowrap">আবেদনের তারিখ</th>
                        <th class="px-6 py-4 text-white font-semibold whitespace-nowrap">মাদরাসার নাম</th>
                        <th class="px-6 py-4 text-white font-semibold whitespace-nowrap">কেন্দ্রীয় পরীক্ষা</th>
                        <th class="px-6 py-4 text-white font-semibold whitespace-nowrap">ছাত্র সংখ্যা</th>
                        <th class="px-6 py-4 text-white font-semibold whitespace-nowrap">স্ট্যাটাস</th>
                        <th class="px-6 py-4 text-white font-semibold whitespace-nowrap">করনীয়</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr v-for="agreement in agreements" :key="agreement.id"
                        class="hover:bg-emerald-50 transition duration-200 border-b border-emerald-100">
                        <td class="px-6 py-4 text-center font-medium">{{ agreement.id }}</td>
                        <td class="px-6 py-4 text-center">{{ agreement.application_date }}</td>
                        <td class="px-6 py-4 text-center">
                            <div>{{ agreement.main_madrasa }}</div>
                            <div v-for="madrasa in agreement.associated_madrasas"
                                 :key="madrasa"
                                 class="text-sm text-gray-600">
                                {{ madrasa }}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">{{ agreement.exam_name }}</td>
                        <td class="px-6 py-4 text-center">
                            <div>মূল মাদরাসা: {{ agreement.main_total_students }}</div>
                            <div>সংযুক্ত মাদরাসা: {{ agreement.associated_total_students }}</div>
                        </td>
                        <td class="px-6 py-4 text-center">
    <span
        :class="{
            'bg-yellow-300 text-black px-4 py-2 text-sm font-medium rounded-full': agreement.status === 'সাবমিটেড',
            'bg-yellow-500 text-white px-4 py-2 text-sm font-medium rounded-full': agreement.status === 'Pending',
            'bg-green-600 text-white px-4 py-2 text-sm font-medium rounded-full': agreement.status === 'অনুমোদন'
        }"
    >
        {{ agreement.status }}
    </span>
</td>

                        <td class="px-6 py-2 text-center">
    <div class="relative inline-block text-left">
        <!-- Dropdown Button -->
        <div>
            <button type="button"
                    @click="agreement.showMenu = !agreement.showMenu"
                    class="inline-flex items-center p-2 text-gray-400 hover:text-gray-600 focus:outline-none">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                </svg>
            </button>
        </div>

        <!-- Dropdown Menu -->
        <div v-if="agreement.showMenu"
             class="fixed right-auto mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none z-[999]">
            <div class="py-1">
                <a href="#"
                   class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700">
                    <i class="fas fa-edit mr-3 text-gray-400 group-hover:text-emerald-700"></i>
                    সম্পাদনা করুন
                </a>
                <a @click="router.get(route('Markaz.view', agreement.id))"
                   class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 cursor-pointer">
                    <i class="fas fa-eye mr-3 text-gray-400 group-hover:text-emerald-700"></i>
                    বিস্তারিত দেখুন
                </a>
                <a href="#"
                   class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-700">
                    <i class="fas fa-trash-alt mr-3 text-gray-400 group-hover:text-red-700"></i>
                    মুছে ফেলুন
                </a>
                <a @click="submitApplication(agreement.id)"
   class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-700 cursor-pointer">
   <i class="fas fa-upload mr-3 text-gray-400 group-hover:text-red-700"></i>
   বোর্ড দাখিল করুন
</a>
            </div>
        </div>
    </div>
</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style>

</style>
