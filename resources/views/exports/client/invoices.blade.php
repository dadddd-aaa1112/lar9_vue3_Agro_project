@php
    $i=0;
@endphp
<table class="table table-dark table-striped-columns">
    <thead >
    <tr >
        <th style="background: greenyellow; border:1px solid black;">№</th>
        <th style="background: greenyellow; border:1px solid black;">Наименование</th>
        <th style="background: greenyellow; border:1px solid black;">Дата заказа</th>
        <th style="background: greenyellow; border:1px solid black;">Цена</th>
        <th style="background: greenyellow; border:1px solid black;">Регион</th>
        <th style="background: greenyellow; border:1px solid black;">Создано</th>
        <th style="background: greenyellow; border:1px solid black;">Обновлено</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td style="font-weight: bold; border:1px solid black;">{{ ++$i }}</td>
            <td style="border:1px solid black;" >{{ $client->title }}</td>
            <td style="border:1px solid black;" >{{ $client->date_order }}</td>
            <td style="border:1px solid black;" >{{ $client->cost }}</td>
            <td style="border:1px solid black;" >{{ $client->region }}</td>
            <td style="border:1px solid black;" >{{ $client->created_at }}</td>
            <td style="border:1px solid black;" >{{ $client->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
