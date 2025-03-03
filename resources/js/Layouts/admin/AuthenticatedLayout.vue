<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import Dropdown from '@/Components/admin/Dropdown.vue';
import DropdownLink from '@/Components/admin/DropdownLink.vue';
import { Link } from '@inertiajs/vue3';

// Sidebar state
// const sidebarOpen = ref(true); // Changed initial state to true
// const isMobile = ref(false);

const showSidebar = ref(false);



// Dropdown states
const dropdownOpen = ref({
    takmil: false,
    Fazilat: false,
    orders: false,
    sanawia: false,
    mutawassita: false,
    ibtedaia: false,
    HifzulQuran: false,
    Qirat: false,
    nigran: false,
    mumtahin: false,
    zone: false,
    presentaion: false,
    result: false,
    bill: false,
});

// Notification & message states
const showNotifications = ref(false);
const showMessages = ref(false);

// Check window width and set mobile state
// Improved checkScreen function
// const checkScreen = () => {
//     isMobile.value = window.innerWidth < 768;
//     sidebarOpen.value = !isMobile.value;
// };

// Toggle sidebar for mobile
const toggleSidebar = () => {
    sidebarOpen.value = !sidebarOpen.value;
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

const mobileMenuOpen = ref(false)


const toggleMobileMenu = () => {
    mobileMenuOpen.value = !mobileMenuOpen.value
}


const selectedItem = ref('');

// কোন লিংকে ক্লিক করা হয়েছে সেটার জন্য ফাংশন
const setSelected = (item) => {
    selectedItem.value = item;
}
</script>


<template>
<!-- massage & Notification -->



    <div

    style=" font-family: 'Merriweather','SolaimanLipi',sans-serif;"

    class="flex min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Sidebar -->
        <aside
        :class="[
                'fixed inset-y-0 left-0 z-50 w-64 transform transition-transform duration-300 ease-in-out bg-[#004d40] text-white lg:translate-x-0',
                showSidebar ? 'translate-x-0' : '-translate-x-full'
            ]"
        >

          <!-- Replace the header div -->
<div class="h-16 flex text-lg items-center justify-center bg-gradient-to-r from-emerald-600 to-emerald-800 text-white font-semibold">
    <div class="flex items-center gap-2">
        <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2L3 9V20C3 20.5304 3.21071 21.0391 3.58579 21.4142C3.96086 21.7893 4.46957 22 5 22H19C19.5304 22 20.0391 21.7893 20.4142 21.4142C20.7893 21.0391 21 20.5304 21 20V9L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        এক্সাম মেনেজমেন্ট সিস্টেম
    </div>
</div>

            <nav style=" font-family: 'Merriweather','SolaimanLipi',sans-serif;" class="mt-4 space-y-2 overflow-y-auto max-h-[calc(100vh-4rem)] scrollbar-hidden">
               <Link :href="route('admin.admin_Dashboard')" class="text-lg px-4 py-2 hover:bg-[#123524] flex items-center gap-2">
        <i class="fas fa-mosque w-6 h-6 text-sm"></i>
       ই এম ড্যাশবোর্ড
    </Link>

