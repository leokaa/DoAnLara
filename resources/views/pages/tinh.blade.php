@extends('layouts.masters')

@section(tieude)
@endsection
<ul>
    <li>Ten: {{$hoten}}</li>
    <li>Diem: {{$diem}}</li>
    <li>Gioitinh: {{$gioitinh}}</li>
</ul>
<table border="1px" >
    <tr>{!!$binhluansai!!}</tr></br>
    <tr> {{$binhluansai}}</tr>
</table>

</br>
@for ($i = 0; $i < 5; $i++)
    Giá trị hiện tại là {{ $i }}</br>
@endfor

</br>

<table border="1px">
    <th>id</th>
    <th>Ten</th>
    <th>Ho</th>
    <th>emial</th>
    <th>gender</th>
    <th>ip</th>
    @foreach($dulieu_json_mang as $row)
    <tr>
        <td>{{$row->id}}</td>
        <td>{{$row->first_name}}</td>
        <td>{{$row->last_name}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->gender}}</td>
        <td>{{$row->ip_address}}</td>
    </tr>
    @endforeach
   
</table>


