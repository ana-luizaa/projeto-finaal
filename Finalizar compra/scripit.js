document.addEventListener('DOMContentLoaded', function() {
    // Seleciona todas as seções do formulário
    const sections = document.querySelectorAll('.form-section');

    // Mostra a primeira seção inicialmente
    let currentSection = 0;
    sections[currentSection].classList.add('active');

    // Função para verificar se todos os inputs da seção atual estão preenchidos
    function checkInputs(section) {
        const inputs = section.querySelectorAll('input');
        return Array.from(inputs).some(input => {
            if (input.type === 'checkbox') {
                return input.checked;
            } else {
                return input.value.trim() !== '';
            }
        });
    }

    // Adiciona event listener nos botões "Próximo"
    const nextButtons = document.querySelectorAll('.next-btn');
    nextButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            // Verifica se os inputs da seção atual estão preenchidos
            if (checkInputs(sections[currentSection])) {
                // Oculta a seção atual
                sections[currentSection].classList.remove('active');
                
                // Mostra a próxima seção
                currentSection++;
                if (currentSection < sections.length) {
                    sections[currentSection].classList.add('active');
                }
            } else {
                alert("Por favor, preencha todos os campos antes de continuar.");
            }
        });
    });
});