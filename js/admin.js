// ---------- MODELO DE DATOS (LocalStorage) ----------
let duenos = [];      // { id, nombre, email, telefono, documento, estado }
let gestores = [];    // { id, nombre, email, telefono, especialidad, estado }
let avisos = [];      // { id, titulo, idDueno, operacion, precio, ubicacion, descripcion, estado, fecha }

// Keys para LocalStorage
const STORAGE_DUENOS = "admin_duenos";
const STORAGE_GESTORES = "admin_gestores";
const STORAGE_AVISOS = "admin_avisos";

function loadData() {
    duenos = JSON.parse(localStorage.getItem(STORAGE_DUENOS) || '[]');
    gestores = JSON.parse(localStorage.getItem(STORAGE_GESTORES) || '[]');
    avisos = JSON.parse(localStorage.getItem(STORAGE_AVISOS) || '[]');

    // Datos demo si está vacío
    if (duenos.length === 0) {
        duenos = [
            { id: "D1", nombre: "Carlos Rodríguez", email: "carlos@inmueble.cl", telefono: "+5691111111", documento: "12.345.678-9", estado: "activo" },
            { id: "D2", nombre: "Ana María López", email: "ana@propiedades.com", telefono: "+5692222222", documento: "98.765.432-1", estado: "activo" }
        ];
        saveDuenos();
    }
    if (gestores.length === 0) {
        gestores = [
            { id: "G1", nombre: "Pedro Gestor", email: "pedro@free.com", telefono: "+5693333333", especialidad: "Ventas", estado: "activo" },
            { id: "G2", nombre: "Lucía Martínez", email: "lucia@inmo.com", telefono: "+5694444444", especialidad: "Alquileres", estado: "inactivo" }
        ];
        saveGestores();
    }
    if (avisos.length === 0) {
        avisos = [
            { id: "A1", titulo: "Casa en Vitacura", idDueno: "D1", operacion: "Venta", precio: "$450.000 USD", ubicacion: "Vitacura", descripcion: "Excelente casa", estado: "publicado", fecha: new Date().toISOString() },
            { id: "A2", titulo: "Departamento Centro", idDueno: "D2", operacion: "Alquiler", precio: "$800 USD/mes", ubicacion: "Santiago Centro", descripcion: "2 ambientes", estado: "publicado", fecha: new Date().toISOString() }
        ];
        saveAvisos();
    }
}

function saveDuenos() { localStorage.setItem(STORAGE_DUENOS, JSON.stringify(duenos)); renderDuenos(); }
function saveGestores() { localStorage.setItem(STORAGE_GESTORES, JSON.stringify(gestores)); renderGestores(); }
function saveAvisos() { localStorage.setItem(STORAGE_AVISOS, JSON.stringify(avisos)); renderAvisos(); updateSelectDuenos(); }

function showToast(msg, isError = false) {
    const toast = document.getElementById('toastMsg');
    toast.textContent = msg;
    toast.style.backgroundColor = isError ? '#b91c1c' : '#0f3b2c';
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 3000);
}

// RENDERIZAR DUEÑOS
function renderDuenos() {
    const tbody = document.getElementById('tbodyDuenos');
    if (!tbody) return;
    tbody.innerHTML = '';
    duenos.forEach(dueno => {
        const row = tbody.insertRow();
        row.insertCell(0).innerText = dueno.id;
        row.insertCell(1).innerText = dueno.nombre;
        row.insertCell(2).innerText = dueno.email;
        row.insertCell(3).innerText = dueno.telefono || '--';
        row.insertCell(4).innerHTML = `<span class="status-badge ${dueno.estado === 'activo' ? 'status-active' : 'status-inactive'}">${dueno.estado === 'activo' ? 'Activo' : 'Dado de Baja'}</span>`;
        const acciones = row.insertCell(5);
        acciones.className = 'actions';
        if (dueno.estado === 'activo') {
            const btnBaja = document.createElement('button');
            btnBaja.innerText = 'Dar de Baja';
            btnBaja.className = 'btn-danger';
            btnBaja.style.fontSize = '0.7rem';
            btnBaja.onclick = () => toggleEstadoDueno(dueno.id);
            acciones.appendChild(btnBaja);
        } else {
            const btnActivar = document.createElement('button');
            btnActivar.innerText = 'Reactivar';
            btnActivar.className = 'btn-primary';
            btnActivar.style.fontSize = '0.7rem';
            btnActivar.style.background = '#10b981';
            btnActivar.onclick = () => toggleEstadoDueno(dueno.id);
            acciones.appendChild(btnActivar);
        }
    });
}

