<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        table, td, th {
            border: 1px double black;
        }
    </style>    
</head>
        
<body>
    <table class="table">
        <tr>
            <thead  class="thead-light">
                <th scope="col">Номер</th>
                <th scope="col">Вещь и место</th>
                <th scope="col">Описание</th>
                <th scope="col">Время заявления</th>
            </thead>
        </tr>
        <tr>
            <th scope="row">{{ $crash->id }}</th>
            <td>{{ $crash->obj }}<br>{{ $crash->loc }}</td>
			<td>{{ $crash->description }}</td>
			<td>{{ $crash->time }}</td>
        </tr>
        </table>
</body>

</html>