$(function () {
    $("#fromdate").datepicker({
        dateFormat: 'dd-mm-yy'
    });

    $("#todate").datepicker({
        dateFormat: 'dd-mm-yy'
    });
});

$(function () {
    $('.filter-heading').click(function () {
        if ($('.filter-report').is(':visible')) {
            $('.filter-report').hide(500);
            $('.filter-heading').css({'color': '#d2322d'});

        }
        else
        {
            $('.filter-report').show(500);
            $('.filter-heading').css({'color': '#5cb85c'});
        }
    });
});
