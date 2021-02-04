var $container = $('.js_vote_change');
$container.find('a').on('click', function(e) {
    e.preventDefault();
    var $link = $(e.currentTarget);
    $.ajax({
        url: '/comments/10/vote/'+$link.data('direction'),
        method: 'POST'
    }).then(function(data) {
        $container.find('.js_total_vote').text(data.votes);
    });
});