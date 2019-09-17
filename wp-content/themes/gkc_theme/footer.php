<div class="footer">
    <div class="footerUpper">
        <div class="footerLogo">
            <img src="<?= base_url() ?>/assets/images/logo.png">
        </div>

        <div class="footerInfo">
            <div id="thongTinLienHe">Thông tin liên hệ:</div>
            <div id="congTy">CÔNG TY TNHH TM & DV TÂN TOÀN PHÁT</div>
            <div id="footerAddress">
                <span> <img src="<?= base_url() ?>/assets/images/icon_location.svg"> </span>
                <span class="text"> 249 Minh Phụng, phường 2, Quận 11, Hồ Chí Minh.</span>
            </div>
            <div id="footerHotline">
                <span> <img src="<?= base_url() ?>/assets/images/icon_phone.svg"></span>
                <span class="text"> 077 388 5678</span>
            </div>
        </div>
        <div class="footerPlugin">
            <div id="follow">Follow us:</div>
            <div>
                <img id="pluginFacebook" src="<?= base_url() ?>/assets/images/icon_facebook.svg">
                <img id="pluginInstagram" src="<?= base_url() ?>/assets/images/icon_instagram.svg">
            </div>

        </div>

    </div>
    <div class="footerLower">&copy; 2019 Copyright MOBIFONE SAI GON. All right reserved. Site by NATA Media
        Agency.
    </div>

</div>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>/assets/owl-carousel/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>/assets/styles/semantic/semantic.min.js" type="text/javascript"></script>

<!-- Custom scripts -->
<script>
    function toggleDropdownContainer() {
        let dropdownContainer = document.getElementsByClassName("dropdownContainer")[0];

        if (dropdownContainer && dropdownContainer.style.display == "none") {
            dropdownContainer.style.display = "flex";
        } else {
            dropdownContainer.style.display = "none";
        }

    }

    $(document).ready(function () {
        // Init Semantic UI components
        $('.ui.dropdown').dropdown();
        $(".owl-carousel").owlCarousel({
            responsive: {
                0: {
                    items: 1
                }
            },
            loop  : true,
            autoplay: true,
            autoplayTimeout: 2500,
            nav    : true,
            smartSpeed :900,
            navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
        });
    })
</script>
<script>
    function postPage(cur_page, next_page) {
        let next_url = '';
        let cur_url = location.href;
        let index = cur_url.search('paged=' + cur_page);
        if (index == -1){
            if (location.search == '')
                next_url = cur_url + '?paged=' + next_page;
            else
                next_url = cur_url + '&paged=' + next_page;
        }
        else
            next_url = cur_url.replace('paged=' + cur_page, 'paged=' + next_page);

        location.href = next_url;

    }
</script>
</body>

</html>