<!-- তাকমিল -->
<div>
    <button @click="dropdownOpen.takmil = !dropdownOpen.takmil"
        class="w-full text-lg flex justify-between items-center px-4 py-2 hover:bg-[#123524]">
        <div class="flex items-center gap-2">
            <i class="fas fa-cog w-6 h-6 text-sm"></i>
            সেটাপ সংক্রান্ত
        </div>
        <i :class="{'rotate-180': dropdownOpen.takmil}" class="fas fa-chevron-down fa-xs transition-transform tex-sm"></i>
    </button>

    <div v-if="dropdownOpen.takmil" class="pl-6">

        <Link :href="route('Mrahala_for_Admin.marhala_details_list')"
            @click="setSelected('marhala')"
            class="px-4 py-2 text-lg hover:bg-[#123524] flex items-center gap-2"
            :class="{'bg-[#123524] text-white': selectedItem === 'marhala'}">
            মারহালা সেটাপ
        </Link>

        <!-- subject_setup_list -->
        <Link :href="route('subjects_for_Admin.subject_search_wizard')"
            @click="setSelected('subject')"
            class="block px-4 py-2 text-lg hover:bg-[#123524]"
            :class="{'bg-[#123524] text-white': selectedItem === 'subject'}">
            বিষয় সেটাপ
        </Link>

        <Link :href="route('central_Exam_setup.central_exam_mng')"
            @click="setSelected('central_exam')"
            class="block px-4 py-2 text-lg hover:bg-[#123524]"
            :class="{'bg-[#123524] text-white': selectedItem === 'central_exam'}">
            কেন্দ্রীয় পরীক্ষা সেটাপ
        </Link>

        <Link href="route('Takmil.cirtificateProvide')"
            @click="setSelected('user_setup')"
            class="block px-4 py-2 text-lg hover:bg-[#123524]"
            :class="{'bg-[#123524] text-white': selectedItem === 'user_setup'}">
            ব্যবহারকারী সেটাপ
        </Link>

        <Link href="route('Takmil.cirtificateProvide')"
            @click="setSelected('instruction')"
            class="block px-4 py-2 text-lg hover:bg-[#123524]"
            :class="{'bg-[#123524] text-white': selectedItem === 'instruction'}">
            নির্দেশনা
        </Link>

    </div>
</div>





                <div>
                    <button @click="dropdownOpen.bill = !dropdownOpen.bill"
                class="w-full text-lg flex justify-between items-center px-4 py-2 hover:bg-[#123524]">
                <div class="flex items-center gap-2">
    <i class="fas fa-cog w-6 h-6 text-sm"></i>
    ভাতা ও বিল
</div>
            <i :class="{'rotate-180': dropdownOpen.bill}" class="fas fa-chevron-down fa-xs transition-transform tex-sm"></i>
        </button>
        <div v-if="dropdownOpen.bill" class="pl-6">
            <Link :href="route('Bill_setup_admin.negran_bill_setup')" class="px-4 py-2 text-lg hover:bg-[#123524] flex items-center gap-2">
                <!-- <i class="fas fa-pen-fancy w-5 h-5"></i> -->
     নেগরান ভাতা
            </Link>
                        <Link :href="route('Bill_setup_admin.mumtahin_bill')" class="block px-4 py-2 text-lg hover:bg-[#123524]">মুমতাহিন ভাতা</Link>


                        <Link :href="route('Bill_setup_admin.markaz_admin_bill')" class="block px-4 py-2 text-lg hover:bg-[#123524]">মারকায এডমিন ভাতা</Link>

                        <Link href="route('Takmil.cirtificateProvide')" class="block px-4 py-2 text-lg hover:bg-[#123524]">জোনাল ভাতা</Link>



                    </div>
                </div>
                <!-- ফযিলত -->

                <div>
                     <button @click="dropdownOpen.orders = !dropdownOpen.orders"
                class="w-full text-lg flex justify-between items-center px-4 py-2 hover:bg-[#123524]">
                <div class="flex items-center gap-2">
    <i class="fas fa-university w-6 h-6 text-sm"></i>
    মাদরাসা সংক্রান্ত
