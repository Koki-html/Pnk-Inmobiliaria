       (function() {
            // --- Elementos DOM ---
            const form = document.getElementById('loginForm');
            const usernameInput = document.getElementById('username');
            const passwordInput = document.getElementById('password');
            const rememberCheck = document.getElementById('rememberCheckbox');
            const loginButton = document.getElementById('loginButton');
            const messageDiv = document.getElementById('messageContainer');
            const forgotLink = document.getElementById('forgotPasswordLink');
            const registerLink = document.getElementById('registerLink');

            // --- Funciones de ayuda para mensajes accesibles ---
            function setMessage(text, isError = false, isSuccess = false) {
                messageDiv.textContent = text;
                // Limpiar clases previas
                messageDiv.classList.remove('error-message', 'success-message');
                if (isError) {
                    messageDiv.classList.add('error-message');
                    messageDiv.setAttribute('aria-label', `Error: ${text}`);
                } else if (isSuccess) {
                    messageDiv.classList.add('success-message');
                    messageDiv.setAttribute('aria-label', text);
                } else {
                    messageDiv.classList.remove('error-message', 'success-message');
                    messageDiv.setAttribute('aria-label', text);
                }
                // Anunciar cambio a lectores de pantalla (role="status" ya lo hace)
            }

            // Simular carga temporal (para feedback visual)
            function setLoadingState(isLoading) {
                if (isLoading) {
                    const originalText = loginButton.innerHTML;
                    loginButton.disabled = true;
                    loginButton.innerHTML = '<span class="loading-spinner"></span> Validando...';
                    loginButton.setAttribute('aria-busy', 'true');
                    // Guardamos estado para restaurar
                    loginButton._originalText = originalText;
                } else {
                    loginButton.disabled = false;
                    loginButton.innerHTML = loginButton._originalText || 'Iniciar sesión';
                    loginButton.removeAttribute('aria-busy');
                }
            }

            // Simulación de validación contra credenciales demo (totalmente navegable)
            async function performLogin(usernameVal, passwordVal, rememberVal) {
                // Pequeña pausa para simular red y dar feedback (mejor UX)
                return new Promise((resolve) => {
                    setTimeout(() => {
                        // Demo: credenciales válidas: admin@demo.com / password123   ó   usuario: demo / pass: 123456
                        const isValid = (usernameVal === 'admin@demo.com' && passwordVal === 'password123') ||
                                        (usernameVal === 'demo' && passwordVal === '123456') ||
                                        (usernameVal === 'usuario@prueba.com' && passwordVal === '12345678');
                        
                        // También consideramos el caso de recordarme (solo simulación, en app real se manejaría cookie/localStorage)
                        if (isValid) {
                            if (rememberVal) {
                                // simulamos persistencia en localStorage (solo para demostración)
                                localStorage.setItem('demo_remember_username', usernameVal);
                                setMessage(`✅ Acceso exitoso. ¡Bienvenido, ${usernameVal}!`, false, true);
                            } else {
                                // si existe una sesión previa recordada la borramos (simulado)
                                localStorage.removeItem('demo_remember_username');
                                setMessage(`✅ Sesión iniciada correctamente. Redirigiendo...`, false, true);
                            }
                            resolve({ success: true, username: usernameVal });
                        } else {
                            setMessage('❌ Credenciales incorrectas.', true, false);
                            resolve({ success: false });
                        }
                    }, 800);
                });
            }

            // Función de redirección simulada (solo demo)
            function simulateRedirect(username) {
                // Pequeño mensaje adicional antes de redirección (simulación)
                const originalMsg = messageDiv.textContent;
                setMessage(`🔄 Redirigiendo al panel de ${username}...`, false, false);
                setTimeout(() => {
                    // Reiniciamos el formulario con un aviso (para experiencia demostrativa, sin recarga real)
                    // Pero en un entorno real aquí iría window.location.href = "/dashboard";
                    window.location.href = "../index.html";
                    // Reseteamos el formulario y dejamos mensaje de bienvenida demo
                    form.reset();
                    setMessage('✨ Sesión cerrada automáticamente (demo). Puedes probar de nuevo.', false, false);
                    usernameInput.focus();
                }, 1000);
            }

            // Función que maneja el envío del formulario
            async function onSubmit(event) {
                event.preventDefault();

                // --- Validación básica en cliente con buenos mensajes ---
                const usernameVal = usernameInput.value.trim();
                const passwordVal = passwordInput.value;

                if (!usernameVal) {
                    setMessage('⚠️ El campo de usuario o correo es obligatorio.', true, false);
                    usernameInput.focus();
                    return;
                }
                if (!passwordVal) {
                    setMessage('⚠️ La contraseña no puede estar vacía.', true, false);
                    passwordInput.focus();
                    return;
                }

                // Validación extra: formato de email simple (opcional pero mejora UX)
                const emailRegex = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
                if (usernameVal.includes('@') && !emailRegex.test(usernameVal)) {
                    setMessage('📧 Formato de correo electrónico inválido. Ejemplo: usuario@dominio.com', true, false);
                    usernameInput.focus();
                    return;
                }

                // Cargando estado
                setLoadingState(true);
                // Limpiar mensajes previos de error
                if (messageDiv.classList.contains('error-message')) {
                    setMessage('Verificando credenciales...', false, false);
                } else {
                    setMessage('🔐 Verificando acceso...', false, false);
                }

                // Ejecutar login simulado
                const result = await performLogin(usernameVal, passwordVal, rememberCheck.checked);
                setLoadingState(false);

                if (result.success) {
                    // Éxito: simular redirección después de un pequeño delay para ver mensaje
                    simulateRedirect(result.username);
                } else {
                    // En caso de error, enfocar el campo de usuario para corrección rápida (accesibilidad)
                    usernameInput.focus();
                    // El mensaje de error ya se estableció dentro de performLogin
                }
            }

            // --- Función para cargar credenciales recordadas (si existen) ---
            function loadRememberedUser() {
                const remembered = localStorage.getItem('demo_remember_username');
                if (remembered) {
                    usernameInput.value = remembered;
                    rememberCheck.checked = true;
                    setMessage(`🔁 Usuario "${remembered}" recuperado. Ingresa tu contraseña.`, false, false);
                    passwordInput.focus();
                }
            }

            // --- Manejador para "Olvidé mi contraseña" (simulación) ---
            function handleForgotPassword(e) {
                e.preventDefault();
                setMessage('📬 Se ha enviado un enlace de recuperación a tu correo registrado (demo simulada).', false, false);
                // Opcional: mostrar un pequeño modal didáctico, pero mantenemos navegabilidad.
                // Enfocar al campo usuario después de cerrar lectura
                setTimeout(() => {
                    usernameInput.focus();
                }, 100);
            }

            // --- Manejador para "Registrarse" ---
            function handleRegister(e) {
                e.preventDefault();
                setMessage('📝 Función de registro demo. Completa todos los campos para crear cuenta (simulación).', false, false);
                // Podríamos sugerir credenciales de prueba
                setTimeout(() => {
                    // Sugerencia interactiva para el usuario, sin perder foco.
                    const helperMsg = ' 💡 Si no recuerdas tu contraseña dale a "¿Olvidaste tu contraseña?"';
                    setMessage(`📝 Función de registro demo.${helperMsg}`, false, false);
                    usernameInput.focus();
                }, 1500);
            }

            // --- Navegación adicional: permitir Enter desde cualquier campo (ya lo maneja submit) pero aseguramos ---
            // También agregamos atajos o prevención de doble envío.

            // Validación en tiempo real sutil (opcional) para mejorar feedback al cambiar de campo
            function validateOnBlur() {
                // solo si está vacío y no es el primer enfoque, no molestar demasiado
                if (usernameInput.value.trim() === '') {
                    // no mostramos error fuerte, solo un hint sutil en el mensaje si no hay otro mensaje crítico
                    if (!messageDiv.classList.contains('error-message') && !messageDiv.textContent.includes('✅')) {
                        setMessage('🔍 Ingresa tu usuario o correo', false, false);
                    }
                }
            }

            usernameInput.addEventListener('blur', validateOnBlur);
            
            // También limpiar error de contraseña si el usuario empieza a escribir
            passwordInput.addEventListener('input', () => {
                if (messageDiv.classList.contains('error-message') && messageDiv.textContent.includes('contraseña')) {
                    setMessage('✏️ Escribiendo nueva contraseña...', false, false);
                }
            });
            
            usernameInput.addEventListener('input', () => {
                if (messageDiv.classList.contains('error-message') && messageDiv.textContent.includes('usuario')) {
                    setMessage('✏️ Actualizando usuario...', false, false);
                }
            });

            // --- Event Listeners principales ---
            form.addEventListener('submit', onSubmit);
            forgotLink.addEventListener('click', handleForgotPassword);
            registerLink.addEventListener('click', handleRegister);

            // --- Prevenir comportamiento por defecto de enlaces sin perder accesibilidad (ya lo hacemos con preventDefault) ---
            // También se añade que al hacer focus en el enlace de "olvidé" y presionar Enter funcione correctamente.
            // Para mejorar navegabilidad por teclado, aseguramos que los enlaces tengan rol (ya lo tienen implícito) y respondan a Enter.

            // Pequeño detalle: recordar que la demo guarde info del checkbox y mostrar mensaje de bienvenida
            // Cargar usuario recordado al inicio de la página
            loadRememberedUser();

            // Si el usuario presiona Escape dentro de un input, opcionalmente limpiar mensajes de error (mejora UX)
            const inputs = [usernameInput, passwordInput];
            inputs.forEach(input => {
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') {
                        if (messageDiv.classList.contains('error-message')) {
                            setMessage('⌨️ Puedes volver a intentarlo', false, false);
                        }
                        input.blur(); // opcional
                    }
                });
            });

            // Añadir indicación de que el formulario es totalmente navegable (atributos ARIA)
            form.setAttribute('aria-label', 'Formulario de inicio de sesión');
            
            // Demostración de que el botón y los campos son totalmente operables con teclado
            console.log('Login navegable listo — usa TAB, Shift+Tab, Enter y los enlaces.');
        })();