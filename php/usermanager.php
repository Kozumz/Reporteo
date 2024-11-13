<?php session_start(); // Reanudar la sesión 
include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Reporteo/css/styles.css">
    <title>Reportes en Vivo</title>
    <style>
        .user {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px .5rem 0 .5rem;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .user-header {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .user-body {
            margin-bottom: 5px;
        }
        .user-footer {
            font-size: 0.9em;
            color: #666;
        }

        .a-style {
            text-decoration: none;
            color: black;
        }

        
    </style>
</head>
    <body>
        <main class="users-window" id="users-window">
        <div class="users-view">
            
            <div style="text-align:left;"><h1>Usuarios</h1></div>
            <div id="users-container"></div>
            
        </div>

        <div class="users-view">

            <div class="users-edit-view" id="users-edit-view"></div>
        
        </div>
        
        <script>
            // Función para cargar reportes desde la base de datos
            function loadUsers() {
                fetch('/Reporteo/php/getUsers.php')
                    .then(response => response.json())
                    .then(data => {
                        const container = document.getElementById('users-container');
                        container.innerHTML = ''; // Limpiar el contenedor
                        data.forEach(user => {
                            const userElement = document.createElement('a');
                            userElement.href = `https://www.google.com/search?q=${user.username}`;
                            userElement.className = 'a-style';
                            userElement.innerHTML = `
                            <div class="user">
                                <div class="user-header">ID: ${user.ID}</div>
                                <div class="user-body">${user.username}</div>
                                <div class="user-footer">
                                    Fecha: ${user.pass} 
                            </div>
                                </div>
                            `;
                            userElement.addEventListener('click', function(event) {
                                event.preventDefault(); // Prevenir la acción predeterminada del enlace
                               // alert(`Usuario: ${user.username}`);
                                const mainWindow = document.getElementById('users-edit-view');
                                mainWindow.innerHTML = '';
                                const editElement = document.createElement('div');
                                if(user.privilegios == "admin"){
                                    var op1 = "nu";
                                    var op2 = "su";
                                }
                                else if(user.privilegios == "su")
                                {
                                    var op1 = "admin";
                                    var op2 = "nu";
                                }
                                else if(user.privilegios == "nu")
                                {
                                    var op1 = "admin";
                                    var op2 = "su";
                                }
                                editElement.innerHTML = `
                                <div class="user-name">
                                    <p class="big-username">${user.username}</p>
                                </div>
                                <div class="priv-label">Privilegios: 
                                    <select id="priv-select">
                                        <option value= ${user.privilegios}> ${user.privilegios} </option>
                                        <option value= ${op1}> ${op1} </option>
                                        <option value= ${op2}> ${op2} </option>
                                    </select>
                                
                                </div>
                                <button id="save-button">Guardar cambios</button>
                                
                                `
                                mainWindow.appendChild(editElement);
                            
                                document.getElementById('save-button').addEventListener('click', function() {
                                const newPrivilegios = document.getElementById('priv-select').value;
                                // Aquí puedes agregar la lógica para enviar los datos al servidor
                                fetch('/Reporteo/php/updateUser.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        id: user.ID,
                                        privilegios: newPrivilegios
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    console.log('Success:', data);
                                    // Aquí puedes agregar lógica adicional, como mostrar un mensaje de éxito
                                })
                                .catch((error) => {
                                    console.error('Error:', error);
                                    // Aquí puedes agregar lógica adicional, como mostrar un mensaje de error
                                });
                                window.location.reload();
                            });

                            });
                            container.appendChild(userElement);
                            
                        });
                    })
                    .catch(error => console.error('Error al cargar los reportes:', error));
            }
            // Cargar reportes al cargar la página
            window.onload = loadUsers;
            // Recargar reportes cada 30 segundos
            setInterval(loadUsers, 30000);           
        </script>
        </main>
    </body>
</html>
