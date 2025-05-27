<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}" />

    <title>Rockhool</title>
</head>
<body class="bg-surface">
    <script>
        function previewImage(event) {
            const input = event.target;
            const icon = document.getElementById('icon-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    icon.src = e.target.result;
                    icon.classList.add('rounded-md');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>



    <div id="main-wrapper" class="flex pt-0 p-5 xl:pr-0">
        <!-- SIDEBAR -->
        @include('layouts.sidebar')

        <!-- MAIN CONTENT -->
        <div class="w-full page-wrapper xl:px-6 px-0">
            <main class="h-full max-w-full">
                <div class="container full-container p-0 flex flex-col gap-6">

                    <!-- NAVBAR -->
                    @include('layouts.navbar')

                    <!-- PAGE CONTENT -->
                    <main class="p-6">
                        <div class="container full-container p-0 flex flex-col gap-6">
                            @yield('content')
                        </div>
                    </main>
                </div>
            </main>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/iconify-icon/dist/iconify-icon.min.js') }}"></script>
    <script src="{{ asset('assets/libs/@preline/dropdown/index.js') }}"></script>
    <script src="{{ asset('assets/libs/@preline/overlay/index.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('assets/libs/preline/dist/preline.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>
</html>
