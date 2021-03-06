@extends('admin.layoutadmin')
@section('pagetitle', 'NHẬP KHO HÀNG')
@section('main')
    @include('admin/khohang/loop')
@endsection
@section('jsc')

  <script>
    
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("#table-1").on("click", ".change-status", function(e){
// $(document).ready(function(){
    $('.change-status').change(function(e){
        // ngăn sự kiện change-status này khi click sẽ lan ra các sự kiện khác
        //thường áp dụng cho các button form hoặc thẻ link ( tag a )
          e.preventDefault();

          //lấy id nhóm sản phẩm từ thẻ td ( data-id )
          var sku=$(this).parent().parent().data('id');

        
        var status=$(this).prop('checked')?1:0;
   
          //tạo biến global cho element đang click
          var change=$(this)
          var content=$(this).parent().find('.content-status')
          //nếu có id thì mới gửi ajax
          if(sku){
              $.ajax({
                  //tên route có url là ....
                  url:"{{ route('changeStatus.kho') }}",
                  // kiểu method nên là post
                  type:"post",

                  //truyền biến id bà status
                  data:{sku:sku,status:status}

                  //nếu gửi thành công
              }).done(function(result){
                //nếu k nhận dc id
                  if(result=='error'){
                      alert("Không nhận được sku.");
                  let old= change.prop('checked')?false:true;
                    change.prop('checked',old)
                      //k cho chạy lệnh bên dưới nhờ return
                      return;
                  }


                  //nếu status là 1 ( hiện )
                  if(status==1){
                      change.prop('checked','checked')
                      content.text('Đã nhập giá')
                   
                      //k cho chạy lệnh bên dưới nhờ return
                      return;
                  }
                  else
                  //nếu status là 0 ( ẩn )
                     
                      change.prop('checked','')
                      content.text('Chưa nhập giá')
                    //nếu gửi thất bại
              }).fail(function(){
                  let old= change.prop('checked')?false:true;
                    change.prop('checked',old)
                  alert("Xảy ra lỗi từ phía server.");
              })
          }
      })
    })
</script>
@endsection


