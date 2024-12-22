function consultar() {
    $.ajax({
      type: "POST",  // Tipo de solicitud HTTP: POST.
      url: "controlador/consultar.php",  // URL del archivo PHP que maneja la consulta.
      data: "cedula=" + $("#consultaCedula").val(),  // Datos que se envían al servidor, en este caso el número de cédula que el usuario ha ingresado.
      beforeSend: function () {},  // Función que se ejecuta antes de que se haga la solicitud (vacía en este caso).
      success: function (respuesta) {
        // Función que se ejecuta cuando la solicitud es exitosa. Recibe la respuesta del servidor.
        $("#resultado1").html(respuesta);  // Muestra la respuesta del servidor en el contenedor con id "resultado1".
      },
    });
  }
  
  function insertar() {
    $.ajax({
      type: "POST",  // Tipo de solicitud HTTP: POST.
      url: "controlador/insertar.php",  // URL del archivo PHP que maneja la inserción de datos.
      data:
        "cedula=" +
        $("#ingresoCedula").val() +  // Número de cédula ingresado.
        "&nombres=" +
        $("#ingresoNombres").val() +  // Nombres ingresados.
        "&apellidos=" +
        $("#ingresoApellidos").val() +  // Apellidos ingresados.
        "&curso=" +
        $("#ingresoCurso").val() +  // Curso ingresado.
        "&paralelo=" +
        $("#ingresoParalelo").val(),  // Paralelo ingresado.
      beforeSend: function () {},  // Función que se ejecuta antes de la solicitud (vacía en este caso).
      success: function (respuesta) {
        // Función que se ejecuta cuando la solicitud es exitosa. Recibe la respuesta del servidor.
        // Limpia los campos de entrada después de la inserción exitosa.
        $("#ingresoCedula").val("");
        $("#ingresoNombres").val("");
        $("#ingresoApellidos").val("");
        $("#ingresoCurso").val("");
        $("#ingresoParalelo").val("");
        $("#resultado2").html(respuesta);  // Muestra la respuesta del servidor en el contenedor "resultado2".
      },
    });
  }
  
  function actualizar() {
    $.ajax({
      type: "POST",  // Tipo de solicitud HTTP: POST.
      url: "controlador/modificar.php",  // URL del archivo PHP que maneja la actualización de datos.
      data:
        "cedula=" +
        $("#actualizarCedula").val() +  // Número de cédula a actualizar.
        "&nombres=" +
        $("#actualizarNombres").val() +  // Nuevos nombres.
        "&apellidos=" +
        $("#actualizarApellidos").val() +  // Nuevos apellidos.
        "&curso=" +
        $("#actualizarCurso").val() +  // Nuevo curso.
        "&paralelo=" +
        $("#actualizarParalelo").val(),  // Nuevo paralelo.
      beforeSend: function () {},  // Función que se ejecuta antes de la solicitud (vacía en este caso).
      success: function (respuesta) {
        // Función que se ejecuta cuando la solicitud es exitosa. Recibe la respuesta del servidor.
        // Limpia los campos de entrada después de la actualización exitosa.
        $("#actualizarCedula").val("");
        $("#actualizarNombres").val("");
        $("#actualizarApellidos").val("");
        $("#actualizarCurso").val("");
        $("#actualizarParalelo").val("");
        $("#resultado3").html(respuesta);  // Muestra la respuesta del servidor en el contenedor "resultado3".
      },
    });
  }
  
  function eliminar() {
    $.ajax({
      type: "POST",  // Tipo de solicitud HTTP: POST.
      url: "controlador/eliminar.php",  // URL del archivo PHP que maneja la eliminación de datos.
      data:
        "cedula=" +
        $("#eliminarCedula").val(),  // Número de cédula del registro a eliminar.
      beforeSend: function () {},  // Función que se ejecuta antes de la solicitud (vacía en este caso).
      success: function (respuesta) {
        // Función que se ejecuta cuando la solicitud es exitosa. Recibe la respuesta del servidor.
        $("#eliminarCedula").val("");  // Limpia el campo de cédula después de la eliminación.
        $("#resultado4").html(respuesta);  // Muestra la respuesta del servidor en el contenedor "resultado4".
      },
    });
  }
  
