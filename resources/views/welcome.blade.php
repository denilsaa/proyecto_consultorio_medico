<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inicio</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 ">
        
        <nav class=" bg-white border-gray-200 dark:bg-gray-900">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://cdn-icons-png.flaticon.com/512/4346/4346669.png" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white text-black">Salud Vital</span>
                </a>
                <div class="flex items-center md:order-2 space-x-1 md:space-x-2 rtl:space-x-reverse">
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a
                                href="{{ url('/home') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Dashboard
                            </a>
                    @else
                            <a href="{{ route('login') }}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Register</a>
                            @endif
                        @endauth
                        </nav>
                    @endif
                </div>                
            </div>
        </nav>

        <div class="p-4 ">
            <div class="">
                {{-- Carousel --}}
                <div class="flex items-center justify-center h-5/6 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                    <div id="default-carousel" class="relative w-full" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative h-48 overflow-hidden md:h-96">
                            <!-- Item 1 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="https://medially.co/wp-content/uploads/2023/07/medidas-consultorios-medicos.jpg" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Consultorio médico">
                            </div>
                            <!-- Item 2 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="https://png.pngtree.com/background/20230606/original/pngtree-clean-medical-office-is-shown-picture-image_2880028.jpg" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Imagen 2">
                            </div>
                            <!-- Item 3 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="https://images.adsttc.com/media/images/5478/10cd/e58e/ce98/5800/00db/large_jpg/Sendagrup_010.jpg?1417154748" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Imagen 3">
                            </div>
                        </div>
                        
                        <!-- Slider indicators -->
                        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/50 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-black dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-black dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 mb-4">
                    < <div class=" p-2 items-center justify-center rounded bg-gray-50 h-40 dark:bg-gray-800">
                        
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Nuestra Historia</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">"Fundado en 2017, nuestro consultorio nació como un proyecto comunitario con el firme propósito de proporcionar atención médica accesible y de calidad a nuestra comunidad. Desde el principio, nos hemos comprometido a ofrecer un enfoque integral que priorice el bienestar físico, mental y emocional de cada uno de nuestros pacientes. A lo largo de los años, hemos crecido y evolucionado, pero mantenemos intactos nuestros valores fundamentales: la atención personalizada, la empatía y el compromiso con la salud de quienes confían en nosotros. Nos esforzamos constantemente por mejorar nuestros servicios a través de la innovación y la capacitación continua de nuestro equipo médico, siempre con la mirada puesta en brindar soluciones efectivas y humanas a las necesidades de salud de la comunidad."</p>
                        
                    </div>
                </div>

                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class=" p-2 items-center justify-center rounded bg-gray-50 h-40 dark:bg-gray-800">
                        
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Visión</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">"Ser el consultorio médico de referencia en la comunidad, reconocido por nuestra excelencia en atención, innovación en tratamientos y un enfoque humano que prioriza la salud y el bienestar de cada individuo. Aspiramos a empoderar a nuestros pacientes a tomar decisiones informadas sobre su salud, creando un futuro más saludable para todos."</p>
                        
                    </div>                    
                    <div class=" p-2 items-center justify-center rounded bg-gray-50 h-40 dark:bg-gray-800">
                        
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Misión</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">"Brindar atención médica de alta calidad, centrada en el paciente, a través de un equipo profesional comprometido con la salud y el bienestar de nuestra comunidad. Fomentamos la prevención, la educación y el cuidado integral, garantizando un ambiente seguro y acogedor para todos nuestros pacientes."</p>
                        
                    </div>
                </div>

                <div class="flex items-center justify-center h-96 mb-4 bg-gray-50 dark:bg-gray-800">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3824.8766028167443!2d-68.08991702492449!3d-16.532326184216267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f2100631700b1%3A0x533d6ae7dc361c5a!2sMEGACENTER%20La%20Paz!5e0!3m2!1ses-419!2sbo!4v1729335819289!5m2!1ses-419!2sbo" 
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="google-map w-full h-full"></iframe>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class=" p-2 items-center justify-center rounded bg-gray-50 h-40 dark:bg-gray-800">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Nuestros Servicios</h5>
                        <ul class="font-normal text-gray-700 dark:text-gray-400">
                           <li>✔ Consulta médica general</li>
                           <li>✔ Tratamientos especializados</li>
                           <li>✔ Control y monitoreo de enfermedades crónicas</li>
                        </ul>
                     </div>
                     
                     <div class="p-2 items-center justify-center rounded bg-gray-50 h-40 dark:bg-gray-800">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Horarios de Atención</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Lunes a Viernes: 8:00 AM - 6:00 PM <br>Sábado: 9:00 AM - 2:00 PM</p>
                     </div>
                     
                </div>
            </div>
        </div>

        <footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
            <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="https://flowbite.com/" class="hover:underline">InnovaTech™</a>. All Rights Reserved.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
            </div>
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    </body>
</html>





