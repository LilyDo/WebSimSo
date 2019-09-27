<div class="footer">
    <div class="footerUpper">
        <div class="footerLogo">
            <img src="<?= base_url() ?>/assets/images/logo.png">
        </div>

        <div class="footerInfo">
            <div class="thongTinLienHe">Thông tin liên hệ:</div>
            <div class="congTy">CÔNG TY TNHH TM & DV TÂN TOÀN PHÁT</div>
            <div class="footerAddress">
                <span> <img src="<?= base_url() ?>/assets/images/icon_location.svg"> </span>
                <span class="text"> 249 Minh Phụng, phường 2, Quận 11, Hồ Chí Minh.</span>
            </div>
            <div class="footerHotline">
                <span> <img src="<?= base_url() ?>/assets/images/icon_phone.svg"></span>
                <a href="tel:0773885678" class="text">077 388 5678</a>
            </div>
        </div>
        <div class="footerPlugin">
            <div class="follow">Follow us:</div>
            <div>
                <a href="https://www.facebook.com/mobifonetongmiennam" target="_blank"><img class="pluginFacebook" src="<?= base_url() ?>/assets/images/icon_facebook.svg"></a>
                <a href="javascript:void(0)" target="_blank"><img class="pluginInstagram" src="<?= base_url() ?>/assets/images/icon_instagram.svg"></a>
            </div>

        </div>

    </div>
    <div class="footerLower">&copy; 2019 Copyright MOBIFONE SAI GON. All right reserved. Site by NATA Media
        Agency.
    </div>

</div>
<!-- Scripts -->
<script src="<?= base_url() ?>/assets/owl-carousel/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>/assets/styles/semantic/semantic.min.js" type="text/javascript"></script>

<!-- Custom scripts -->
<script>
    function toggleDropdownContainer() {
        var dropdownContainer = document.getElementsByClassName("dropdownContainer")[0];

        if (dropdownContainer && dropdownContainer.style.display == "none") {
            dropdownContainer.style.display = "flex";
        } else {
            dropdownContainer.style.display = "none";
        }

    }

    function showTooltip(event) {
        event.preventDefault();
        var tooltip = document.getElementsByClassName("tooltip")[0];
        if (tooltip != undefined) {
            tooltip.style.display = "block"
        }
    }

    function hideTooltip() {
        var tooltip = document.getElementsByClassName("tooltip")[0];
        if (tooltip != undefined) {
            tooltip.style.display = "none"
        }
    }

    function changePaging(element, e) {
        if (e.keyCode == 13) {
            let val = $(element).val();
            let dataSearch = parseQueryString();
            dataSearch.paging = val;
            location.href = location.origin + '/?' + serialize(dataSearch);
        }
    }

    function parseQueryString() {

        var str = window.location.search;
        var objURL = {};

        str.replace(
            new RegExp( "([^?=&]+)(=([^&]*))?", "g" ),
            function( $0, $1, $2, $3 ){
                objURL[ $1 ] = $3;
            }
        );
        return objURL;
    };

    function serialize(obj) {
      var str = [];
        for (var p in obj)
            if (obj.hasOwnProperty(p)) {
              str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
            }
      return str.join("&");
    }

    function previewImage(element) {
        if (element.files && element.files[0]) {
            let previewElement = '#photo_1';
            if ($(previewElement).attr('src') != '')
                previewElement = '#photo_2';
            let reader = new FileReader();
            reader.onload = function (e) {
                $(previewElement).attr('src', e.target.result);
            };
            reader.readAsDataURL(element.files[0]);
        }
        // else
        //     $(previewElement).attr('src', '{{generateLink("image/icon-add.png")}}');
    }

    function submitData() {
        let data = $('#registerInfo').serializeArray();
        let photo_1 = $('#photo_1').attr('src');
        let photo_2 = $('#photo_2').attr('src');
        data.push({name: 'photo_1', value: photo_1}, {name: 'photo_2', value: photo_2}, {name: 'sim_number', value: photo_2});
        data.unshift({name: 'action', value: 'buySim'});
        $.ajax({
            url: "<?=admin_url('admin-ajax.php') ?>",
            type: 'POST',
            data: data
        }).done(function (result) {
            if(result.data == "Message has been sent")
                alert('Đã gửi thông tin đến hệ thống thành công! Hệ thống sẽ sớm liên hệ với bạn!');
            else
                alert('Có một số lỗi khi gửi thông tin đến hệ thống! Vui lòng thử lại!');
        })
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
            autoplayTimeout: 6500,
            nav    : true,
            smartSpeed :900,
            navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
        });
    })
</script>
</body>

</html>