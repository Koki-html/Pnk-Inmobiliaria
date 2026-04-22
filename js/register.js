
(function () {
    // -------- DOM Elements ----------
    const form = document.getElementById('registerForm');
    const nombreInput = document.getElementById('nombre');
    const apellidoInput = document.getElementById('apellido');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('confirmPassword');
    const paisSelect = document.getElementById('pais');
    const terminosCheck = document.getElementById('terminos');

    // grupos de error
    const groups = {
        nombre: document.getElementById('group-nombre'),
        apellido: document.getElementById('group-apellido'),
        email: document.getElementById('group-email'),
        password: document.getElementById('group-password'),
        confirm: document.getElementById('group-confirm'),
        pais: document.getElementById('group-pais'),
        terminos: document.getElementById('group-terminos')
    };

    // funciones helper para mostrar/limpiar errores
    function showError(groupKey, message) {
        const group = groups[groupKey];
        if (!group) return;
        const inputEl = group.querySelector('input, select');
        if (inputEl) inputEl.classList.add('error-input');
        group.classList.add('error');
        const errorDiv = group.querySelector('.error-message');
        if (errorDiv) {
            errorDiv.innerHTML = `⚠️ ${message}`;
        }
    }

    function clearError(groupKey) {
        const group = groups[groupKey];
        if (!group) return;
        group.classList.remove('error');
        const inputEl = group.querySelector('input, select');
        if (inputEl) inputEl.classList.remove('error-input');
        const errorDiv = group.querySelector('.error-message');
        if (errorDiv) errorDiv.innerHTML = '';
    }

    function clearAllErrors() {
        Object.keys(groups).forEach(key => clearError(key));
    }

    // -------- Validación individual (retorna objeto con errores) ----------
    function validateForm() {
        let isValid = true;
        const errors = {};

        // 1. nombre (requerido, solo letras y espacios básicos)
        const nombre = nombreInput.value.trim();
        if (!nombre) {
            errors.nombre = "El nombre es obligatorio.";
            isValid = false;
        } else if (nombre.length < 2) {
            errors.nombre = "El nombre debe tener al menos 2 caracteres.";
            isValid = false;
        } else if (!/^[a-zA-ZáéíóúñÑüÜ\s]+$/.test(nombre)) {
            errors.nombre = "Solo letras y espacios.";
            isValid = false;
        }

        // 2. apellido
        const apellido = apellidoInput.value.trim();
        if (!apellido) {
            errors.apellido = "El apellido es obligatorio.";
            isValid = false;
        } else if (apellido.length < 2) {
            errors.apellido = "El apellido debe tener al menos 2 caracteres.";
            isValid = false;
        } else if (!/^[a-zA-ZáéíóúñÑüÜ\s]+$/.test(apellido)) {
            errors.apellido = "Solo letras y espacios.";
            isValid = false;
        }

        // 3. email (formato estricto)
        const email = emailInput.value.trim();
        const emailRegex = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
        if (!email) {
            errors.email = "El correo electrónico es requerido.";
            isValid = false;
        } else if (!emailRegex.test(email)) {
            errors.email = "Introduce un correo válido (ej: nombre@dominio.com).";
            isValid = false;
        }

        // 4. contraseña
        const password = passwordInput.value;
        if (!password) {
            errors.password = "La contraseña es obligatoria.";
            isValid = false;
        } else if (password.length < 6) {
            errors.password = "La contraseña debe tener mínimo 6 caracteres.";
            isValid = false;
        } else if (password.length > 40) {
            errors.password = "La contraseña no debe exceder 40 caracteres.";
            isValid = false;
        }

        // 5. confirmación
        const confirm = confirmInput.value;
        if (!confirm) {
            errors.confirm = "Confirma tu contraseña.";
            isValid = false;
        } else if (password !== confirm) {
            errors.confirm = "Las contraseñas no coinciden.";
            isValid = false;
        }

        // 6. país (select)
        const pais = paisSelect.value;
        if (!pais) {
            errors.pais = "Selecciona un país válido.";
            isValid = false;
        }

        // 7. términos y condiciones
        if (!terminosCheck.checked) {
            errors.terminos = "Debes aceptar los términos y condiciones.";
            isValid = false;
        }

        return { isValid, errors };
    }

    // aplicar errores al DOM
    function applyErrorsToUI(errors) {
        clearAllErrors();
        for (const [field, msg] of Object.entries(errors)) {
            showError(field, msg);
        }
    }

    // mostrar toast flotante
    function showToast(message, isError = false) {
        const toast = document.getElementById('toastMsg');
        toast.textContent = message;
        toast.style.backgroundColor = isError ? '#b91c1c' : '#0f3b2c';
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
            toast.style.backgroundColor = '#1e293b';
        }, 3200);
    }

    // manejar envío
    function handleSubmit(event) {
        event.preventDefault();
        const { isValid, errors } = validateForm();

        if (!isValid) {
            applyErrorsToUI(errors);
            // desplazar al primer campo con error (navegabilidad amigable)
            const firstErrorField = Object.keys(errors)[0];
            if (firstErrorField && groups[firstErrorField]) {
                const errorElement = groups[firstErrorField].querySelector('input, select');
                if (errorElement) {
                    errorElement.focus();
                    errorElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
            showToast("❌ Revisa los campos resaltados", true);
            return;
        }

        // Si todo es correcto, mostrar datos simulando registro exitoso
        const formData = {
            nombre: nombreInput.value.trim(),
            apellido: apellidoInput.value.trim(),
            email: emailInput.value.trim(),
            pais: paisSelect.options[paisSelect.selectedIndex]?.text || paisSelect.value,
            aceptaTerminos: terminosCheck.checked
        };

        console.log("Registro exitoso:", formData);
        showToast(`✅ ¡Bienvenido ${formData.nombre}! Registro completado.`, false);

        // Opcional: resetear formulario después del éxito? se puede, pero mejor dejamos limpio o preguntamos
        // opcional: podriamos resetear pero mostramos exito, el usuario puede limpiar manualmente.
        // por experiencia limpiamos errores y no borramos datos para que vea lo ingresado, pero también podemos dar reset manual.
        // lo dejamos así para que vea los datos.
        clearAllErrors();
        // Podríamos adicionalmente enfocar el primer campo de nuevo si se desea, pero mejor mantener.
        // Mostrar una pequeña animación en el botón.
        const btnSubmit = document.getElementById('submitBtn');
        btnSubmit.style.transform = 'scale(0.98)';
        setTimeout(() => { btnSubmit.style.transform = ''; }, 150);
    }

    // resetear completamente el formulario y limpiar errores
    function resetForm() {
        form.reset();      // limpia todos los inputs y select, checkbox
        clearAllErrors();
        // después del reset, el select vuelve a su estado inicial con placeholder
        // pero debemos asegurar que el primer option disabled quede seleccionado
        // form.reset() hace eso si el HTML tiene el atributo selected en option vacío
        // forzar nuevamente por si acaso:
        if (paisSelect.options[0]) paisSelect.selectedIndex = 0;
        // limpiar también los valores manuales (reset ya lo hizo)
        nombreInput.value = '';
        apellidoInput.value = '';
        emailInput.value = '';
        passwordInput.value = '';
        confirmInput.value = '';
        terminosCheck.checked = false;
        // Enfocar el primer campo (navegabilidad)
        nombreInput.focus();
        showToast("🧹 Formulario limpiado", false);
    }

    // Validación en tiempo real (mientras se navega, opcional pero mejora UX)
    // Real-time: borrar error cuando el usuario empieza a escribir en un campo específico
    function attachRealtimeValidation() {
        const fieldsToWatch = [
            { element: nombreInput, groupKey: 'nombre' },
            { element: apellidoInput, groupKey: 'apellido' },
            { element: emailInput, groupKey: 'email' },
            { element: passwordInput, groupKey: 'password' },
            { element: confirmInput, groupKey: 'confirm' },
            { element: paisSelect, groupKey: 'pais' },
            { element: terminosCheck, groupKey: 'terminos' }
        ];

        fieldsToWatch.forEach(({ element, groupKey }) => {
            element.addEventListener('input', () => {
                // validación específica simplificada: solo limpiar error de ese campo
                // revalidamos el campo pero sin afectar otros visualmente
                // para una experiencia no intrusiva, limpiamos error
                if (groups[groupKey] && groups[groupKey].classList.contains('error')) {
                    // si se está corrigiendo, limpiamos el error visual
                    // pero para no molestar, solo si el campo ya tenía error
                    clearError(groupKey);
                }
            });
            // para checkbox y select se usa change
            if (element === terminosCheck || element === paisSelect) {
                element.addEventListener('change', () => {
                    if (groups[groupKey] && groups[groupKey].classList.contains('error')) {
                        clearError(groupKey);
                    }
                });
            }
        });

        // adicional para confirmación que verifica cuando password cambia
        passwordInput.addEventListener('input', () => {
            if (groups.confirm && groups.confirm.classList.contains('error')) {
                // si la confirmación tenía error y ahora se cambia pass, limpiar error de confirm
                clearError('confirm');
            }
            if (groups.password && groups.password.classList.contains('error')) {
                clearError('password');
            }
        });
        confirmInput.addEventListener('input', () => {
            if (groups.confirm && groups.confirm.classList.contains('error')) {
                clearError('confirm');
            }
        });
    }

    const termsLink = document.getElementById('termsLink');
    if (termsLink) {
        termsLink.addEventListener('click', (e) => {
            e.preventDefault();
            showToast("📜 Términos: Al registrarte aceptas nuestras políticas de privacidad y uso responsable.", false);
        });
    }

    const resetBtn = document.getElementById('resetBtn');
    resetBtn.addEventListener('click', resetForm);
    form.addEventListener('submit', handleSubmit);

    attachRealtimeValidation();

    window.addEventListener('load', () => {
        nombreInput.focus();
    });

    let submitting = false;
    form.addEventListener('submit', (e) => {
        if (submitting) {
            e.preventDefault();
            return;
        }
        submitting = true;
        setTimeout(() => { submitting = false; }, 500);
    });
})();