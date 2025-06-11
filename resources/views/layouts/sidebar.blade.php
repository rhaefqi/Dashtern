 <!-- Layout Utama -->
 <div class="flex h-screen">

     <!-- Sidebar -->
     <aside class="w-64 bg-white flex flex-col items-center py-6 shadow-md">
         <!-- Logo dan Nama -->
         <div class="flex items-center mb-10 ml-0">
             <div class="w-10 h-10 scale-150">
                 <img src="/image/logo.png" alt="Logo" class="w-full h-full object-contain" />
             </div>
             <span class="ml-1 text-2xl font-bold text-[#145A5A]">Dashtern</span>
         </div>

         <!-- Navigasi -->
         <nav class="w-full px-4 space-y-4">
             <a href="{{ url('/beranda') }}"
                 class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->is('beranda') || request()->is('/*') ? 'bg-[#145A5A] text-white shadow' : 'text-black hover:bg-gray-100' }}">
                 <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                     <path d="M10 2L2 8v10a1 1 0 001 1h5V12h4v7h5a1 1 0 001-1V8l-8-6z" />
                 </svg>
                 <span>Beranda</span>
                 </>
                 <a href="/gabung"
                     class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->is('kelas*') || request()->is('gabung*') || request()->is('tugas*') || request()->is('form*') ? 'bg-[#145A5A] text-white shadow' : 'text-black hover:bg-gray-100' }}">
                     <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                         <path fill-rule="evenodd"
                             d="M4.5 2.25a.75.75 0 0 0 0 1.5v16.5h-.75a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5h-.75V3.75a.75.75 0 0 0 0-1.5h-15ZM9 6a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm-.75 3.75A.75.75 0 0 1 9 9h1.5a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM9 12a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm3.75-5.25A.75.75 0 0 1 13.5 6H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM13.5 9a.75.75 0 0 0 0 1.5H15A.75.75 0 0 0 15 9h-1.5Zm-.75 3.75a.75.75 0 0 1 .75-.75H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM9 19.5v-2.25a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-.75.75h-4.5A.75.75 0 0 1 9 19.5Z"
                             clip-rule="evenodd" />
                     </svg>
                     <span>Kelas</span>
                 </a>
                 <a href="/progres"
                     class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->is('progres') ? 'bg-[#145A5A] text-white shadow' : 'text-black hover:bg-gray-100' }}">
                     <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                         <path fill-rule="evenodd"
                             d="M2.25 2.25a.75.75 0 0 0 0 1.5H3v10.5a3 3 0 0 0 3 3h1.21l-1.172 3.513a.75.75 0 0 0 1.424.474l.329-.987h8.418l.33.987a.75.75 0 0 0 1.422-.474l-1.17-3.513H18a3 3 0 0 0 3-3V3.75h.75a.75.75 0 0 0 0-1.5H2.25Zm6.54 15h6.42l.5 1.5H8.29l.5-1.5Zm8.085-8.995a.75.75 0 1 0-.75-1.299 12.81 12.81 0 0 0-3.558 3.05L11.03 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l2.47-2.47 1.617 1.618a.75.75 0 0 0 1.146-.102 11.312 11.312 0 0 1 3.612-3.321Z"
                             clip-rule="evenodd" />
                     </svg>
                     <span>Progres Kinerja</span>
                 </a>
                 <a href="/panduan"
                     class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->is('panduan') ? 'bg-[#145A5A] text-white shadow' : 'text-black hover:bg-gray-100' }}">
                     <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 22">
                         <path
                             d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                     </svg>
                     <span>Panduan</span>
                 </a>
                 <a href="/tentang"
                     class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->is('tentang') ? 'bg-[#145A5A] text-white shadow' : 'text-black hover:bg-gray-100' }}">
                     <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                         <path fill-rule="evenodd"
                             d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                             clip-rule="evenodd" />
                     </svg>
                     <span>Tentang</span>
                 </a>
                 <a href="/profil"
                     class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->is('profil') || request()->is('ganti-password*') ? 'bg-[#145A5A] text-white shadow' : 'text-black hover:bg-gray-100' }}">
                     <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                         <path
                             d="M12 12a5 5 0 10-5-5 5 5 0 005 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z" />
                     </svg>
                     <span>Profil</span>
                 </a>
                 <div class="pt-10">
                     <form method="POST" action="{{ route('logout') }}">
                         @csrf
                         <button type="submit"
                             class="w-full text-left flex items-center space-x-3 px-4 py-3 rounded-lg 
            {{ request()->is('profil') || request()->is('ganti-password*') ? 'bg-[#145A5A] text-white shadow' : 'text-black hover:bg-gray-100' }}">
                             <svg class="w-5 h-5" fill="red" viewBox="0 0 24 24">
                                 <path
                                     d="M12 12a5 5 0 10-5-5 5 5 0 005 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z" />
                             </svg>
                             <span>Logout</span>
                         </button>
                     </form>
                 </div>
         </nav>
     </aside>
 </div>
