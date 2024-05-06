<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <meta name="csrf-token" content="{{csrf_token()}}">


        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
          *{
            margin: 0;
            padding: 0;
          }
          ::webkit-scrollbar{
            width: 5px;
                  }
            ::webkit-scrollbar-track{
                background: #125362;
            }
            ::webkit-scrollbar-thumb{
                background: #028392;
            }

        </style>
    </head>
    <body style="background : #051136">
    <div>
        <div class="container-fluid m-0 d-flex p-2">
            <div class="pl-2" style="width:40px; height: 50px; font-size:180%">
            <i class="fa fa-angle-double-left text-white mt-2"></i>
        </div>
        <div style="width: 50px; height:50px;">
        <img width="100%" height="100%" style="border-radius: 50px" src="../images/download.jpeg" alt="">
    </div>
    <div class="text-white font-weight-bold ml-2 mt-2 ">Chatbot</div>

        </div>
        <div style="background: #123472; height: 2px"></div>
        <div id="content-box" class="container-fluid p-2" style="height: calc(100vh - 130px);overflow-y: scroll">
       
       
    <div class="container-fluid w-100 px-3 py-2 d-flex" style="background: #123475; height:62px;">
    <div class="mr-2 pl-2" style="background: #ffffff1c; width: calc(100% - 45px); border-radius: 5px">
<input id="input" class="text-white" type="text" name="input" style="background:none; width:100%; height:100%; border:0;outline:none; ">
    </div>
    <div id="button-submit" class="text-center" style="background: #152739; height:100%; width: 50px; border-radius: 5px">
    <i class="fa fa-paper-plane text-white" aria-hidden="true" style="line-height: 45px;"></i>
</div>

    </div>
    </div>
        </div>
       
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#button-submit').on('click', function() {
        $value = $('#input').val();
        
        $('#content-box').append(`
            <div class="mb-2">
                <div class="float-right px-3 py-2" style="width:270px; background: #4acfee; border-radius: 10px; float: right; font-size: 85%;">
                    ` + $value + `
                    <div style="clear:both"></div>
                </div>
            </div>
        `);
        
        
       
        // $('#input').val('');
      $.ajax({
        type: 'POST',
        url: '{{url('/send')}}',
        data: {
            'input': $value
        },
        success: function(data) {
            
            $('#content-box').append(`
                <div class="d-flex mb-2">
                    <div class="mr-2" style="width:45px; height:45px;">
                        <img width="100%" height="100%" style="border-radius: 50px" src="../images/download.jpeg" alt="">
                    </div>
                    <div class="text-white px-3 py-2" style="width: 270px; background: #128392; border-radius: 10px; font-size: 85%">
                        ` + data + `
                    </div>
                </div>
            `);
            $value = $('#input').val('');
        }
    });
    });

</script>