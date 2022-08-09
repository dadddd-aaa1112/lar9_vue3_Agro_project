@php
    $i=0;
@endphp

<table>
    <thead>
    <tr>
        <th style="background: yellow; border: 1px solid black;">№</th>
        <th style="background: yellow; border: 1px solid black;">Наименование</th>
        <th style="background: yellow; border: 1px solid black;">Нормы азота</th>
        <th style="background: yellow; border: 1px solid black;">Нормы фосфора</th>
        <th style="background: yellow; border: 1px solid black;">Нормы калия</th>
        <th style="background: yellow; border: 1px solid black;">culture_id</th>
        <th style="background: yellow; border: 1px solid black;">Культуры</th>
        <th style="background: yellow; border: 1px solid black;">Район</th>
        <th style="background: yellow; border: 1px solid black;">Цена</th>
        <th style="background: yellow; border: 1px solid black;">Описание</th>
        <th style="background: yellow; border: 1px solid black;">Назначение</th>

    </tr>
    </thead>
    <tbody>
    @foreach($fertilizers as $fertilizer)
        <tr>
            <td style="border: 1px solid black">{{ ++$i }}</td>
            <td style="border: 1px solid black">{{$fertilizer->title}}</td>
            <td style="border: 1px solid black">{{$fertilizer->norm_azot}}</td>
            <td style="border: 1px solid black">{{$fertilizer->norm_fosfor}}</td>
            <td style="border: 1px solid black">{{$fertilizer->norm_kalii}}</td>
            <td style="border: 1px solid black">{{$fertilizer->culture_id}}</td>
            <td style="border: 1px solid black">{{$fertilizer->cultures->title}}</td>
            <td style="border: 1px solid black">{{$fertilizer->raion}}</td>
            <td style="border: 1px solid black">{{$fertilizer->cost}}</td>
            <td style="border: 1px solid black">{{$fertilizer->description}}</td>
            <td style="border: 1px solid black">{{$fertilizer->target}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
