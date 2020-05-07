<!DOCTYPE html>
 <!-- aqui viene de momento la tabla donde aparecen los datos del los usuario -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>pagrinaprincipal</title>

    </head>
    <body>
         
            <table border="1" width="300">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Role Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                    </tr>
                </thead>
                <tbody>
                    @if($users)
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->role_id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->update_at}}</td>
                    </tr>
                     @endforeach
                     @endif
                </tbody>
            </table>

            
            
            
            
            
         
        
        
    </body>
</html>
 