<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';


const showingNavigationDropdown = ref(false);
const sidebarOpen = ref(false);
const dropdownOpen = ref({ takmil: false, Fazilat: false, orders: false, sanawia: false,mutawassita: false, ibtedaia: false,HifzulQuran: false,Qirat: false });





// Notification & massage model


// Add to your existing script setup
const showNotifications = ref(false);
const showMessages = ref(false);

const openNotifications = () => {
    showNotifications.value = !showNotifications.value;
    showMessages.value = false;
};

const openMessages = () => {
    showMessages.value = !showMessages.value;
    showNotifications.value = false;
};



</script>

<template>
<!-- massage & Notification -->



    <div

    style=" font-family: 'Merriweather','SolaimanLipi',sans-serif;"

    class="flex min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Sidebar -->
        <aside :class="{'hidden sm:block': !sidebarOpen}" class="bg-[#F7F7F7] text-black w-64 flex-shrink-0 fixed h-screen">
            <div class="h-16 flex text-xl items-center justify-center bg-[#F7F7F7] font-semibold">
          এক্সাম মেনেজমেন্ট সিস্টেম
            </div>
            <nav style=" font-family: 'Merriweather','SolaimanLipi',sans-serif;" class="mt-4 space-y-2 overflow-y-auto">
                <Link :href="route ('dashboard')" class="block text-xl px-4 py-2 hover:bg-[#C4D9FF]">ড্যাশবোর্ড</Link>

<!-- তাকমিল -->
                <div>
                    <button
                        @click="dropdownOpen.takmil = !dropdownOpen.takmil"
                        class="w-full text-xl flex justify-between items-center  px-4 py-2 hover:bg-[#C4D9FF]"
                    >
                    আবেদন সংক্রান্ত
                        <svg
                            class="w-4 h-4 transition-transform"
                            :class="{'rotate-180': dropdownOpen.takmil}"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </button>
                    <div v-if="dropdownOpen.takmil" class="pl-6">
                        <Link :href="route('Markaz.Makaj_apply')" class="block px-4 py-2 text-xl hover:bg-[#C4D9FF]">মারকায আবেদন</Link>

                        <Link :href="route('Markaz.markaz_change_table')" class="block px-4 py-2 text-xl hover:bg-[#C4D9FF]">মারকায পরিবর্তন</Link>


                        <Link :href="route('Markaz.marhala_change_table')" class="block px-4 py-2 text-xl hover:bg-[#C4D9FF]">মারহালা পরিবর্তন</Link>
                        <Link href="route('Takmil.cirtificateProvide')" class="block px-4 py-2 text-xl hover:bg-[#C4D9FF]">মন্জুরী পত্র আবেদন</Link>

                    </div>
                </div>

                <!-- ফযিলত -->

                <div>
                    <button
                        @click="dropdownOpen.orders = !dropdownOpen.orders"
                        class="w-full  text-xl flex justify-between items-center px-4 py-2 hover:bg-[#C4D9FF]"
                    >
                নিবন্ধন সংক্রান্ত
                        <svg
                            class="w-4 h-4 transition-transform"
                            :class="{'rotate-180': dropdownOpen.orders}"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>

                    </button>
                    <div v-if="dropdownOpen.orders" class="pl-6">
                        <Link :href="route('students_registration.student_registration')" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl ">পরীক্ষার্থী নিবন্ধন</Link>
                        <Link :href="route('students_registration.stuedent_reg_list')" class="block text-xl px-4 py-2 hover:bg-[#C4D9FF]">নিবন্ধন তালিকা</Link>
                        <Link href="route('sanawia.sanawiacirtificateProvide')" class="block px-4 text-xl py-2 hover:bg-[#C4D9FF]">নিবন্ধন পত্র</Link>
                        <Link href="route('sanawia.sanawiacirtificateProvide')" class="block px-4 text-xl py-2 hover:bg-[#C4D9FF]">ড্রাফ্ট/সফ্ট ডিলিট</Link>
                        <Link href="route('sanawia.sanawiacirtificateProvide')" class="block px-4 text-xl  py-2 hover:bg-[#C4D9FF]">পেমেন্ট</Link>
                    </div>
                </div>