</div>
            <i :class="{'rotate-180': dropdownOpen.orders}" class="fas fa-chevron-down fa-xs fa-xstransition-transform"></i>
        </button>
        <div v-if="dropdownOpen.orders" class="pl-6">
            <Link :href="route('madrasha_data_for_admin.madrasha_list')"
                  class=" px-4 py-2 text-lg hover:bg-[#123524] flex items-center gap-2">
                <!-- <i class="fas fa-user-graduate w-5 h-5"></i> -->
             মাদরাসা তালিকা
            </Link>
                        <Link href="route('students_registration.stuedent_reg_list')" class="block text-lg px-4 py-2 hover:bg-[#123524]">বিবিধ</Link>
                        <Link href="route('students_registration.student_reg_card')" class="block px-4 text-lg py-2 hover:bg-[#123524]">মাদরাসা এডমিন</Link>
                        <Link href="route('students_registration.stue_reg_draft_soft_delete')" class="block px-4 text-lg py-2 hover:bg-[#123524]">ড্রাফ্ট/সফ্ট ডিলিট</Link>
                        <Link href="route('students_registration.stu_reg_payment')" class="block px-4 text-lg  py-2 hover:bg-[#123524]">পেমেন্ট</Link>
                    </div>
                </div>


                <div>
                    <button @click="dropdownOpen.sanawia = !dropdownOpen.sanawia"
                class="w-full text-lg flex justify-between items-center px-4 py-2 hover:bg-[#123524]">
                <div class="flex items-center gap-2">
    <i class="fas fa-mosque w-6 h-6 text-sm"></i>
    মারকায সংক্রান্ত
</div>
            <i :class="{'rotate-180': dropdownOpen.sanawia}" class="fas fa-chevron-down fa-xs transition-transform"></i>
        </button>
                    <div v-if="dropdownOpen.sanawia" class="pl-6">
                        <Link :href="route('markaz_for_admin.markaz_setup')" class="block text-lg px-4 py-2 hover:bg-[#123524]">মারকায সেটাপ</Link>
                        <Link href="route('OntorVukti.softDelete_draft_list')" class="block px-4 text-lg py-2 hover:bg-[#123524]">প্রস্তাবিত মারকায</Link>
                        <Link href="route('OntorVukti.stu_admit_card')" class="block px-4 text-lg py-2 hover:bg-[#123524]">মারকায তালিকা</Link>
                        <Link href="route('OntorVukti.stu_payment')" class="block px-4 text-lg py-2 hover:bg-[#123524]">মারকায পরিবর্তনের আবেদন</Link>
                        <Link href="route('OntorVukti.stu_payment')" class="block px-4 text-lg py-2 hover:bg-[#123524]">মারকায এডমিন</Link>
                        <Link href="route('OntorVukti.stu_payment')" class="block px-4 text-lg py-2 hover:bg-[#123524]">মারকায এডমিন ট্রেনিং</Link>
                        <Link href="route('OntorVukti.stu_payment')" class="block px-4 text-lg py-2 hover:bg-[#123524]">মারকায গ্রুপ</Link>
                        <Link href="route('OntorVukti.stu_payment')" class="block px-4 text-lg py-2 hover:bg-[#123524]">উত্তরপ্রত্র গ্রুপ সেটাপ</Link>
                        <Link href="route('OntorVukti.stu_payment')" class="block px-4 text-lg py-2 hover:bg-[#123524]">মুমতাহিন গ্রুপ</Link>
                    </div>
                </div>


                <!-- মুতাওয়াসসিতাহ -->

                <div>
                     <button @click="dropdownOpen.mutawassita = !dropdownOpen.mutawassita"
                class="w-full text-lg flex justify-between items-center px-4 py-2 hover:bg-[#123524]">
                <div class="flex items-center gap-2">
    <i class="fas fa-tasks w-6 h-6 text-sm"></i>
    পরীক্ষার রুটিন
</div>
            <i :class="{'rotate-180': dropdownOpen.mutawassita}" class="fas fa-chevron-down fa-xs transition-transform"></i>
        </button>
                    <div v-if="dropdownOpen.mutawassita" class="pl-6">
                        <Link href="route('Negran_Mumtahin.negran_mumtahin')" class="block text-lg px-4 py-2 hover:bg-[#123524]">পরীক্ষার রুটিন গ্রুপ</Link>
                        <Link href="route('Negran_Mumtahin.mumtahin_list')" class="block px-4 py-2 text-lg hover:bg-[#123524]">পরীক্ষার রুটিন</Link>
                        <Link href="route('Negran_Mumtahin.negran_apoint_list')" class="block px-4 py-2 text-lg hover:bg-[#123524]">মৌখিক পরীক্ষার মুমতাহিন</Link>
                    </div>
                </div>

                <!-- ইবতেদাইয়্যাহ -->


                <div>
                   <button @click="dropdownOpen.ibtedaia = !dropdownOpen.ibtedaia"
                class="w-full text-lg flex justify-between items-center px-4 py-2 hover:bg-[#123524]">
                <div class="flex items-center gap-2">
    <i class="fas fa-user-plus w-6 h-6 text-sm"></i>
    নিবন্ধন সংক্রান্ত
