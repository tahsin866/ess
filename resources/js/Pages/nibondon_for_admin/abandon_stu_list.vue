<template>
    <AuthenticatedLayout>
        <div class="p-6 bg-[#f8f9fa] min-h-screen mx-5 mt-6">
      <!-- Header with Islamic Pattern -->
      <div class="bg-emerald-900 text-white p-6 rounded-sm mb-6 shadow-lg flex items-center bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2720%27%20height%3D%2720%27%20viewBox%3D%270%200%2020%2020%27%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%3E%3Cpath%20d%3D%27M0%200h20L10%2010%200%2020z%27%20fill%3D%27%23ffffff%27%20fill-opacity%3D%270.05%27%2F%3E%3C%2Fsvg%3E')]">
        <h1 class="text-2xl font-bold">মাদ্রাসা তালিকা</h1>
      </div>

      <!-- Filter Section -->
      <div class="bg-white p-6 rounded-sm shadow-lg mb-6 border-2 border-emerald-100">
        <div class="grid grid-cols-12 gap-6 items-end">
          <div class="col-span-4">
            <label class="block mb-2 text-emerald-900 font-semibold">মাদ্রাসার নাম/ইআইআইএন/কোড</label>
            <select v-model="selectedMadrasha"
                    class="w-full p-2  border-emerald-200 rounded-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all">
              <option value="">জাতীয় আরবি শিক্ষা কার্যক্রম</option>
            </select>
          </div>

          <div class="col-span-4">
            <label class="block mb-2 text-emerald-900 font-semibold">অবস্থা</label>
            <select v-model="status"
                    class="w-full p-2  border-emerald-200 rounded-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all">
              <option value="অনুমোদন হয়েছে">অনুমোদন হয়েছে</option>
            </select>
          </div>

          <div class="col-span-4">
            <button @click="searchMadrasha"
                    class="bg-amber-600 hover:bg-amber-700 text-white py-2 px-8 rounded-sm transition-all duration-300 shadow-md">
              সার্চ করুন
            </button>
          </div>
        </div>
      </div>

      <!-- Table Section -->
      <div class="bg-white p-6 rounded-sm shadow-lg  border-emerald-100">
        <div class="overflow-x-auto">
          <table class="min-w-full border-2 border-emerald-100">
            <thead class="bg-emerald-900 text-white">
              <tr>
                <th class="p-4 text-left">ক্রমিক</th>
                <th class="p-4 text-left">মাদ্রাসার নাম</th>
                <th class="p-4 text-left">ইলহাক নম্বর</th>
                <th class="p-4 text-left">কোড</th>
                <th class="p-4 text-left">নির্ধারিত ছাত্র সংখ্যা</th>
                <th class="p-4 text-left">মোবাইল নম্বর</th>
                <th class="p-4 text-left">বিভাগ</th>
                <th class="p-4 text-left">জেলা</th>
                <th class="p-4 text-left">থানা/উপজেলা</th>
                <th class="p-4 text-left">বোর্ড স্ট্যাটাস</th>
                <th class="p-4 text-left">একশন</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-emerald-100">
                  <tr v-for="(madrasha, index) in madrashaList"
                      :key="index"
                      class="hover:bg-emerald-50 transition-colors">
                    <td class="p-4">{{ index + 1 }}</td>

                    <!-- মাদরাসার নাম লিংক -->
                    <td class="p-4">
                        <Link :href="route('nibondon_for_admin.madrashaWari_stu_nibond_list', { madrasha_id: madrasha.id })" class="text-blue-600 hover:underline">
  {{ madrasha.madrasa_Name }}
</Link>


                    </td>

                    <td class="p-4">-</td>
                    <td class="p-4">-</td>
                    <td class="p-4">-</td>
                    <td class="p-4">-</td>
                    <td class="p-4">-</td>
                    <td class="p-4">-</td>
                    <td class="p-4">-</td>
                    <td class="p-4">
                      <span class="bg-emerald-500 text-white px-3 py-1 rounded-sm text-sm">
                        অনুমোদন
                      </span>
                    </td>
                    <td class="p-4">
                      <button class="bg-emerald-900 hover:bg-emerald-800 text-white px-6 py-2 rounded-sm transition-colors">
                        বিস্তারিত
                      </button>
                    </td>
                  </tr>
                </tbody>

          </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center gap-2">
          <button v-for="page in totalPages"
                  :key="page"
                  @click="currentPage = page"
                  class="px-4 py-2 rounded-sm transition-all duration-300"
                  :class="[
                    currentPage === page
                      ? 'bg-emerald-900 text-white'
                      : 'border-2 border-emerald-200 hover:border-emerald-500'
                  ]">
            {{ page }}
          </button>
        </div>
      </div>
    </div>
    </AuthenticatedLayout>
  </template>

<script setup>
import AuthenticatedLayout from '@/Layouts/admin/AuthenticatedLayout.vue'
import { Link } from '@inertiajs/vue3'
import { ref, onMounted } from 'vue'
import axios from 'axios'

// প্রপস ডিফাইন করা
const props = defineProps({
  markaz_id: Number
})

// স্টেট ভেরিয়েবল
const madrashaList = ref([])
const markazName = ref('')
const loading = ref(true)
const error = ref(null)

// ডাটা ফেচ করার ফাংশন
const fetchData = async () => {
  try {
    loading.value = true
    error.value = null

    const response = await axios.get(`/api/markaz-madrasa-list/${props.markaz_id}`)
    madrashaList.value = response.data.madrashaList
    markazName.value = response.data.markazName
  } catch (err) {
    console.error('Error fetching data:', err)
    error.value = 'ডাটা লোড করতে সমস্যা হয়েছে। পুনরায় চেষ্টা করুন।'
  } finally {
    loading.value = false
  }
}

// কম্পোনেন্ট মাউন্ট হওয়ার সময় ডাটা ফেচ করা
onMounted(() => {
  fetchData()
})
</script>
