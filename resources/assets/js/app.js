
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

$(".popconfirm").popConfirm();

$(".input-group-addon").on('click', function(){
    $(this).prev('input').focus();
});
