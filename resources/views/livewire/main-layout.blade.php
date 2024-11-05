<div>
    <x-componentes.aside-home />
    <div class="sm:ml-44 dark:bg-[#4985a8] w-auto h-screen sm:pt-24 pt-20 sm:p-10">
        <div class="w-full flex-grow rounded-xl">

            @switch($view)
            @case('dashboard')
            @livewire('vistas.dashboard')
            @break

            @case('personales')
            @livewire('vistas.personales')
            @break

            @case('pacientes')
            @livewire('vistas.pacientes')
            @break

            @case('farmacos')
            @livewire('vistas.farmacos')
            @break

            @case('presentaciones')
            @livewire('vistas.presentaciones')
            @break

            @case('citas')
            @livewire('vistas.citas')
            @break

            @case('historiales')
            @livewire('vistas.historiales')
            @break

            @case('recetas')
            @livewire('vistas.recetas')
            @break

            @default
            <p>Vista no encontrada</p>
            @endswitch

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('new_per', (event) => {
                console.log(event);
                let timerInterval;
                Swal.fire({
                    title: event.message,
                    html: "Esperé se esta subiendo los datos <b></b> .<br> Su contraseña es: <b>"+event.pass+"</b>",
                    timer: 4000,
                    timerProgressBar: true,
                    didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 100);
                    },
                    willClose: () => {
                    clearInterval(timerInterval);
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                    console.log("I was closed by the timer");
                    }
                });
            });

            Livewire.on('edit', (event) => {
                        console.log(event);
                        let timerInterval;
                        Swal.fire({
                        title: event.message,
                        html: "Esperé se esta subiendo los datos <b></b> .<br> Su contraseña es: <b>"+event.pass+"</b>",
                        timer: 4000,
                        timerProgressBar: true,
                        didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                        },
                        willClose: () => {
                        clearInterval(timerInterval);
                        }
                        }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                        console.log("I was closed by the timer");
                        }
                        });
                        });
        });

    </script>
</div>