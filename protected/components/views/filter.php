<form name="filter" action="allProduct" method="get" autocomplete="on">
    <div class="filter_title">LỌC SẢN PHẨM:</div>
    <input name="menu_id" type="hidden" value="<?php if(isset($_GET['menu_id'])) echo $_GET['menu_id']; ?>"/>
    <input name="sort_by_id" type="hidden" value="1" />
    <input name="page" type="hidden" value="1"/>
    <div class="wrapper_filter_item">
        <div class="filter_type">NHÃN HIỆU</div>
        <div class="wrapper_checkbox">
            <?php foreach($brands as $brand): ?>
                <div class="checkbox_item">
                    <input class="input_filter" name="brand[]" value="<?php echo $brand->id ?>" type="checkbox" />
                    <span><?php echo $brand->name ?></span>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="wrapper_filter_item" style="margin-bottom: 10px">
        <div class="filter_type">GIÁ</div>
        <p><input name="price_range" type="text" id="price_range" class="display_slide_value" readonly></p>
        <div id="slider_price_range" class="slider-range"></div>
    </div>
    <div class="wrapper_filter_item" style="margin-bottom: 10px">
        <div class="filter_type">DUNG TÍCH</div>
        <p><input name="capacity_range" type="text" id="capacity_range" class="display_slide_value" readonly></p>
        <div id="slider_capacity_range" class="slider-range"></div>
    </div>
    <div class="wrapper_filter_item" style="margin-bottom: 10px">
        <div class="filter_type">KHỐI LƯỢNG</div>
        <p><input name="weight_range" type="text" id="weight_range" class="display_slide_value" readonly></p>
        <div id="slider_weight_range" class="slider-range"></div>
    </div>
    <div class="wrapper_filter_item">
        <div class="filter_type">ĐẶC BIỆT</div>
        <div class="wrapper_checkbox">

        </div>
    </div>
    <div class="wrapper_filter_item">
        <div class="filter_type">ĐIỂM XẾP HẠNG</div>
        <div class="wrapper_checkbox">
            <?php for($i = 0; $i < 6; $i++): ?>
                <div class="checkbox_item">
                    <input class="input_filter" name="rating[]" value="<?php echo $i ?>" type="checkbox" />
                    <span><?php echo $i ?></span>
                </div>
            <?php endfor ?>
        </div>
    </div>
    <div class="wrapper_filter_item">
        <div class="filter_type">MÀU SẮC</div>
        <div class="wrapper_checkbox">
            <?php foreach($colors as $color): ?>
                <div class="checkbox_item">
                    <input class="input_filter" name="color[]" value="<?php echo $color->id ?>" type="checkbox" />
                    <span><?php echo $color->name ?></span>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="wrapper_filter_item">
        <div class="filter_type">LOẠI DA</div>
        <div class="wrapper_checkbox">
            <?php foreach($skins as $skin): ?>
                <div class="checkbox_item">
                    <input class="input_filter" name="skin[]" value="<?php echo $skin->id ?>" type="checkbox" />
                    <span><?php echo $skin->name ?></span>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="wrapper_filter_item">
        <div class="filter_type">MÙI NƯỚC HOA</div>
        <div class="wrapper_checkbox">
            <?php foreach($smells as $smell): ?>
                <div class="checkbox_item">
                    <input class="input_filter" name="smelling[]" value="<?php echo $smell->id ?>" type="checkbox" />
                    <span><?php echo $smell->name ?></span>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="wrapper_filter_item">
        <div class="filter_type">CHẤT LIỆU</div>
        <div class="wrapper_checkbox">
            <?php foreach($materials as $material): ?>
                <div class="checkbox_item">
                    <input class="input_filter" name="material[]" value="<?php echo $material->id ?>" type="checkbox" />
                    <span><?php echo $material->name ?></span>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="wrapper_filter_item">
        <div class="filter_type">ĐÓNG GÓI</div>
        <div class="wrapper_checkbox">
            <?php foreach($packs as $pack): ?>
                <div class="checkbox_item">
                    <input class="input_filter" name="pack[]" value="<?php echo $pack->id ?>" type="checkbox" />
                    <span><?php echo $pack->name ?></span>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</form>
