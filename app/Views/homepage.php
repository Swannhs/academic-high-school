<!-- Homepage Sections -->

<!-- 1. Hero Section -->
<section class="relative h-[650px] flex items-center overflow-hidden bg-primary shadow-2xl">
    <div class="absolute inset-0 z-0 opacity-20">
        <div class="absolute inset-0 bg-gradient-to-r from-primary to-transparent z-10"></div>
        <img class="w-full h-full object-cover grayscale" data-alt="Modern academic building with large glass windows" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCq0s05pHlIEpUGPEbTl7e0t1FLLpngev53SFJODV8GHD8Z4kIPYBUtX7HpXQIw4PKeer4HHFZjgcZzXDplaEisJT667r9hM7rCT9S5nlE-VNZg-wKdzqUfkFLk3pttDPDiTVveHSQIM2yn9WdRJ48H9mRDW03dQGvjFwb46V_JizQKyWs4MHzmjQnDSxarL1i9bevZbSGoprcsLSd2zMs0b9x6Ls_5fvS6pdhO4z-o32e87O5Z8fDXg4Viri6aM1FEy2UvBqPEXw"/>
    </div>
    <div class="relative z-10 w-full px-4 lg:px-16 text-white">
        <div class="max-w-4xl space-y-8 animate-in fade-in slide-in-from-left-8 duration-700">
            <div class="space-y-4">
                <p class="text-xs lg:text-sm font-black uppercase tracking-widest text-emerald-400 bg-emerald-400/10 w-fit px-4 py-2 rounded-full border border-emerald-400/20">Established 1998 • Excellence in Education</p>
                <h2 class="text-4xl lg:text-7xl font-black leading-none drop-shadow-lg">প্রত্যাশা একাডেমিক উচ্চ বিদ্যালয়</h2>
                <h3 class="text-2xl lg:text-4xl font-bold opacity-80 uppercase tracking-tight">Prottasha Academic High School</h3>
            </div>
            <p class="text-lg lg:text-2xl font-medium opacity-90 border-l-4 border-emerald-400 pl-8 max-w-2xl italic leading-relaxed">
                "Nurturing moral values and academic brilliance for a brighter Bangladesh."
            </p>
            <div class="flex flex-wrap gap-4 pt-8">
                <a href="<?= base_url('notices') ?>" class="bg-primary-dark border border-emerald-600 text-white px-10 py-5 rounded-xl font-black text-xs uppercase tracking-widest hover:bg-emerald-400 hover:text-primary transition-all duration-300 shadow-2xl active:scale-95">Latest Notices</a>
                <a href="<?= base_url('admission') ?>" class="bg-white text-primary px-10 py-5 rounded-xl font-black text-xs uppercase tracking-widest hover:scale-105 transition-all shadow-2xl active:scale-95">Admission Info</a>
                <a href="<?= base_url('results') ?>" class="bg-accent text-white px-10 py-5 rounded-xl font-black text-xs uppercase tracking-widest hover:bg-red-800 transition-all shadow-2xl active:scale-95">Result Portal</a>
            </div>
        </div>
    </div>
</section>

