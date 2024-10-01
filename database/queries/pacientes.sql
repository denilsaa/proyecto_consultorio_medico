--Selecciona todos los usuarios y pacientes ordenados por el id del paciente de forma descendente
SELECT  * FROM usuarios
INNER JOIN pacientes p ON usuarios.id = p.usuario_id
ORDER BY p.id DESC;