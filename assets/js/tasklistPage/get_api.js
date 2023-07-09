$.ajax({ 
    type: 'GET', 
    url: 'locallhost:8000/api/', 
    data: { get_param: 'value' }, 
    dataType: 'json',
    success: function (data) { 
        $.each(data, function(index, element) {
            $('body').append($('<div>', {
                text: element.name
            }));
        });
    }
});