<!-- 2. Notice Board Section -->
<section class="py-24 bg-white border-b overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-12 gap-20">
        <!-- Left: Notices (8/12) -->
        <div class="lg:col-span-8 space-y-12">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] uppercase font-black tracking-[0.2em] text-accent mb-2">Announcement Hub</p>
                    <h3 class="text-4xl font-black text-primary tracking-tight">সর্বশেষ নোটিশ সমূহ</h3>
                </div>
                <a href="<?= base_url('notices') ?>" class="flex items-center gap-3 text-secondary font-black text-xs uppercase tracking-widest border-b-2 border-secondary pb-1 hover:gap-6 transition-all group">
                    View Archive <span class="material-symbols-outlined text-sm group-hover:text-accent">arrow_right_alt</span>
                </a>
            </div>
            
            <div class="space-y-6">
                <!-- Notice Item -->
                <div class="group flex items-center gap-8 p-6 bg-surface rounded-2xl border border-transparent hover:border-emerald-100 hover:shadow-xl transition-all cursor-pointer">
                    <div class="flex flex-col items-center justify-center min-w-[80px] h-[80px] bg-white rounded-xl shadow-sm border border-gray-100 group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="text-[10px] uppercase font-black opacity-60 group-hover:opacity-80">MAY</span>
                        <span class="text-3xl font-black">24</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-xl font-black text-gray-900 group-hover:text-primary transition-colors">Internal Semester Final Exam Routine 2024 (Class 6-10)</h4>
                        <p class="text-sm text-gray-500 font-medium mt-1 italic">Published by Academic Council on Jun 1, 2024</p>
                    </div>
                    <span class="material-symbols-outlined text-gray-300 group-hover:text-emerald-500 transition-colors">description</span>
                </div>
                <!-- Notice Item 2 -->
                <div class="group flex items-center gap-8 p-6 bg-surface rounded-2xl border border-transparent hover:border-emerald-100 hover:shadow-xl transition-all cursor-pointer">
                    <div class="flex flex-col items-center justify-center min-w-[80px] h-[80px] bg-white rounded-xl shadow-sm border border-gray-100 group-hover:bg-accent group-hover:text-white transition-colors">
                        <span class="text-[10px] uppercase font-black opacity-60 group-hover:opacity-80">MAY</span>
                        <span class="text-3xl font-black">18</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-xl font-black text-gray-900 group-hover:text-accent transition-colors">Admission Circular for Vocational & Higher Secondary 2024-25</h4>
                        <p class="text-sm text-gray-500 font-medium mt-1 italic">Published by Admissions Office on May 20, 2024</p>
                    </div>
                    <span class="material-symbols-outlined text-gray-300 group-hover:text-accent transition-colors">open_in_new</span>
                </div>
            </div>
        </div>

        <!-- Right: Stats -->
        <div class="lg:col-span-4 bg-primary text-white p-12 rounded-3xl space-y-10 relative overflow-hidden shadow-2xl">
            <h4 class="text-lg font-black uppercase tracking-widest border-b border-white/10 pb-4">Campus Snapshot</h4>
            <div class="space-y-8">
                <div class="flex items-end gap-4">
                    <span class="text-5xl font-black text-emerald-400 leading-none">98.5%</span>
                    <p class="text-[10px] uppercase font-black tracking-widest opacity-60 pb-1">SSC Success Batch 2023</p>
                </div>
                <div class="flex items-end gap-4">
                    <span class="text-5xl font-black text-emerald-400 leading-none">42+</span>
                    <p class="text-[10px] uppercase font-black tracking-widest opacity-60 pb-1">Specialized Lab Facilities</p>
                </div>
                <div class="flex items-end gap-4">
                    <span class="text-5xl font-black text-emerald-400 leading-none">125k</span>
                    <p class="text-[10px] uppercase font-black tracking-widest opacity-60 pb-1">Digital Library Resources</p>
                </div>
            </div>
            <a href="<?= base_url('academic-info') ?>" class="block w-full bg-white text-primary text-center py-5 rounded-2xl font-black uppercase text-xs tracking-widest shadow-lg hover:scale-95 transition-all">Download Prospectus</a>
        </div>
    </div>
</section>

<!-- 3. Principal's Message -->
<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center gap-20">
        <div class="md:w-5/12 relative">
            <div class="aspect-[3/4] rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                <img class="w-full h-full object-cover" data-alt="Portrait of South Asian academic professional" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAwb0B-ArmzFBuLfoyvtQEeKwht9wKtJsjpkkhF3C-Lk3MUx5DSO7XoO3bCV4_qwdafpFa5W17-hC3udt_J6XJHEXfu40IySi_G5ZmQ4vz_NcG5ZNNfS1D6ItU44qQcO-MXGQthZTcoe5i1Z8-TTdtKGhrC9p6YJgWTYFYhz_k2jYX7dv4MaVo45TL7sKjQKD0CmIeO75tiDZ17C_6t9alEo2ncTSdjU3po0D-ZFdoacjH2h0jCHWMojswZ-9FJqGznzCbR6pIsjA"/>
            </div>
            <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-emerald-400/20 backdrop-blur-xl rounded-full border border-emerald-400/30 -z-10 animate-pulse"></div>
        </div>
        <div class="md:w-7/12 space-y-8">
            <div>
                <p class="text-[10px] uppercase font-black tracking-[0.2em] text-primary mb-2">Message from Head of Institution</p>
                <h3 class="text-5xl font-black text-gray-900 leading-tight">"আমরা মানুষ গড়ি, কেবল শিক্ষিত নয়।"</h3>
                <h4 class="text-2xl font-bold text-gray-500 italic uppercase">Dedicated to Character & Excellence</h4>
            </div>
            <div class="text-gray-600 text-lg leading-relaxed font-medium space-y-4">
                <p>Welcome to Prottasha Academic High School. Our institution is not just a building; it is a vision to shape the future of our nation through disciplined education and moral grounding.</p>
                <p>At Prottasha, we treat every student as a unique talent. Our mission is to provide an environment where curiosity thrives and leadership is born. Join us in this journey.</p>
            </div>
            <div class="pt-6">
                <p class="text-2xl font-black text-primary">Md. Abdur Rahman</p>
                <p class="text-xs uppercase font-black tracking-widest text-gray-400">Principal, Prottasha Academic High School</p>
                <a href="<?= base_url('about') ?>" class="inline-block mt-8 text-primary font-black text-xs uppercase tracking-widest border-2 border-primary px-8 py-3 rounded-full hover:bg-primary hover:text-white transition-all">Read Full Letter</a>
            </div>
        </div>
    </div>
</section>

