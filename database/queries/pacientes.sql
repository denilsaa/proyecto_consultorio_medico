
SELECT u.id usuario_id,p.id paciente_id, u.nombre, u.ap_paterno, u.ap_materno, u.correo,u.carnet,u.estado_usuario, u.telefono, p.telefono_emergencia 
FROM pacientes p 
INNER JOIN usuarios u ON p.usuario_id = u.id
ORDER BY p.id DESC;
 SELECT * from personals
 INNER JOIN usuarios u ON personals.usuario_id = u.id;

SELECT * FROM personals ;


-- selecciona todas las recetas de un paciente en especifico
/* SELECT usp.nombre paciente, usp.telefono, fr.nombre medicamento, rc.indicaciones, rc.cantidad, rc.created_at fecha
FROM recetas rc
INNER JOIN farmacos fr ON fr.id = rc.farmaco_id
INNER JOIN historials hs ON hs.id = rc.historial_id
INNER JOIN pacientes pa ON pa.id = hs.paciente_id
INNER JOIN usuarios usp ON usp.id = pa.usuario_id;

SELECT * FROM usuarios 
INNER JOIN pacientes p ON usuarios.id = p.usuario_id;

SELECT * FROM citas;

SELECT * FROM farmacos; */
/* 
SELECT * FROM historials;
SELECT * FROM presentacions; */
/* SELECT * FROM recetas;
SELECT * FROM farmacos; */
/* 
SELECT * FROM recibos;
SELECT * FROM rols;
SELECT * FROM triajes; */