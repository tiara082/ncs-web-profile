// Logo Page JavaScript

// Download Logo Function
function downloadLogo(logoType) {
    const logos = {
        polinema: {
            url: 'https://avatars.githubusercontent.com/u/63681676?s=280&v=4',
            filename: 'logo-polinema.png'
        },
        jti: {
            url: 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Jti_polinema.svg/328px-Jti_polinema.svg.png?20240606144137',
            filename: 'logo-jti.png'
        }
    };

    const logo = logos[logoType];
    
    // Show loading notification
    showNotification('Preparing download...', 'info');
    
    // Create a temporary link and trigger download
    fetch(logo.url)
        .then(response => response.blob())
        .then(blob => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = logo.filename;
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            document.body.removeChild(a);
            
            // Show success notification
            showNotification('Logo downloaded successfully!', 'success');
        })
        .catch(error => {
            console.error('Download failed:', error);
            showNotification('Download failed. Please try again.', 'error');
        });
}

// View Logo in Full Screen
function viewLogo(logoType) {
    const logos = {
        polinema: document.getElementById('polinema-logo').src,
        jti: document.getElementById('jti-logo').src
    };

    // Create modal overlay
    const modal = document.createElement('div');
    modal.className = 'fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center p-4 cursor-zoom-out';
    modal.onclick = () => modal.remove();
    
    // Create image container
    const imgContainer = document.createElement('div');
    imgContainer.className = 'max-w-4xl max-h-screen bg-white rounded-2xl p-8 shadow-2xl transform scale-0 transition-transform duration-300';
    
    const img = document.createElement('img');
    img.src = logos[logoType];
    img.className = 'w-full h-auto object-contain';
    img.alt = `${logoType.toUpperCase()} Logo`;
    
    imgContainer.appendChild(img);
    modal.appendChild(imgContainer);
    document.body.appendChild(modal);
    
    // Trigger animation
    setTimeout(() => {
        imgContainer.style.transform = 'scale(1)';
    }, 10);
    
    // Prevent image click from closing modal
    imgContainer.onclick = (e) => e.stopPropagation();
}

// Show Notification
function showNotification(message, type = 'info') {
    const colors = {
        success: 'bg-green-500',
        error: 'bg-red-500',
        info: 'bg-blue-500'
    };
    
    const icons = {
        success: 'check-circle',
        error: 'x-circle',
        info: 'info'
    };
    
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 ${colors[type]} text-white px-6 py-4 rounded-lg shadow-2xl flex items-center gap-3 z-50 transform translate-x-full transition-transform duration-300`;
    notification.innerHTML = `
        <i data-feather="${icons[type]}" width="20" height="20"></i>
        <span class="font-medium">${message}</span>
    `;
    
    document.body.appendChild(notification);
    feather.replace();
    
    // Slide in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 10);
    
    // Slide out and remove after 3 seconds
    setTimeout(() => {
        notification.style.transform = 'translateX(full)';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Smooth Scroll for Anchor Links
document.addEventListener('DOMContentLoaded', () => {
    // Add scroll reveal animation
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe logo cards
    document.querySelectorAll('.logo-card').forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `all 0.6s ease ${index * 0.1}s`;
        observer.observe(card);
    });
    
    // Add keyboard navigation
    document.addEventListener('keydown', (e) => {
        // Press 'Escape' to close any open modals
        if (e.key === 'Escape') {
            const modal = document.querySelector('.fixed.inset-0');
            if (modal) modal.remove();
        }
    });
});

// Log page view
console.log('Logo page loaded successfully! 🎨');
