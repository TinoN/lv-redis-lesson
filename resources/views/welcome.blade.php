<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <title>Laravel</title>

    </head>
    <body>
        <h1>New Users</h1>
        <div id="app">
            <ul>
                <li v-for="user in users">@{{ user }}</li>
            </ul>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.1/vue.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>

        <script>
            //node server ip an socket uebergeben
            var socket = io('127.0.0.1:3000');
            var app = new Vue({
                el: '#app',

                data: {
                    users: []
                },

                mounted: function(){
                    socket.on('test-channel:UserSignedUp', function(data){
                        console.log('receive');
                            this.users.push(data.username);
                    }.bind(this));
                }
            });
        </script>
    </body>
</html>
