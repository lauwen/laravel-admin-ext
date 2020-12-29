<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
        .layui-layer-title::before {
            content: "\271A";
            margin-right: 5px;
        }
        .lauwen-goods-selection-item {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            padding: 5px 10px;
        }
        .lauwen-goods-selection-item-info {
            flex-grow: 1;
        }
        .lauwen-goods-selection-item-info p:first-child {
            font-weight: bold;
        }
        .lauwen-goods-selection-item-info p:last-child {
            margin: 0;
            color: #666666;
        }
        .lauwen-goods-selection-item-info p:last-child strong {
            color: red;
        }
        .lauwen-goods-selection-item-info p:last-child strong::before {
            content: "\00A5";
        }
        .lauwen-goods-selection-item-quantity {
            width: 150px;
            display: flex;
            display: -webkit-flex;
            justify-content: center;
            align-items: center;
        }
        .lauwen-goods-selection-font-bold {
        }
        .lauwen-goods-selection-item-value{
            text-align: center;
        }
        .lauwen-goods-selection-decrement,
        .lauwen-goods-selection-increment{
            background-color: #4cae4c;
            color: white;
            cursor: pointer;
        }
        .lauwen-goods-selection-decrement{
            font-weight: bold;
        }
        .lauwen-goods-selection-increment{

        }
        .lauwen-goods-selection-box-footer{
            display: flex;
            justify-content: flex-end;
        }
        .lauwen-goods-selection-box-footer button:first-child{
            margin-right: 15px;
        }
        .lauwen-goods-selection-type{
            background-color: white;
            padding: 15px 15px;
        }
        .lauwen-goods-selection-type::before{
            content: "分类：";
            font-weight: bold;
        }
        .lauwen-goods-selection-type-item{
            cursor: pointer;
            margin: 15px 10px;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 100px;">
    <button type="button" class="btn btn-success" onclick="goodSelect()">选择</button>
    <div class="panel panel-default">
        <div class="panel-body" id="lauwen-goods-selection-result">
            <ul class="list-group"></ul>
        </div>
    </div>
</div>

<div class="panel panel-default" id="lauwen-goods-selection-box" style="display: none">
    <div class="panel-heading lauwen-goods-selection-type">
        <div class="label label-default lauwen-goods-selection-type-item">Default</div>
        <div class="label label-primary lauwen-goods-selection-type-item">Primary</div>
        <div class="label label-success lauwen-goods-selection-type-item">Success</div>
        <div class="label label-info lauwen-goods-selection-type-item">Info</div>
        <div class="label label-warning lauwen-goods-selection-type-item">Warning</div>
        <div class="label label-danger lauwen-goods-selection-type-item">Danger</div>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            <li class="list-group-item lauwen-goods-selection-item">
                <div class="lauwen-goods-selection-item-info">
                    <p>猪肚（5斤装）</p>
                    <p>
                        <strong>21</strong>/
                        件
                    </p>
                </div>
                <div class="lauwen-goods-selection-item-quantity">
                    <div class="input-group">
                        <div class="input-group-addon lauwen-goods-selection-decrement" id="">&#8211;</div>
                        <input type="text"
                               class="form-control lauwen-goods-selection-item-value"
                               placeholder="数量"
                               id="lauwen-goods-1"
                               value="0"
                               data-goods-id="1"
                               data-goods-name="猪肚"
                               data-goods-specs="5斤装"
                               data-goods-unit="件"
                               data-goods-price="21"
                        >
                        <div class="input-group-addon lauwen-goods-selection-increment">&#10010;</div>
                    </div>
                </div>
            </li>
            <li class="list-group-item lauwen-goods-selection-item">
                <div class="lauwen-goods-selection-item-info">
                    <p>猪肺（5个装）</p>
                    <p>
                        <strong>21</strong>/
                        件
                    </p>
                </div>
                <div class="lauwen-goods-selection-item-quantity">
                    <div class="input-group">
                        <div class="input-group-addon lauwen-goods-selection-decrement" id="">&#8211;</div>
                        <input type="text"
                               class="form-control lauwen-goods-selection-item-value"
                               placeholder="数量"
                               id="lauwen-goods-2"
                               value="0"
                               data-goods-id="2"
                               data-goods-name="猪肺"
                               data-goods-specs="5个装"
                               data-goods-unit="件"
                               data-goods-price="21"
                        >
                        <div class="input-group-addon lauwen-goods-selection-increment">&#10010;</div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="panel-footer lauwen-goods-selection-box-footer">
        <button type="button" class="btn btn-default lauwen-goods-selection-cancel">取消</button>
        <button type="button" class="btn btn-primary lauwen-goods-selection-submit">提交</button>
    </div>
</div>


<script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset("js/jquery-3.3.1.min.js") }}"></script>
<script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset("layer/layer.js") }}"></script>
<script>
    var lauwen_goods_layer_index;
    var lauwen_goods_selection_goods = [];
    function goodSelect () {
        lauwen_goods_layer_index = layer.open({
            type: 1,
            title: ["商品选择", "font-size:16px;"],
            area: ['60vw', '60vh'], //宽高
            content: $("#lauwen-goods-selection-box")
        });
    }

    // 商品列表选择数据
    $(".lauwen-goods-selection-item-value").on("change", function () {
        lauwenGoodsSelectionValueChange($(this), 1);
    });
    $(".lauwen-goods-selection-decrement").on("click", function () {
        lauwenGoodsSelectionValueDecrement($(this), 1);
    });
    $(".lauwen-goods-selection-increment").on("click", function () {
        lauwenGoodsSelectionValueIncrement($(this), 1);
    });

    // 取消和确认
    $(".lauwen-goods-selection-cancel").on("click", function () {
        layer.close(lauwen_goods_layer_index);
    });
    $(".lauwen-goods-selection-submit").on("click", function () {
        var content = ``;
        for (var i = 0; i < lauwen_goods_selection_goods.length; i++) {
            content += `<li class="list-group-item lauwen-goods-selection-item">
                <div class="lauwen-goods-selection-item-info">
                    <p>`+lauwen_goods_selection_goods[i].name+`（`+lauwen_goods_selection_goods[i].specs+`）</p>
                    <p>
                        <strong>`+lauwen_goods_selection_goods[i].price+`</strong>/
                        `+lauwen_goods_selection_goods[i].unit+`
                    </p>
                </div>
                <div class="lauwen-goods-selection-item-quantity">
                    <div class="input-group">
                        <div class="input-group-addon lauwen-goods-selection-decrement" id="">&#8211;</div>
                        <input type="text"
                               class="form-control lauwen-goods-selection-item-value"
                               placeholder="数量"
                               name="`+lauwen_goods_selection_goods[i].id+`"
                               data-goods-id="`+lauwen_goods_selection_goods[i].id+`"
                               data-goods-name="`+lauwen_goods_selection_goods[i].name+`"
                               data-goods-specs="`+lauwen_goods_selection_goods[i].specs+`"
                               data-goods-unit="`+lauwen_goods_selection_goods[i].unit+`"
                               data-goods-price="`+lauwen_goods_selection_goods[i].price+`"
                               value="`+lauwen_goods_selection_goods[i].quantity+`"
                        >
                        <div class="input-group-addon lauwen-goods-selection-increment">&#10010;</div>
                    </div>
                </div>
            </li>`;
        }
        $("#lauwen-goods-selection-result ul").html(content);
        layer.close(lauwen_goods_layer_index);
    });

    // 结果列表修改数据
    $("#lauwen-goods-selection-result ul").on("click", ".lauwen-goods-selection-decrement", function () {
        lauwenGoodsSelectionValueDecrement($(this), 2);
    });
    $("#lauwen-goods-selection-result ul").on("click", ".lauwen-goods-selection-increment", function () {
        lauwenGoodsSelectionValueIncrement($(this), 2);
    });
    $("#lauwen-goods-selection-result ul").on("change", ".lauwen-goods-selection-item-value", function () {
        lauwenGoodsSelectionValueChange($(this), 2);
    });


    function lauwenGoodsSelectionValueChange (that, type) {
        var lauwen_goods_selection_quantity = parseInt(that.val());
        var lauwen_goods_selection_id = that.data('goods-id');
        if (lauwen_goods_selection_quantity < 0) {
            lauwen_goods_selection_quantity = 0;
        }
        if (type==2) {
            $("#lauwen-goods-"+lauwen_goods_selection_id).val(lauwen_goods_selection_quantity);
        }
        var lauwen_goods_selection_goods_index = lauwen_goods_selection_goods.findIndex((item)=>item.id==lauwen_goods_selection_id);
        if (lauwen_goods_selection_goods_index === -1) {
            if (lauwen_goods_selection_quantity > 0) {
                var lauwen_goods_selection_value = {
                    id:lauwen_goods_selection_id,
                    quantity:lauwen_goods_selection_quantity,
                    name:that.data('goods-name'),
                    specs:that.data('goods-specs'),
                    unit:that.data('goods-unit'),
                    price:that.data('goods-price'),
                };
                lauwen_goods_selection_goods.push(lauwen_goods_selection_value);
            }
        }else{
            if (lauwen_goods_selection_quantity > 0) {
                lauwen_goods_selection_goods[lauwen_goods_selection_goods_index].quantity = lauwen_goods_selection_quantity;
            }else{
                lauwen_goods_selection_goods.splice(lauwen_goods_selection_goods_index, 1);
            }
        }
        console.log(lauwen_goods_selection_goods);
    }

    function lauwenGoodsSelectionValueDecrement (that, type) {
        var lauwen_goods_selection_quantity = parseInt(that.next().val());
        var lauwen_goods_selection_id = that.next().data('goods-id');
        if (lauwen_goods_selection_quantity <= 0) {
            lauwen_goods_selection_quantity = 0;
        }else{
            lauwen_goods_selection_quantity -= 1;
        }
        that.next().val(lauwen_goods_selection_quantity);
        if (type==2) {
            $("#lauwen-goods-"+lauwen_goods_selection_id).val(lauwen_goods_selection_quantity);
        }
        var lauwen_goods_selection_goods_index = lauwen_goods_selection_goods.findIndex((item)=>item.id==lauwen_goods_selection_id);
        if (lauwen_goods_selection_goods_index === -1) {
            if (lauwen_goods_selection_quantity > 0) {
                var lauwen_goods_selection_value = {
                    id:lauwen_goods_selection_id,
                    quantity:lauwen_goods_selection_quantity,
                    name:that.next().data('goods-name'),
                    specs:that.next().data('goods-specs'),
                    unit:that.next().data('goods-unit'),
                    price:that.next().data('goods-price'),
                };
                lauwen_goods_selection_goods.push(lauwen_goods_selection_value);
            }
        }else{
            if (lauwen_goods_selection_quantity > 0) {
                lauwen_goods_selection_goods[lauwen_goods_selection_goods_index].quantity = lauwen_goods_selection_quantity;
            }else{
                lauwen_goods_selection_goods.splice(lauwen_goods_selection_goods_index, 1);
            }
        }
        console.log(lauwen_goods_selection_goods);
    }

    function lauwenGoodsSelectionValueIncrement (that, type) {
        var lauwen_goods_selection_quantity = parseInt(that.prev().val()) + 1;
        var lauwen_goods_selection_id = that.prev().data('goods-id');
        that.prev().val(lauwen_goods_selection_quantity);
        if (type==2) {
            $("#lauwen-goods-"+lauwen_goods_selection_id).val(lauwen_goods_selection_quantity);
        }
        var lauwen_goods_selection_goods_index = lauwen_goods_selection_goods.findIndex((item)=>item.id==lauwen_goods_selection_id);
        if (lauwen_goods_selection_goods_index === -1) {
            var lauwen_goods_selection_value = {
                id:lauwen_goods_selection_id,
                quantity:lauwen_goods_selection_quantity,
                name:that.prev().data('goods-name'),
                specs:that.prev().data('goods-specs'),
                unit:that.prev().data('goods-unit'),
                price:that.prev().data('goods-price'),
            };
            lauwen_goods_selection_goods.push(lauwen_goods_selection_value);
        }else{
            lauwen_goods_selection_goods[lauwen_goods_selection_goods_index].quantity = lauwen_goods_selection_quantity;
        }
        console.log(lauwen_goods_selection_goods);
    }

</script>
</body>
</html>
