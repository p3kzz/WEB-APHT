import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-dropdown-button]').forEach(button => {
        button.addEventListener('click', (e) => {
            const id = button.getAttribute('data-dropdown-button');
            const menu = document.querySelector(`[data-dropdown-menu="${id}"]`);
            menu?.classList.toggle('hidden');
        });
    });

    document.addEventListener('click', function(event) {
        document.querySelectorAll('[data-dropdown-menu]').forEach(menu => {
            if (!menu.contains(event.target) &&
                !event.target.closest('[data-dropdown-button]')) {
                menu.classList.add('hidden');
            }
        });
    });
});
