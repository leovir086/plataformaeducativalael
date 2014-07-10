/*insert data table type_form*/
insert into type_form values(default, 'menu');
insert into type_form values(default, 'formulario'); 
insert into type_form values(default, 'vista');

/*insert data table ocupation*/
insert into ocupation values(default, null, 'ocupacion 1');
insert into ocupation values(default, null, 'ocupacion 2');
insert into ocupation values(default, null, 'ocupacion 3');
insert into ocupation values(default, null, 'ocupacion 4');
insert into ocupation values(default, null, 'ocupacion 5');
insert into ocupation values(default, null, 'ocupacion 6');
insert into ocupation values(default, 1, 'ocupacion 1-1');
insert into ocupation values(default, 1, 'ocupacion 1-2');
insert into ocupation values(default, 1, 'ocupacion 1-3');
insert into ocupation values(default, 2, 'ocupacion 2-1');
insert into ocupation values(default, 2, 'ocupacion 2-2');
insert into ocupation values(default, 2, 'ocupacion 2-3');
insert into ocupation values(default, 3, 'ocupacion 3-1');
insert into ocupation values(default, 3, 'ocupacion 3-2');
insert into ocupation values(default, 3, 'ocupacion 3-3');
insert into ocupation values(default, 4, 'ocupacion 4-1');
insert into ocupation values(default, 4, 'ocupacion 4-2');
insert into ocupation values(default, 4, 'ocupacion 4-3');
insert into ocupation values(default, 5, 'ocupacion 5-1');
insert into ocupation values(default, 5, 'ocupacion 5-2');
insert into ocupation values(default, 5, 'ocupacion 5-3');
insert into ocupation values(default, 6, 'ocupacion 6-1');
insert into ocupation values(default, 6, 'ocupacion 6-2');
insert into ocupation values(default, 6, 'ocupacion 6-3');


/* insert data table user */
insert into user(id_user,id_ocupation,email,username,password,state_user) values
(default,1,'oma378501@gmail.com','administrador','91f5167c34c400758115c2a6826ec2e3',1); 
insert into user(id_user,id_ocupation,email,username,password,state_user) values
(default,2,'oma378501@yahoo.com','coordinador','4abdd328d64c87e3960ae29b67f8baef',1); 
insert into user(id_user,id_ocupation,email,username,password,state_user) values
(default,3,'omar.huanca.balboa@gmail.com','autorregulado','9555b533783eecb08b4ddff47aea0c58',1); 

/* insert data table rol */
insert into rol values (default,'Administrador');
insert into rol values (default,'Coordinador');
insert into rol values (default,'Autorregulado');

/* insert data table user_rol*/
insert into user_rol values (default,1,1); -- administrador
insert into user_rol values (default,2,2); -- coordinador
insert into user_rol values (default,3,3); -- autorregulado

/* insert data table form */
insert into form values (default,1,'formulario administrador 1','/user/formulario1'); -- administrador 
insert into form values (default,1,'formulario administrador 2','/user/formulario2'); 
insert into form values (default,1,'formulario administrador 3','/user/formulario3'); 
insert into form values (default,1,'formulario administrador 4','/user/formulario4'); 
insert into form values (default,1,'formulario administrador 5','/user/formulario5'); 
insert into form values (default,1,'formulario administrador 6','/user/formulario6'); 
insert into form values (default,1,'formulario administrador 7','/user/formulario7'); 
insert into form values (default,1,'formulario administrador 8','/user/formulario8'); 
insert into form values (default,1,'formulario administrador 9','/user/formulario9'); 
insert into form values (default,2,'formulario coordinador 1','/user/formulario10'); -- coordinador
insert into form values (default,2,'formulario coordinador 2','/user/formulario11');
insert into form values (default,2,'formulario coordinador 3','/user/formulario12');
insert into form values (default,3,'formulario autorregulado 1','/user/formulario13'); -- autorregulado
insert into form values (default,3,'formulario autorregulado 2','/user/formulario14');
insert into form values (default,3,'formulario autorregulado 3','/user/formulario15');
 
/* insert data tabla user_rol */
insert into rol_form values(default,1,1); -- administrador
insert into rol_form values(default,1,2); 
insert into rol_form values(default,1,3); 
insert into rol_form values(default,1,4); 
insert into rol_form values(default,1,5); 
insert into rol_form values(default,1,6); 
insert into rol_form values(default,1,7); 
insert into rol_form values(default,1,8); 
insert into rol_form values(default,1,9); 
insert into rol_form values(default,2,10); -- coordinador 
insert into rol_form values(default,2,11); 
insert into rol_form values(default,2,12); 
insert into rol_form values(default,3,13); -- autorregulado 
insert into rol_form values(default,3,14); 
insert into rol_form values(default,3,15); 

/* constraint the databse*/

/*add unique table usuario*/
alter table user add unique (email,username)