function toggleEstadoDueno(id) {
    const dueno = duenos.find(d => d.id === id);
    if (dueno) {
        dueno.estado = dueno.estado === 'activo' ? 'inactivo' : 'activo';
        saveDuenos();
        showToast(`Dueño ${dueno.nombre} ${dueno.estado === 'activo' ? 'reactivado' : 'dado de baja'}`, false);
        renderAvisos(); // para reflejar cambios en avisos
        updateSelectDuenos();
    }
}

// Registrar nuevo dueño
document.getElementById('formRegistrarDueno')?.addEventListener('submit', (e) => {
    e.preventDefault();
    const nombre = document.getElementById('duenoNombre').value.trim();
    const email = document.getElementById('duenoEmail').value.trim();
    const telefono = document.getElementById('duenoTelefono').value.trim();
    const documento = document.getElementById('duenoDocumento').value.trim();
    if (!nombre || !email) { showToast("Nombre y email son obligatorios", true); return; }
    const newId = "D" + (duenos.length + 1) + Date.now();
    duenos.push({ id: newId, nombre, email, telefono, documento, estado: "activo" });
    saveDuenos();
    document.getElementById('formRegistrarDueno').reset();
    showToast(`Dueño ${nombre} registrado correctamente`, false);
});

// GESTORES
function renderGestores() {
    const tbody = document.getElementById('tbodyGestores');
    if (!tbody) return;
    tbody.innerHTML = '';
    gestores.forEach(gestor => {
        const row = tbody.insertRow();
        row.insertCell(0).innerText = gestor.id;
        row.insertCell(1).innerText = gestor.nombre;
        row.insertCell(2).innerText = gestor.email;
        row.insertCell(3).innerText = gestor.especialidad;
        row.insertCell(4).innerHTML = `<span class="status-badge ${gestor.estado === 'activo' ? 'status-active' : 'status-inactive'}">${gestor.estado === 'activo' ? 'Activo' : 'Inactivo'}</span>`;
        const acciones = row.insertCell(5);
        acciones.className = 'actions';
        if (gestor.estado === 'activo') {
            const btnBaja = document.createElement('button');
            btnBaja.innerText = 'Dar de Baja';
            btnBaja.className = 'btn-danger';
            btnBaja.onclick = () => toggleEstadoGestor(gestor.id);
            acciones.appendChild(btnBaja);
        } else {
            const btnHabilitar = document.createElement('button');
            btnHabilitar.innerText = 'Habilitar';
            btnHabilitar.className = 'btn-primary';
            btnHabilitar.style.background = '#10b981';
            btnHabilitar.onclick = () => toggleEstadoGestor(gestor.id);
            acciones.appendChild(btnHabilitar);
        }
    });
}

function toggleEstadoGestor(id) {
    const gestor = gestores.find(g => g.id === id);
    if (gestor) {
        gestor.estado = gestor.estado === 'activo' ? 'inactivo' : 'activo';
        saveGestores();
        showToast(`Gestor ${gestor.nombre} ${gestor.estado === 'activo' ? 'habilitado' : 'deshabilitado'}`, false);
    }
}

document.getElementById('formRegistrarGestor')?.addEventListener('submit', (e) => {
    e.preventDefault();
    const nombre = document.getElementById('gestorNombre').value.trim();
    const email = document.getElementById('gestorEmail').value.trim();
    const telefono = document.getElementById('gestorTelefono').value.trim();
    const especialidad = document.getElementById('gestorEspecialidad').value;
    if (!nombre || !email) { showToast("Nombre y email requeridos", true); return; }
    const newId = "G" + (gestores.length + 1) + Date.now();
    gestores.push({ id: newId, nombre, email, telefono, especialidad, estado: "activo" });
    saveGestores();
    document.getElementById('formRegistrarGestor').reset();
    showToast(`Gestor ${nombre} registrado y activo`, false);
});

// AVISOS
function updateSelectDuenos() {
    const select = document.getElementById('avisoIdDueno');
    if (!select) return;
    const duenosActivos = duenos.filter(d => d.estado === 'activo');
    select.innerHTML = '<option value="">-- Seleccionar dueño --</option>';
    duenosActivos.forEach(dueno => {
        const option = document.createElement('option');
        option.value = dueno.id;
        option.textContent = `${dueno.nombre} (${dueno.email})`;
        select.appendChild(option);
    });
}