</div>
            <i :class="{'rotate-180': dropdownOpen.ibtedaia}" class="fas fa-chevron-down fa-xs transition-transform"></i>
        </button>
                    <div v-if="dropdownOpen.ibtedaia" class="pl-6">
                        <Link href="route('About_markaj.madrasha_list')" class="block text-lg px-4 py-2 hover:bg-[#123524]">মাদরাসার তালিকা</Link>
                        <Link :href="route('nibondon_for_admin.nibondon_Markaz_list')" class="block px-4 py-2 hover:bg-[#123524] text-lg">নিবন্ধন তালিকা</Link>
                        <Link :href="route('nibondon_for_admin.abandon_stu_list')" class="block px-4 py-2 hover:bg-[#123524] text-lg">বাতিলকৃত নিবন্ধন তালিকা</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">পেমেন্ট তালিকা</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">বোর্ড ফেরত তালিকা</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">নিবন্ধন পত্র তৈরি</Link>
                    </div>
                </div>

<!-- হিফজুল কোরান -->

<div>
                  <button @click="dropdownOpen.HifzulQuran = !dropdownOpen.HifzulQuran"
                class="w-full text-lg flex justify-between items-center px-4 py-2 hover:bg-[#123524]">
                <div class="flex items-center gap-2">
    <i class="fas fa-user-check w-6 h-6 text-sm"></i>
    অন্তর্ভুক্তি সংক্রান্ত
</div>
            <i :class="{'rotate-180': dropdownOpen.HifzulQuran}" class="fas fa-chevron-down fa-xs transition-transform"></i>
        </button>
                    <div v-if="dropdownOpen.HifzulQuran" class="pl-6">
                        <Link href="route('Fajilat.sanawaia')" class="block px-4 py-2 text-lg hover:bg-[#123524]">অন্তর্ভুক্তি তালিকা</Link>
                        <Link href="" class="block px-4 py-2 hover:bg-[#123524] text-lg">রোল জেনারেট</Link>
                        <Link href="" class="block px-4 py-2 hover:bg-[#123524] text-lg">প্রবেশপত্র তৈরি</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">পেমেন্ট</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">বাতিলকৃত নিবন্ধন তালিকা</Link>
                        <!-- <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">নিয়োগ রিপোর্ট</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">মাদরাসা রিপোর্ট</Link> -->
                    </div>
                </div>


                <!-- কিরাত -->


                <div>
                    <button @click="dropdownOpen.Qirat = !dropdownOpen.Qirat"
                class="w-full text-lg flex justify-between items-center px-4 py-2 hover:bg-[#123524]">
                <div class="flex items-center gap-2">
    <i class="fas fa-book-open w-6 h-6 text-sm"></i>
    খাতা ও লুজ
</div>
            <i :class="{'rotate-180': dropdownOpen.Qirat}" class="fas fa-chevron-down fa-xs transition-transform"></i>
        </button>
                    <div v-if="dropdownOpen.Qirat" class="pl-6">
                        <Link href="route('fazilat.sanawaia')" class="block px-4 py-2 hover:bg-[#123524] text-lg">খাতা ও লুজ সেটাপ</Link>
                        <Link href="" class="block px-4 py-2 hover:bg-[#123524] text-lg">খাতা ও লুজ জেনারেট</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">খাত ও লুজের হিসাব</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">অন্যান্য</Link>
                    </div>
                </div>


                <div>
                    <button @click="dropdownOpen.nigran = !dropdownOpen.nigran"
                class="w-full text-lg flex justify-between items-center px-4 py-2 hover:bg-[#123524]">
                <div class="flex items-center gap-2">
    <i class="fas fa-users-cog w-6 h-6 text-sm"></i>
    নেগরান সংক্রান্ত
