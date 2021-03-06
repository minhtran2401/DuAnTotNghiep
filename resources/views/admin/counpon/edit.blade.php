@extends('admin.layoutadmin')
@section('pagetitle', "CHỈNH SỬA MÃ KHUYẾN MÃI")
@section('main')
<div class="main-content" style="min-height: 659px;">
    <section class="section">
      <div class="section-body">
            <!-- add content here -->
            <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                 
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-success text-white-all">
                    <li class="breadcrumb-item"><a href="{{asset('dashboard')}}"><i class="fas fa-tachometer-alt"></i> TỔNG QUAN</a></li>
                    <li class="breadcrumb-item"><a href="{{route('counpon.index')}}"><i class="far fa-file"></i> MÃ KHUYẾN MÃI</a></li>
                      <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> CHỈNH SỬA MÃ KHUYẾN MÃI</li>
                    </ol>
                  </nav>
              </div>
             
          </div>
          <div class="card">
            <div class="card-body">
              <h4>CHỈNH SỬA MÃ KHUYẾN MÃI</h4>
        <div class="block-header">
        <div class="container">
          
               
            <div class="cart">
                <form id="form_validation" method="POST" action="{{route('counpon.update', $row->counpon_id)}}"   >
                  @csrf
                  @method('patch')
                    <div class="col-md-12 row">
                    <div class="form-group col-md-6">
                        <label>Tên Mã Khuyến Mãi</label>
                        <input type="text" class="form-control" placeholder="Km đầu năm, km mùa covid,..." name="counpon_name" value="{{$row->counpon_name}}" required>
                    </div>
    
                    <div class="col-sm-6 row form-group {{ $errors->get('counpon_code') ? 'has-error' : '' }}">
                      <div class="col-md-9 ">
                      <label>Mã Khuyến Mãi</label>
                      <input type="text" name="counpon_code" value="{{$row->counpon_code}}" placeholder="COVID19, SUMMERSALE,..." class="form-control" required>
                      @foreach($errors->get('counpon_code') as $error)
                        <span class="help-block">{{ $error }}</span>
                      @endforeach
                    </div>
                    <div class="col-md-3">
                      <div style="border:none" class="form-control">
                        <a id="getcode" class="btn btn-success"  >Tạo Mã</a>
                      </div>
                     
                    </div>
                    </div>  
                    <div class="form-group col-md-3">
                      <label>Ngày Hết Hạn</label>
                      <input type="date" class="form-control datepicker"  name="counpon_time" value="{{$row->counpon_time}}" required>
                    </div>

                    <div class="form-group col-md-3">
                      <label>Kiểu Khuyến Mãi</label>
                      <select id="get_value" class="form-control selectric" name="counpon_type">
                        @if ($row->counpon_type ==  0)
                        <option value='{{$row->counpon_type}}' selected >Khuyến Mãi Theo %</option>  
                        <option value="1">Khuyến Mãi Theo Tiền</option>
                        @elseif($row->counpon_type ==  1)
                        <option value='{{$row->counpon_type}}' selected >Khuyến Mãi Theo Tiền</option>  
                        <option value="0"> <p>  Khuyến Mãi Theo %</p></option>
                        @else
                        
                        @endif
                      </select>
                    </div>
                   

                    <div id="select_value" class="form-group col-md-3">
                      <label>Giá Trị Khuyến Mãi</label>    
                      <input  type="text" placeholder="5, 10, 15, 20,..."  class="form-control" value="{{$row->counpon_number}}" name="counpon_number" required>
                    </div>
                   
                    <div  class="form-group col-md-3">
                      <label>Số Lượng Mã Phát Ra</label>    
                    <input  type="text" placeholder="Số lượng mã" class="form-control" value="{{$row->counpon_quanty}}" name="counpon_quanty" required>
                    </div>


                    <div class="form-group col-md-6">
                      <div class="form-check form-check-inline">
                          <input type="radio" name="Anhien" id="Hien" class="with-gap" value="1" @if ($row->Anhien == 1) checked @endif >
                          <label class="form-check-label" for="Hien">Kích Hoạt</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input type="radio" name="Anhien" id="An" class="with-gap" value="0" @if ($row->Anhien == 0) checked  @endif >
                          <label class="form-check-label" for="An">Hủy Bỏ</label>
                      </div>
                  </div>

                </div>
                    

              
                        
                    
                      </div>
                    <button class="btn btn-raised btn-primary waves-effect" type="submit">LƯU DATABASE</button>
                    <button class="btn btn-danger" type="reset">HỦY</button>
                </form>

                
            </div>
        </div>
    </div>
      </div>
    </section>
   
  </div>
@endsection


