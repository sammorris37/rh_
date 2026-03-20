/* =========================================
Table of contents

- Mobile Nav JS
- Social Share

============================================================= */

/* =============================================================
* Mobile Nav JS
============================================================= */
document.addEventListener('DOMContentLoaded', () => {
    const openDrawerButton = document.getElementById('openDrawer');
    const closeDrawerButton = document.getElementById('closeDrawer');
    const mobileDrawerNav = document.getElementById('MobileDrawerNav');
    const bodyClass = document.body;

    // Toggle drawer function
    const toggleDrawer = (action) => {
        if (action === 'open') {
            mobileDrawerNav.classList.add('open');
            bodyClass.classList.add('overflow-none');
        } else {
            mobileDrawerNav.classList.remove('open');
            bodyClass.classList.remove('overflow-none');
            resetToFirstLevel(); // Reset to the first level and close all submenus
        }
    };

    // Handle page change between levels
    const handlePageChange = (target) => {
        document.querySelectorAll('.navPage').forEach(page => {
            if (page.getAttribute('data-nav-page') === target) {
                page.classList.add('active');
            }
        });
    };

    // Reset to the first level and close all submenus
    const resetToFirstLevel = () => {
        document.querySelectorAll('.navPage').forEach(page => {
            page.classList.remove('active');
        });
        handlePageChange('level-1');
    };

    // Event listeners
    openDrawerButton.addEventListener('click', () => toggleDrawer('open'));
    closeDrawerButton.addEventListener('click', () => toggleDrawer('close'));

    document.querySelectorAll('.menu-item.has-children').forEach(item => {
        item.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent event bubbling
            const target = item.getAttribute('data-target');
            if (target) {
                handlePageChange(target);
            }
        });
    });

    document.querySelectorAll('.backBtn').forEach(button => {
        button.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent event bubbling
            const currentPage = button.closest('.navPage');
            const target = button.getAttribute('data-target');
            if (target) {
                currentPage.classList.remove('active'); // Remove active class from current level
                handlePageChange(target); // Go back to the previous level
            }
        });
    });

   // document.querySelectorAll('.menu-link.has-link').forEach(link => {
   //     link.addEventListener('click', () => toggleDrawer('close'));
   // });
});

/* =========================================
* Social Share 
========================================= */
document.addEventListener('DOMContentLoaded', function() {
    // Check if the necessary elements with IDs exist on the page
    var facebookShare = document.getElementById('facebook-share');
    var twitterShare = document.getElementById('twitter-share');
    var linkedinShare = document.getElementById('linkedin-share');
    var whatsappShare = document.getElementById('whatsapp-share'); // Added
    var emailShare = document.getElementById('email-share'); // Added

    if (facebookShare && twitterShare /*&& linkedinShare*/ && whatsappShare && emailShare) {
        // Function to open a centered dialog box
        function openCenteredWindow(url, width, height) {
            var left = (screen.width - width) / 2;
            var top = (screen.height - height) / 2;
            return window.open(url, '_blank', 'width=' + width + ',height=' + height + ',left=' + left + ',top=' + top);
        }

        // JavaScript function to share the current page URL on Facebook
        facebookShare.addEventListener('click', function() {
            var url = encodeURIComponent(window.location.href);
            var shareUrl = 'https://www.facebook.com/sharer.php?u=' + url;
            openCenteredWindow(shareUrl, 800, 400);
        });

        // JavaScript function to share the current page URL on Twitter
        twitterShare.addEventListener('click', function() {
            var url = encodeURIComponent(window.location.href);
            var shareUrl = 'https://twitter.com/intent/tweet?url=' + url;
            openCenteredWindow(shareUrl, 800, 400);
        });

        // JavaScript function to share the current page URL on LinkedIn
        linkedinShare.addEventListener('click', function() {
            var url = encodeURIComponent(window.location.href);
            var shareUrl = 'https://www.linkedin.com/shareArticle?url=' + url;
            openCenteredWindow(shareUrl, 800, 400);
        });

        // JavaScript function to share the current page URL on WhatsApp
        whatsappShare.addEventListener('click', function() {
            var url = encodeURIComponent(window.location.href);
            var shareUrl = 'https://api.whatsapp.com/send?text=' + url;
            openCenteredWindow(shareUrl, 800, 400);
        });

        // JavaScript function to share the current page URL via Email
        emailShare.addEventListener('click', function() {
            var url = window.location.href;
            var subject = 'Check this out!';
            var body = 'I thought you might be interested in this: ' + url;
            var mailtoLink = 'mailto:?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);
            window.location.href = mailtoLink;
        });
    }
});