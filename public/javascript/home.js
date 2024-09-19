
    // Function to animate the counter
    function animateCounter(element, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            element.textContent = Math.floor(progress * (end - start) + start) + ' +';
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }

    // Function to observe when the element is in view
    function observeElement() {
        const counterElement = document.getElementById('activeCourses');
        const observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
                // Start animating the counter when the element comes into view
                animateCounter(counterElement, 1, 150, 2000);
                // Stop observing after the animation starts
                observer.unobserve(counterElement);
            }
        }, {
            threshold: 0.5 // Adjust this value if needed to detect when half the element is in view
        });

        observer.observe(counterElement);
    }

    // Run the observeElement function when the DOM is fully loaded
    document.addEventListener('DOMContentLoaded', observeElement);