</div>
            <i :class="{'rotate-180': dropdownOpen.nigran}" class="fas fa-chevron-down fa-xs transition-transform"></i>
        </button>
                    <div v-if="dropdownOpen.nigran" class="pl-6">
                        <Link href="route('fazilat.sanawaia')" class="block px-4 py-2 hover:bg-[#123524] text-lg">আবেদন তালিকা</Link>
                        <Link href="" class="block px-4 py-2 hover:bg-[#123524] text-lg">প্রস্তাবিত তালিকা</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">অপেক্ষমান তালিকা</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">বাতিল তালিকা</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">মুমতাহিন তালিকা</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">নেগরান রিপোর্ট</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">নেগরান ভাতা</Link>
                    </div>
                </div>



                <div>
                    <button @click="dropdownOpen.mumtahin = !dropdownOpen.mumtahin"
                class="w-full text-lg flex justify-between items-center px-4 py-2 hover:bg-[#123524]">
                <div class="flex items-center gap-2">
    <i class="fas fa-chalkboard-teacher w-6 h-6 text-sm"></i>
    মুমতাহিন সংক্রান্ত
</div>
            <i :class="{'rotate-180': dropdownOpen.mumtahin}" class="fas fa-chevron-down fa-xs transition-transform"></i>
        </button>
                    <div v-if="dropdownOpen.mumtahin" class="pl-6">
                        <Link href="route('fazilat.sanawaia')" class="block px-4 py-2 hover:bg-[#123524] text-lg">আবেদন তালিকা</Link>
                        <Link href="" class="block px-4 py-2 hover:bg-[#123524] text-lg">প্রস্তাবিত তালিকা</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">নিরিক্ষক সেটাপ</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">মুমতাহিন তালিকা</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">দরসিয়াত মুমতাহিন ‍</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">হিফজ মুমতাহিন নির্বাচন ‍</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">কিরাত মুমতাহিন নির্বাচন ‍</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">মুমতাহিন ট্রেনিং ‍</Link>
                    </div>
                </div>

                <div>
                    <button @click="dropdownOpen.zone = !dropdownOpen.zone"
                class="w-full text-lg flex justify-between items-center px-4 py-2 hover:bg-[#123524]">
                <div class="flex items-center gap-2">
    <i class="fas fa-map-marked-alt w-6 h-6 text-sm"></i>
    জেনা সংক্রান্ত
</div>
            <i :class="{'rotate-180': dropdownOpen.zone}" class="fas fa-chevron-down fa-xs transition-transform"></i>
        </button>
                    <div v-if="dropdownOpen.zone" class="pl-6">
                        <Link href="route('fazilat.sanawaia')" class="block px-4 py-2 hover:bg-[#123524] text-lg">জোন সেটাপ</Link>
                        <Link href="" class="block px-4 py-2 hover:bg-[#123524] text-lg">জোনাল নির্বাচন</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">সাব জোন সেটাপ</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">জোনওয়ারী মারকায সেটাপ</Link>
                    </div>
                </div>

                <div>
                    <button @click="dropdownOpen.presentaion = !dropdownOpen.presentaion"
                class="w-full text-lg flex justify-between items-center px-4 py-2 hover:bg-[#123524]">
                <div class="flex items-center gap-2">
    <i class="fas fa-clipboard-check w-6 h-6 text-sm"></i>
    হজিরা সংক্রান্ত
