<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

// Sidebar state
const sidebarOpen = ref(false);
const isMobile = ref(false);

// Dropdown states
const dropdownOpen = ref({
    takmil: false,
    Fazilat: false,
    orders: false,
    sanawia: false,
    mutawassita: false,
    ibtedaia: false,
    HifzulQuran: false,
    Qirat: false
});

// Notification & message states
const showNotifications = ref(false);
const showMessages = ref(false);

// Check window width and set mobile state
const checkScreen = () => {
    isMobile.value = window.innerWidth < 768;
    if (!isMobile.value) {
        sidebarOpen.value = true;
    }
};

// Toggle sidebar for mobile
const toggleSidebar = () => {
    if (isMobile.value) {
        sidebarOpen.value = !sidebarOpen.value;
    }
};

// Notification handlers
const openNotifications = () => {
    showNotifications.value = !showNotifications.value;
    showMessages.value = false;
};

const openMessages = () => {
    showMessages.value = !showMessages.value;
    showNotifications.value = false;
};

// Lifecycle hooks
onMounted(() => {
    checkScreen();
    window.addEventListener('resize', checkScreen);
});

onBeforeUnmount(() => {
    window.removeEventListener('resize', checkScreen);
});
</script>


<template>
<!-- massage & Notification -->



    <div

    style=" font-family: 'Merriweather','SolaimanLipi',sans-serif;"

    class="flex min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Sidebar -->
        <aside :class="{'hidden sm:block': !sidebarOpen}" class="bg-[#F7F7F7] text-black w-64 flex-shrink-0 fixed h-screen">
          <!-- Replace the header div -->
<div class="h-16 flex text-xl items-center justify-center bg-gradient-to-r from-emerald-600 to-emerald-800 text-white font-semibold">
    <div class="flex items-center gap-2">
        <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2L3 9V20C3 20.5304 3.21071 21.0391 3.58579 21.4142C3.96086 21.7893 4.46957 22 5 22H19C19.5304 22 20.0391 21.7893 20.4142 21.4142C20.7893 21.0391 21 20.5304 21 20V9L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        এক্সাম মেনেজমেন্ট সিস্টেম
    </div>
</div>

            <nav style=" font-family: 'Merriweather','SolaimanLipi',sans-serif;" class="mt-4 space-y-2 overflow-y-auto">
               <Link :href="route('dashboard')" class="text-xl px-4 py-2 hover:bg-[#C4D9FF] flex items-center gap-2">
        <i class="fas fa-mosque w-6 h-6 text-sm"></i>
        ড্যাশবোর্ড
    </Link>

