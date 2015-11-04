@extends('layout.default')
@section('content')
<table>
    <tr>
        <th>title</th>
        <th>name</th>
    </tr>
    @forelse($list as $row)
        <tr>
            <td>{{{$row['title']}}}</td>
            <td>{{{$row['name']}}}</td>
        </tr>
    @empty
        <tr>
            <td colspan="2">no reserved data</td>
        </tr>
    @endforelse
</table>
<a href="{{{ route('reserve.form') }}}">add reserve form</a>
@stop
