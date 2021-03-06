@extends('admin.layoutadmin')
@section('pagetitle', "THÊM TIN TUYỂN DỤNG MỚI")
@section('main')
@include('sweetalert::alert')

<div class="main-content">
    <section class="section">
      <div class="section-body">      
        <div class="row">
          <div class="col-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb bg-primary text-white-all">
              <li class="breadcrumb-item"><a href="{{asset('/')}}"><i class="fas fa-tachometer-alt"></i> Tổng Quan</a></li>
              <li class="breadcrumb-item"><a href="{{route('tuyendung.index')}}"><i class="far fa-file"></i>Tin Tuyển Dụng</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Danh Sách Tin Tuyển Dụng</li>
              </ol>
            </nav>
            <div class="card">
              <div class="card-header">
                <h4>DANH SÁCH VỊ TRÍ TUYỂN DỤNG</h4>
               
              <a href="{{route('tuyendung.create')}}"> <button class="btn btn-primary">
                <i class="fa fa-plus-square " aria-hidden="true"></i> Đăng Tin
              </button>
            </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center">
                          #
                        </th>
                        <th>Vị Trí Tuyển</th>
                        <th>Trạng Thái</th>
                        <th>Quản Lí</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($ds as $row)
                      <tr>
                        <td class="text-center" >
                            {{ $row->id_tuyendung}}
                        </td>
                        <td>
                        <div>{{$row->name_tuyendung}}</div>
                        </td>

                        <td data-id="{{ $row->id_tuyendung }}"  >
                          
                          <div class="pretty p-switch p-fill">
                       
                        {{-- tạo class change-status để lấy sự kiện click --}}
                            <input type="checkbox" class="change-status" {{ $row->Anhien==1?'checked':'' }}>
                            <div class="state p-success">
                              <label class="content-status">{{ $row->Anhien==1?'Hiện':'Ẩn'}}</label>
                            </div>
                          </div>
                      </td>



                        <td >


                          <form class="form-check-inline"  method="GET">

                         <button style="border: 0"style="border: 0"  > <a href="{{route('tuyendung.edit', $row->id_tuyendung)}}"  title="Sửa" class="btn btn-icon btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Sửa</a></button>
                        </form>
                        <form class="form-check-inline" action="{{route('tuyendung.destroy', $row->id_tuyendung)}}" method="POST">
                                @csrf
                                {!! method_field('delete') !!}
                             <button class="btn btn-icon btn-danger" style="border: 0" onclick=xoaha(event) ><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
                        </form>

                      </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection
