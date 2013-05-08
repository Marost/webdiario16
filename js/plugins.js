var jScroll=jQuery.noConflict();
jScroll(document).ready(function(){
    scroll_menu();
})

function scroll_menu() {
    var _c, _d, _dh, _dt, _ct, _ch;
    _d = jScroll('#main-nav');
    if (!_d.length) return;
    //_c = _d.css('position','absolute').parent();
    _c = _d.parent();
    _dt = _d.offset().top;
    _dh = _d.outerHeight();
    _ct = _c.offset().top;
    _ch = _c.outerHeight();

    jScroll(window).bind('scroll', function(e) {

        var _o = jScroll('html').scrollTop();
        _o = _o<1?jScroll('body').scrollTop():_o;
        var _mb = (_ct+_ch)-_dh;

        if (_o>(_dt)) {
          _d.addClass('fixed');
        }else _d.removeClass('fixed');
        return;
    });
    jScroll(window).trigger('scroll');
}