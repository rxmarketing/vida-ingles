
CREATE TABLE `ejercicios_app` (
	`ejer_id` INT (11) NOT NULL PRIMARY KEY
	,`ejer_type` INT (11) NOT NULL DEFAULT '1'
	,`whattable` VARCHAR(50) NOT NULL DEFAULT 'ejercicios'
	,`cef_level_id` INT (11) NOT NULL
	,`lessonid` INT (11) NOT NULL
	,`ejer_nombre` VARCHAR(255) NOT NULL
	,`ejer_instrucciones_p` VARCHAR(255) NOT NULL
	,`ejerq1` VARCHAR(255) NOT NULL
	,`ejerq2` VARCHAR(255) NOT NULL
	,`ejerq3` VARCHAR(255) NOT NULL
	,`ejerq4` VARCHAR(255) NOT NULL
	,`ejerq5` VARCHAR(255) NOT NULL
	,`ejer_instrucciones_n` VARCHAR(255) NOT NULL
	,`ejerq6` VARCHAR(255) NOT NULL
	,`ejerq7` VARCHAR(255) NOT NULL
	,`ejerq8` VARCHAR(255) NOT NULL
	,`ejerq9` VARCHAR(255) NOT NULL
	,`ejerq10` VARCHAR(255) NOT NULL
	,`ejer_instrucciones_i` VARCHAR(255) NOT NULL
	,`ejerq11` VARCHAR(255) NOT NULL
	,`ejerq12` VARCHAR(255) NOT NULL
	,`ejerq13` VARCHAR(255) NOT NULL
	,`ejerq14` VARCHAR(255) NOT NULL
	,`ejerq15` VARCHAR(255) NOT NULL
	,`ejerq16` VARCHAR(255) NOT NULL
	,`ejerq17` VARCHAR(255) NOT NULL
	,`ejerq18` VARCHAR(255) NOT NULL
	,`ejerq19` VARCHAR(255) NOT NULL
	,`ejerq20` VARCHAR(255) NOT NULL
	,`ejerq21` VARCHAR(255) NOT NULL
	,`ejerq22` VARCHAR(255) NOT NULL
	,`ejerq23` VARCHAR(255) NOT NULL
	,`ejerq24` VARCHAR(255) NOT NULL
	,`ejerq25` VARCHAR(255) NOT NULL
	,`ejer_activated` INT (2) DEFAULT '0'
	,`ejer_friendly_name` VARCHAR(100) NOT NULL
	,`ejer_guid` VARCHAR(100) NOT NULL
	,`datecreated` DATETIME NOT NULL
	,`datemodified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	) ENGINE = InnoDB AUTO_INCREMENT = 53 DEFAULT CHARSET = utf8;
--
-- Volcado de datos para la tabla `ejercicios`
--
INSERT INTO `ejercicios_app` (
	`ejer_id`
	,`ejer_type`
	,`whattable`
	,`cef_level_id`
	,`lessonid`
	,`ejer_nombre`
	,`ejer_instrucciones_p`
	,`ejerq1`
	,`ejerq2`
	,`ejerq3`
	,`ejerq4`
	,`ejerq5`
 ,`ejer_instrucciones_n`
	,`ejerq6`
	,`ejerq7`
	,`ejerq8`
	,`ejerq9`
	,`ejerq10`
 ,`ejer_instrucciones_i`
	,`ejerq11`
	,`ejerq12`
	,`ejerq13`
	,`ejerq14`
	,`ejerq15`
	,`ejerq16`
	,`ejerq17`
	,`ejerq18`
	,`ejerq19`
	,`ejerq20`
	,`ejerq21`
	,`ejerq22`
	,`ejerq23`
	,`ejerq24`
	,`ejerq25`
	,`ejer_activated`
	,`ejer_friendly_name`
	,`ejer_guid`
	,`datecreated`
	,`datemodified`
	)
VALUES 
	(-- Present Continuous	 
	NULL
	,1
	,'ejercicios'
	,1
	,2
	,'Presente Cont&iacute;nuo'
	,'Escribe oraciones en <em>Presente Continuo</em> <b>Positivo</b>.'
	,'My dad / eat / a cake right now.'
	,'The dog / run / in the garden.'
	,'I / go / to the cinema right now.'
	,'Tom and Jane / meet / at 5 pm.'
	,'My sister and I / watch / a movie.'
	,'Escribe las mismas oraciones en la forma <b>Negativa</b> del Presente Continuo.'
	,'My dad / not eat / a cake right now.'
	,'The dog / not run / in the garden.'
	,'I / not go / to the cinema right now.'
	,'Tom and Jane / not meet / at 5 pm.'
	,'My sister and I / not watch / a movie.'
	,'Escribe las mismas oraciones en la forma <b>Interrogativa</b>. Responde en forma negativa y positiva'
	,'My dad / eat / a cake right now?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa'
	,'The dog / run / in the garden?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa'
	,'I / go / to the cinema right now?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa'
	,'Tom and Jane / meet / at 5 pm?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa'
	,'My sister and I / watch / a movie?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa'
 ,1
 ,'presente-continuo'
	,'http://vidaingles.com/ejercicio.php?id=2'
	,'2013-12-28 00:20:34'
	,'2016-03-12 05:34:28'
	)
	,( -- Pasado Simple (verbos regulares e irregulares)
	46
	,1
	,'ejercicios'
	,2
	,17
	,'Pasado Simple (verbos regulares e irregulares)'
	,'Escribe oraciones en <em>pasado simple</em> <b>positivo</b>'
	,'My girlfriend and I / go / to the cinema last night.'
	,'Sandra and her friend / do / their homework at the library this afternoon.'
	,'They / stop / at the store an hour ago.'
	,'The dogs / be / hungry this morning.'
	,'My cousins / eat / all the pizza yesterday.'
	,'Escribe las mismas oraciones en la forma <b>negativa</b>.'
	,'My girlfriend and I / not go / to the cinema last night.'
	,'Sandra and her friend / not do / their homework at the library this afternoon.'
	,'They / not stop / at the store an hour ago.'
	,'The dogs / not be / hungry this morning.'
	,'My cousins / not eat / all the pizza yesterday.'
	,'Escribe las mismas oraciones en la forma <b>interrogativa</b>. Responde en forma negativa y positiva.'
	,'My girlfriend and I / go / to the cinema last night?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa.'
	,'Sandra and her friend / do / their homework at the library this afternoon?'
	,'Respuesta corta positiva.'
	,'Respuesta corta negativa.'
	,'They / stop / at the store an hour ago?'
	,'Respuesta corta positiva.'
	,'Respuesta corta negativa,'
	,'The dogs / be / hungry this morning?'
	,'Respuesta corta positiva.'
	,'Respuesta corta negativa'
	,'My cousins / eat / all the pizza yesterday?'
	,'Respuesta corta positiva.'
	,'Respuesta corta negativa.'
	,1
	,'pasado-simple-verbos-regulares-e-irregulares'
	,'http://vidaingles.com/ejercicio.php?id=46'
	,'2014-04-20 15:52:32'
	,'2016-03-12 05:35:24'
	)
 ,(	-- Past Continuous
	NULL
	,1
	,'ejercicios'
	,2
	,4
	,'Pasado cont&iacute;nuo'
	,'Escribe oraciones en <em>Pasado Cont&iacute;nuo</em> <b>Positivo</b>.'
	,'Isabel / sing / at a gig last Saturday.'
	,'The police / look for / the theif this morning.'
	,'I / go / to the cinema right now.'
	,'Tom and Jane / meet / at 5 pm.'
	,'My sister and I / watch / a movie.'
	,'Escribe las mismas oraciones en la forma <b>Negativa</b>.'
	,'My dad / not eat / a cake right now.'
	,'The dog / not run / in the garden.'
	,'I / not go / to the cinema right now.'
	,'Tom and Jane / not meet / at 5 pm.'
	,'My sister and I / not watch / a movie.'
	,'Escribe las mismas oraciones en la forma <b>Interrogativa</b>. Responde en forma negativa y positiva.'
	,'My dad / eat / a cake right now?'
	,'Respuesta corta positiva.'
	,'Respuesta corta negativa.'
	,'The dog / run / in the garden?'
	,'Respuesta corta positiva.'
	,'Respuesta corta negativa.'
	,'I / go / to the cinema right now?'
	,'Respuesta corta positiva.'
	,'Respuesta corta negativa.'
	,'Tom and Jane / meet / at 5 pm?'
	,'Respuesta corta positiva.'
	,'Respuesta corta negativa.'
	,'My sister and I / watch / a movie?'
	,'Respuesta corta positiva.'
	,'Respuesta corta negativa.'
	,1
	,'pasado-continuo'
 	,'http://vidaingles.com/ejercicio.php?id=0'
	,now()
	,now()
 )
 ,(-- be allowed to
	48
	,1
	,'ejercicios'
	,2
	,5
	,'be allowed to <small>(permisos)</small>'
	,'Escribe oraciones con <em>be allowed to</em> <b>positivo</b>'
	,'Christina / do / her homework at night.'
	,'John / ride / his new bike at night.'
	,'My cat / go / outside the house.'
	,'My sister and I / swim / in the sea.'
	,'We / hang out / at the school cafeteria.'
	,'Escribe las mismas oraciones en la forma <b>negativa</b>'
	,'Christina / not do / her homework at night.'
	,'John / not ride / his new bike at night.'
	,'My cat / not go / outside the house.'
	,'My sister and I / not swim / in the sea.'
	,'We / not hang out / at the school cafeteria.'
	,'Escribe oraciones en la forma <b>interrogativa</b>. Responde en forma negativa y positiva usando contracciones (isn\' t o aren\'t'
	,'Christina / do / her homework at night?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa'
	,'John / ride / his new bike at night?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa'
	,'My cat / go / outside the house?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa'
	,'My sister and I / swim / in the sea?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa'
	,'We / hang out / at the school cafeteria?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa'
	,1
 ,'be-allowed-to-permisos'
	,'http://vidaingles.com/ejercicio.php?id=48'
	,now()
	,now()
 )
 ,(-- Presente Perfecto Simple
	NULL
	,1
	,'ejercicios'
	,2
	,6
	,'Presente perfecto simple'
	,'Escribe oraciones en presente perfecto <b>positivo</b>'
	,'The students / do / their exercise.'
	,'John / take / the bus downtown.'
	,'Cortana and her sister / try / Sushi.'
	,'I / see / them together.'
	,'Children / learn / to use computers at school.'
	,'Escribe las mismas oraciones en la forma <b>negativa</b>'
	,'The students / do / their exercise.'
	,'John / take / the bus downtown.'
	,'Cortana and her sister / try / Sushi.'
	,'I / see / them together.'
	,'Children / learn / to use computers at school.'
	,'Escribe las mismas oraciones en la forma <b>interrogativa</b>. Responde en forma negativa y positiva usando contracciones.'
	,'The students / do / their exercise?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa'
	,'John / take / the bus downtown?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa'
	,'Cortana and her sister / try / Sushi?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa'
	,'You / see / them together?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa'
	,'Children / learn / to use computers at school?'
	,'Respuesta corta positiva'
	,'Respuesta corta negativa'
	,1
	,'presente-perfecto-simple'
	,'http://vidaingles.com/ejercicio.php?id=0'
	,now()
	,now()
 )
 ,(-- presente simple of be
	52
	,1
	,' ejercicios '
	,1
	,8
	,' Presente simple del verbo <em> be </em>'
	,' Escribe frases con el presente simple del verbo <em>be</em> positivo.'
	,' The dog / be / hungry.'
	,' My family / be / big.'
	,' Julieta and I / be / in a relationship.'
	,' I / be / very happy.'
	,' Jenny and Melissa / be / in my class.'
	,' Escribe frases con el presente simple del verbo <em>be</em> negativo.'
	,' The dog / not be / hungry.'
	,' My family / not be / big.'
	,' Julieta and I / not be / IN a relationship.'
	,' I / not be / unhappy.'
	,' Jenny and Melissa / not be / in my class.'
	,' Escribe preguntas con el presente simple del verbo <em>be</em>.'
	,' The dog / be / hungry? '
	,' Respuesta corta positiva.'
	,' Respuesta corta negativa.'
	,' Your family / be / big? '
	,' Respuesta corta positiva.'
	,' Respuesta corta negativa.'
	,' Julieta and Romeo / be / in a relationship? '
	,' Respuesta corta positiva.'
	,' Respuesta corta negativa.'
	,' You / be / happy? '
	,' Respuesta corta positiva.'
	,' Respuesta corta negativa.'
	,' Jenny and Melissa / be / in your class? '
	,' Respuesta corta positiva.'
	,' Respuesta corta negativa.'
	,1
	,'presente-simple-del-verbo-be'
	,'http://vidaingles.com/ejercicio.php?id=52'
	,now()
	,now() 
 )
 ,(-- will future
	NULL
	,1
	,"ejercicios"
	,2
	,9
	,"Futuro con <em>will</em>"
	,"Escribe frases en futuro con <em>will</em> en la forma positiva."
	,"Tina / help / you."
	,"You / have / to wait."
	,"She / come / and see me this weekend."
	,"The dog / will / you."
	,"I / give / you my laptop."
	,"Escribe las mismas frases pero en la forma negativa."
	,"Tina / not help / you."
	,"You / not have / to wait."
	,"She / not come / to see me this weekend."
	,"The dog / not hurt / you."
	,"I / not give / you my laptop."
	,"Escribe las frases en forma de pregunta."
	,"Tina / help / me?"
	,' Respuesta corta positiva.'
	,' Respuesta corta negativa.'
	,"They / have / to wait?"
	,' Respuesta corta positiva.'
	,' Respuesta corta negativa.'
	,"She / come / to see me this weekend?"
	,' Respuesta corta positiva.'
	,' Respuesta corta negativa.'
	,"The dog / hurt / me?"
	,' Respuesta corta positiva.'
	,' Respuesta corta negativa.'
	,"You / give / me your laptop?"
	,' Respuesta corta positiva.'
	,' Respuesta corta negativa.'
	,1
	,'futuro-con-will'
 	,'http://vidaingles.com/ejercicio.php?id='
	,now()
	,now()
 )
 ,(-- Presente perfecto continuo
		NULL
		,1
		,'ejercicios'
		,2
		,7
		,'Presente perfecto contínuo'
		,'Escribe oraciones en presente perfecto continuo <b>positivo</b>'
		,'My dad / do / exercise for three months.'
		,'Jessica / look / for her mobile phone all day.'
		,"Xiomara and her cat / sleep / since seven o'clock."
		, 'We / expect / our parents for dinner for too long.'
		, 'I / work / all day today.'
		, 'Escribe las mismas oraciones en la forma <b>negativa</b>'
		, 'My dad / not do / exercise	for three months.'
		, 'Jessica / not look / for her mobile phone all day.'
		, "Xiomara and her cat / not sleep / since seven o'clock."
		,'We / not expect / our parents for dinner for too long.'
			,'I / not work / all day today.'
			,'Escribe las mismas oraciones en la forma <b>Interrogativa</b>. Responde en forma negativa y positiva usando contracciones'
			,'My dad / do / exercise for three months?'
			,'Respuesta corta positiva'
			,'Respuesta corta negativa'
			,'Jessica / look / for her mobile phone all day?'
			,'Respuesta corta positiva'
			,'Respuesta corta negativa'
			,"Xiomara and her cat / sleep / since seven o'clock?"
			,'Respuesta corta positiva '
	,'Respuesta corta negativa '
	,'We / expect / our parents	for dinner	for too long? '
	,'Respuesta corta positiva'
	, 'Respuesta corta negativa'
	, 'You / work / all day today?'
	, 'Respuesta corta positiva'
	, 'Respuesta corta negativa'
	, 1
	, 'presente-perfecto-continuo'
	,'http://vidaingles.com/ejercicio.php?id='
	, now()
	, now()
 )
 ,( --Pasado simple of be
	null
	,1
	,"ejercicios"
	,2
	,11
	,"Pasado Simple del verbo <em>be</em>"
	,"Escribe frases con el presente simple del verbo <b>be</b>."
	,"Donald Trump / be / a Real Estate Developer."
	,"Texas / be / part of Mexico."
	,"We / be / in Japan last summer."
	,"Lydia and I / be / having dinner when you called."
	,"The car / be / in the garage last month."
	,"Escribe frases <i>negativas</i> con el pasado simple del verbo <em>be</em>."
	,"The teachers / not be / in their classrooms when the students arrived."
	,"My old mobile phone / not be / cheap."
	,"We / not be / going out last month."
	,"Marcos / not be / from Spain."
	,"She / not be / very happy at the party last night."
	,"Escribe <i>preguntas</i> con el pasado simple del verbo <em>be</em>."
	,"Your birthday / be / last month?"
	,"Respuesta corta positiva"
	,"Respuesta corta negativa"
	,"The TV / be / on when you came home?"
	,"Respuesta corta positiva"
	,"Respuesta corta negativa"
	,"Your parents / be / at the school meeting?"
	,"Respuesta corta positiva"
	,"Respuesta corta negativa"
	,"The dog / be / hungry?"
	,"Respuesta corta positiva"
	,"Respuesta corta negativa"
	,"Your brother / be / at school yesterday?"
	,"Respuesta corta positiva"
	,"Respuesta corta negativa"
	,1
	,"pasado-simple-del-verbo-be"
	,"http://vidaingles.com"
	,now()
	,now()
 )
;
--
create table if not exists ejercicios_answerkeys_app (
 ak_id int(11) not null primary key
 ,ejer_id int(11) not null
 ,ak1 varchar(255) not null
 ,ak2 varchar(255) not null
 ,ak3 varchar(255) not null
 ,ak4 varchar(255) not null
 ,ak5 varchar(255) not null
 ,ak6 varchar(255) not null
 ,ak7 varchar(255) not null
 ,ak8 varchar(255) not null
 ,ak9 varchar(255) not null
 ,ak10 varchar(255) not null
 ,ak11 varchar(255) not null
 ,ak12 varchar(255) not null
 ,ak13 varchar(255) not null
 ,ak14 varchar(255) not null
 ,ak15 varchar(255) not null
 ,ak16 varchar(255) not null
 ,ak17 varchar(255) not null
 ,ak18 varchar(255) not null
 ,ak19 varchar(255) not null
 ,ak20 varchar(255) not null
 ,ak21 varchar(255) not null
 ,a22 varchar(255) not null
 ,a23 varchar(255) not null
 ,ak24 varchar(255) not null
 ,ak25 varchar(255) not null
 ,datecreated  datetime not null
 ,datemodified timestamp not null default current_timestamp on update current_timestamp
) engine = InnoDB default charset = utf8;

insert into ejercicios_answerkeys_app (
  ak_id 
 ,ejer_id
 ,ak1
 ,ak2
 ,ak3
 ,ak4
 ,ak5
 ,ak6
 ,ak7
 ,ak8
 ,ak9
 ,ak10
 ,ak11
 ,ak12
 ,ak13
 ,ak14
 ,ak15
 ,ak16
 ,ak17
 ,ak18
 ,ak19
 ,ak20
 ,ak21
 ,ak22
 ,ak23
 ,ak24
 ,ak25
 ,datecreated
 ,datemodified
 )
values 
	( -- Pasado simple regulares irregulares
2
	,46
	,'My girlfriend and I went to the cinema last night.'
	,'Sandra and her friend did their homework at the library this afternoon.'
	,'They stopped at the store an hour ago.'
	,'The dogs were hungry this morning.'
	,'My cousins ate all the pizza yesterday.'
	,'My girlfriend and I didn''t go to the cinema last night.'
 ,'Sandra and her friend didn''t do their homework at the library this afternoon.'
	,'They didn''t stop at the store an hour ago.'
 ,'The dogs weren''t hungry this morning.'
	,'My cousins didn''t eat ALL the pizza yesterday.'
 ,'Did my girlfriend and I go to the cinema last night? '
 ,' Yes, we did.'
 ,' No, we didn''t.'
	,'Did Sandra and her friend do their homework at the library this afternoon?'
	,'Yes, they did.'
	,'No, they didn''t.'
 ,'Did they stop at the store an hour ago?'
 ,'Yes, they did.'
 , 'No	,they didn''t.'
	,'Were the dogs hungry this morning?'
	,'Yes, they were.'
	,'No, they weren''t.'
 , 'Did my cousins eat all the pizza yesterday?'
 ,'Yes, they did.'
 ,'No, they didn''t.'
	,now()
	,now()
)
,(-- Pasaso simple verbo be respuestas
	null
	,55
	,"Donald Trump was a Real Estate Developer."
	,"Texas was part of Mexico."
	,"We were in Japan last summer."
	,"Lydia and I were having dinner when you called."
	,"The car was in the garage."
	,"The teachers weren't in their classrooms when the students arrived."
	,"My old mobile phone wasn't cheap."
	,"We weren't going out last month."
	,"Marcos isn't from Spain."
	,"She wasn't very happy at the party last night."
	,"Was your birthday last month?"
	,"Yes, it was."
	,"No, it wasn't."
	,"Was the TV on when you came home?"
	,"Yes, it was."
	,"No, it wasn't."
	,"Were your parents at the school meeting?"
	,"Yes, they were."
	,"No, they weren't."
	,"Was the dog hungry?"
	,"Yes, it was."
	,"No, it wasn't."
	,"Was your brother at school yesterday?"
	,"Yes, he was."
	,"No, he wasn't."
	,now()
	,now()
	)
;