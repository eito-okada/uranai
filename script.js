$(document).ready(function() {
    // Animate button click effect
    $('button').on('mousedown', function() {
        $(this).css({
            transform: 'scale(0.95)',
            boxShadow: '0 0 10px rgba(0, 0, 0, 0.1)'
        });
    }).on('mouseup mouseleave', function() {
        $(this).css({
            transform: 'scale(1)',
            boxShadow: '0 3px 8px rgba(0, 0, 0, 0.15)'
        });
    });

    // Animate results section when form is submitted
    $('form').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Animate the results section to fade in smoothly
        $('.constaResults').fadeOut(200, function() {
            $(this).fadeIn(600);
        });

        // Simulate form submission or data fetching
        setTimeout(function() {
            // Scroll down to the results smoothly
            $('html, body').animate({
                scrollTop: $('.constaResults').offset().top - 20
            }, 800);
        }, 600);
    });

    // Hover effect for table rows
    $('.resultTable tr').hover(function() {
        $(this).css({
            backgroundColor: '#F1F8FF',
            transition: 'background-color 0.3s ease'
        });
    }, function() {
        $(this).css({
            backgroundColor: '#F9FAFB',
            transition: 'background-color 0.3s ease'
        });
    });

    // Header animation on page load
    $('.header').css({
        opacity: 0,
        transform: 'translateY(-50px)'
    }).animate({
        opacity: 1,
        transform: 'translateY(0)'
    }, 1000);
});
