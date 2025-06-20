<div id="loading-screen" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 transform transition-opacity duration-300 opacity-0 pointer-events-none">
    <div class="bg-white p-8 rounded-lg shadow-xl flex flex-col items-center">
        <div class="loader mb-4"></div>
        <p class="text-gray-700 text-lg font-semibold">Loading...</p>
    </div>
</div>

<style>
.loader {
    width: 48px;
    height: 48px;
    border: 5px solid #FFF;
    border-bottom-color: #4F46E5;
    border-radius: 50%;
    display: inline-block;
    box-sizing: border-box;
    animation: rotation 1s linear infinite;
}

@keyframes rotation {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>

<script>
        
    window.addEventListener('load', () => {
        const loadingScreen = document.getElementById('loading-screen');
        
        // Show loading
        window.showLoading = () => {
            loadingScreen.classList.remove('opacity-0', 'pointer-events-none');
        };
        
        // Hide loading
        window.hideLoading = () => {
            loadingScreen.classList.add('opacity-0', 'pointer-events-none');
        };
        
        // Intercept all form submissions
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', () => {
                showLoading();
            });
        });
        
        // Intercept all link clicks
        document.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', (e) => {
                if (!link.hasAttribute('target') && !e.ctrlKey && !e.shiftKey) {
                    showLoading();
                }
            });
        });
    });
</script>