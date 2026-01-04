<?php
// app/Views/task-form.php
ob_start();
?>

<div class="form-container">
    <div class="form-header">
        <h2>
            <i class="fas fa-<?php echo $action === 'add' ? 'plus-circle' : 'edit'; ?>"></i>
            <?php echo $action === 'add' ? 'Ajouter une nouvelle tâche' : 'Modifier la tâche'; ?>
        </h2>
        <p><?php echo $action === 'add' 
            ? 'Remplissez le formulaire ci-dessous pour créer une nouvelle tâche' 
            : 'Mettez à jour les informations de votre tâche'; ?></p>
    </div>

    <form method="POST" action="<?php echo $action === 'add' ? '/add' : '/edit?id=' . $task->getId(); ?>" 
          id="taskForm" novalidate>
        
        <!-- Titre -->
        <div class="form-group">
            <label for="title" class="required">Titre</label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   class="form-control" 
                   placeholder="Ex: Réunion d'équipe hebdomadaire" 
                   value="<?php echo $task ? htmlspecialchars($task->getTitle()) : ''; ?>" 
                   required
                   minlength="3"
                   maxlength="100">
            <div class="error-message">Le titre doit contenir entre 3 et 100 caractères</div>
        </div>
        
        <!-- Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <div class="tooltip" data-tooltip="Ajoutez des détails sur votre tâche">
                <i class="fas fa-info-circle" style="color: #3498db;"></i>
            </div>
            <textarea id="description" 
                      name="description" 
                      class="form-control" 
                      placeholder="Décrivez votre tâche en détail..."
                      rows="5"
                      maxlength="500"><?php echo $task ? htmlspecialchars($task->getDescription()) : ''; ?></textarea>
            <div class="char-counter">
                <span id="charCount">0</span>/500 caractères
            </div>
        </div>
        
        <!-- Priorité -->
        <div class="form-group">
            <label for="priority">Priorité</label>
            <div class="select-wrapper">
                <select id="priority" name="priority" class="form-control">
                    <option value="low" 
                            data-color="#2ecc71"
                            <?php echo ($task && $task->getPriority() === 'low') ? 'selected' : ''; ?>>
                        <span class="priority-dot" style="background-color: #2ecc71;"></span>
                        Basse
                    </option>
                    <option value="medium" 
                            data-color="#f39c12"
                            <?php echo (!$task || $task->getPriority() === 'medium') ? 'selected' : ''; ?>>
                        <span class="priority-dot" style="background-color: #f39c12;"></span>
                        Moyenne
                    </option>
                    <option value="high" 
                            data-color="#e74c3c"
                            <?php echo ($task && $task->getPriority() === 'high') ? 'selected' : ''; ?>>
                        <span class="priority-dot" style="background-color: #e74c3c;"></span>
                        Haute
                    </option>
                </select>
            </div>
            
            <div class="priority-indicator">
                <div class="priority-option" data-value="low">
                    <span class="priority-dot" style="background-color: #2ecc71;"></span>
                    <span>Basse</span>
                </div>
                <div class="priority-option" data-value="medium">
                    <span class="priority-dot" style="background-color: #f39c12;"></span>
                    <span>Moyenne</span>
                </div>
                <div class="priority-option" data-value="high">
                    <span class="priority-dot" style="background-color: #e74c3c;"></span>
                    <span>Haute</span>
                </div>
            </div>
        </div>
        
        <!-- Date d'échéance (nouveau champ) -->
        <div class="form-group">
            <label for="due_date">Date d'échéance</label>
            <input type="date" 
                   id="due_date" 
                   name="due_date" 
                   class="form-control"
                   value="<?php echo $task && $task->getDueDate() 
                           ? date('Y-m-d', strtotime($task->getDueDate())) 
                           : ''; ?>"
                   min="<?php echo date('Y-m-d'); ?>">
        </div>
        
        <!-- Catégorie (nouveau champ optionnel) -->
        <div class="form-group">
            <label for="category">Catégorie</label>
            <select id="category" name="category" class="form-control">
                <option value="">Sélectionnez une catégorie</option>
                <option value="work" <?php echo ($task && $task->getCategory() === 'work') ? 'selected' : ''; ?>>💼 Travail</option>
                <option value="personal" <?php echo ($task && $task->getCategory() === 'personal') ? 'selected' : ''; ?>>👤 Personnel</option>
                <option value="shopping" <?php echo ($task && $task->getCategory() === 'shopping') ? 'selected' : ''; ?>>🛒 Courses</option>
                <option value="health" <?php echo ($task && $task->getCategory() === 'health') ? 'selected' : ''; ?>>🏥 Santé</option>
                <option value="study" <?php echo ($task && $task->getCategory() === 'study') ? 'selected' : ''; ?>>📚 Étude</option>
            </select>
        </div>
        
        <?php if ($action === 'edit'): ?>
            <!-- Statut (seulement en édition) -->
            <div class="form-group">
                <div class="checkbox-group">
                    <label class="checkbox-label">
                        <input type="checkbox" 
                               name="done" 
                               value="1" 
                               <?php echo $task->isDone() ? 'checked' : ''; ?>>
                        <span class="checkbox-custom"></span>
                        <span>Tâche terminée</span>
                    </label>
                </div>
            </div>
            
            <!-- Date de création (en lecture seule) -->
            <div class="form-group">
                <label>Créée le</label>
                <div class="readonly-field">
                    <?php echo date('d/m/Y à H:i', strtotime($task->getCreatedAt())); ?>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Actions -->
        <div class="form-actions">
            <a href="/" class="btn btn-outline">
                <i class="fas fa-times"></i> Annuler
            </a>
            <button type="submit" class="btn">
                <i class="fas fa-<?php echo $action === 'add' ? 'save' : 'sync-alt'; ?>"></i>
                <?php echo $action === 'add' ? 'Créer la tâche' : 'Mettre à jour'; ?>
            </button>
        </div>
    </form>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
?>