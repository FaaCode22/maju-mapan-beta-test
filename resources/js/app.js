import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('heroSlider', (total) => ({
    current: 0,
    total,
    interval: null,
    start() {
        this.interval = setInterval(() => this.next(), 6000);
    },
    next() {
        this.current = (this.current + 1) % this.total;
    },
    prev() {
        this.current = (this.current - 1 + this.total) % this.total;
    },
    goTo(index) {
        this.current = index;
    },
}));

// Intersection Observer untuk animasi masuk
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // Animasi section
            if (entry.target.classList.contains('animate-section')) {
                entry.target.classList.add('fade-in-up');
            }

            // Animasi grid items dengan stagger
            if (entry.target.classList.contains('animate-grid')) {
                const items = entry.target.querySelectorAll('[data-animate-item]');
                items.forEach((item, index) => {
                    item.classList.add('fade-in-scale');
                    item.style.animationDelay = `${index * 0.1}s`;
                });
            }

            // Animasi card container
            if (entry.target.classList.contains('animate-cards')) {
                const cards = entry.target.querySelectorAll('[data-animate-card]');
                cards.forEach((card, index) => {
                    card.classList.add('fade-in-up');
                    card.style.animationDelay = `${index * 0.15}s`;
                });
            }

            // Animasi heading & content
            if (entry.target.classList.contains('animate-heading')) {
                entry.target.classList.add('fade-in-down');
            }

            if (entry.target.classList.contains('animate-content')) {
                entry.target.classList.add('fade-in-up');
            }

            // Stop observing setelah animasi
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Setup observer untuk semua elemen yang perlu dianimasikan
document.addEventListener('DOMContentLoaded', () => {
    // Section animation
    document.querySelectorAll('section').forEach(section => {
        section.classList.add('animate-section');
        observer.observe(section);
    });

    // Grid animation
    document.querySelectorAll('.grid').forEach(grid => {
        grid.classList.add('animate-grid');
        observer.observe(grid);
    });

    // Heading animation
    document.querySelectorAll('h2').forEach(heading => {
        heading.classList.add('animate-heading');
        observer.observe(heading);
    });

    // Paragraph animation
    document.querySelectorAll('section > div > p:not(.mt-2)').forEach(p => {
        p.classList.add('animate-content');
        observer.observe(p);
    });

    // Card animation
    document.querySelectorAll('[data-animate-card]').forEach(card => {
        observer.observe(card.parentElement);
    });
});

Alpine.start();
