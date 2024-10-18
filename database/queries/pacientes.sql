--Selecciona todos los usuarios y pacientes ordenados por el id del paciente de forma descendente
SELECT  * FROM usuarios
INNER JOIN pacientes p ON usuarios.id = p.usuario_id
ORDER BY p.id DESC;

-- selecciona todas las recetas de un paciente en especifico
select usp.nombre paciente,usp.telefono,fr.nombre medicamento,rc.indicaciones, rc.cantidad, rc.created_at fecha
from recetas rc
inner join farmacos  fr on fr.id = rc.farmaco_id
inner join historials hs on hs.id = rc.historial_id
inner join pacientes pa on pa.id = hs.paciente_id
inner join usuarios usp on usp.id = pa.usuario_id;

SELECT * FROM usuarios INNER JOIN pacientes p ON usuarios.id = p.usuario_id;