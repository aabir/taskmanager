<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task Manager</title>

        <!-- CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('/css/jquery.fancybox.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('/js/jquery.fancybox.pack.js') }}"></script> 

        @yield('after_js')

        <script>
    
            jQuery(document).ready(function($){
                
                // $('#entry_form').submit(function(e){
                //     e.preventDefault(); 
                //     $form = $(this);
                //     $.ajax({
                //         url: $form.attr("action"),
                //         type: 'POST',
                //         data: $form.serialize(),
                          
                //         success: function(rt){
                //             var name = $('#name').val();
                //             var description = $('#description').val();
                //             $form[0].reset();
                //             
                //             window.location.reload();
                //         }
                //     });      
                // }); 

                $(".edit").fancybox({
                    maxWidth    : 600,
                    maxHeight   : 300,
                    fitToView   : false,
                    width       : '70%',
                    height      : '70%',
                    autoSize    : false,
                    closeClick  : false,
                    openEffect  : 'none',
                    closeEffect : 'none',
                    'afterClose':function () {
                    //     //parent.$.fancybox.close();
                        window.location.reload();
                    }

                });


                $('#edit_form').submit(function(e){
                     e.preventDefault(); 
                     $form = $(this);
                     $.ajax({
                         url: $form.attr("action"),
                         type: 'POST',
                         data: $form.serialize(),
                          
                         success: function(rt){
                             parent.$.fancybox.close();
                             window.location.reload();
                         }
                     });      
                 });

            });

        </script>

    </body>
</html>