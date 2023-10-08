</div>

</div>


<div id="kt_app_footer" class="app-footer">

    <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">

        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">2022&copy;</span>
            <a href="https://imeryazilim.com" target="_blank" class="text-gray-800 text-hover-primary">SAFARİ YAZILIM</a>
        </div>


        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item">
                <a href="https://imeryazilim.com/hakkimizda.html" target="_blank" class="menu-link px-2">Hakkımızda</a>
            </li>
            <li class="menu-item">
                <a href="https://imeryazilim.com/iletisim" target="_blank" class="menu-link px-2">Destek</a>
            </li>
            <li class="menu-item">
                <a href="https://imeryazilim.com/yazilimlar" target="_blank" class="menu-link px-2">Satın Al</a>
            </li>
        </ul>

    </div>

</div>

</div>
</div>

</div>

</div>
<div class="engage-toolbar d-flex position-fixed px-5 fw-bold zindex-2 top-50 end-0 transform-90 mt-5 mt-lg-20 gap-2">

    <a href="#" id="kt_engage_sitemap_toggle" class="engage-sitemap-toggle engage-btn btn shadow-sm fs-6 px-4 rounded-top-0" data-bs-toggle="popover" data-bs-custom-class="popover-inverse" data-bs-container="body" data-bs-html="true" data-bs-trigger="hover" data-bs-placement="left" data-bs-content="Yazılım, Tasarım, Hosting, Domain ve dahası...">
        <span data-bs-toggle="modal" data-bs-target="#kt_engage_sitemap_modal">SAFARİ YAZILIM</span>
    </a>
    <button id="kt_help_toggle" class="engage-help-toggle btn engage-btn shadow-sm px-5 rounded-top-0" title="Yönetim panelindeki alanları daha iyi kullanabilmeniz adına yol gösterici bir doküman!" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="left" data-bs-dismiss="click" data-bs-trigger="hover">Kullanım Talimatları</button>

</div>
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">

    <span class="svg-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
        </svg>
    </span>

</div>










<script>
    var hostUrl = "<?= SITE_URL.'/'.THEME_PATH.'admin/assets' ?>";
</script>

<script src="<?= SITE_URL.'/'.THEME_PATH.'admin/assets' ?>/plugins/global/plugins.bundle.js"></script>
<script src="<?= SITE_URL.'/'.THEME_PATH.'admin/assets' ?>/js/scripts.bundle.js"></script>


<script src="<?= SITE_URL.'/'.THEME_PATH.'admin/assets' ?>/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="<?= SITE_URL.'/'.THEME_PATH.'admin/assets' ?>/plugins/custom/datatables/datatables.bundle.js"></script>


<script src="<?= SITE_URL.'/'.THEME_PATH.'admin/assets' ?>/js/widgets.bundle.js"></script>
<script src="<?= SITE_URL.'/'.THEME_PATH.'admin/assets' ?>/js/custom/widgets.js"></script>
<script src="<?= SITE_URL.'/'.THEME_PATH.'admin/assets' ?>/js/custom/apps/chat/chat.js"></script>
<script src="<?= SITE_URL.'/'.THEME_PATH.'admin/assets' ?>/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="<?= SITE_URL.'/'.THEME_PATH.'admin/assets' ?>/js/custom/utilities/modals/users-search.js"></script>
<script src="<?= SITE_URL.'/'.THEME_PATH.'admin/assets' ?>/js/jqueryui.js"></script>
<script src="<?= SITE_URL.'/' ?>public/orakuploader/orakuploader.js"></script>
<script src="<?= SITE_URL.'/'.THEME_PATH.'admin/assets' ?>/js/main.js"></script>
<script>
    $(document).ready(function() {
        var form = $('form');
        if(form != undefined){
            var hiddenInputTokenizer = $('<input type="hidden" name="_token" value="<?= $this->session->getSession('_token'); ?>">');
            form.append(hiddenInputTokenizer);
        }
    });
</script>

</body>


</html>