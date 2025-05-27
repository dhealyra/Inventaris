<aside id="application-sidebar-brand" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-[90px] xl:left-auto top-0 left-0 with-vertical h-screen z-[999] shrink-0  w-[270px] shadow-md xl:rounded-md rounded-none bg-white left-sidebar   transition-all duration-300">     
  <div class="p-4">
    <a href="../" class="text-nowrap">
      <img src="{{ asset('') }}" alt="Logo-Dark" />
    </a>
  </div>
  
  <div class="scroll-sidebar" data-simplebar="">
     <nav class=" w-full flex flex-col sidebar-nav px-4 mt-5">
         <ul id="sidebarnav" class="text-gray-600 text-sm">
            <li class="sidebar-item">
              <a class="sidebar-link gap-3 py-2.5 my-1 text-base  flex items-center relative  rounded-md text-gray-500  w-full" href="{{ route('barang.index') }}">
                <i class="ti ti-layout-dashboard ps-2  text-2xl"></i> <span>Barang</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link gap-3 py-2.5 my-1 text-base  flex items-center relative  rounded-md text-gray-500  w-full" href="{{ route('locations.index') }}">
                <i class="ti ti-layout-dashboard ps-2  text-2xl"></i> <span>Location</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link gap-3 py-2.5 my-1 text-base  flex items-center relative  rounded-md text-gray-500  w-full" href="{{ route('petugas.index') }}">
                <i class="ti ti-layout-dashboard ps-2  text-2xl"></i> <span>Petugas</span>
              </a>
            </li>
          </ul>
      </nav>
    </div>
</aside>