<?php
$l1 = "Se ha producido un error";
$l2 = "&lt;&lt;&lt; Volver";
$l3 = "El programa no ha podido conectar con el servidor POP. Mensaje de error:";
$l4 = "No es posible acceder al servidor POP. Probablemente el nombre de usuario o password sea incorrecto.";
$l5 = "OK";
$l6 = "Conectar";
$l7 = "Password:";
$l8 = "Usuario:";
$l9 = "Puerto:";
$l10 = "Servidor POP:";
$l11 = "No hay correo en la bandeja de entrada.";
$l12 = "El programa no puede ejecutar el comando TOP.";
$l13 = "[Sin asunto]";
$l15 = "Error al tratar de acceder al mensaje #$id.";
$l16 = "Remitente:";
$l17 = "Destinatario:";
$l18 = "Fecha:";
$l19 = "Organizacion:";
$l20 = "Cliente de correo:";
$l21 = "Respuesta a:";
$l22 = "Cabeceras";
$l23 = "Copia (CC):";
$l24 = "Responder";
$l25 = "Reenviar";
$l26 = "Eliminar";
$l27 = "Responder a todos";
$l28 = "Imprimir";
$l29 = "Mostrar el c&oacute;digo fuente";
$l30 = "Lenguaje:";
$l31 = "¿Eliminar el mensaje seleccionado?";
$l32 = "El mensaje #$id no ha podido ser eliminado.";
$l33 = "Nuevo mensaje";
$l34 = "Actualizar";
$l35 = "[Nombre de fichero desconocido]";
$l36 = "Asunto:";
$l37 = "De:";
$l38 = "Para:";
$l39 = "Copia (CC):";
$l40 = "Copia oculta (BCC):";
$l41 = "Fichero adjunto:";
$l42 = "Enviar como HTML";
$l43 = "Enviar";
$l44 = "¿Enviar el mensaje ahora?";
# Do not translate [date] and [sender]. Think of them as variables. The
# string will be transformed into e.g. "On 08-08-2001 12:42, John Doe
# <doe@example.com> wrote":
$l45 = "El dia [date], [sender] escribio:";
$l46 = "Mensaje reenviado";
$l47 = "usted";
$l48 = "No olvide introducir un remitente v&aacute;lido.";
$l49 = "No olvide introducir un destinatario v&aacute;lido.";
# The character set corresponding to your language:
$l50 = "ISO-8859-1";
$l51 = "El programa no ha podido acceder a alguno de los ficheros adjuntos. Probablemente es un problema de permisos en el directorio de upload. P&oacute;ngase en contacto con el administrador del sistema.";
$l52 = "Salir";
$l53 = "Licencia: <a href='license.txt' target='_blank'>GNU General Public License</a>";
$l54 = "Acerca de ...";
$l55 = "Servidor POP predeterminado:";
$l56 = "Puerto predeterminado:";
$l57 = "Usuario predeterminado:";
$l58 = "Dividir &aacute;rea de trabajo:";
$l59 = "En vertical";
$l60 = "En Horizontal";
$l61 = "Configuración";
$l62 = "Guardar la configuraci&oacute;n";
$l63 = "Zona de cabecera - porcentaje:";
$l64 = "Zona de mensaje - porcentaje:";
$l65 = "Pie (todas las p&aacute;ginas):";
$l66 = "P&aacute;gina de entrada - cabecera:";
$l67 = "P&aacute;gina de entrada - pie:";
$l68 = "Barra de t&iacute;tulo:";
$l69 = "No hay permisos para modificar el fichero settingssaved.php. Debe cambiar los permisos del fichero a 666.";
$l70 = "Configuraci&oacute;n almacenada.";
$l71 = "Mantener el password antiguo";
$l72 = "Nuevo password:";
$l73 = "P&aacute;gina de administraci&oacute;n - password:";
$l74 = "P&aacute;gina de administraci&oacute;n - usuario:";
$l75 = "Acceso denegado.";
$l76 = "%s chequeo autom&aacute;tico";
$l77 = "Activar";
$l78 = "Desactivar";
$l79 = "Minutos entre chequeos:";
$l80 = "¿Salir de webmail?";
$l81 = "Aspecto:";
$l82 = "<a href='readme.html' target='_blank'>Ver el fichero readme</a>";
$l83 = "Mensaje con texto formateado:";
$l84 = "S&iacute;";
$l85 = "No";
$l86 = "Acuse de recibo";
$l87 = "Prioridad:";
$l88 = "Alta";
$l89 = "Normal";
$l90 = "Baja";
$l91 = "Muy alta";
$l92 = "Muy baja";
$l93 = "Esta opci&oacute;n activa o descativa el mensaje formateado. Si la activa, el texto ser&aacute; formateado de manera que *bold* se convierte en <b>bold</b>, /italic/ se convierte en <i>italic</i>, y _underlined_ se convierte en <u>underlined</u>.";
$l94 = "Ayuda";
$l95 = "Cerrar";
$l96 = "Si quiere limitar a un &uacute;nico servidor POP o un n&uacute;mero predefinido de &eacute;stos, escriba una lista de servidores separados por una coma y un espacio: <i>mail1.example.com, mail2.example.com, mail3.example.com</i>";
$l97 = "Introduzca uno o m&aacute;s n&uacute;meros de puertos separados por una coma y un espacio, ej: <i>110, 111</i>.";
$l98 = "Introduzca uno o m&aacute;s usuarios POP separados por una coma y un espacio, ej: <i>user1, user2</i>.";
$l99 = "Direcci&oacute;n de correo:";
$l100 = "No hay ning&uacute;n mensaje marcado para eliminar.";
$l101 = "¿Quiere eliminar los mensajes marcados?";
$l102 = "(Des)marcar todo";
$l103 = "Confirmar el password";
$l104 = "Los passwords introducidos no coinciden.";



function l14($timeStamp) {
	setlocale(LC_TIME, "sp");
	return strftime("%d-%b-%Y %H:%M", $timeStamp);
}
?>