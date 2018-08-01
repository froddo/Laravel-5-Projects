<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<button id="buton">Click</button>
<p id="gets">Helloooo</p>
<script src="{{asset('js/app.js')}}"></script>
<script>
    var sss= $('#gets').text();

    console.log(sss);

    $('#buton').click(function (e) {
        e.preventDefault();

        var a = 2;
        var b = 6;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:"POST",
            url:"{{url('/test')}}",
            data:{a:a, b:b},
            success:function (data) {
                 getTest(data);

            }
        });

        function getTest(data) {
            var aa = 3;
            var bb = 8;
            var data_logss = data;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url:"{{url('/test_lo')}}",
                data:{aa:aa, bb:bb, dd:data_logss},
                success:function (data) {
                   console.log(data)


                }
            });
        }

    });

</script>
</body>
</html>