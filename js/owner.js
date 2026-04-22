// -------------------- SIMULACIÓN DE BASE DE DATOS (localStorage) --------------------
const STORAGE_KEY = "owner_system_users";

// Cargar owners registrados
function getOwners() {
    const stored = localStorage.getItem(STORAGE_KEY);
    if (stored) return JSON.parse(stored);
    // seed demo (owner demo para pruebas)
    const defaultOwners = [
        {
            id: "owner_1",
            fullname: "Carlos Mendoza",
            business: "Tech Solutions S.A.",
            email: "carlos@techsol.com",
            phone: "+569 1234 5678",
            country: "Chile",
            password: "admin123",
            createdAt: new Date().toISOString()
        }
    ];
    localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultOwners));
    return defaultOwners;
}

function saveOwners(owners) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(owners));
}

// Sesión activa
let currentOwner = null;

// helpers UI toast
function showToast(message, isError = false) {
    const toast = document.getElementById('toastMsg');
    toast.textContent = message;
    toast.style.backgroundColor = isError ? '#b91c1c' : '#0f3b2c';
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 3000);
}

// validar registro
function validateRegister(fullname, business, email, phone, country, password, confirm) {
    const errors = {};
    if (!fullname.trim()) errors.fullname = "Nombre completo requerido";
    else if (fullname.trim().length < 3) errors.fullname = "Mínimo 3 caracteres";
    if (!business.trim()) errors.business = "Nombre del negocio requerido";
    if (!email.trim()) errors.email = "Email requerido";
    else if (!/^[^\s@]+@([^\s@]+\.)+[^\s@]+$/.test(email)) errors.email = "Email inválido";
    if (!country) errors.country = "Selecciona un país";
    if (!password) errors.password = "Contraseña requerida";
    else if (password.length < 6) errors.password = "Mínimo 6 caracteres";
    if (password !== confirm) errors.confirm = "Las contraseñas no coinciden";
    // Validar email único
    const owners = getOwners();
    if (owners.some(owner => owner.email === email.trim())) errors.email = "Este email ya está registrado";
    return errors;
}

function clearRegisterErrors() {
    const groups = ['regGroupName', 'regGroupBusiness', 'regGroupEmail', 'regGroupPhone', 'regGroupCountry', 'regGroupPassword', 'regGroupConfirm'];
    groups.forEach(g => {
        const groupDiv = document.getElementById(g);
        if (groupDiv) {
            groupDiv.classList.remove('error');
            const errDiv = groupDiv.querySelector('.error-message');
            if (errDiv) errDiv.innerHTML = '';
        }
    });
}

function showRegisterErrors(errors) {
    clearRegisterErrors();
    if (errors.fullname) showErrorOnGroup('regGroupName', errors.fullname);
    if (errors.business) showErrorOnGroup('regGroupBusiness', errors.business);
    if (errors.email) showErrorOnGroup('regGroupEmail', errors.email);
    if (errors.country) showErrorOnGroup('regGroupCountry', errors.country);
    if (errors.password) showErrorOnGroup('regGroupPassword', errors.password);
    if (errors.confirm) showErrorOnGroup('regGroupConfirm', errors.confirm);
    // phone es opcional
}

function showErrorOnGroup(groupId, message) {
    const group = document.getElementById(groupId);
    if (group) {
        group.classList.add('error');
        const errSpan = group.querySelector('.error-message');
        if (errSpan) errSpan.innerHTML = `⚠️ ${message}`;
    }
}

// Registrar nuevo owner
function registerOwner(event) {
    event.preventDefault();
    const fullname = document.getElementById('regFullname').value;
    const business = document.getElementById('regBusiness').value;
    const email = document.getElementById('regEmail').value;
    const phone = document.getElementById('regPhone').value;
    const country = document.getElementById('regCountry').value;
    const password = document.getElementById('regPassword').value;
    const confirm = document.getElementById('regConfirmPassword').value;

    const errors = validateRegister(fullname, business, email, phone, country, password, confirm);
    if (Object.keys(errors).length > 0) {
        showRegisterErrors(errors);
        showToast("❌ Revisa los campos en rojo", true);
        return;
    }

    const owners = getOwners();
    const newOwner = {
        id: "owner_" + Date.now(),
        fullname: fullname.trim(),
        business: business.trim(),
        email: email.trim(),
        phone: phone.trim() || "No especificado",
        country: country,
        password: password,
        createdAt: new Date().toISOString()
    };
    owners.push(newOwner);
    saveOwners(owners);
    showToast("✅ Registro exitoso. ¡Inicia sesión!", false);
    // Limpiar formulario y cambiar a login
    document.getElementById('ownerRegisterForm').reset();
    toggleAuthForms('login');
    // Limpiar errores
    clearRegisterErrors();
}

// Login
function validateLogin(email, password) {
    const owners = getOwners();
    const ownerFound = owners.find(owner => owner.email === email && owner.password === password);
    if (ownerFound) return { success: true, owner: ownerFound };
    return { success: false, message: "Email o contraseña incorrectos" };
}

