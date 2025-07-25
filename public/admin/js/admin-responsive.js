// Custom admin panel JavaScript
$(document).ready(function() {
    // Sidebar toggle functionality
    $('.sidebar-toggle').on('click', function() {
        $('#sidebar').toggleClass('active');
        $('.page-content').toggleClass('sidebar-open');
    });
    
    // Close sidebar when clicking outside on mobile
    $(document).on('click', function(e) {
        if ($(window).width() <= 991) {
            if (!$(e.target).closest('#sidebar, .sidebar-toggle').length) {
                $('#sidebar').removeClass('active');
                $('.page-content').removeClass('sidebar-open');
            }
        }
    });
    
    // Handle window resize
    $(window).on('resize', function() {
        if ($(window).width() > 991) {
            $('#sidebar').removeClass('active');
            $('.page-content').removeClass('sidebar-open');
        }
    });
    
    // Initialize dropdowns properly
    $('[data-toggle="collapse"]').on('click', function(e) {
        e.preventDefault();
        var target = $(this).attr('href');
        $(target).collapse('toggle');
    });
});

// Fix chart responsiveness
function resizeCharts() {
    if (typeof Chart !== 'undefined') {
        Chart.helpers.each(Chart.instances, function(instance) {
            instance.resize();
        });
    }
}

// Call resize on window resize
$(window).on('resize', function() {
    setTimeout(resizeCharts, 300);
});
