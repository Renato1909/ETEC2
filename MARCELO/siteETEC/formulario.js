// ============================================
// formulario.js - Validações e Autenticação
// ETEC Zona Leste - Formulário de Contato
// ============================================

document.addEventListener('DOMContentLoaded', function() {
    
    // ============================================
    // VALIDAÇÃO DO FORMULÁRIO DE LOGIN
    // ============================================
    const formLogin = document.getElementById('formLogin');
    if (formLogin) {
        formLogin.addEventListener('submit', function(e) {
            const usuario = document.getElementById('usuario').value.trim();
            const senha = document.getElementById('senha').value;
            
            // Validar campo de usuário
            if (usuario.length < 3) {
                alert('O usuário deve ter pelo menos 3 caracteres.');
                e.preventDefault();
                return;
            }
            
            // Validar campo de senha
            if (senha.length < 6) {
                alert('A senha deve ter pelo menos 6 caracteres.');
                e.preventDefault();
                return;
            }
            
            // Verificar se contém apenas caracteres permitidos (alfanuméricos)
            if (!/^[a-zA-Z0-9]+$/.test(usuario)) {
                alert('O usuário deve conter apenas letras e números.');
                e.preventDefault();
                return;
            }
        });
    }

    // ============================================
    // VALIDAÇÃO DO FORMULÁRIO DE CONTATO
    // ============================================
    const formContato = document.getElementById('formContato');
    if (formContato) {
        formContato.addEventListener('submit', function(e) {
            
            // Validar nome completo
            const nome = document.getElementById('nome').value.trim();
            if (nome.length < 3) {
                alert('O nome deve ter pelo menos 3 caracteres.');
                e.preventDefault();
                return;
            }
            
            // Verificar se o nome contém apenas letras e espaços
            if (!/^[a-zA-ZÀ-ÿ\s]+$/.test(nome)) {
                alert('O nome deve conter apenas letras.');
                e.preventDefault();
                return;
            }
            
            // Validar email
            const email = document.getElementById('email').value.trim();
            const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!regexEmail.test(email)) {
                alert('Digite um email válido.');
                e.preventDefault();
                return;
            }
            
            // Validar telefone (opcional, mas se preenchido deve ser válido)
            const telefone = document.getElementById('telefone').value.trim();
            if (telefone && !/^\(?[1-9]{2}\)?\s?[9]?[0-9]{4}-?[0-9]{4}$/.test(telefone)) {
                alert('Digite um telefone válido no formato (11) 99999-9999.');
                e.preventDefault();
                return;
            }
            
            // Validar curso selecionado
            const curso = document.getElementById('curso').value;
            if (!curso || curso === 'Selecione um curso') {
                alert('Selecione um curso de interesse.');
                e.preventDefault();
                return;
            }
            
            // Validar mensagem
            const mensagem = document.getElementById('mensagem').value.trim();
            if (mensagem.length < 10) {
                alert('A mensagem deve ter pelo menos 10 caracteres.');
                e.preventDefault();
                return;
            }
            
            // Se todas as validações passarem, o formulário será enviado
        });
    }

    // ============================================
    // ANIMAÇÕES DE SCROLL (Reveal)
    // ============================================
    const revealItems = document.querySelectorAll('.container, .card');
    if (revealItems.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show-reveal');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
        
        revealItems.forEach(item => observer.observe(item));
    }

    // ============================================
    // SCROLL SUAVE PARA LINKS INTERNOS
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            if (this.getAttribute('href') === '#') return;
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

});