<!-- তাকমিল -->
                <div>
                    <button @click="dropdownOpen.takmil = !dropdownOpen.takmil"
                class="w-full text-xl flex justify-between items-center px-4 py-2 hover:bg-[#C4D9FF]">
            <div class="flex items-center gap-2">
                <i class="fas fa-file-alt w-6 h-6 text-sm"></i>
                আবেদন সংক্রান্ত
            </div>
            <i :class="{'rotate-180': dropdownOpen.takmil}" class="fas fa-chevron-down fa-xs transition-transform"></i>
        </button>
        <div v-if="dropdownOpen.takmil" class="pl-6">
            <Link :href="route('Markaz.Makaj_apply')" class="px-4 py-2 text-xl hover:bg-[#C4D9FF] flex items-center gap-2">
                <!-- <i class="fas fa-pen-fancy w-5 h-5"></i> -->
                মারকায আবেদন
            </Link>
                        <Link :href="route('Markaz.markaz_change_table')" class="block px-4 py-2 text-xl hover:bg-[#C4D9FF]">মারকায পরিবর্তন</Link>


                        <Link :href="route('Markaz.marhala_change_table')" class="block px-4 py-2 text-xl hover:bg-[#C4D9FF]">মারহালা পরিবর্তন</Link>
                        <Link href="route('Takmil.cirtificateProvide')" class="block px-4 py-2 text-xl hover:bg-[#C4D9FF]">মন্জুরী পত্র আবেদন</Link>

                    </div>
                </div>

                <!-- ফযিলত -->

                <div>
                     <button @click="dropdownOpen.orders = !dropdownOpen.orders"
                class="w-full text-xl flex justify-between items-center px-4 py-2 hover:bg-[#C4D9FF]">
            <div class="flex items-center gap-2">
                <i class="fas fa-user-plus w-6 h-6 text-sm"></i>
                নিবন্ধন সংক্রান্ত
            </div>
            <i :class="{'rotate-180': dropdownOpen.orders}" class="fas fa-chevron-down fa-xs fa-xstransition-transform"></i>
        </button>
        <div v-if="dropdownOpen.orders" class="pl-6">
            <Link :href="route('students_registration.student_registration')"
                  class=" px-4 py-2 text-xl hover:bg-[#C4D9FF] flex items-center gap-2">
                <!-- <i class="fas fa-user-graduate w-5 h-5"></i> -->
                পরীক্ষার্থী নিবন্ধন
            </Link>
                        <Link :href="route('students_registration.stuedent_reg_list')" class="block text-xl px-4 py-2 hover:bg-[#C4D9FF]">নিবন্ধন তালিকা</Link>
                        <Link :href="route('students_registration.student_reg_card')" class="block px-4 text-xl py-2 hover:bg-[#C4D9FF]">নিবন্ধন পত্র</Link>
                        <Link href="route('sanawia.sanawiacirtificateProvide')" class="block px-4 text-xl py-2 hover:bg-[#C4D9FF]">ড্রাফ্ট/সফ্ট ডিলিট</Link>
                        <Link href="route('sanawia.sanawiacirtificateProvide')" class="block px-4 text-xl  py-2 hover:bg-[#C4D9FF]">পেমেন্ট</Link>
                    </div>
                </div>
