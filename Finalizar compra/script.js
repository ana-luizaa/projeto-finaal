document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.form-section');
    let currentSection = 0;

    // Mostra a primeira seção
    sections[currentSection].classList.add('active');

    // Função para verificar se os inputs da seção atual estão preenchidos
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

    // Função para mostrar uma seção específica
    function showSection(index) {
        sections.forEach((section, i) => {
            section.style.display = (i === index) ? 'block' : 'none';
        });
    }

    // Função para gerenciar a seleção única de checkboxes em uma seção
    function handleCheckboxSelection(event) {
        if (event.target.type === 'checkbox') {
            const checkboxes = event.target.closest('.form-section').querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                if (checkbox !== event.target) {
                    checkbox.checked = false; // Desmarca todas as checkboxes exceto a selecionada
                }
            });
        }
    }

    // Adiciona o event listener para a seleção de checkboxes
    sections.forEach(section => {
        section.addEventListener('change', handleCheckboxSelection);
    });

    // Event Listener para botões "Próximo"
    const nextButtons = document.querySelectorAll('.next-btn');
    nextButtons.forEach((button) => {
        button.addEventListener('click', function() {
            if (checkInputs(sections[currentSection])) {
                currentSection++;
                if (currentSection < sections.length) {
                    showSection(currentSection);
                }
            } else {
                alert("Por favor, preencha todos os campos antes de continuar.");
            }
        });
    });

    // Event Listener para botões "Anterior"
    const prevButtons = document.querySelectorAll('.prev-btn');
    prevButtons.forEach((button) => {
        button.addEventListener('click', function() {
            if (currentSection > 0) {
                currentSection--;
                showSection(currentSection);
            }
        });
    });

    // Inicializa mostrando a primeira seção
    showSection(currentSection);
});
