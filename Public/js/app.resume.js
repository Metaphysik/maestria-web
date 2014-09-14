(function($) {

    var t = false;

    $("#control").click(function(event) {
        if(t == false)
        {
            showNote()
            t = true;
        }
        else {
            hideNote();
            t = false;
        }
    });

    function hideNote() 
    {
        $('.answer > h4 > span').each(function(index, el) {
            $(this).addClass('hidden');
        });
    }

    function showNote()
    {
        $('.answer > h4 > span').each(function(index, el) {
           $(this).removeClass('hidden');
        });
    }

})(jQuery);