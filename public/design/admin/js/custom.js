// /// loading website
//
// jQuery(window).load(function () {
//
//     // PAGE LOADER
//
//     $(".loader").fadeOut(500,function(){
//
//         $(".loading").delay(1000).fadeOut(500);
//
//         $("body").css("overflow-y", "auto");
//
//     });
//
//
//     // ANIMATION
//
//     Animate_box();
//     $(document).scroll(function (){
//         Animate_box();
//     });
//
//     function Animate_box() {
//         var scroll_var = $(this).scrollTop();
//
//         $('.animate-box').each(function (){
//             var val_one = $(this).offset().top - $(window).height() + 80;
//
//             if (scroll_var > val_one){
//                 if($(this).hasClass('left-in')) {
//                     $(this).addClass('animated fadeInLeft');
//                 }else if($(this).hasClass('right-in')) {
//                     $(this).addClass('animated fadeInRight');
//                 }else {
//                     $(this).addClass('animated fadeInUp');
//                 }
//             }
//         });
//     }
//
// });
//
// // ADD IMAGE
// $('.image-uploader').change(function (event) {
//     for (var one = 0; one < event.target.files.length; one++) {
//         $(this).parents('.images-upload-block').find('.upload-area').append('<div class="uploaded-block" data-count-order="' + one + '"><img src="' + URL.createObjectURL(event.target.files[one]) + '"><button class="close">&times;</button></div>');
//     }
// });
//
// // REMOVE IMAGE
// $('.images-upload-block').on('click', '.close',function (){
//     $(this).parents('.uploaded-block').remove();
// });
