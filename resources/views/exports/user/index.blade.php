@php
    {{$i=0;}}
@endphp

<table>
    <thead>
    <tr>
        <th style="border: 1px solid black; background: fuchsia;">Name</th>
        <th style="border: 1px solid black; background: fuchsia;">Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td style="border: 1px solid black;">{{ $user->name }}</td>
            <td style="border: 1px solid black;">{{ $user->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
