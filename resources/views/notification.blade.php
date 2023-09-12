<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');

        * {
            padding: 0px;
            margin: 0px
        }

        body {
            background: #8E24AA;
            color: #fff;
            font-family: 'Manrope', sans-serif
        }

        nav {
            display: flex;
            align-items: center;
            background: #AB47BC;
            height: 60px;
            position: relative;
            border-bottom: 1px solid #495057
        }

        .icon {
            cursor: pointer;
            margin-right: 50px;
            line-height: 60px
        }

        .icon span {
            background: #f00;
            padding: 7px;
            border-radius: 50%;
            color: #fff;
            vertical-align: top;
            margin-left: -25px
        }

        .icon img {
            display: inline-block;
            width: 26px;
            margin-top: 4px
        }

        .icon:hover {
            opacity: .7
        }

        .logo {
            flex: 1;
            margin-left: 50px;
            color: #eee;
            font-size: 20px;
            font-family: monospace
        }

        .notifications {
            width: 300px;
            height: 0px;
            opacity: 0;
            position: absolute;
            top: 63px;
            right: 62px;
            border-radius: 5px 0px 5px 5px;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
        }

        .notifications h2 {
            font-size: 14px;
            padding: 10px;
            border-bottom: 1px solid #eee;
            color: #999
        }

        .notifications h2 span {
            color: #f00
        }

        .notifications-item {
            display: flex;
            border-bottom: 1px solid #eee;
            padding: 6px 9px;
            margin-bottom: 0px;
            cursor: pointer
        }

        .notifications-item:hover {
            background-color: #eee
        }

        .notifications-item img {
            display: block;
            width: 50px;
            height: 50px;
            margin-right: 9px;
            border-radius: 50%;
            margin-top: 2px
        }

        .notifications-item .text h4 {
            color: #777;
            font-size: 16px;
            margin-top: 3px
        }

        .notifications-item .text p {
            color: #aaa;
            font-size: 12px
        }
    </style>
</head>

<body>

    <nav>
        <div class="logo"> BBBOOTSTRAP.COM </div>
        <div class="icon" id="bell">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgCLtHnMPv1vAGngkXn3tixv2V9mbadLae5V6NRpE&s"
                alt=""> <sup id="un_read_user_count"></sup>
        </div>
        <div class="notifications" id="box"></div>
    </nav>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        const un_read_user_count = document.getElementById('un_read_user_count');
        $(document).ready(function() {
            function fetchData() {
                $.ajax({
                    url: '/new-user-register', // Replace with the actual route URL
                    type: 'GET',
                    success: function(data) {
                        // console.log(data);
                        // Handle the response data here
                        // console.log(data);
                        un_read_user_count.innerHTML = data.un_read_user_count;

                        var html = '';
                        $.each(data.users, function (key,item) {
                            // console.log(item.id);
                            html += '<a href="{{ url('/show/user/') }}/' + item.id + '">'+
                                '<div class="notifications-item">'+
                              '<img src="https://img.icons8.com/flat_round/64/000000/vote-badge.png" alt="img">'+
                              '<div class="text">'+
                                '<h4>' + item.name + '</h4>'+
                                '<p>' + item.email + '</p>'+
                                '</div>'+
                                '<img src="https://assets.stickpng.com/thumbs/5a5a8a1314d8c4188e0b08e1.png" alt="img">'+
                                '</div>'+
                                '</a>'
                        });

                        $('#box').html(html);





                        var notifications = '';
                            notifications += '<div class="notifications-item"> '+
                                        '<a href="{{ route('users') }}" class="btn btn-secondary btn-sm form-control"> See All Tickets </a>' +

                                    '</div>'

                        $('#box').append(notifications);


                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });

            }

            // Call the fetchData function every 2 seconds
            setInterval(fetchData, 2000);
        });
    </script>

    <script>
        $(document).ready(function() {




            var down = false;

            $('#bell').click(function(e) {

                var color = $(this).text();
                if (down) {

                    $('#box').css('height', '0px');
                    $('#box').css('opacity', '0');
                    down = false;
                } else {

                    $('#box').css('height', 'auto');
                    $('#box').css('opacity', '1');
                    down = true;

                }

            });

        });
    </script>


</body>

</html>
