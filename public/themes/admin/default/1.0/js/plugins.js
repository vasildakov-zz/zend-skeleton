$(document).ready(function(){
    console.log('plugins');
    $('#jq_count_up').countUp({
        'lang':'en', 
        'format':'full', 
        'sinceDate': '22/07/2008-00::00'
    });
    
    /* $('[data-slidepanel]').slidepanel({
        orientation: 'top',
        mode: 'push'
    });  */
    
     // $('#slidepanel').css("display", "none");
     
    $('[data-slidepanel]').click(function() {
        $('#slidepanel').slideToggle();
    });


    $('#step').stepy({
        finishButton : true
        /* description:  true,
        legend:       true,
        titleClick:   false,
        titleTarget:  '#title-target',
        finishButton: false,
        validate: false */
    });


});