$(function() {
    //afficher l'ancien pwd   
    var txtoldPwd = $('.oldpwd');
    $('.show-old-pass').hover(
        function() {
            txtoldPwd.attr('type', 'text');
        },
        function() {
            txtoldPwd.attr('type', 'password');
        }
    )

    //afficher nouveau pwd
    var txtnewPwd = $('.newpwd');
    $('.show-old-pass').hover(
        function() {
            txtnewPwd.attr('type', 'text');
        },
        function() {
            txtnewPwd.attr('type', 'password');
        }
    )
});