<script type="text/javascript">
    function loadSelectedFilter(){
        $('.checkbox_item.selected').removeClass('selected');
        var selectedArr = [<?php if(isset($_GET['brand'])) echo implode(',',$_GET['brand']); ?>];
        setCheckedCheckbox(selectedArr,'brand');
        selectedArr = [<?php if(isset($_GET['rating'])) echo implode(',',$_GET['rating']); ?>];
        setCheckedCheckbox(selectedArr,'rating');
        selectedArr = [<?php if(isset($_GET['color'])) echo implode(',',$_GET['color']); ?>];
        setCheckedCheckbox(selectedArr,'color');
        selectedArr = [<?php if(isset($_GET['skin'])) echo implode(',',$_GET['skin']); ?>];
        setCheckedCheckbox(selectedArr,'skin');
        selectedArr = [<?php if(isset($_GET['smelling'])) echo implode(',',$_GET['smelling']); ?>];
        setCheckedCheckbox(selectedArr,'smelling');
        selectedArr = [<?php if(isset($_GET['material'])) echo implode(',',$_GET['material']); ?>];
        setCheckedCheckbox(selectedArr,'material');
        selectedArr = [<?php if(isset($_GET['pack'])) echo implode(',',$_GET['pack']); ?>];
        setCheckedCheckbox(selectedArr,'pack');
    }

    function loadSelectedSortBy(){
        var sort_by_id = <?php if(isset($_GET['sort_by_id'])) echo $_GET['sort_by_id']; else echo 1;?>;
        $('select[name="sort"]').val(sort_by_id);
        $('input[name="sort_by_id"]').val(sort_by_id);
    }

    function setCheckedCheckbox(arr,input_name){
        for(var i = 0; i < arr.length; i++){
            $('input[name="'+input_name+'[]"]').each(function(index){
                var val = $(this).val();
                if(arr[i] == val){
                    $(this).prop('checked',true);
                    $(this).parent().addClass('selected');
                }
            });
        }
    }

    function sortByStateChange(){
        var sort_by_id = $('select[name="sort"]').val();
        $('input[name="sort_by_id"]').val(sort_by_id);
        $('input[name="page"]').val('1');
        filter();
    }

    function initSlideBar(slide_id,input_id,min,max,value,unit1,unit2){
        $( "#"+slide_id).slider({
            range: true,
            min: min,
            max: max,
            values: value,
            slide: function( event, ui ) {
                $( "#"+input_id ).val( unit1 + ui.values[ 0 ] + unit2 + " - " + unit1 + ui.values[ 1 ] + unit2 );
            },
            stop: function( event, ui ) {
                filter();
            }
        });
        $( "#"+input_id ).val( unit1 + $( "#"+slide_id ).slider( "values", 0 ) + unit2 +
        " - " + unit1 + $( "#"+slide_id ).slider( "values", 1 ) + unit2 );
    }

    function loadPriceRange() {
        var price_range = "<?php if(isset($_GET['price_range'])) echo $_GET['price_range']; ?>";
        var value = [0,300];
        if(price_range) {
            var split = price_range.split(' - ');
            value = [split[0].replace('$',''),split[1].replace('$','')];
        }
        initSlideBar('slider_price_range','price_range',0,300,value,'$','');
    }

    function loadCapacityRange() {
        var capacity_range = "<?php if(isset($_GET['capacity_range'])) echo $_GET['capacity_range']; ?>";
        var value = [0,500];
        if(capacity_range) {
            var split = capacity_range.split(' - ');
            value = [split[0].replace('ml',''),split[1].replace('ml','')];
        }
        initSlideBar('slider_capacity_range','capacity_range',0,500,value,'','ml');
    }

    function loadWeightRange() {
        var weight_range = "<?php if(isset($_GET['weight_range'])) echo $_GET['weight_range']; ?>";
        var value = [0,500];
        if(weight_range) {
            var split = weight_range.split(' - ');
            value = [split[0].replace('g',''),split[1].replace('g','')];
        }

        initSlideBar('slider_weight_range','weight_range',0,500,value,'','g');
    }

    function filter(){
        $('form[name="filter"]').submit();
    }

    $(function(){
        loadPriceRange();
        loadCapacityRange();
        loadWeightRange();
        loadSelectedFilter();
        loadSelectedSortBy();
        $('input.input_filter').click(function(){
            $('input[name="page"]').val('1');
            filter();
        });
        $('.page_tick').click(function(){
            $('input[name="page"]').val($(this).text());
            filter();
        })
    });
</script>