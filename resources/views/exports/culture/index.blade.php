@php
    $i=0;
@endphp
<table class="table table-dark table-striped-columns">
    <thead>
    <tr>
        <th style="background: blue; border:1px solid black;">№</th>
        <th style="background: blue; border:1px solid black;">Наименование</th>
        <th style="background: blue; border:1px solid black;">Создано</th>
        <th style="background: blue; border:1px solid black;">Обновлено</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cultures as $culture)
        <tr>

            <td style="border:1px solid black;">{{ ++$i }}</td>
            <td style="border:1px solid black;">{{ $culture->title }}</td>
            <td style="border:1px solid black;">{{ $culture->created_at }}</td>
            <td style="border:1px solid black;">{{ $culture->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
