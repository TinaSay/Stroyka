(function () {

    $('.search-form-reset-btn').click(function () {
        $('#search-term').val('');
        $('#category-select').val('').trigger('change');
        $('.date-start').val('');
        $('.date-end').val('');
        $('.date-field-group').css('visibility', 'hidden');
    });

    $('#category-select').on('select2:select', function (e) {
        switch ($(this).val()) {
            case"news":
                $('.date-field-group').css('visibility', 'visible');
                break;
            case"org":
            case"product":
            case"support":
                $('.date-field-group').css('visibility', 'hidden');
                break;
        }

    });

    $('.btn-search').click(function () {
        var term = $('#search-term').val();
        var url = $('#category-select').find(':selected').data('url');
        var type = $('#category-select').val();
        if (term == '') {
            alert('Введите поисковую фразу');
            return false;
        }
        switch (type) {
            case"news":
                var dateFrom = $('.date-start').val();
                var dateTo = $('.date-end').val();
                url = url + '?srch_ff[NAME]=' + term + '&srch_DATE_ACTIVE_FROM_1=' + dateFrom +
                    '&srch_DATE_ACTIVE_FROM_2=' + dateTo + '&set_filter=Y';
                break;
            case"org":
                url = url + '?srch_ff[NAME]=' + term;
                break;
            case"product":
                url = url + '?f[NAME]=' + term;
                break;
        }
        //document.location.href = url;
        if (url == '') {
            alert('Пожалуйста, выберите раздел.');
            return false;
        }

        window.open(url);
    });

    $('.subscription-block__form, .subscription-block-full__form').on('submit', function (e) {
        e.preventDefault();
        window.open('https://gisp.gov.ru/news/subcribe/?sf_EMAIL=' + $('#subscribe-email').val() + '&SET_SUB=Y');
    });

    $('.news-search-submit-btn').on('click', function () {
        $('.news-filter-form').submit();
    });

    $('.news-search-reset-btn').on('click', function () {
        $('.news-filter-form').get(0).reset();
        $('#news-search-term').val('');
        $('#news-dateFrom').val('');
        $('#news-dateTo').val('');

    });

})();

