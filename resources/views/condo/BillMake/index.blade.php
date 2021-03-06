@extends('adminlte.dashboard')
@section('title','CreateBill')
@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success text-center">
                    {{Session::get('success')}}
            </div>
        @endif
        <div class="card">
            <div class="card-header text-center">
                    <h1>สร้างบิล</h1>
            </div>
            <div class="card-body">
                <form action="{{url('billmake')}}" method="POST">
                    {{-- @method('GET') --}}
                    @csrf
                    <div class="row">
                        <div class="input-group mt-3 mb-3 text-center">
                                <div class="input-group-prepend ml-3">
                                <span class="input-group-text" id="basic-addon1">
                                    เดือน
                                </span>
                            </div>
                        {{-- <input type="date" class="form-control" name="create_date" placeholder="ชื่อ" aria-label="" aria-describedby="basic-addon1" required> --}}
                                <select class="custom-select col-md" name="month" id="">
                                    <option value="January" @if(isset($month) && $month == 'January') {{"selected"}} @endif>มกราคม</option>
                                    <option value="Febuary" @if(isset($month) && $month == 'Febuary') {{"selected"}} @endif>กุมภาพันธ์</option>
                                    <option value="March" @if(isset($month) && $month == 'March') {{"selected"}} @endif>มีนาคม</option>
                                    <option value="April" @if(isset($month) && $month == 'April') {{"selected"}} @endif>เมษายน</option>
                                    <option value="May" @if(isset($month) && $month == 'May') {{"selected"}} @endif>พฤษภาคม</option>
                                    <option value="June" @if(isset($month) && $month == 'June') {{"selected"}} @endif>มิถุนายน</option>
                                    <option value="July" @if(isset($month) && $month == 'July') {{"selected"}} @endif>กรฏาคม</option>
                                    <option value="August" @if(isset($month) && $month == 'August') {{"selected"}} @endif>สิงหาคม</option>
                                    <option value="September" @if(isset($month) && $month == 'September') {{"selected"}} @endif>กันยายน</option>
                                    <option value="October" @if(isset($month) && $month == 'October') {{"selected"}} @endif>ตุลาคม</option>
                                    <option value="November" @if(isset($month) && $month == 'November') {{"selected"}} @endif>พฤศจิกายน</option>
                                    <option value="December" @if(isset($month) && $month == 'December') {{"selected"}} @endif>ธันวาคม</option>
                                </select>

                                <div class="input-group-prepend ml-3">
                                    <span class="input-group-text" id="basic-addon1">
                                       ปี
                                    </span>
                            </div>
                                    {{-- <input type="date" class="form-control" name="end_date" placeholder="ชื่อ" aria-label="" aria-describedby="basic-addon1" required> --}}
                                    <select class="custom-select col-md" name="year" id="">
                                        <option value="2020" @if(isset($year) && $year == 2020) {{"selected"}} @endif>2020</option>
                                        <option value="2021" @if(isset($year) && $year == 2021) {{"selected"}} @endif>2021</option>
                                        <option value="2022" @if(isset($year) && $year == 2022) {{"selected"}} @endif>2022</option>
                                        <option value="2023" @if(isset($year) && $year == 2023) {{"selected"}} @endif>2023</option>
                                        <option value="2024" @if(isset($year) && $year == 2024) {{"selected"}} @endif>2024</option>
                                        <option value="2025" @if(isset($year) && $year == 2025) {{"selected"}} @endif>2025</option>
                                    </select>

                                    <div class="input-group-prepend ml-3">
                                        <span class="input-group-text" id="basic-addon1">
                                           วันที่ทำการบันทึก
                                        </span>
                                </div>
                                        <input type="date" class="form-control" name="order_date" aria-label="" aria-describedby="basic-addon1" required>

                        </div>
                    </div>

                    <div class="row">

                        <table class="table table-hover table-bordered text-center">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>เลขห้อง</th>
                                    <th>ชื่อเจ้าของห้อง</th>
                                    <th>ราคาต่อเดือน</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{$num++}}</td>
                                        <td>
                                        <input type="text" class="form-control text-center" name="r_name" value="{{ $data->r_name }}" readonly>
                                        <input type="hidden" name="room_id[]" value="{{$data->r_id}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control text-center" name="c_name" value="{{ $data->c_name }}" readonly>
                                            <input type="hidden" name="customer_id[]" value="{{$data->c_id}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control text-center" name="total_price[]" value="{{ $data->price }}" readonly>
                                        </td>
                                            {{-- hidden input --}}
                                            {{-- <input type="hidden" name="order_date" value="{{$data->nowday}}"> --}}
                                            <input type="hidden" name="juristic_id" value="1">
                                            <input type="hidden" name="user_id" value="1">
                                            <input type="hidden" name="meter_log_id[]" value="{{$data->r_id}}">

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    <div class="row float-right">
                        <button class="btn btn-primary" name="deal">ตกลง</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
@endsection
