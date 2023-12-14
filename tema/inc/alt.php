<script defer="defer"  src="<?php echo TEMA_URL;?>ast/js/jquery-3.6.0.min.js"></script>
<script defer="defer"  src="<?php echo TEMA_URL;?>ast/js/bootstrap.min.js"></script>
<script defer="defer"  src="<?php echo TEMA_URL;?>ast/js/all.min.js"></script>
<script defer="defer"  src="<?php echo TEMA_URL;?>ast/js/owl.carousel.js"></script>
<script defer="defer"  src="<?php echo TEMA_URL;?>ast/js/theme.js"></script>
<script defer="defer"  src="<?php echo TEMA_URL;?>ast/modernizr-webp.js"></script>
<script  async src="<?php echo TEMA_URL;?>ast/js/lazysizes.min.js"></script>
<script>
  Modernizr.on('webp', function (result) {
    document.querySelector('.js-test').textContent = result
  })
  document.addEventListener('touchstart', onTouchStart, {passive: true});


</script>

<script id="ufuk-kuskaya-delayed-scripts-js">
  document.addEventListener('DOMContentLoaded',function(){const ufukDelayTimer=setTimeout(ufukLoadDelayedScripts,10*1000);const ufukUserInteractions=["keydown","mousemove","wheel","touchmove","touchstart","touchend"];ufukUserInteractions.forEach(function(event){window.addEventListener(event,pmTriggerDelayedScripts,{passive:!0})});function pmTriggerDelayedScripts(){ufukLoadDelayedScripts();clearTimeout(ufukDelayTimer);ufukUserInteractions.forEach(function(event){window.removeEventListener(event, pmTriggerDelayedScripts,{passive:!0});});}function ufukLoadDelayedScripts(){document.querySelectorAll("script[ufuk-kuskaya]").forEach(function(elem){elem.setAttribute("src",elem.getAttribute("ufuk-kuskaya"));});}});
</script>