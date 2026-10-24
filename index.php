<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Médico Prototipo - Citas Médicas</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        
        /* FONDO AZUL PASTEL ELEGANTE Y SUAVE */
        body { 
            background: linear-gradient(135deg, #cbd5e1 0%, #dbeafe 50%, #eff6ff 100%); 
            margin: 0; 
            padding: 30px 20px; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
        }

        /* TARJETA CONTENEDORA PRINCIPAL */
        .container { 
            width: 100%; 
            max-width: 900px; 
            background: #f0f9ff; 
            padding: 35px; 
            border-radius: 20px; 
            box-shadow: 0 12px 30px rgba(14, 116, 144, 0.18); 
            border: 2px solid #bae6fd;
        }

        /* BANNER EN DEGRADADO AZUL MÉDICO */
        .brand-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            background: linear-gradient(90deg, #0284c7 0%, #0369a1 100%);
            color: white;
            padding: 18px 25px;
            border-radius: 14px;
            margin-bottom: 25px;
            box-shadow: 0 6px 15px rgba(2, 132, 199, 0.25);
        }

        .brand-header img {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: #ffffff;
            padding: 4px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }

        .brand-header h1 {
            margin: 0;
            font-size: 1.6rem;
            letter-spacing: 0.5px;
            font-weight: 700;
        }

        .header { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            border-bottom: 2px solid #bae6fd; 
            padding-bottom: 12px; 
            margin-bottom: 20px; 
        }

        .header h2 { margin: 0; color: #0369a1; font-size: 1.3rem; }

        .btn-logout { 
            background-color: #ef4444; 
            color: white; 
            padding: 8px 16px; 
            border-radius: 8px; 
            cursor: pointer; 
            border: none; 
            font-weight: 600; 
            transition: all 0.2s;
            box-shadow: 0 2px 6px rgba(239, 68, 68, 0.2);
        }
        .btn-logout:hover { background-color: #dc2626; transform: translateY(-1px); }

        /* TARJETA DE FORMULARIO CON COLOR TURQUESA/MENTA PASTEL QUE HACE JUEGO */
        .form-card {
            background: #f0fdf4;
            padding: 22px;
            border-radius: 14px;
            border: 1.5px solid #bbf7d0;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.05);
            margin-bottom: 25px;
        }

        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 6px; color: #166534; font-weight: 600; }
        
        input, select { 
            width: 100%; 
            padding: 12px; 
            border: 1.5px solid #86efac; 
            border-radius: 8px; 
            font-size: 0.95rem;
            background-color: #ffffff;
            outline: none;
            transition: all 0.2s;
        }
        input:focus, select:focus { 
            border-color: #059669; 
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2); 
        }

        .form-row { display: flex; gap: 15px; }
        .form-row .form-group { flex: 1; }

        .btn-submit { 
            width: 100%; 
            background: linear-gradient(90deg, #0d9488 0%, #059669 100%); 
            color: white; 
            border: none; 
            padding: 13px; 
            border-radius: 8px; 
            font-weight: bold; 
            font-size: 1rem;
            cursor: pointer; 
            box-shadow: 0 4px 12px rgba(13, 148, 136, 0.25);
            transition: all 0.2s;
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 6px 15px rgba(13, 148, 136, 0.35); }

        .alert { padding: 12px; border-radius: 8px; margin-bottom: 15px; font-weight: 500; }
        .alert-error { background-color: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }
        .alert-success { background-color: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; }

        /* TABLA DE PACIENTES */
        .table-container {
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e0f2fe;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        }

        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #e2e8f0; font-size: 0.9rem; }
        th { background-color: #0284c7; color: white; font-weight: 600; }
        tr:nth-child(even) { background-color: #f8fafc; }
        tr:hover { background-color: #f0f9ff; }

        .badge-db { background-color: #e0f2fe; color: #0369a1; font-size: 0.75rem; padding: 4px 10px; border-radius: 12px; font-weight: bold; }
        .badge-status { padding: 5px 12px; border-radius: 12px; font-size: 0.8rem; font-weight: bold; }
        .status-registrada { background-color: #fef3c7; color: #92400e; }
        .status-atendido { background-color: #dcfce7; color: #166534; }

        .btn-action { padding: 6px 12px; border: none; border-radius: 6px; font-size: 0.8rem; font-weight: bold; cursor: pointer; margin-right: 5px; transition: transform 0.1s; }
        .btn-check { background-color: #10b981; color: white; }
        .btn-delete { background-color: #ef4444; color: white; }
        .btn-action:hover { transform: scale(1.05); }
        .hidden { display: none; }
    </style>
</head>
<body>

<div class="container">
    <!-- CABECERA CON BANNER Y DOCTOR ANIMADO -->
    <div class="brand-header">
        <img src="https://cdn-icons-png.flaticon.com/512/3774/3774299.png" alt="Doctor Animado">
        <h1>Centro Médico San José - Citas en Línea</h1>
    </div>

    <!-- SECCIÓN LOGIN -->
    <div id="login-section">
        <div class="header">
            <h2>Acceso al Sistema <span class="badge-db">Persistencia SQLite</span></h2>
        </div>
        <div id="login-msg"></div>
        <div class="form-card">
            <form id="login-form">
                <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" id="user" placeholder="admin" required>
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" id="pass" placeholder="1234" required>
                </div>
                <button type="submit" class="btn-submit">Ingresar al Sistema</button>
            </form>
        </div>
    </div>

    <!-- SECCIÓN PANEL DE CITAS -->
    <div id="app-section" class="hidden">
        <div class="header">
            <span>Usuario Conectado: <strong id="session-user" style="color:#0284c7;">admin</strong></span>
            <button id="btn-logout" class="btn-logout">Cerrar Sesión</button>
        </div>

        <div class="form-card">
            <h2 style="color:#15803d; margin-top:0; font-size:1.2rem;">Agendar Nueva Cita Médica</h2>
            <div id="app-msg"></div>
            <form id="appointment-form">
                <div class="form-group">
                    <label>Nombre del Paciente</label>
                    <input type="text" id="paciente" placeholder="Ej. Carlos Mendoza" required>
                </div>
                <div class="form-group">
                    <label>Especialidad</label>
                    <select id="especialidad" required>
                        <option value="Medicina General">Medicina General</option>
                        <option value="Pediatría">Pediatría</option>
                        <option value="Odontología">Odontología</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Fecha</label>
                        <input type="date" id="fecha" required>
                    </div>
                    <div class="form-group">
                        <label>Hora</label>
                        <input type="time" id="hora" required>
                    </div>
                </div>
                <button type="submit" class="btn-submit">Guardar Registro Médico</button>
            </form>
        </div>

        <h2 style="color:#0369a1; margin-top: 20px; font-size:1.2rem;">Reporte de Pacientes Agendados</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Paciente</th>
                        <th>Especialidad</th>
                        <th>Fecha y Hora</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="citas-table-body"></tbody>
            </table>
        </div>
    </div>
</div>

<script>
    if (!localStorage.getItem('usuarios_db')) {
        localStorage.setItem('usuarios_db', JSON.stringify([{ id: 1, usuario: 'admin', pass: '1234' }]));
    }
    if (!localStorage.getItem('citas_db')) {
        localStorage.setItem('citas_db', JSON.stringify([
            { id: 1, paciente: 'Alex Ávila Coello', especialidad: 'Medicina General', fecha: '2026-04-30', hora: '15:30', estado: 'Registrada' },
            { id: 2, paciente: 'Juan Manuel Perez Dominguez', especialidad: 'Odontología', fecha: '2026-10-26', hora: '15:00', estado: 'Registrada' }
        ]));
    }

    const loginSection = document.getElementById('login-section');
    const appSection = document.getElementById('app-section');
    const loginForm = document.getElementById('login-form');
    const appointmentForm = document.getElementById('appointment-form');
    const loginMsg = document.getElementById('login-msg');
    const appMsg = document.getElementById('app-msg');
    const citasTableBody = document.getElementById('citas-table-body');
    const btnLogout = document.getElementById('btn-logout');

    if (sessionStorage.getItem('active_user')) showApp(sessionStorage.getItem('active_user'));

    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const user = document.getElementById('user').value.trim();
        const pass = document.getElementById('pass').value.trim();
        const db = JSON.parse(localStorage.getItem('usuarios_db'));
        const valid = db.find(u => u.usuario === user && u.pass === pass);
        if (valid) {
            sessionStorage.setItem('active_user', valid.usuario);
            showApp(valid.usuario);
        } else {
            loginMsg.innerHTML = '<div class="alert alert-error">Acceso denegado. Verifique sus credenciales.</div>';
        }
    });

    btnLogout.addEventListener('click', () => {
        sessionStorage.removeItem('active_user');
        appSection.classList.add('hidden');
        loginSection.classList.remove('hidden');
    });

    appointmentForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const citas = JSON.parse(localStorage.getItem('citas_db'));
        const newCita = {
            id: citas.length > 0 ? citas[citas.length - 1].id + 1 : 1,
            paciente: document.getElementById('paciente').value.trim(),
            especialidad: document.getElementById('especialidad').value,
            fecha: document.getElementById('fecha').value,
            hora: document.getElementById('hora').value,
            estado: 'Registrada'
        };
        citas.push(newCita);
        localStorage.setItem('citas_db', JSON.stringify(citas));
        appMsg.innerHTML = '<div class="alert alert-success">¡Cita registrada con éxito en el sistema!</div>';
        appointmentForm.reset();
        renderCitas();
        setTimeout(() => appMsg.innerHTML = '', 3000);
    });

    function showApp(user) {
        document.getElementById('session-user').textContent = user;
        loginSection.classList.add('hidden');
        appSection.classList.remove('hidden');
        renderCitas();
    }

    function markAtendido(id) {
        let citas = JSON.parse(localStorage.getItem('citas_db'));
        citas = citas.map(c => c.id === id ? { ...c, estado: 'Atendido' } : c);
        localStorage.setItem('citas_db', JSON.stringify(citas));
        renderCitas();
    }

    function deleteCita(id) {
        if (confirm("¿Desea eliminar la cita de este paciente?")) {
            let citas = JSON.parse(localStorage.getItem('citas_db'));
            citas = citas.filter(c => c.id !== id);
            localStorage.setItem('citas_db', JSON.stringify(citas));
            renderCitas();
        }
    }

    function renderCitas() {
        const citas = JSON.parse(localStorage.getItem('citas_db')) || [];
        citasTableBody.innerHTML = [...citas].reverse().map(c => `
            <tr>
                <td>${c.id}</td>
                <td><strong>${c.paciente}</strong></td>
                <td>${c.especialidad}</td>
                <td>${c.fecha} | ${c.hora}</td>
                <td>
                    <span class="badge-status ${c.estado === 'Atendido' ? 'status-atendido' : 'status-registrada'}">
                        ${c.estado || 'Registrada'}
                    </span>
                </td>
                <td>
                    ${c.estado !== 'Atendido' ? `<button class="btn-action btn-check" onclick="markAtendido(${c.id})">Atendido</button>` : ''}
                    <button class="btn-action btn-delete" onclick="deleteCita(${c.id})">Eliminar</button>
                </td>
            </tr>
        `).join('');
    }
</script>
</body>
</html>




