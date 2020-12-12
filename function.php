/**
* 目次のハイライト
*/
function mkj_highlighter() {
echo <<< EOM
<script>
let pre_el = null;
const mkjHighlight = (e) => {
    const hashes = document.querySelectorAll('.widget.rtoc_mokuji_widget a');
    const sy = window.pageYOffset;
    const ey = sy + document.documentElement.clientHeight;
    let userAgent = window.navigator.userAgent.toLowerCase();
    let focusEl = [null,null];
    hashes.forEach( (el) => {
        const targetEl = document.querySelector(el.hash);
        const y = sy + targetEl.getBoundingClientRect().top;
        el.closest('li').classList.remove('mkj-marker');
        el.classList.remove("mkj-active") ;
        if(_visibilityCheck(targetEl) && sy < y &&  y < ey && !focusEl[1]){focusEl[1] = el;focusEl[0] = null;}
        if(_visibilityCheck(targetEl) && sy > y) focusEl[0] = el;
    });
    if (focusEl.length) focusEl.forEach((el) => {
        el && el.classList.add("mkj-active");
        el && el.closest('.rtoc-mokuji > li').classList.add('mkj-marker');
        if (el && pre_el != el.hash && (userAgent.indexOf('msie') == 1 || userAgent.indexOf('edge') == -1)) {
            setTimeout(function(){
                el && el.scrollIntoView({
                    block: 'nearest'
                });
            },100);
        }
        if (el) pre_el = el.hash;
    });
};
window.addEventListener("scroll", mkjHighlight);
</script>
EOM;
}
add_action( 'wp_print_footer_scripts', 'mkj_highlighter' );