<!--
                সানাবিয়া -->
                <div>
                    <button
                        @click="dropdownOpen.sanawia = !dropdownOpen.sanawia"
                        class="w-full text-xl flex justify-between items-center px-4 py-2 hover:bg-[#C4D9FF]"
                    >
                অন্তর্ভুক্তি সংক্রান্ত
                        <svg
                            class="w-4 h-4 transition-transform"
                            :class="{'rotate-180': dropdownOpen.sanawia}"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </button>
                    <div v-if="dropdownOpen.sanawia" class="pl-6">
                        <Link href="route('Fajilat.sanawaia')" class="block text-xl px-4 py-2 hover:bg-[#C4D9FF]">অন্তর্ভূূূূূূূূূূক্তি তালিকা</Link>
                        <Link href="" class="block px-4 text-xl py-2 hover:bg-[#C4D9FF]">ড্রাফ্ট তালিকা</Link>
                        <Link href="#" class="block px-4 text-xl py-2 hover:bg-[#C4D9FF]">প্রবেশপত্র</Link>
                                 <Link href="#" class="block px-4 text-xl py-2 hover:bg-[#C4D9FF]">পেমেন্ট</Link>
                    </div>
                </div>


                <!-- মুতাওয়াসসিতাহ -->

                <div>
                    <button
                        @click="dropdownOpen.mutawassita = !dropdownOpen.mutawassita"
                        class="w-full text-xl flex justify-between items-center px-4 py-2 hover:bg-[#C4D9FF]"
                    >
             নেগরান/মুমতাহিন
                        <svg
                            class="w-4 h-4 transition-transform"
                            :class="{'rotate-180': dropdownOpen.mutawassita}"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </button>
                    <div v-if="dropdownOpen.mutawassita" class="pl-6">
                        <Link href="route('mutawassitah.Mutawassitah')" class="block text-xl px-4 py-2 hover:bg-[#C4D9FF]">নেগ:/মুম: আবেদন</Link>
                        <Link href="" class="block px-4 py-2 text-xl hover:bg-[#C4D9FF]">মুমতাহিন তালিকা</Link>
                        <Link href="route('mutawassitah.mutawassitahcirtificate')" class="block px-4 py-2 text-xl hover:bg-[#C4D9FF]">নিয়োগপত্র</Link>
                    </div>
                </div>

                <!-- ইবতেদাইয়্যাহ -->



                <div>
                    <button
                        @click="dropdownOpen.ibtedaia = !dropdownOpen.ibtedaia"
                        class="w-full flex justify-between items-center text-xl px-4 py-2 hover:bg-[#C4D9FF]"
                    >
           মারকায সংক্রান্ত
                        <svg
                            class="w-4 h-4 transition-transform"
                            :class="{'rotate-180': dropdownOpen.ibtedaia}"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </button>
                    <div v-if="dropdownOpen.ibtedaia" class="pl-6">
                        <Link href="route('Fajilat.sanawaia')" class="block text-xl px-4 py-2 hover:bg-[#C4D9FF]">মাদরাসার তালিকা</Link>
                        <Link href="" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">নেগরান তালিকা</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">প্রশ্নপত্র প্রিন্ট</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">ভাউচার তৈরি</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">ছাত্রদের হাজিরা</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">নেগরানদের হাজিরা</Link>
                    </div>
                </div>

<!-- হিফজুল কোরান -->

