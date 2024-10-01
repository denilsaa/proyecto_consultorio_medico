# 📋 Sistema de Gestión de Citas Médicas

Este es un sistema de gestión de citas para un consultorio médico, desarrollado con **Laravel Livewire**. Proporciona una solución completa para la administración de citas, gestión de pacientes y la organización del calendario de médicos. El sistema permite a los usuarios programar, modificar y cancelar citas de manera eficiente, garantizando una experiencia fluida tanto para el personal médico como para los pacientes.

## 🛠️ Tecnologías Utilizadas

- **Laravel 11.x**: Framework principal del proyecto.
- **Livewire**: Para la interacción dinámica en tiempo real con el frontend.
- **Tailwind CSS**: Framework de diseño CSS para una interfaz de usuario moderna y receptiva.
- **MySQL**: Sistema de gestión de base de datos.

## 🚀 Funcionalidades

- **Registro de pacientes**: Permite agregar nuevos pacientes con sus datos personales.
- **Gestión de citas**: Crear, modificar o cancelar citas de manera sencilla.
- **Agenda del médico**: Visualización clara de la agenda diaria y semanal de cada médico.
- **Notificaciones**: Recordatorios automáticos para pacientes y personal sobre citas próximas.
- **Seguridad**: Autenticación y roles de usuario (administrador, médico, asistente).

## 📦 Instalación

Sigue estos pasos para poner en marcha el proyecto en tu entorno local:

### 1. Clonar el repositorio
```bash
git clone https://github.com/denilsaa/proyecto_consultorio_medico
cd proyecto_consultorio_medico
```

### 2. Instalar dependencias
```bash
composer install
npm install
```

### 3. Configuración del entorno
Renombra el archivo `.env.example` a `.env` y ajusta los valores necesarios como la conexión a la base de datos.
```bash
cp .env.example .env
```
Genera la clave de la aplicación:
```bash
php artisan key:generate
```

### 4. Migrar la base de datos
Ejecuta las migraciones y, si es necesario, añade datos iniciales:
```bash
php artisan migrate --seed
```

### 5. Compilar recursos
Compila los assets del frontend:
```bash
npm run dev
```

### 6. Iniciar el servidor local
Ejecuta el servidor de desarrollo de Laravel:
```bash
php artisan serve
```

Ahora puedes acceder al sistema en `http://localhost:8000`.

## 📋 Uso

1. **Iniciar sesión**: Usa una cuenta de administrador para acceder a la plataforma.
2. **Gestionar pacientes**: Accede al módulo de pacientes para registrar y editar sus datos.
3. **Programar citas**: Elige un paciente, un médico y selecciona la fecha y hora para agendar una cita.
4. **Administrar agenda**: Los médicos pueden visualizar sus citas desde el módulo de agenda.

## 🖼️ Capturas de Pantalla

![Dashboard](ruta/captura-dashboard.png)
*Ejemplo de la vista del panel de control del sistema.*

## 🤝 Contribuciones

¡Contribuciones son bienvenidas! Si deseas colaborar, sigue estos pasos:

1. Haz un fork del proyecto.
2. Crea una rama con tu nueva funcionalidad (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza un commit de tus cambios (`git commit -m 'Agrega nueva funcionalidad'`).
4. Sube la rama (`git push origin feature/nueva-funcionalidad`).
5. Crea un pull request.

## 📝 Licencia

Este proyecto está bajo la licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

## 👨‍💻 Autor

Desarrollado por [Tu Nombre](https://github.com/tu-usuario). Si tienes alguna pregunta o sugerencia, ¡no dudes en ponerte en contacto!
```

Puedes copiar y pegar este código directamente en tu archivo `README.md`. No olvides ajustar los detalles como tu nombre de usuario de GitHub, capturas de pantalla y cualquier información adicional que necesites.
