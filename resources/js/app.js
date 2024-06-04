// import './bootstrap';
// import 'preline';

// document.addEventListener('livewire:navigated', () => { 
//     window.HSStaticMetohds.autoInit();
// })

import './bootstrap';
import 'preline';

// Ensure the dropdowns are initialized after the Livewire navigation event
document.addEventListener('livewire:navigated', () => {
    if (window.HSStaticMethods && typeof window.HSStaticMethods.autoInit === 'function') {
        window.HSStaticMethods.autoInit();
    } else {
        console.error("HSStaticMethods or autoInit method is not available.");
    }
});

// Ensure dropdowns are initialized on initial page load as well
document.addEventListener('DOMContentLoaded', () => {
    if (window.HSStaticMethods && typeof window.HSStaticMethods.autoInit === 'function') {
        window.HSStaticMethods.autoInit();
    } else {
        console.error("HSStaticMethods or autoInit method is not available.");
    }
});