<div>
                    <button
                        @click="dropdownOpen.HifzulQuran = !dropdownOpen.HifzulQuran"
                        class="w-full flex justify-between items-center text-xl px-4 py-2 hover:bg-[#C4D9FF]"
                    >
                   রিপোর্টস
                        <svg
                            class="w-4 h-4 transition-transform"
                            :class="{'rotate-180': dropdownOpen.HifzulQuran}"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </button>
                    <div v-if="dropdownOpen.HifzulQuran" class="pl-6">
                        <Link href="route('Fajilat.sanawaia')" class="block px-4 py-2 text-xl hover:bg-[#C4D9FF]">নিবন্ধন রিপোর্ট</Link>
                        <Link href="" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">অন্তর্ভূক্তি রিপোর্ট</Link>
                        <Link href="" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">নেগ:/মুম রিপোর্ট</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">হাজিরা রিপোর্ট</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">পেমেন্ট রিপোর্ট</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">নিয়োগ রিপোর্ট</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">মাদরাসা রিপোর্ট</Link>
                    </div>
                </div>


                <!-- কিরাত -->


                <div>
                    <button
                        @click="dropdownOpen.Qirat = !dropdownOpen.Qirat"
                        class="w-full flex justify-between items-center text-xl px-4 py-2 hover:bg-[#C4D9FF]"
                    >
                প্রয়োজনীয় ডকুমেন্টস
                        <svg
                            class="w-4 h-4 transition-transform"
                            :class="{'rotate-180': dropdownOpen.Qirat}"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </button>
                    <div v-if="dropdownOpen.Qirat" class="pl-6">
                        <Link href="route('fazilat.sanawaia')" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">সকল ছাত্র</Link>
                        <Link href="" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">আবেদন তালিকা</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">সনদ কর্যক্রম</Link>
                    </div>
                </div>






                <Link href="#" class="block px-4 text-xl py-2 hover:bg-[#C4D9FF]">মেসেজিং</Link>
                <Link href="#" class="block px-4 text-xl py-2 hover:bg-[#C4D9FF]">নোটিস</Link>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col ml-64">
            <nav class="bg-[#F7F7F7] dark:bg-gray-800 border-b dark:border-gray-700 fixed w-full z-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 justify-between items-center">
                        <!-- Mobile Menu Toggle -->
                        <button
                            @click="sidebarOpen = !sidebarOpen"
                            class="sm:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-[#C4D9FF] p-2 rounded-md"
                        >
                            <svg
                                class="h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                            </svg>
                        </button>

                        <!-- Logo -->
                        <div class="flex items-center"></div>

                        <!-- Notification and User Dropdown -->
                        <div class="hidden sm:flex items-center space-x-4">
                            <!-- Notification Icon -->
                            <button
    @click="openNotifications"
    class="relative text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 p-2 rounded-md group transition-all duration-300"
>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6 transform group-hover:scale-110 transition-transform duration-300"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M13.73 21a2 2 0 01-3.46 0M21 12a9 9 0 01-9 9M3 12a9 9 0 019-9M18.63 13A17.888 17.888 0 0118 8M6.26 6.26A5.86 5.86 0 006 8c0 7-3 9-3 9h14"
        />
    </svg>

    <!-- Enhanced Notification Badge -->
    <span
        class="absolute -top-1 -right-1 inline-flex items-center justify-center min-w-[20px] h-5 px-1.5 text-xs font-bold text-white bg-gradient-to-r from-red-500 to-pink-500 rounded-full transform scale-100 group-hover:scale-110 transition-transform duration-300 shadow-lg"
    >
        3
    </span>
</button>


                            <!-- Message Icon -->
                            <button
    @click="openMessages"
    class="relative text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 p-2 rounded-md group transition-all duration-300"
>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6 transform group-hover:scale-110 transition-transform duration-300"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
        />
    </svg>

    <!-- Enhanced Message Badge -->
    <span
        class="absolute -top-1 -right-1 inline-flex items-center justify-center min-w-[20px] h-5 px-1.5 text-xs font-bold text-white bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full transform scale-100 group-hover:scale-110 transition-transform duration-300 shadow-lg"
    >
        5
    </span>
</button>


                            <!-- User Dropdown -->
                            <Dropdown align="right" width="48">
  <template #trigger>
    <span class="inline-flex rounded-md">
      <button
        style="font-family: 'Merriweather', 'SolaimanLipi', sans-serif;"
        type="button"
        class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-md font-medium leading-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 transition duration-150 ease-in-out"
      >
        {{ $page.props.auth.user.name }}
        <svg
          class="-me-0.5 ms-2 h-5 w-5 text-gray-500 dark:text-gray-400 transition duration-150 ease-in-out"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
          />
        </svg>
      </button>
    </span>
  </template>
  <template #content>
    <!-- Profile Link with Icon -->
    <DropdownLink :href="route('profile.edit')" class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
      <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
      </svg>
      Profile
    </DropdownLink>

    <!-- Log Out Link with Icon -->
    <DropdownLink :href="route('logout')" method="post" as="button" class="flex items-center px-4 py-2 text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
      <svg class="w-5 h-5 mr-2 text-red-500 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
      </svg>
      Log Out
    </DropdownLink>
  </template>