function renderAvisos() {
    const tbody = document.getElementById('tbodyAvisos');
    if (!tbody) return;
    tbody.innerHTML = '';
    avisos.forEach(aviso => {
        const dueno = duenos.find(d => d.id === aviso.idDueno);
        const nombreDueno = dueno ? dueno.nombre : 'Dueño eliminado';
        const row = tbody.insertRow();
        row.insertCell(0).innerText = aviso.id;
        row.insertCell(1).innerText = aviso.titulo;
        row.insertCell(2).innerText = nombreDueno;
        row.insertCell(3).innerText = aviso.operacion;
        row.insertCell(4).innerText = aviso.precio;
        row.insertCell(5).innerHTML = `<span class="status-badge status-active">${aviso.estado === 'publicado' ? 'Publicado' : 'Oculto'}</span>`;
        const acciones = row.insertCell(6);
        acciones.className = 'actions';
        const btnEliminar = document.createElement('button');
        btnEliminar.innerText = 'Eliminar Aviso';
        btnEliminar.className = 'btn-danger';
        btnEliminar.style.fontSize = '0.7rem';
        btnEliminar.onclick = () => eliminarAviso(aviso.id);
        acciones.appendChild(btnEliminar);
        const btnToggle = document.createElement('button');
        btnToggle.innerText = aviso.estado === 'publicado' ? 'Ocultar' : 'Publicar';
        btnToggle.className = 'btn-primary';
        btnToggle.style.background = aviso.estado === 'publicado' ? '#f59e0b' : '#10b981';
        btnToggle.style.fontSize = '0.7rem';
        btnToggle.onclick = () => toggleEstadoAviso(aviso.id);
        acciones.appendChild(btnToggle);
    });
}

function eliminarAviso(id) {
    avisos = avisos.filter(a => a.id !== id);
    saveAvisos();
    showToast("Aviso eliminado permanentemente", false);
}

function toggleEstadoAviso(id) {
    const aviso = avisos.find(a => a.id === id);
    if (aviso) {
        aviso.estado = aviso.estado === 'publicado' ? 'oculto' : 'publicado';
        saveAvisos();
        showToast(`Aviso "${aviso.titulo}" ${aviso.estado === 'publicado' ? 'publicado' : 'oculto'}`, false);
    }
}

document.getElementById('formPublicarAviso')?.addEventListener('submit', (e) => {
    e.preventDefault();
    const titulo = document.getElementById('avisoTitulo').value.trim();
    const idDueno = document.getElementById('avisoIdDueno').value;
    const operacion = document.getElementById('avisoOperacion').value;
    const precio = document.getElementById('avisoPrecio').value.trim();
    const ubicacion = document.getElementById('avisoUbicacion').value.trim();
    const descripcion = document.getElementById('avisoDescripcion').value.trim();
    if (!titulo || !idDueno) { showToast("Título y dueño son obligatorios", true); return; }
    const newId = "A" + (avisos.length + 1) + Date.now();
    const nuevoAviso = {
        id: newId, titulo, idDueno, operacion, precio: precio || "Consultar", ubicacion: ubicacion || "No especificada",
        descripcion: descripcion || "", estado: "publicado", fecha: new Date().toISOString()
    };
    avisos.push(nuevoAviso);
    saveAvisos();
    document.getElementById('formPublicarAviso').reset();
    showToast("Aviso publicado exitosamente", false);
});

// TABS y LOGOUT
function initTabs() {
    const tabBtns = document.querySelectorAll('.tab-btn');
    const panels = document.querySelectorAll('.panel');
    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const tabId = btn.getAttribute('data-tab');
            tabBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            panels.forEach(panel => panel.classList.remove('active-panel'));
            document.getElementById(tabId).classList.add('active-panel');
            // refrescar selects y datos
            updateSelectDuenos();
            renderDuenos();
            renderGestores();
            renderAvisos();
        });
    });
}

document.getElementById('adminLogoutBtn')?.addEventListener('click', () => {
    showToast("Sesión de administrador cerrada. (Demo)", false);
    setTimeout(() => location.reload(), 800);
});

// Inicializar
loadData();
initTabs();
updateSelectDuenos();
renderDuenos();
renderGestores();
renderAvisos();