<!-- 4. Quick Link Grid -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <p class="text-[10px] uppercase font-black tracking-[0.2em] text-accent mb-2">Quick Resources</p>
            <h3 class="text-4xl font-black text-primary">প্রয়োজনীয় লিঙ্ক সমূহ</h3>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-6">
            <!-- Admission Card -->
            <a href="<?= base_url('admission') ?>" class="group p-10 bg-surface rounded-3xl border border-transparent hover:border-emerald-100 hover:bg-white hover:shadow-2xl transition-all text-center space-y-6">
                <div class="w-20 h-20 bg-primary/5 rounded-2xl mx-auto flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-4xl">person_add</span>
                </div>
                <span class="block text-sm font-black uppercase tracking-widest text-gray-900 group-hover:text-primary transition-colors">Admission Info</span>
            </a>
            <!-- Results Card -->
            <a href="<?= base_url('results') ?>" class="group p-10 bg-surface rounded-3xl border border-transparent hover:border-red-100 hover:bg-white hover:shadow-2xl transition-all text-center space-y-6">
                <div class="w-20 h-20 bg-accent/5 rounded-2xl mx-auto flex items-center justify-center text-accent group-hover:bg-accent group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-4xl">military_tech</span>
                </div>
                <span class="block text-sm font-black uppercase tracking-widest text-gray-900 group-hover:text-accent transition-colors">Result Portal</span>
            </a>
            <!-- Routine Card -->
            <a href="<?= base_url('routines') ?>" class="group p-10 bg-surface rounded-3xl border border-transparent hover:border-emerald-100 hover:bg-white hover:shadow-2xl transition-all text-center space-y-6">
                <div class="w-20 h-20 bg-secondary/5 rounded-2xl mx-auto flex items-center justify-center text-secondary group-hover:bg-secondary group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-4xl">calendar_today</span>
                </div>
                <span class="block text-sm font-black uppercase tracking-widest text-gray-900 group-hover:text-secondary transition-colors">Class Routine</span>
            </a>
            <!-- Teachers Card -->
            <a href="<?= base_url('teachers') ?>" class="group p-10 bg-surface rounded-3xl border border-transparent hover:border-emerald-100 hover:bg-white hover:shadow-2xl transition-all text-center space-y-6">
                <div class="w-20 h-20 bg-primary/5 rounded-2xl mx-auto flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-4xl">groups</span>
                </div>
                <span class="block text-sm font-black uppercase tracking-widest text-gray-900 group-hover:text-primary transition-colors">Teacher List</span>
            </a>
        </div>
    </div>
</section>

<!-- 5. Featured Gallery -->
<section class="py-24 bg-surface border-t">
    <div class="max-w-7xl mx-auto px-4 space-y-12">
        <div class="flex items-end justify-between">
            <div>
                <p class="text-[10px] uppercase font-black tracking-[0.2em] text-primary mb-2">Campus Moments</p>
                <h3 class="text-4xl font-black text-gray-900 leading-tight">Campus Gallery Highlights</h3>
            </div>
            <a href="<?= base_url('gallery') ?>" class="bg-primary text-white px-8 py-3 rounded-full font-black text-xs uppercase tracking-widest hover:bg-emerald-600 transition-all">View Full Gallery</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2 aspect-[16/9] rounded-3xl overflow-hidden border-4 border-white shadow-xl group">
                <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA61Kw773jF5CtCQ3qUE260EdlO9w0eZUGU6wndoODYInOKfFSCK7mFfIWyBK_W8aZ7y0Gx85_M78HFOGIZMBbHzDWLGmQc2hNQhjqaNwjOStmkPPhWI9ZtFNMRM2CbHrGf1jP1VpxSsHREZTU_EnfZr0z7Kx72dhGl3zHh9HgFVPRDjA9azKNQsGGIcMF4JZZRu3izfv7KfvoQ0N25xtoGpyd_-dqLEqOSR7qOPAAWaN6U2yUaLAnWHtWw5_71u7Pj0hpw5IM2Bw"/>
            </div>
            <div class="space-y-6">
                <div class="aspect-square rounded-3xl overflow-hidden border-4 border-white shadow-xl group">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCH890BV1h3sW5iCNIRUv4059FrrCr96EIumlkbk1SU-I8Y4GmEov71dNAYCnWGnYboxgjbRACZGFeL0OBjFNXpBBI2H1kXzHK3ciUFvG5uvpSL_qw63fIwkJK4Mmb46J6Xcs4IET8MTnPKp9fDZkhNm_8Un4fdzZCl4putkduKIyyhBv7rn-UC-SXCcdYmnqFVaJheInIZ7WXgm0jEFh_vU5MemQnhqWlj3QskCkbWBYz9COfy37bA_h-GpaYLzG_0r0L9H1Ceeg"/>
                </div>
                <div class="aspect-square rounded-3xl overflow-hidden border-4 border-white shadow-xl group">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCrDBbuQcYHjKU-BfNWzdOonvx4MtK_SVmSre7gZ1unt3CJUd_2ZvyKHn4_kwsmYC7uC1DCiciA0uGYrxEB2djQH2WrlMauBTUB4v1T8zA6syl4xpmdVQMXT3s3TycfmEABb-JZOMCSF0MEFM03FFryi2-zKDkPPYopU1Y1F3rsZ2Vqbt4Orx4IcyaxJ3-y0wWGuzYyDnGfSA2griacPp9UJE-4rY6Bfy_oLu3SE9WVgl9lySlB1d3Iyqax6RRuSTkqv8jn7R1Cxw"/>
                </div>
            </div>
        </div>
    </div>
</section>