<!--
                সানাবিয়া -->
                <div>
                    <button @click="dropdownOpen.sanawia = !dropdownOpen.sanawia"
                class="w-full text-xl flex justify-between items-center px-4 py-2 hover:bg-[#C4D9FF]">
            <div class="flex items-center gap-2">
                <i class="fas fa-users w-6 h-6 text-sm"></i>
                অন্তর্ভুক্তি সংক্রান্ত
            </div>
            <i :class="{'rotate-180': dropdownOpen.sanawia}" class="fas fa-chevron-down fa-xs transition-transform"></i>
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
                     <button @click="dropdownOpen.mutawassita = !dropdownOpen.mutawassita"
                class="w-full text-xl flex justify-between items-center px-4 py-2 hover:bg-[#C4D9FF]">
            <div class="flex items-center gap-2">
                <i class="fas fa-user-shield w-6 h-6 text-sm"></i>
                নেগরান/মুমতাহিন
            </div>
            <i :class="{'rotate-180': dropdownOpen.mutawassita}" class="fas fa-chevron-down fa-xs transition-transform"></i>
        </button>
                    <div v-if="dropdownOpen.mutawassita" class="pl-6">
                        <Link href="route('mutawassitah.Mutawassitah')" class="block text-xl px-4 py-2 hover:bg-[#C4D9FF]">নেগ:/মুম: আবেদন</Link>
                        <Link href="" class="block px-4 py-2 text-xl hover:bg-[#C4D9FF]">মুমতাহিন তালিকা</Link>
                        <Link href="route('mutawassitah.mutawassitahcirtificate')" class="block px-4 py-2 text-xl hover:bg-[#C4D9FF]">নিয়োগপত্র</Link>
                    </div>
                </div>

                <!-- ইবতেদাইয়্যাহ -->



                <div>
                   <button @click="dropdownOpen.ibtedaia = !dropdownOpen.ibtedaia"
                class="w-full text-xl flex justify-between items-center px-4 py-2 hover:bg-[#C4D9FF]">
            <div class="flex items-center gap-2">
                <i class="fas fa-school w-6 h-6 text-sm"></i>
                মারকায সংক্রান্ত
            </div>
            <i :class="{'rotate-180': dropdownOpen.ibtedaia}" class="fas fa-chevron-down fa-xs transition-transform"></i>
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
                  <button @click="dropdownOpen.HifzulQuran = !dropdownOpen.HifzulQuran"
                class="w-full text-xl flex justify-between items-center px-4 py-2 hover:bg-[#C4D9FF]">
            <div class="flex items-center gap-2">
                <i class="fas fa-chart-bar w-6 h-6 text-sm"></i>
                রিপোর্টস
            </div>
            <i :class="{'rotate-180': dropdownOpen.HifzulQuran}" class="fas fa-chevron-down fa-xs transition-transform"></i>
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
                    <button @click="dropdownOpen.Qirat = !dropdownOpen.Qirat"
                class="w-full text-xl flex justify-between items-center px-4 py-2 hover:bg-[#C4D9FF]">
            <div class="flex items-center gap-2">
                <i class="fas fa-file-alt w-6 h-6 text-sm"></i>
                প্রয়োজনীয় ডকুমেন্টস
            </div>
            <i :class="{'rotate-180': dropdownOpen.Qirat}" class="fas fa-chevron-down fa-xs transition-transform"></i>
        </button>
                    <div v-if="dropdownOpen.Qirat" class="pl-6">
                        <Link href="route('fazilat.sanawaia')" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">সকল ছাত্র</Link>
                        <Link href="" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">আবেদন তালিকা</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#C4D9FF] text-xl">সনদ কর্যক্রম</Link>
                    </div>
                </div>






             <Link href="#" class=" px-4 text-xl py-2 hover:bg-[#C4D9FF] flex items-center gap-2">
        <i class="fas fa-envelope w-6 h-6 text-sm"></i>
        মেসেজিং
    </Link>
                <Link href="#" class="px-4 text-xl py-2 hover:bg-[#C4D9FF] flex items-center gap-2">
        <i class="fas fa-bell w-6 h-6 text-sm"></i>
        নোটিস
    </Link>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col ml-64">
        <nav class="bg-[#F7F7F7] dark:bg-gray-800 border-b border-emerald-100 dark:border-gray-700 fixed w-full z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between items-center">
            <!-- Mobile Menu Toggle -->
            <button
                @click="sidebarOpen = !sidebarOpen"
                class="sm:hidden text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-800 p-2 rounded-md"
            >
                <i class="fas fa-bars h-6 w-6"></i>
            </button>

            <!-- Logo -->
            <div class="flex items-center">
                <!-- <i class="fas fa-mosque text-2xl text-emerald-600 dark:text-emerald-400"></i> -->
            </div>

            <!-- Notification and User Dropdown -->
            <div class="hidden sm:flex items-center space-x-4">
                <!-- Prayer Times Button -->
                <button class="relative text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 p-2 rounded-md group transition-all duration-300">
                    <i class="fas fa-kaaba h-6 w-6 transform group-hover:scale-110 transition-transform duration-300"></i>
                </button>

                <!-- Notification Icon -->
                <button @click="openNotifications" class="relative text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 p-2 rounded-md group transition-all duration-300">
                    <i class="fas fa-bell h-6 w-6 transform group-hover:scale-110 transition-transform duration-300"></i>
                    <span class="absolute -top-1 -right-1 inline-flex items-center justify-center min-w-[20px] h-5 px-1.5 text-xs font-bold text-white bg-gradient-to-r from-emerald-500 to-green-500 rounded-full transform scale-100 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        3
                    </span>
                </button>

                <!-- Message Icon -->
                <button @click="openMessages" class="relative text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 p-2 rounded-md group transition-all duration-300">
                    <i class="fas fa-envelope h-6 w-6 transform group-hover:scale-110 transition-transform duration-300"></i>
                    <span class="absolute -top-1 -right-1 inline-flex items-center justify-center min-w-[20px] h-5 px-1.5 text-xs font-bold text-white bg-gradient-to-r from-emerald-500 to-green-500 rounded-full transform scale-100 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        5
                    </span>
                </button>

                <!-- User Dropdown -->
                <Dropdown align="right" width="48">
                    <template #trigger>
                        <span class="inline-flex rounded-md">
                            <button style="font-family: 'Merriweather', 'SolaimanLipi', sans-serif;"
                                class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-emerald-200 dark:border-emerald-600 rounded-lg shadow-sm text-md font-medium leading-4 text-emerald-700 dark:text-emerald-300 hover:bg-emerald-50 dark:hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-300 dark:focus:ring-emerald-500 transition duration-150 ease-in-out"
                            >
                                <i class="fas fa-user-circle mr-2"></i>
                                {{ $page.props.auth.user.name }}
                                <i class="fas fa-chevron-down ml-2"></i>
                            </button>
                        </span>
                    </template>

                    <template #content>
                        <DropdownLink :href="route('profile.edit')"
                            class="flex items-center px-4 py-2 text-emerald-700 dark:text-emerald-300 hover:bg-emerald-50 dark:hover:bg-emerald-700 rounded-lg transition">
                            <i class="fas fa-user-edit mr-2"></i>
                            Profile
                        </DropdownLink>

                        <DropdownLink :href="route('logout')" method="post" as="button"
                            class="flex items-center px-4 py-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900 rounded-lg transition">
                            <i class="fas fa-sign-out-alt mr-2"></i>
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
<!-- Notifications Panel -->
<div v-if="showNotifications"
    style="font-family: 'Merriweather','SolaimanLipi',sans-serif;"
    class="fixed top-16 right-4 w-96 bg-white rounded-lg shadow-2xl border border-emerald-200 z-50 transform transition-all duration-300 ease-in-out">
    <div class="p-4 border-b border-emerald-200 bg-gradient-to-r from-emerald-600 to-emerald-800">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                <i class="fas fa-bell"></i>
                নোটিফিকেশন
            </h3>
            <button @click="showNotifications = false" class="text-white hover:text-emerald-200 transition-colors">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <div class="max-h-[calc(100vh-200px)] overflow-y-auto">
        <div class="p-4 hover:bg-emerald-50 border-b cursor-pointer transition-colors duration-200">
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 bg-emerald-600 rounded-full ring-4 ring-emerald-100"></div>
                <div>
                    <p class="text-sm font-medium text-gray-800">নতুন সনদ আবেদন #২৩৪৫</p>
                    <p class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                        <i class="far fa-clock"></i>
                        ২ মিনিট আগে
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Messages Panel -->
<div v-if="showMessages"
    style="font-family: 'Merriweather','SolaimanLipi',sans-serif;"
    class="fixed top-16 right-4 w-96 bg-white rounded-lg shadow-2xl border border-teal-200 z-50 transform transition-all duration-300 ease-in-out">
    <div class="p-4 border-b border-teal-200 bg-gradient-to-r from-teal-600 to-teal-800">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                <i class="fas fa-envelope"></i>
                বার্তা
            </h3>
            <button @click="showMessages = false" class="text-white hover:text-teal-200 transition-colors">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <div class="max-h-[calc(100vh-200px)] overflow-y-auto">
        <div class="p-4 hover:bg-teal-50 border-b cursor-pointer transition-colors duration-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                    <i class="fas fa-user"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-800">আব্দুল্লাহ</p>
                    <p class="text-xs text-gray-500">সনদ সংক্রান্ত জিজ্ঞাসা...</p>
                    <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                        <i class="far fa-clock"></i>
                        ৫ মিনিট আগে
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>



 <div v-if="sidebarOpen && isMobile"
         @click="toggleSidebar"
         class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden">
    </div>






</template>

<style scoped></style>
