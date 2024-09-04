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
document.addEventListener('DOMContentLoaded', function() {
    const dinheiroCheckbox = document.getElementById('metodo1');
    const dinheiroInput = document.getElementById('dinheiro-input');

    // Função para mostrar ou ocultar o campo de input
    function toggleDinheiroInput() {
        if (dinheiroCheckbox.checked) {
            dinheiroInput.style.display = 'block';
        } else {
            dinheiroInput.style.display = 'none';
        }
    }

    // Adiciona event listener para o checkbox "Dinheiro"
    dinheiroCheckbox.addEventListener('change', toggleDinheiroInput);

    // Inicializa o estado do campo de input baseado no estado inicial do checkbox
    toggleDinheiroInput();
});
document.addEventListener('DOMContentLoaded', function() {
    const dinheiroCheckbox = document.getElementById('metodo1');
    const dinheiroInput = document.getElementById('dinheiro-input');
    const dinheiroQuestion = document.getElementById('dinheiro-question');

    // Função para mostrar ou ocultar o campo de input e a pergunta
    function toggleDinheiroInput() {
        if (dinheiroCheckbox.checked) {
            dinheiroInput.style.display = 'block';
            dinheiroQuestion.style.display = 'block'; // Exibe a pergunta
        } else {
            dinheiroInput.style.display = 'none';
            dinheiroQuestion.style.display = 'none'; // Oculta a pergunta
        }
    }

    // Adiciona event listener para o checkbox "Dinheiro"
    dinheiroCheckbox.addEventListener('change', toggleDinheiroInput);

    // Inicializa o estado do campo de input e da pergunta baseado no estado inicial do checkbox
    toggleDinheiroInput();
});

document.getElementById('metodoA').addEventListener('change', function() {
    var freteQuestion = document.getElementById('form-question');
    if (this.checked) {
        freteQuestion.style.display = 'block';
    } else {
        freteQuestion.style.display = 'none';
    }
});