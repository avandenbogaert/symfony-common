$(function(){
    var $body = $('body');

    $body.on('click', '[collection-add]', function(){
        var $collection = collection($(this).data('collection'));
        var prototype = $collection.data('prototype');
        var $new = $(prototype.replace(/__name__/g, $collection.find('> [collection-entry]').length));

        $new
            .hide()
            .appendTo($collection)
            .fadeIn(300)
        ;
    });

    $body.on('click', '[collection-remove]', function(){
        $(this)
            .parents('[collection-entry]')
            .fadeOut(300, function(){ $(this).remove(); });
    });

    function collection(name) {
        return $('[collection="'+name+'"')
    }
});
