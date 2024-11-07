select count(*) as aggregate from "presentacion_farmaco" 
inner join "presentaciones" on "presentacion_farmaco"."presentacion_id" = "presentaciones"."id" ;