function handleLogin(event) {
    event.preventDefault();
    const email = document.getElementById('loginEmail').value.trim();
    const password = document.getElementById('loginPassword').value;

    // Limpiar errores login
    const loginGroupEmail = document.getElementById('loginGroupEmail');
    const loginGroupPass = document.getElementById('loginGroupPassword');
    loginGroupEmail.classList.remove('error');
    loginGroupPass.classList.remove('error');
    const errEmail = loginGroupEmail.querySelector('.error-message');
    const errPass = loginGroupPass.querySelector('.error-message');
    errEmail.innerHTML = '';
    errPass.innerHTML = '';

    if (!email) {
        loginGroupEmail.classList.add('error');
        errEmail.innerHTML = "⚠️ Email requerido";
        showToast("Ingresa tu email", true);
        return;
    }
    if (!password) {
        loginGroupPass.classList.add('error');
        errPass.innerHTML = "⚠️ Contraseña requerida";
        showToast("Ingresa la contraseña", true);
        return;
    }

    const result = validateLogin(email, password);
    if (!result.success) {
        showToast(result.message, true);
        loginGroupEmail.classList.add('error');
        errEmail.innerHTML = "⚠️ " + result.message;
        return;
    }

    // Login exitoso
    currentOwner = result.owner;
    // Guardar sesión en sessionStorage (simulación)
    sessionStorage.setItem("ownerSession", JSON.stringify({ id: currentOwner.id, email: currentOwner.email }));
    showDashboard();
    showToast(`👋 Bienvenido ${currentOwner.fullname}`, false);
}

// Cargar Dashboard con datos del owner y estadísticas dinámicas (simuladas)
function loadDashboardData() {
    if (!currentOwner) return;
    document.getElementById('dashboardOwnerName').innerHTML = `👤 ${currentOwner.fullname}`;
    document.getElementById('profileFullname').innerText = currentOwner.fullname;
    document.getElementById('profileBusiness').innerText = currentOwner.business;
    document.getElementById('profileEmail').innerText = currentOwner.email;
    document.getElementById('profilePhone').innerText = currentOwner.phone;
    document.getElementById('profileCountry').innerText = currentOwner.country;

    // Estadísticas simuladas pero que cambian según el negocio (para dar dinamismo)
    // Generar valores pseudoaleatorios basados en el id del owner
    const seed = (currentOwner.id.length + currentOwner.business.length) % 100;
    const totalSales = (Math.floor(Math.random() * 50000) + 15000 + seed * 100).toLocaleString('es-CL');
    const totalClients = Math.floor(Math.random() * 380) + 45 + (seed % 70);
    const totalProducts = Math.floor(Math.random() * 120) + 12 + (seed % 30);

    document.getElementById('statSales').innerHTML = `$${totalSales}`;
    document.getElementById('statClients').innerHTML = totalClients;
    document.getElementById('statProducts').innerHTML = totalProducts;
}

function showDashboard() {
    document.getElementById('authScreen').classList.add('hidden');
    document.getElementById('dashboardScreen').classList.remove('hidden');
    loadDashboardData();
}

function logout() {
    currentOwner = null;
    sessionStorage.removeItem("ownerSession");
    document.getElementById('dashboardScreen').classList.add('hidden');
    document.getElementById('authScreen').classList.remove('hidden');
    // Resetear formularios
    document.getElementById('ownerLoginForm').reset();
    document.getElementById('ownerRegisterForm').reset();
    clearRegisterErrors();
    // Limpiar errores login visualmente
    const loginGroupEmail = document.getElementById('loginGroupEmail');
    const loginGroupPass = document.getElementById('loginGroupPassword');
    if (loginGroupEmail) loginGroupEmail.classList.remove('error');
    if (loginGroupPass) loginGroupPass.classList.remove('error');
    showToast("Sesión cerrada correctamente", false);
}

// cambiar entre registro y login
function toggleAuthForms(mode) {
    const registerContainer = document.getElementById('registerFormContainer');
    const loginContainer = document.getElementById('loginFormContainer');
    if (mode === 'login') {
        registerContainer.classList.add('hidden');
        loginContainer.classList.remove('hidden');
    } else {
        registerContainer.classList.remove('hidden');
        loginContainer.classList.add('hidden');
    }
    // Limpiar errores y campos de ambos
    document.getElementById('ownerRegisterForm')?.reset();
    document.getElementById('ownerLoginForm')?.reset();
    clearRegisterErrors();
    const loginGroupEmail = document.getElementById('loginGroupEmail');
    const loginGroupPass = document.getElementById('loginGroupPassword');
    if (loginGroupEmail) loginGroupEmail.classList.remove('error');
    if (loginGroupPass) loginGroupPass.classList.remove('error');
    if (loginGroupEmail?.querySelector('.error-message')) loginGroupEmail.querySelector('.error-message').innerHTML = '';
    if (loginGroupPass?.querySelector('.error-message')) loginGroupPass.querySelector('.error-message').innerHTML = '';
}

// Comprobar sesión al cargar
function checkSession() {
    const session = sessionStorage.getItem("ownerSession");
    if (session) {
        try {
            const sessionData = JSON.parse(session);
            const owners = getOwners();
            const found = owners.find(owner => owner.id === sessionData.id);
            if (found) {
                currentOwner = found;
                showDashboard();
                return true;
            } else {
                sessionStorage.removeItem("ownerSession");
            }
        } catch (e) { console.warn(e); }
    }
    return false;
}

// Eventos y arranque
window.addEventListener('DOMContentLoaded', () => {
    // Asegurar datos iniciales
    getOwners();
    // Eventos formularios
    document.getElementById('ownerRegisterForm').addEventListener('submit', registerOwner);
    document.getElementById('ownerLoginForm').addEventListener('submit', handleLogin);
    document.getElementById('logoutButton').addEventListener('click', logout);
    document.getElementById('showLoginBtn').addEventListener('click', () => toggleAuthForms('login'));
    document.getElementById('showRegisterBtn').addEventListener('click', () => toggleAuthForms('register'));

    const sessionActive = checkSession();
    if (!sessionActive) {
        // por defecto mostrar registro
        toggleAuthForms('register');
    }
});