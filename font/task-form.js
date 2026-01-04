
document.addEventListener('DOMContentLoaded', function() {
    // Compteur de caractères
    const description = document.getElementById('description');
    const charCount = document.getElementById('charCount');
    
    if (description && charCount) {
        charCount.textContent = description.value.length;
        
        description.addEventListener('input', function() {
            charCount.textContent = this.value.length;
            if (this.value.length > 500) {
                this.value = this.value.substring(0, 500);
                charCount.textContent = 500;
            }
        });
    }
    
    // Sélection visuelle de la priorité
    const priorityOptions = document.querySelectorAll('.priority-option');
    const prioritySelect = document.getElementById('priority');
    
    priorityOptions.forEach(option => {
        option.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            prioritySelect.value = value;
            
            // Mettre à jour le style des options
            priorityOptions.forEach(opt => {
                opt.style.backgroundColor = '';
            });
            this.style.backgroundColor = '#e8f4fc';
        });
        
        // Style initial
        if (option.getAttribute('data-value') === prioritySelect.value) {
            option.style.backgroundColor = '#e8f4fc';
        }
    });
    
    // Mise à jour visuelle de la priorité
    prioritySelect.addEventListener('change', function() {
        priorityOptions.forEach(opt => {
            opt.style.backgroundColor = '';
            if (opt.getAttribute('data-value') === this.value) {
                opt.style.backgroundColor = '#e8f4fc';
            }
        });
    });
    
    // Validation du formulaire
    const form = document.getElementById('taskForm');
    form.addEventListener('submit', function(e) {
        const title = document.getElementById('title');
        
        if (!title.value.trim() || title.value.length < 3) {
            e.preventDefault();
            title.focus();
            title.classList.add('error');
            return false;
        }
        
        // Afficher un indicateur de chargement
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enregistrement...';
        submitBtn.disabled = true;
    });
    
    // Date minimum pour la date d'échéance
    const dueDate = document.getElementById('due_date');
    if (dueDate && !dueDate.value) {
        // Définir la date par défaut à J+7
        const nextWeek = new Date();
        nextWeek.setDate(nextWeek.getDate() + 7);
        dueDate.value = nextWeek.toISOString().split('T')[0];
    }
});
