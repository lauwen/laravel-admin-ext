<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 100px;">
    <button type="button" class="btn btn-success" onclick="goodSelect()">选择</button>
</div>

<div class="panel panel-default">
    <div class="panel-body" id="lauwen-goods-selection-box" style="display: none">
        <ul class="list-group">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
    </div>
</div>


<script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset("js/jquery-3.3.1.min.js") }}"></script>
<script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset("layer/layer.js") }}"></script>
<script>
    function goodSelect () {
        layer.open({
            type: 1,
            title: "商品选择",
            area: ['60vw', '60vh'], //宽高
            content: $("#lauwen-goods-selection-box")
        });
    }
</script>
</body>
</html>