</Dropdown>

         </div>
                    </div>
                </div>
            </nav>

            <main class="flex-1 pt-16">


                <slot />
            </main>
        </div>
    </div>





<!-- Notification & massage model -->



<!-- Add these modals right before the closing </template> tag -->

<!-- Notification Modal -->
<div v-if="showNotifications"
    style="font-family: 'Merriweather','SolaimanLipi',sans-serif;"
    class="fixed top-16 right-4 w-96 bg-white rounded-lg shadow-2xl border border-gray-200 z-50 transform transition-all duration-300 ease-in-out">
    <div class="p-4 border-b border-gray-200 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14V11a6 6 0 10-12 0v3c0 .417-.152.816-.405 1.123L4 17h5m6 0a3 3 0 11-6 0m6 0H9" />
                </svg>
                নোটিফিকেশন
            </h3>
            <button @click="showNotifications = false" class="text-white hover:text-gray-200 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    <div class="max-h-[calc(100vh-200px)] overflow-y-auto">
        <div class="p-4 hover:bg-blue-50 border-b cursor-pointer transition-colors duration-200">
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 bg-blue-600 rounded-full ring-4 ring-blue-100"></div>
                <div>
                    <p class="text-sm font-medium text-gray-800">নতুন সনদ আবেদন #২৩৪৫</p>
                    <p class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        ২ মিনিট আগে
                    </p>
                </div>
            </div>
        </div>
        <!-- Repeat for other notifications with similar styling -->
    </div>
</div>

<!-- Messages Modal -->
<div v-if="showMessages"
    style="font-family: 'Merriweather','SolaimanLipi',sans-serif;"
    class="fixed top-16 right-4 w-96 bg-white rounded-lg shadow-2xl border border-gray-200 z-50 transform transition-all duration-300 ease-in-out">
    <div class="p-4 border-b border-gray-200 bg-gradient-to-r from-green-600 to-green-800">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                বার্তা
            </h3>
            <button @click="showMessages = false" class="text-white hover:text-gray-200 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    <div class="max-h-[calc(100vh-200px)] overflow-y-auto">
        <div class="p-4 hover:bg-green-50 border-b cursor-pointer transition-colors duration-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                    আ
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-800">আব্দুল্লাহ</p>
                    <p class="text-xs text-gray-500">সনদ সংক্রান্ত জিজ্ঞাসা...</p>
                    <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        ৫ মিনিট আগে
                    </p>
                </div>
            </div>
        </div>
        <!-- Repeat for other messages with similar styling -->
        <div class="p-4 hover:bg-green-50 border-b cursor-pointer transition-colors duration-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                    আ
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-800">আব্দুল্লাহ</p>
                    <p class="text-xs text-gray-500">সনদ সংক্রান্ত জিজ্ঞাসা...</p>
                    <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        ৫ মিনিট আগে
                    </p>
                </div>
            </div>
        </div>
        <div class="p-4 hover:bg-green-50 border-b cursor-pointer transition-colors duration-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                    আ
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-800">আব্দুল্লাহ</p>
                    <p class="text-xs text-gray-500">সনদ সংক্রান্ত জিজ্ঞাসা...</p>
                    <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        ৫ মিনিট আগে
                    </p>
                </div>
            </div>
        </div>
        <div class="p-4 hover:bg-green-50 border-b cursor-pointer transition-colors duration-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                    আ
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-800">আব্দুল্লাহ</p>
                    <p class="text-xs text-gray-500">সনদ সংক্রান্ত জিজ্ঞাসা...</p>
                    <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        ৫ মিনিট আগে
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>









</template>

<style scoped></style>
