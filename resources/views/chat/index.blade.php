<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
</head>

<body>
    {{-- <div id="start-chat">
        <form action="" id="save-name">
            <input type="text" id="name" required placeholder="Entyer your name">
            <input type="submit" value="Lets chat">
        </form>
    </div>
    <div id="chat-part">
        <form action="" method="POST" id="chat-form">
            @csrf
            <input type="hidden" name="username" id="username">
            <input type="text" id="message" name="message" required placeholder="Enter Message">
            <input type="submit" value="Send">
        </form>
    </div> --}}
   
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="col-lg-12">


                <section style="background-color: #eee;">
                    <div class="container py-5">

                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10 col-lg-8 col-xl-6">

                                <div class="card" id="chat2">
                                    <div class="enter">
                                            <h4>Enter Your Name For Chat</h4>

                                    </div>
                                    <div id="start-chat">
                                            <form action="" id="save-name">
                                                <input type="text" id="name" required placeholder="Entyer your name">
                                                <input type="submit" value="Lets chat">
                                            </form>
                                        </div>
                                    <div class="card-header d-flex justify-content-between align-items-center p-3">
                                        <h5 class="mb-0">Chat</h5>
                                        <button type="button" class="btn btn-primary btn-sm"
                                            data-mdb-ripple-color="dark">Let's Chat
                                            App</button>
                                    </div>
                                   
                                    <div class="card-body" data-mdb-perfect-scrollbar="true"
                                        style="position: relative; height: 400px">
                                        <div class="container-fluid">
                                            <div class="col-lg-2"></div>
                                            <div class="col-lg-9 bg-primary text-white rounded border ">
                                                    <div id="message-section"></div>

                                            </div>

                                        </div>

                                    

                                        </div>

                                       
                                        <div id="chat-part">
                                                <form action="" method="POST" id="chat-form">
                                                    @csrf
                                                    <input type="hidden" name="username" id="username">
                                                    <input type="text" id="message" name="message" required placeholder="Enter Message">
                                                    <input type="submit" value="Send">
                                                </form>
                                            </div>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>

                       
                    </div>
                </section>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $('#chat-part').hide();

            $('#start-chat').submit(function(e){
                e.preventDefault();
                $('#username').val($('#name').val());
                $('#start-chat').hide();
                $('.enter').hide();
                $('#chat-part').show();
             });
             $('#chat-form').submit(function(e){
                e.preventDefault();
                var formData=$(this).serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('broadcastMessage') }}",
                    data: formData,
                   
                    success: function (response) {
                    //    alert('response');
                    }
                });
                $('#message').val("");

               
                
             });
             Echo.channel('message').listen('MessageEvent',(e)=>{
                    // console.log(e);
                    let html=`<br>
                    <b>`+e.username+`:-</b>
                    <span>`+e.message+`</span>`;
                    console.log(html);
                    $('#message-section').append(html);
                });

    
    </script>
</body>

</html>

