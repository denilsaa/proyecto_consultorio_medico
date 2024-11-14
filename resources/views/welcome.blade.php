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

<body class="text-white ">

    <nav class="border-gray-200 dark:bg-gray-900 bg-sky-700 backdrop-blur-2xl relative right-0 top-0">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <x-application-logo
                    class=" w-24 h-auto fill-current text-gray-500 drop-shadow-[2px_1px_5px_rgba(0,0,0,0.78)]" />

            </a>
            <div class="flex items-center md:order-2 space-x-1 md:space-x-2 rtl:space-x-reverse">
                @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth

                    @if ($userHasPaciente)
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 drop-shadow-[2px_1px_5px_rgba(0,0,0,0.78)]">
                        Agendar cita
                    </button>
                    <div class="flex items-center">
                        <div class="flex items-center ms-3">
                            <div>
                                <button type="button"
                                    class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                    aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full"
                                        src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                        alt="user photo">
                                </button>
                            </div>
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                                id="dropdown-user">
                                <div class="px-4 py-3" role="none">
                                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                                        {{ Auth::user()->nombre }}

                                        {{ Auth::user()->ap_paterno }}
                                        {{ Auth::user()->ap_materno }}
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300"
                                        role="none">
                                        {{ Auth::user()->correo }}
                                    </p>
                                </div>
                                <ul class="py-1" role="none">
                                    <li>
                                        <a href="{{route('profile.edit')}}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            {{__('Profile')}}
                                        </a>
                                    </li>
                                    <li>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <a href="route('logout')"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                role="menuitem"
                                                onclick="event.preventDefault();
                                                                                        this.closest('form').submit();">



                                                {{ __('Log Out') }}
                                            </a>
                                        </form>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @else
                    <a href="{{ url('/home') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ">
                        Dashboard
                    </a>
                    @endif

                    @else
                    <a href="{{ route('login') }}"
                        class="text-gray-800 dark:text-white hover:bg-gray-300 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                        {{ __('Login') }}
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-4">
                        {{ __('Register') }}
                    </a>
                    @endif
                    @endauth
                </nav>
                @endif
            </div>
        </div>
    </nav>

    <section
        class="bg-center bg-no-repeat bg-[url('https://images.pexels.com/photos/8460371/pexels-photo-8460371.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')] bg-gray-600 bg-blend-multiply bg-cover ">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <div class="flex">

            </div>
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                Tu Salud en Buenas Manos</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Confía en nuestra
                experiencia y dedicación para cuidar de ti y de los tuyos. Estamos aquí para ayudarte a vivir
                mejor.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="{{ route('login') }}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Get started
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                <a href="#"
                    class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Learn more
                </a>
            </div>
        </div>
    </section>

    <section
        class="bg-white dark:bg-gray-900 bg-[url('https://media.istockphoto.com/id/1490540105/ja/%E3%83%99%E3%82%AF%E3%82%BF%E3%83%BC/%E3%83%99%E3%82%AF%E3%82%BF%E3%83%BC%E7%94%BB%E5%83%8F%E5%86%85%E3%81%AE%E5%85%89%E3%83%91%E3%82%BF%E3%83%BC%E3%83%B3%E3%81%AE%E8%96%AC%E3%81%AE%E4%B8%B8%E8%96%AC%E3%82%AB%E3%83%97%E3%82%BB%E3%83%AB.jpg?s=170667a&w=0&k=20&c=2BbeWAjA4ehzT0XlVmShQKc262wILPEtJIclLBIi2DE=')] bg-repeat bg-blend-multiply">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div
                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8 drop-shadow-[2px_1px_5px_rgba(0,0,0,0.78)] animate__animated animate__backInUp">
                <a href="#"
                    class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 14">
                        <path
                            d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z" />
                    </svg>
                    Historia
                </a>
                <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">Nuestra
                    Historia</h1>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">Fundado en 2017, nuestro
                    consultorio nació como
                    un proyecto comunitario con el firme propósito de proporcionar atención médica accesible y
                    de
                    calidad a nuestra comunidad. Desde el principio, nos hemos comprometido a ofrecer un enfoque
                    integral que priorice el bienestar físico, mental y emocional de cada uno de nuestros
                    pacientes. A
                    lo largo de los años, hemos crecido y evolucionado, pero mantenemos intactos nuestros
                    valores
                    fundamentales: la atención personalizada, la empatía y el compromiso con la salud de quienes
                    confían
                    en nosotros. Nos esforzamos constantemente por mejorar nuestros servicios a través de la
                    innovación
                    y la capacitación continua de nuestro equipo médico, siempre con la mirada puesta en brindar
                    soluciones efectivas y humanas a las necesidades de salud de la comunidad.</p>

            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <div
                    class="animate__animated animate__backInUp bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 drop-shadow-[2px_1px_5px_rgba(0,0,0,0.78)]">
                    <a href="#"
                        class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                        </svg>
                        Visión
                    </a>
                    <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">
                        Visión
                    </h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Ser el consultorio
                        médico de referencia en
                        la comunidad, reconocido por nuestra excelencia en atención, innovación en tratamientos
                        y un
                        enfoque humano que prioriza la salud y el bienestar de cada individuo. Aspiramos a
                        empoderar a
                        nuestros pacientes a tomar decisiones informadas sobre su salud, creando un futuro más
                        saludable
                        para todos.</p>
                </div>
                <div
                    class="animate__animated animate__backInUp bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 drop-shadow-[2px_1px_5px_rgba(0,0,0,0.78)]">
                    <a href="#"
                        class="bg-purple-100 text-purple-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-purple-400 mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 4 1 8l4 4m10-8 4 4-4 4M11 1 9 15" />
                        </svg>
                        Misión
                    </a>
                    <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">Misión</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Brindar atención médica
                        de alta calidad,
                        centrada en el paciente, a través de un equipo profesional comprometido con la salud y
                        el
                        bienestar de nuestra comunidad. Fomentamos la prevención, la educación y el cuidado
                        integral,
                        garantizando un ambiente seguro y acogedor para todos nuestros pacientes.</p>
                </div>
            </div>

            <div
                class="animate__animated animate__backInUp bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8 drop-shadow-[2px_1px_5px_rgba(0,0,0,0.78)]">
                <a href="#"
                    class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 14">
                        <path
                            d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z" />
                    </svg>
                    Maps
                </a>
                <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">Nuestra
                    Ubicacion</h1>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3824.8766028167443!2d-68.08991702492449!3d-16.532326184216267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f2100631700b1%3A0x533d6ae7dc361c5a!2sMEGACENTER%20La%20Paz!5e0!3m2!1ses-419!2sbo!4v1729335819289!5m2!1ses-419!2sbo"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    class="w-full h-96 rounded-lg border"></iframe>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <div
                    class="animate__animated animate__backInUp bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 drop-shadow-[2px_1px_5px_rgba(0,0,0,0.78)]">
                    <a href="#"
                        class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                        </svg>
                        Servicios
                    </a>
                    <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">
                        Nuestros Servicios
                    </h2>
                    <ul class="font-normal text-gray-700 dark:text-gray-400">
                        <li>✔ Consulta médica general</li>
                        <li>✔ Tratamientos especializados</li>
                        <li>✔ Control y monitoreo de enfermedades crónicas</li>
                    </ul>
                </div>
                <div
                    class="animate__animated animate__backInUp bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 drop-shadow-[2px_1px_5px_rgba(0,0,0,0.78)]">
                    <a href="#"
                        class="bg-purple-100 text-purple-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-purple-400 mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 4 1 8l4 4m10-8 4 4-4 4M11 1 9 15" />
                        </svg>
                        Horarios
                    </a>
                    <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">Horarios de Atención
                    </h2>
                    <ul class="font-normal text-gray-700 dark:text-gray-400">
                        <li>Lunes a Viernes: 8:00 AM - 6:00 PM</li>
                        <li>Sábado: 9:00 AM - 2:00 PM</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="https://flowbite.com/"
                    class="hover:underline">InnovaTech™</a>. All Rights Reserved.
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