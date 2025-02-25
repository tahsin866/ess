<script setup>
import { ref } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import markaz_apply_form from './markaz_apply_form.vue';
import { Link, router } from '@inertiajs/vue3'

const items = ref([
  { id: 1, details: "Example Details 1" },
  { id: 2, details: "Example Details 2" },
]);

const showForm = ref(false);


const editItem = (item) => {
  console.log("Editing item:", item);
};

const viewItem = (item) => {
  console.log("Viewing item:", item);
};

const deleteItem = (item) => {
  console.log("Deleting item:", item);
};
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
                  <th class="px-6 py-4 text-white font-semibold whitespace-nowrap">আবেদনের বিস্তারিত</th>
                  <th class="px-6 py-4 text-white font-semibold whitespace-nowrap">ছা্ত্র সংখ্যা</th>
                  <th class="px-6 py-4 text-white font-semibold whitespace-nowrap">মাদরাসা সংখ্যা</th>
                  <th class="px-6 py-4 text-white font-semibold whitespace-nowrap">স্ট্যাটাস</th>
                  <th class="px-6 py-4 text-white font-semibold whitespace-nowrap">করনীয়</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                <tr
                  v-for="item in items"
                  :key="item.id"
                  class="hover:bg-emerald-50 transition duration-200 border-b border-emerald-100"
                >
                  <td class="px-6 py-4 text-center font-medium">55568</td>
                  <td class="px-6 py-4 text-center">05/05/2023</td>
                  <td class="px-6 py-4 text-center">{{ item.details }}</td>
                  <td class="px-6 py-4 text-center">{{ item.details }}</td>
                  <td class="px-6 py-4 text-center">
                    <span class="text-emerald-600 cursor-pointer hover:text-emerald-800">
                      <i class="fas fa-mosque"></i>
                    </span>
                  </td>
                  <td class="px-6 py-4 text-center">
                    <span class="px-4 py-2 text-sm font-medium text-emerald-800 bg-emerald-100 rounded-full">
                      মন্জুর হয়েছে
                    </span>
                  </td>
                  <td class="px-6 py-2 text-center">
                    <div class="inline-flex rounded-sm shadow-sm overflow-hidden">
                      <button
                        class="p-2 text-white bg-emerald-700 hover:bg-emerald-600 transition duration-200"
                        @click="editItem(item)"
                      >
                        <i class="fas fa-edit"></i>
                      </button>
                      <button
                        class="p-2 text-white bg-emerald-600 hover:bg-emerald-500 transition duration-200"
                        @click="viewItem(item)"
                      >
                        <i class="fas fa-eye"></i>
                      </button>
                      <button
                        class="p-2 text-white bg-red-600 hover:bg-red-500 transition duration-200"
                        @click="deleteItem(item)"
                      >
                        <i class="fas fa-trash-alt"></i>
                      </button>
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
.pattern-islamic {
  background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l15 30-15 30-15-30z' fill='%23ffffff' fill-opacity='0.1'/%3E%3C/svg%3E");
  background-repeat: repeat;
}
</style>
