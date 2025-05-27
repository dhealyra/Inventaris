<header class="bg-white shadow-md rounded-md text-sm py-4 px-6 mx-4 mt-4">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <nav class="flex items-center justify-between w-full" aria-label="Global">

      <!-- Menu kiri -->
      <ul class="flex items-center gap-4">
        <li class="xl:hidden">
          <a href="javascript:void(0)" class="text-xl cursor-pointer text-heading" id="headerCollapse" data-hs-overlay="#application-sidebar-brand" aria-controls="application-sidebar-brand" aria-label="Toggle navigation">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <!-- Judul Halaman -->
        <h5 class="text-lg font-semibold text-secondary">
          @yield('page-title', 'Dashboard')
        </h5>
      </ul>

      <!-- Profil Dropdown -->
      <div class="flex items-center gap-4">
        <div class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
          <a class="hs-dropdown-toggle cursor-pointer align-middle rounded-full">
            <img class="object-cover w-9 h-9 rounded-full" src="{{ asset ('assets/images/profile/user-1.jpg') }}" alt="User Profile" />
          </a>

          <div class="card hs-dropdown-menu mt-2 w-[200px] hidden z-[12] transition-[opacity,margin] rounded-md opacity-0 hs-dropdown-open:opacity-100">
            <div class="card-body p-0 py-2">
              <a href="#" class="flex gap-2 items-center px-4 py-1.5 hover:bg-gray-200 text-gray-500">
                <i class="ti ti-user text-xl"></i><span class="text-sm">My Profile</span>
              </a>
              <a href="#" class="flex gap-2 items-center px-4 py-1.5 hover:bg-gray-200 text-gray-500">
                <i class="ti ti-mail text-xl"></i><span class="text-sm">My Account</span>
              </a>
              <a href="#" class="flex gap-2 items-center px-4 py-1.5 hover:bg-gray-200 text-gray-500">
                <i class="ti ti-list-check text-xl"></i><span class="text-sm">My Task</span>
              </a>
              <div class="px-4 mt-2">
                <a href="../../pages/authentication-login.html" class="btn-outline-primary font-medium text-[15px] w-full hover:bg-blue-600 hover:text-white">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </nav>
  </div>
</header>
