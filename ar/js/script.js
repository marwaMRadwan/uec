  $(document).on("click", '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});
$(function(){
    setTimeout(function(){
        var tabCarousel = setInterval(function() {
//        console.log('jjjjjjjjjjj')
        var tabs = $('#myTab > li > a'),
            active = tabs.filter('.active'),
            next = active.parent().next('li').find('a'),
            toClick = next.length ? next : tabs.eq(0);
            console.log(tabs.length)
        toClick.tab('show')
    }, 2000);
    }, 1000);
    //clearInterval(tabCarousel);
});
 $(document).ready(function() {
    $("#news-slider8").owlCarousel({
        items : 3,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        autoPlay:true
    });
    
      $("#news-slider12").owlCarousel({
        items : 2,
        itemsDesktop:[1199,2],
        itemsDesktopSmall:[980,1],
        itemsTablet: [600,1],
        itemsMobile : [550,1],
        pagination:true,
        autoPlay:true
    });
})