<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>jexcel</title>
    <link rel="stylesheet" type="text/css" href="{{ \Illuminate\Support\Facades\URL::asset("css/jsuites.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ \Illuminate\Support\Facades\URL::asset("css/jexcel.css") }}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div id="jexcel">

</div>


<script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset("js/jsuites.js") }}"></script>
<script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset("js/jexcel.js") }}"></script>
<script>
    var data = [
        ['Jazz', 'Honda', '2019-02-12', 'https://img.ivsky.com/img/tupian/slides/202005/27/songshu-013.jpg', true, '$ 2.000,00', '#777700'],
        ['Civic', 'Honda', '2018-07-11', 'https://img.ivsky.com/img/tupian/slides/202005/27/songshu-013.jpg', true, '$ 4.000,01', '#007777'],
        ['a'],
        ['b'],
        ['c'],
        ['d'],
    ];

    jexcel(document.getElementById('jexcel'), {
        data:data,
        columns: [
            { type: 'text', title:'Car', width:120 },
            { type: 'dropdown', title:'Make', width:200, source:[ "Alfa Romeo", "Audi", "Bmw", "Honda" ] },
            { type: 'calendar', title:'Available', width:200 },
            { type: 'image', title:'Photo', width:120 },
            { type: 'checkbox', title:'Stock', width:80 },
            { type: 'numeric', title:'Price', width:100, mask:'$ #.##,00', decimal:',' },
            { type: 'color', width:100, render:'square', }
        ]
    });
</script>
</body>
</html>
