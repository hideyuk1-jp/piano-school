(function() {
    'use strict';

    // フラッシュメッセージのfadeout
    $(function(){
        setTimeout("$('.flash_message').fadeOut('slow')", 3000);
    });

    // テーブル列のリンク化
    $(function(){
        $('tr[data-href]').addClass('clickable').click(function(e) {
            if(!$(e.target).is('a')){
                window.location = $(e.target).closest('tr').data('href');
            };
        });
    });

})();