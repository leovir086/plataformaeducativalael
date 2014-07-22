<?php

// this contains the application parameters that can be maintained via GUI
return array(
// this is displayed in the header section
    'title' => 'Plataforma Educativa LAEL',
// this is used in error pages
    'adminEmail' => 'omar.huanca.balboa@gmail.com',
// the copyright information displayed in the footer section
    'copyrightInfo' => 'Copyright &copy; 2009 by My Company.',
// this text show into the Subject on Register
    'setSubjectRegister' => 'Verificación de la dirección de correo electrónico',
// this text show into the Body on Register
    'setBodyRegister' => 'Este mensaje contiene instrucciones para verificar esta dirección de correo electrónico. Si no realizó esta petición, por favor, ignora este correo electrónico o póngase en contacto con nuestro administrador. 
                    Para verificar esta dirección de correo electrónico, abra el siguiente enlace:<br ><br >',
// this text show into the Name on Register
    'nameRegister' => 'Administrador',
// this text show into the end Botton Message Body on Register
    'setBodyBelowRegister' => '<br ><br >Si el enlace no se abre correctamente, intente copiarlo y pegarlo en la barra de direcciones del navegador.',
// this text show into when send message to email for account credential. 
    'emailInstruccionRegister' => 'Un correo electrónico que contiene más instrucctions ha sido enviada a la dirección de correo electrónico proveedor',
// this text save in sesion when succeed email
    'succeedSendRegister' => 'Un correo electrónico que contiene más instrucctions ha sido enviada a la dirección de correo electrónico proporcionada',
// this text save in sesion when wrong email
    'wrongSendRegister' => 'Error al enviar el correo electrónico:',
// State user when is register
    'stateUserUnavailable' => 0,
// State user when is verify for email
    'stateUserAvailable' => 1,
// Sex user identify Female
    'sexUserFemale' => 'f',
// Sex user identity Male
    'sexUserMale' => 'm',
// Date empty format value
    'dateBirthEmpty' => 0000-00-00,
// Number User Rol Auttoregulado
    'RolUserAutorregulado' => 3,
);
