<?

			include('/home/servidor/apache/htdocs/html/new/uso_public/paraformularios.php');
			define('HideOnBush', 'hide');
			$Pagetitle = 'Universidad del Valle';
			include_once '../includes/header.php';

			$ip = $_SERVER['REMOTE_ADDR'];

			$oferta_s = 'oferta';//para q se muestre reserva y no oferta en contenidoPOrdefecto
			$calendario = "calendario";
			$manual = 'manual_TESTING';
			$val = 'true';
			$val_new = 'true';
			$casillero = "<a href=\"javascript:myurl('../../interior/casillero_nuevo_pregrado/index.php?form=ingreso_casillero','800','600')\" class=\"usn active\"><b>Casillero digital</b></a>";

			$aviso_nuevo = "<img src='http://admisiones.univalle.edu.co/new/imagenes/aviso_nuevo.gif' alt='Avatar' class='image'>";

			$solicitudReserva = "<a href='#' onclick=\"mostrarcontenido('reserva','true');\"><b>Solicitud Reserva de Cupo</b></a>";
			$reservaRespuesta = "<a href='#' onclick=\"mostrarcontenido('reserva','true');\"><b>Respuesta Reserva de Cupo</b></a>";
			//Solicitud de Reserva de Cupo
			$fecha_validar = strftime("%Y-%m-%d %H:%M");
			$fecha_inicio_solicitud="2017-12-06 08:30:00";
			$fecha_fin_solicitud="2017-12-12 23:59:00";
			$fecha_inicio_acticupo="2017-12-06 08:30:00";
			$fecha_fin_acticupo="2019-11-08 23:59:00";
			//$fecha_fin_acticupo="2019-11-08 15:10:59";
			//$fecha_fin_acticupo="2019-11-08 15:13:59";

			$oferta_Cali = "";
			$calendario_Cali = "<a href='#' onclick=\"mostrarcontenido('$calendario','true');\"><b>Calendario</b></a>";
			$manual_Cali = "<a href='#' onclick=\"mostrarcontenido('$manual','true');\"><b>Manual</b></a>";
			$citas_p = "<a href='#' onclick=\"mostrarcontenido('pruebas','true');\"><b>Citas Pruebas Específicas</b></a>";
			$activarC = "<a href='#' onclick='activarCupo()';\"><b>Activar el cupo</b></a>";
			if(accesoIP() && $ip != '192.168.248.236' || $ip == '192.168.9.3'){


				$oferta_s = 'oferta';
				$oferta_Cali = "<a href='#' onclick=\"mostrarcontenido('$oferta_s','$val');\"><b>Oferta Academica</b></a>";
				$calendario_Cali = "<a href='#' onclick=\"mostrarcontenido('$calendario','$val');\"><b>Fechas del proceso</b></a>";
				$manual_Cali ="<a href='#' onclick=\"mostrarcontenido('$manual','$val');\"><b>Manual</b></a>";


				$citas_p = "<a href='#' onclick=\"mostrarcontenido('pruebas','$val_new');\"><b>Citas Pruebas Específicas***</b></a>";
				$val = 'true';
				$val_new = 'true';
				$casillero = "<a href=\"javascript:myurl('../../interior/casillero_nuevo_pregrado/index.php?form=ingreso_casillero','800','600')\" class=\"usn active\"><b>Casillero digital</b></a>";
				$reservaRespuesta = "<a href='#' onclick=\"mostrarcontenido('resp_reserva','true');\"><b><u>Respuesta reserva de Cupo </u></b></a>";
				$solicitudReserva = "<a href='#' onclick=\"mostrarcontenido('reserva','true');\"><b>Solicitud Reserva de Cupo</b></a>";
			}elseif (($fecha_validar >= $fecha_inicio_solicitud) && ($fecha_validar <= $fecha_fin_solicitud)) {

				 $calendario_Cali = "<a href='#' onclick=\"mostrarcontenido('$calendario','$val');\"><b>Fechas del proceso</b></a>";
				 $oferta_Cali = "<a href='#' onclick=\"mostrarcontenido('$oferta_s','$val');\"><b>Oferta Academica</b></a>";
				 $manual_Cali ="<a href='#' onclick=\"mostrarcontenido('$manual','$val');\"><b>Manual</b></a>";
				 $reservaRespuesta = "";
				 $solicitudReserva = "<a href='#' onclick=\"mostrarcontenido('reserva','true');\"><b>Solicitud Reserva de Cupo</b></a>";
			}else{
				if( ($fecha_validar >= $fecha_fin_acticupo)){

					$activarC = "";
				}
        $oferta_s = 'oferta';
        $oferta_Cali = "<a href='#' onclick=\"mostrarcontenido('$oferta_s','$val');\"><b>Oferta Academica 2021-II</b></a>";
        $calendario_Cali = "<a href='#' onclick=\"mostrarcontenido('$calendario','$val');\"><b>Fechas del proceso 2021-II</b></a>";
        $manual_Cali ="<a href='#' onclick=\"mostrarcontenido('$manual','$val');\"><b>Manual 2021-II</b></a>";
        $solicitudReserva = "<a href='#' onclick=\"mostrarcontenido('reserva','true');\">Solicitud Reserva de Cupo</a>";
        $reservaRespuesta = "<a href='#' onclick=\"mostrarcontenido('resp_reserva','true');\"><b><u>Respuesta reserva de Cupo </u></b></a>";
      }


      if( accesoIP() && $ip != '192.168.248.236' || $ip == '192.168.9.3' ){

				$arrayMenu = array(

					 $oferta_Cali,$calendario_Cali,$manual_Cali,
					 "<a href='#' onclick=\"mostrarcontenido('manualDiseño','true');\"><b>Manual Diseño</b></a>",
					 "<a href='#' onclick=\"mostrarcontenido('fechasDiseño','true');\"><b>Fechas del proceso Diseño</b></a>",


										   $solicitudReserva ,
										   "<a href='#' onclick=\"mostrarcontenido('condiciones','$val');\">Condiciones de excepción</a>",
										   "<a href='http://inscripciones.univalle.edu.co/interior/index_cali.html' target='_new'><b>Resultados</b></a>",
										   array("<b>Reglamentos</b>",
										   	"<a href='#' onclick=\"mostrarcontenido('reglamento093','true');\"><font size='1'>Resolución no. 093 del 19 de septiembre de 2018</font></a>",
													"<a href='#' onclick=\"mostrarcontenido('reglamentoatletas','true');\"><font size='1'>Resolución 056 - 2020 Atletas de Rendimiento</font></a>",
													"<a href='#' onclick=\"mostrarcontenido('reglamento110','true');\"><font size='1'>Modificación al procedimiento de selección. resolución no. 110 <br> de octubre 2 de 2014 del consejo académico.</font></a>",
													"<a href='#' onclick=\"mostrarcontenido('reglamento093','true');\"><font size='1'>Resolución no. 093 del 19 de septiembre de 2018</font></a>",
													"<a href='#' onclick=\"mostrarcontenido('reglamento106','true');\"><font size='1'>Resolución no. 026 de febrero 19 de 2015</font></a>"
													),
										   "<a href='#' onclick=\"mostrarcontenido('sel_admitidos','$val');\">Selección de admitidos</a>",

										   array("<p onclick=\"pruebaEspecificas();\"><b>Registro de notas</b> </p <span class=\"caret\"></span>",
													"<a href='#' onclick=\"mostrarcontenido('','true');\"><font size='1'>Citaciones</font></a>",
													"<a href='#' onclick=\"pruebaEspecificas();\"><font size='1'>Registrar mis notas</font></a>",
													"<a href='#' onclick=\"mostrarcontenido('loginSinIcfes','true');\"><font size='1'>Registrar mis notas</font></a>"
													),
										 //  $citas_p,
										   "<a href='#' onclick='pruebaEspecificas()';\"><b>Citas Pruebas Específicas</b></a>",
										   "<a href='#' onclick=\"mostrarcontenido('pruebas','true');\"><font size='1'>Citas Pruebas Específicas 2</font></a>",
										   "<a href='#' onclick=\"mostrarcontenido('aspirantes_a_la_u','true');\">Aspirantes de la Universidad del Valle</a>",
										   $casillero ,
										  "<a href='http://admisiones.univalle.edu.co/new/_new/interior/aspirantereserva2/' target='_blank'>Carga de Reserva de Cupo</a>",
										   $reservaRespuesta,
										   "<a href='http://admisiones.univalle.edu.co/new/estadisticas.php' target='_blank'>Estadísticas</a>",
										   "<a href='#pruebas');\"><b>**Pruebas Específicas</b></a>",
										   "<a href='#pruebas');\"><b>Eliminados</b></a>",
										   array("<b>Reinscripción</b>",
													"<a href='#' onclick=\"mostrarcontenido('manualReinscripcion','true');\"><font size='1'>Oferta</font></a>",
													"<a href='#' onclick=\"mostrarcontenido('calendarioReingreso','true');\"><font size='1'>Calendario</font></a>",
													"<a href='http://admisiones.univalle.edu.co/new/interior/reinscripcion/index.php?form=reinscrip' target='_blank'><font size='1'>Iniciar Proceso</font></a>"
													),
										   array("Reserva de Cupo",
													"<a href='http://admisiones.univalle.edu.co/new/_new/interior/activarcuporeserva/vista/' target='_blank'><font size='1'>Activar el cupo</font></a>",
													"<a href='#' onclick='activarCupo()';\"><font size='1'>Activa</font></a>"
													),
										    "<a href='#' onclick=\"mostrarcontenido('consulta_codigo','true');\"><b>Olvidé mi código</b></a>",
										    "<a href='#' onclick=\"mostrarcontenido('eliminados','true');\">Listado aspirantes eliminados</a>",
										    "<a href='#' onclick=\"mostrarcontenido('preCalculo','true');\"><b>Curso de Pre-Cálculo</b></a>",
										    "<a href='#' onclick=\"mostrarcontenido('indigenas','true');\"><b>Inscripciones INDÍGENAS</b></a>",
										    "<a href='#' onclick=\"mostrarcontenido('porras','true');\"><b>Instrucciones LOS MAS PORRAS</b></a>",
										    "<a href='#' onclick=\"mostrarcontenido('generacione','true');\"><b>Inscripciones GENERACIÓN E</b></a>",
										    "<a href='https://sira.univalle.edu.co/sra/paquetes/admisiones/preinscripcion/login.php' target='_blank'><font size='1'><B>INSCRIPCIONES</B></font></a>",
										    "<a href='http://admisiones.univalle.edu.co/new/_new/reinscripcion/' ><b>Reinscripción new</b></a>",
										   "<a href='http://admisiones.univalle.edu.co/new/_new/resultados/' ><b>resultados new</b></a>",
										   "<a href='http://admisiones.univalle.edu.co/new/_new/reinscripcion/' ><b>reinscripcion new</b></a>",


											//"<a href='#' onclick=\"mostrarcontenido('resultado_comercio_ext','true');\"><b>Segundo llamado Comercio Exterior</b></a>",
										   );
			}else{
				$oferta_s;
				$arrayMenu = array(


											 $oferta_Cali,
											 $calendario_Cali,
											 $manual_Cali,

											 //"<a href='https://sira.univalle.edu.co/sra/paquetes/admisiones/preinscripcion/login.php' target='_blank'><font size='2'><B>INSCRIPCIONES</B></font></a>",

											"<a href='#' onclick=\"mostrarcontenido('indigenas','true');\"><b>Inscripciones Indígenas</b></a>",

											"<a href='#' onclick=\"mostrarcontenido('generacione','true');\"><b>Inscripciones Generación E</b></a>",
											$activarC,



					 						//"<a href='#' onclick='activarCupo()';\"><b>Activar el cupo</b></a>",
					 						array("<b>Información General</b>",
													"<a href='#' onclick=\"mostrarcontenido('condiciones','$val');\">Condiciones de excepción</a>",
													"<a href='#' onclick=\"mostrarcontenido('sel_admitidos','$val');\">Selección de admitidos</a>",
													"<a href='#' onclick=\"mostrarcontenido('aspirantes_a_la_u','true');\">Aspirantes de la Universidad del Valle</a>",
													"<a href='http://admisiones.univalle.edu.co/new/estadisticas.php' target='_blank'>Estadísticas</a>"
													),

										/*  array("<b > Registro de notas</b>",
													"<a href='http://admisiones.univalle.edu.co/new/_new/interior/pdfs/Manual-Registro-Notas-03092020.pdf' target='_blank'><font size='1'>Manual Registo de notas</font></a>",
													"<a href='#' onclick=\"mostrarcontenido('loginSinIcfes','true'),mensajito();\"><font size='1'>Registrar mis notas</font></a>"
													),*/
											//"<a href='#' onclick=\"mostrarcontenido('pruebas','$val');\"><b>Citas Pruebas Específicas</b></a>",
											//$citas_p,
											"<a href='#' onclick=\"mostrarcontenido('reserva','true');\"><b>Solicitud Reserva de Cupo</b></a>",
											"<a href='http://admisiones.univalle.edu.co/new/_new/interior/aspirantereserva2/' target='_blank'><B>Carga de Reserva de Cupo</B></a>",
										   //"<a href='http://inscripciones.univalle.edu.co/interior/index_cali.html' target='_new'><b>Resultados</b></a>",


										   array("<b>Reglamentos</b>",
										   	"<a href='http://admisiones.univalle.edu.co/new/_new/interior/reglamentos/Res CA 056-Modificacion CE-Resolucion-093-2018 Atletas de Rendimiento.pdf' target='_blank'><font size='1'>Resolución 056 - 2020 Atletas de Rendimiento</font></a>",
													"<a href='http://admisiones.univalle.edu.co/new/_new/interior/reglamentos/RCA-045 REGLAMENTO INSCRIPCION.pdf' target='_blank'><font size='1'>Reglamento de inscripción y admisión resolución 045 <br>  de abril 4/13 del consejo académico</font></a>",
													"<a href='http://admisiones.univalle.edu.co/new/_new/interior/reglamentos/Resolucion No 110 oct 2 de 2014.pdf' target='_blank'><font size='1'>Modificación al procedimiento de selección. resolución no. 110 <br> de octubre 2 de 2014 del consejo académico.</font></a>",
													"<a href='http://admisiones.univalle.edu.co/new/interior/anexos/Res-093-2018.pdf' target='_blank'><font size='1'>Resolución no. 093 del 19 de septiembre de 2018</font></a>",
													"<a href='http://admisiones.univalle.edu.co/new/_new/interior/reglamentos/Resolución N° 026.PDF' target='_blank'><font size='1'>Resolución no. 026 de febrero 19 de 2015</font></a>"
												),
										  //"<a href='#' onclick='activarCupo()';\"><font size='2'><b>Activar el cupo</b></font></a>",
										  "<a href='http://admisiones.univalle.edu.co/new/_new/resultados/' ><b>Resultados</b></a>",
										  "<a href='http://admisiones.univalle.edu.co/new/_new/reinscripcion/' ><b>Reinscripcion</b></a>",
										  /* array("<b>Reserva de Cupo</b>",
													"<a href='http://admisiones.univalle.edu.co/new/_new/interior/activarcuporeserva/vista/' target='_blank'><font size='1'>Activar el cupo</font></a>",
													),*/
										   //"<a href='#' onclick='pruebaEspecificasmensaje()';\"><b>Citas Pruebas Específicas</b></a>",
										  // "<a href='#' onclick='activarCupo()';\"><b>Activar el cupo</b></a>",
												/*
										  		array("<b>Registro Notas</b>",
													"<a href='mostrarcontenido('pruebas','true');\"><font size='1'>Citaciones</font></a>",
													"<a href='#' onclick=\"mostrarcontenido('manualnotas','true');\"><font size='1'>Manual Registo Notas</font></a>",
													"<a href='#' onclick=\"mostrarcontenido('loginSinIcfes','true');\"><font size='1'>Registrar mis notas</font></a>"
													),
												*/
										$casillero ,
											//"<a href='#pruebas');\"><b>Eliminados</b></a>",
										   //"<a href='#' onclick=\"mostrarcontenido('consulta_codigo','true');\"><b>Olvidé mi código</b></a>",
										  /* array("<b>Reinscripción</b>",
													"<a href='#' onclick=\"mostrarcontenido('manualReinscripcion','true');\"><font size='1'>Oferta</font></a>",
													"<a href='#' onclick=\"mostrarcontenido('calendarioReingreso','true');\"><font size='1'>Calendario</font></a>",
													"<a href='http://admisiones.univalle.edu.co/new/interior/reinscripcion/index.php?form=reinscrip' target='_blank'><font size='1'>Iniciar Proceso</font></a>"
													), */
										   //"<a href='http://inscripciones.univalle.edu.co/interior/index_cali.html' target='_blank'><b>Ver resultados</b></a>",
										   //"<a href='#' onclick=\"mostrarcontenido('resultado_comercio_ext','true');\"><b>Segundo llamado Comercio Exterior</b></a>",
											//$casillero,
											//"<a href='#' onclick=\"mostrarcontenido('resp_reserva');\"><b><u>Respuesta reserva de Cupo </u></b></a>",
											//$reservaRespuesta,
										   /* array("<b>Proceso Anterior</b> ",
										   			$casillero,
													//$solicitudReserva,
													$reservaRespuesta,
													//"<a href='http://admisiones.univalle.edu.co/new/_new/interior/aspirantereserva2/' target='_blank'>Carga de Reserva de Cupo</a>",
													"<a href='#' onclick=\"mostrarcontenido('consulta_codigo','true');\">Olvidé mi código</a>",
													"<a href='#' onclick=\"mostrarcontenido('preCalculo','true');\">Curso de Pre-Cálculo </a>",
													"<a href='#' onclick=\"mostrarcontenido('autodesa','true');\">Curso de Auto Desarrollo</a>"
													)*/




										   );
			}

				nav_univalle($arrayMenu);
			?>
			<? contenido_paginas_NEW();?>
			<? scriptBody(false,true); ?>
			<?php if( accesoIP() || $ip == '192.168.9.2' || $_SERVER['HTTP_HOST'] == '192.168.240.101' || isset($_GET['chatbot']) ){
				include_once("/var/www/sitios/admisiones/htdocs/html/new/_new/chatbot/jsonConf.php");

				//echo inconvenientes(1,'00');
			?>
			
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script src="../chatbot/jquery.validate.min.js"></script>
			<script src="../chatbot/principalChatbot.js"></script>
			<script>
				//var glova = new chatbot("","","","","");
				//glova.crearContenido();

			</script>
		<?php
			}else{
				//Secho inconvenientes(1,'00');
			}
		?>


			<script type="text/javascript" src="../public/js/cambiacontenido.js" charset="utf-8"></script>

			<script language="JavaScript" type="text/JavaScript">
				function myurl(url,w,h){

				//Se usa esta funcion temporalmente mientras se construye una mejor forma de visualizar la pruebas especificas

				var mywin;

				mywin = window.open (url,"","resizable=yes,width="+ w +", height=" + h +",status=no,scrollbars=yes,location=no,directories=no,menubar=no,copyhistory=no");

				if (mywin.opener == null){

					mywin.opener = window;
					mywin.focus();

					}
				}
			</script>
		<script>
			$(document).ready(function() {
				//	contenidoPorDefecto('reserva');
				contenidoPorDefecto('');
				//resmensaje();
				if(getParameterByName('prog') != ""){
					enviar_formulario2('15',getParameterByName('prog'),'0','00',getParameterByName('per'),'1',getParameterByName('jor'));
				}else{

					/*swal({
						heightAuto: true,
						type: 'info',
						width: '80rem',
						title: "<h1>Ampliación de fechas</h1>",
						html: '<h3><b>Pago en línea de la inscripción:</b> Hasta el 19 de noviembre <br> <b>Inscripción vía web:</b> Hasta el 20 de noviembre <br><br> <a href="http://admisiones.univalle.edu.co/new/_new/interior/#calendario" onclick="swal.close();">Ver link</a></h3>',
						});*/
				}

			});

			function pruebaEspecificas(){
				swal({
						heightAuto: true,
						type: 'info',
						width: '80rem',
						text: 'Estimado aspirante la citación será publicada el 29 de mayo de 2020, en horas de la tarde',
						});
			}

			function mensajito(){

			    swal({
						heightAuto: true,
						type: 'info',
						width: '80rem',
						text: 'Debe tener en cuenta las siguientes fechas para registrar las notas y cargar los documentos:'+

'\n\n* Si usted se inscribe entre el 8 y el 22 de septiembre podrá registrar las notas y cargar los documentos entre el 23 de septiembre a partir de las 2:00 p.m. y el día 1 de octubre.'+
'\n\n* Si usted se inscribe entre el 23 de septiembre y 1 el  de octubre podrá registrar las notas y cargar los documenos entre el 2 de octubre a partir de las 2:00 p.m. y el día 7 de octubre.'+
'\n\n* Si usted se inscribe entre el 2 y el 7 de octubre podrá registrar las notas y cargar los documenos el 8 de octubre a partir de las 2:00 p.m. y el día 9 de octubre.',
						});

			}

			function pruebaEspecificasmensaje(){
				swal({
						heightAuto: true,
						type: 'info',
						width: '80rem',
						text:'\n\nApreciado(a) aspirante:\n\n Al correo electrónico que usted digitó en el formulario de inscripción se le enviará la citación para la prueba especifica del programa en el que usted se inscribió. \n\n ',
						});
			}


			function activarCupo(){

				var informacion = "<p style='font-size:14px' align='justify'>Corresponde a estudiantes admitidos en los procesos de admisión de los dos (2) períodos académicos anteriores, quienes solicitaron reserva de cupo, y les fue autorizada por las causales establecidas en la Universidad.</p>"

				var subtitulo = "<h3 align='center'>Procedimiento para hacer efectivo el cupo reservado.</h3><br>"

				var lista = "<p style='font-size:14px' align='justify'>1. Realizar el pago por el valor de la inscripción como se detalla en el paso 2 del manual de inscripción. REALIZAR EL PAGO DE LOS DERECHOS DE INSCRIPCIÓN, durante el periodo de inscripciones. Los admitidos que reservaron cupo en los Programas de Arquitectura y Licenciatura en Artes Visuales solamente cancelan el valor de los derechos de inscripción no deberán cancelar el valor de la prueba específica. <br><br> 2. Diligenciar el formulario de inscripción dentro de las fechas establecidas en el Calendario Académico para el periodo de inscripciones. <br><br> 3. Cargar los documentos soporte. Si ya realizó el pago, debe cargar los documentos soporte <b>(Documento de identidad y Constancia de Inscripción del periodo actual)</b>, haciendo click en la parte inferior de esta información. Para ingresar digite su número de identificación con el cual realizó la inscripción cuando hizo su reserva de cupo y cargue los documentos soporte. Al terminar el sistema le generará una constancia que confirma la carga exitosa de los documentos. Se le recomienda imprimir, guardar o tomarle una foto nítida a esta constancia para cualquier reclamación posterior. <br><br> 4. Durante la publicación de resultados comprobar que su código aparezca al inicio del listado de admisión del programa. <br><br> 5. Descargar la información del casillero digital, en la fecha establecida en el Calendario, y seguir cada uno de los pasos indicados para realizar la matrícula financiera y académica. De no realizar estos pasos PODRÁ PERDER EL CUPO.</p>"

					/*swal({
						title: "Información importante",
						heightAuto: true,
						confirmButtonColor: '#DD6B55',
						confirmButtonText: 'Cancelar',
						type: 'warning',
						width: '60rem',

						text: informacion + subtitulo +lista + '<h3><a href="http://admisiones.univalle.edu.co/new/_new/interior/activarcuporeserva/vista/" onclick="swal.close();">Ver enlace</a></h3>',
						});*/

					var enlace = "http://admisiones.univalle.edu.co/new/_new/interior/activarcuporeserva/vista/";
					swal({

					  title: "Información importante",
					  //title: "Información importante",


					  text: "Corresponde a estudiantes admitidos en los procesos de admisión de los dos (2) períodos académicos anteriores, quienes solicitaron reserva de cupo, y les fue autorizada por las causales establecidas en la Universidad.\n\n Procedimiento para hacer efectivo el cupo reservado.\n\n1. Realizar el pago por el valor de la inscripción como se detalla en el paso 2 del manual de inscripción. REALIZAR EL PAGO DE LOS DERECHOS DE INSCRIPCIÓN, durante el periodo de inscripciones. Los admitidos que reservaron cupo en los Programas de Arquitectura y Licenciatura en Artes Visuales solamente cancelan el valor de los derechos de inscripción no deberán cancelar el valor de la prueba específica.  \n\n 2. Diligenciar el formulario de inscripción dentro de las fechas establecidas en el Calendario Académico para el periodo de inscripciones. \n\n 3. Cargar los documentos soporte. Si ya realizó el pago, debe cargar los documentos soporte (Documento de identidad y Constancia de Inscripción del periodo actual), haciendo click en la parte inferior de esta información. Para ingresar digite su número de identificación con el cual realizó la inscripción cuando hizo su reserva de cupo y cargue los documentos soporte. Al terminar el sistema le generará una constancia que confirma la carga exitosa de los documentos. Se le recomienda imprimir, guardar o tomarle una foto nítida a esta constancia para cualquier reclamación posterior. \n\n 4. Durante la publicación de resultados comprobar que su código aparezca al inicio del listado de admisión del programa. \n\n5. Descargar la información del casillero digital, en la fecha establecida en el Calendario, y seguir cada uno de los pasos indicados para realizar la matrícula financiera y académica. De no realizar estos pasos PODRÁ PERDER EL CUPO. \n\n ¿Está completamente seguro de continuar?",

					  icon: "warning",
					  buttons: true,
					  dangerMode: true,
					  buttons: ["Cancelar Envío", "Ver enlace"],
                   	  //confirmButtonText: '<h6>Sí, es el programa que quiero</h6>',
                      //cancelButtonText: '<h6>Cancelar Envío</h6>'
					  //buttons: ["Entendido"]
					})
					.then((pass) => {

					  if (!pass) {swal.close();return false;}

					  return true;

					}).then(validar => {

					  if (validar) {
					   setTimeout(location.href=enlace,1200);
					  }

					  swal.stopLoading();
					  swal.close();

					});










				}




			function getParameterByName(name) {
				name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
				var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
				results = regex.exec(location.search);
				return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
			}
			function resmensaje(){
				swal({
					title:"Disculpe las molestias causadas",
						heightAuto: true,
						type: 'info',
						width: '80rem',
						text:'\n\nLas Respuesta Reserva de Cupo se publicarán el día 16 de febrero de 2021, en horas de la tarde. \n\n ',
						});
			}

			function consultarCodigo(){
				$.ajax({
					method: "POST",
					url: "control/ajaxHear.php",
					data: { action: "sacarCodigo", documento: $('#documento').val(), periodo: $("#periodo").val() },
					success: function(result){
						if(result.error == 0){
							window.open("../../interior/listado.php?cual=5&documento=" + $('#documento').val() + "&per=" + $("#periodo").val() + "&cod=" + result.contenido);
						}else{
							$("#mensajeError").html(result.contenido);
						}
				}});
			}

		</script>

<?php include_once '../includes/footer.php';