</div>
            <i :class="{'rotate-180': dropdownOpen.presentaion}" class="fas fa-chevron-down fa-xs transition-transform"></i>
        </button>
                    <div v-if="dropdownOpen.presentaion" class="pl-6">
                        <Link href="route('fazilat.sanawaia')" class="block px-4 py-2 hover:bg-[#123524] text-lg">পরীক্ষার্থী হাজিরা</Link>
                        <Link href="" class="block px-4 py-2 hover:bg-[#123524] text-lg">নেগরান হাজিরা</Link>
                        <!-- <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">খাত ও লুজের হিসাব</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">অন্যান্য</Link> -->
                    </div>
                </div>

                <div>
                    <button @click="dropdownOpen.result = !dropdownOpen.result"
                class="w-full text-lg flex justify-between items-center px-4 py-2 hover:bg-[#123524]">
                <div class="flex items-center gap-2">
    <i class="fas fa-chart-line w-6 h-6 text-sm"></i>
    ফলাফল সংক্রান্ত
</div>
            <i :class="{'rotate-180': dropdownOpen.result}" class="fas fa-chevron-down fa-xs transition-transform"></i>
        </button>
                    <div v-if="dropdownOpen.result" class="pl-6">
                        <Link href="route('fazilat.sanawaia')" class="block px-4 py-2 hover:bg-[#123524] text-lg">ফলাফল কন্ডিশন</Link>
                        <Link href="" class="block px-4 py-2 hover:bg-[#123524] text-lg">মেধা কন্ডিশন</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">নিরিক্ষন ফরমুলা</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">দরসিয়াত ফলাফল</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">মৌখিক ফলাফল</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg"> ফলাফল সংশোধন</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg"> নজরে সানী</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg"> নজরে সানী ফলাফল সংশোধন</Link>
                    </div>
                </div>

                <div>
                    <button @click="dropdownOpen.Qirat = !dropdownOpen.Qirat"
                class="w-full text-lg flex justify-between items-center px-4 py-2 hover:bg-[#123524]">
            <div class="flex items-center gap-2">
                <i class="fas fa-file-alt w-6 h-6 text-sm"></i>
              খাতা ও লুজ
            </div>
            <i :class="{'rotate-180': dropdownOpen.Qirat}" class="fas fa-chevron-down fa-xs transition-transform"></i>
        </button>
                    <div v-if="dropdownOpen.Qirat" class="pl-6">
                        <Link href="route('fazilat.sanawaia')" class="block px-4 py-2 hover:bg-[#123524] text-lg">খাতা ও লুজ সেটাপ</Link>
                        <Link href="" class="block px-4 py-2 hover:bg-[#123524] text-lg">খাতা ও লুজ জেনারেট</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">খাত ও লুজের হিসাব</Link>
                        <Link href="#" class="block px-4 py-2 hover:bg-[#123524] text-lg">অন্যান্য</Link>
                    </div>
                </div>




             <Link :href="route('others.massaging')" class=" px-4 text-lg py-2 hover:bg-[#123524] flex items-center gap-2">
        <i class="fas fa-envelope w-6 h-6 text-sm"></i>
        মেসেজিং
    </Link>
                <Link :href="route('others.notice')" class="px-4 text-lg py-2 hover:bg-[#123524] flex items-center gap-2">
        <i class="fas fa-bell w-6 h-6 text-sm"></i>
        নোটিস
    </Link>








            </nav>
        </aside>

        <!-- Main Content -->
        <div
            :class="[
                'flex-1',
                'transition-all duration-300 ease-in-out',
                'md:ml-64'  // Always maintain margin on desktop
            ]"
        >

        <nav class="bg-[#F7F7F7] dark:bg-gray-800 border-b border-emerald-100 dark:border-gray-700 fixed right-0 left-0 z-10 md:left-64">
                <div class=" mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 justify-between items-center">
                        <button
                        @click="showSidebar = !showSidebar"
                        class="lg:hidden text-gray-600 hover:text-gray-900 focus:outline-none"
                    >
                        <span class="material-symbols-outlined">menu</span>
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
                                {{ $page.props.auth.admin.name }}
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

                        <DropdownLink :href="route('admin.logout')" method="post" as="button"
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






<div
            v-show="showSidebar"
            @click="showSidebar = false"
            class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden"
        ></div>






</template>

<style scoped>



</style>
