@extends('admin.layout.menu')
@extends('admin.apifun.userfun')
@section('contenter')
<script type="text/javascript">
  $(document).ready(function() {
    $.ajaxSetup({

      headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      }

    });
    $('#lala').on('click', function (e) {
        // e.preventDefault();
        var id = $("input[name=testid]").val();
        console.log(id);
        var post_url ='/doc/user/'+id;

        console.log(post_url);

        // var id = $(this).attr('data-id');
        
        $.ajax({
          type: "get",
          url: post_url,
          success:function(data){
          alert("success!! let go");
          window.location.href = "/doc/user/"+id;


      }
        });
      });
  });

</script>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th >danh mục</th>
      <th>kết quả</th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <td><STRONG class="text-center">The Basic</STRONG></td>
    </tr>  	     
    <tr>
      <th scope="row">0</th>
      <td>Route</td>
      <td><a href="{{ route('doc.dashboard') }}">Route dashboard</a></td>
    </tr>  	 
    <tr>
      <th scope="row">1</th>
      <td>Middleware</td>
      <td>đang nhap bằng tài khoản khác và vào <a href="/admin"> trang này</a> để kiểm tra nếu đúng admin hoặc lam thai gia huy thi vào được không se báo lỗi authenticate</td>
    </tr>  	     
    <tr>
      <th scope="row">2</th>
      <td>CSRF Protection</td>
      <td>day la trang co CSRF <a href="{{ route('co.token') }}"> có </a> day la trang khong CSRF <a href="{{ route('khong.token') }}"> không </a> nếu có token thì sẽ pass qua không thì báo lỗi 419</td>
    </tr>            
    <tr>
      <th scope="row">3</th>
      <td>Request</td>
      <td>vao day de xem cach hoat dong cua request <a href="{{ route('chec.requ') }}"> check </a> </td>
    </tr>               
    <tr>
      <th scope="row">4</th>
      <td>Responses</td>
      <td>vao day de xem cach hoat dong cua Responses <a href="{{ route('check.response')}}"> check </a> </td>
    </tr>       
    <tr>
      <th scope="row">5</th>
      <td>URL generate</td>
      <td>
            <input type="num" name="testid" placeholder="input yours id" id="lala">
      </td>
    </tr>      
    <tr>
      <tr>
        <th scope="row">5</th>
        <td>Validate</td>
        <td>
          <a href="{{ route('validate.test')}}">validate</a>
        </td>
      </tr>
      <th scope="row">6</th>
      <td>Error Log</td>
      <td>
          <form action="{{ route('doc.check.error')}}" method="get">
            <input type="num" name="tes" placeholder="input yours id">
            <input type="submit" name="submit">
          </form>
      </td>
    </tr>   

    <tr>
      <th scope="row">8</th>
      <td>logging</td>
      <td><a href="{{ route('doc.check.logging') }}">test logging</a>xem log bằng storage/app/laravel.log cấp quyền 755 cho nó ghi log , config log trong mục config/app =>log muốn làm log cập nhật nhiều hơn thì thêm 'log_max_files' => 30 do mặc định log chỉ save trong 5 ngày</td>
    </tr>
    <tr>
      <td><STRONG class="text-center">Front-end</STRONG></td>
    </tr>    
    <tr>
      <th scope="row">9</th>
      <td>Localization</td>
      <td>bấm vào <a href="/doc">đây</a> để đổi ngôn ngữ sử dụng localization + middleware + session =>config app local => vn or en </td>
    </tr> 
   <tr>
      <td><STRONG class="text-center">Security</STRONG></td>
    </tr>        
    <tr>
      <th scope="row">10</th>
      <td>Authentication</td>
      <td>bấm vào đây bạn sẽ thấy dòng "nếu đăng nhập rồi bạn sẽ thấy cái này" <a href="{{ route('doc.testauth') }}">đây</a> còn chưa đăng nhập sẽ thấy cái này "của mấy cậu chưa đăng nhập" </td>
    </tr> 
      
    <tr>
      <th scope="row">7</th>
      <td>đây là chỗ được encrypted lại nà :</td>
      <td>{{$encrypted}}</td>
    </tr>    
    <tr>
      <th scope="row">11</th>
      <td>đây là chỗ được decrypted lại nà :</td>
      <td>{{$decrypted}}</td>
    </tr>
    <tr>
    <tr>
      <th scope="row">14</th>
      <td>đây là chỗ được hash lại nà :</td>
      <td>{{$hash}}</td>
    </tr>
    <tr>
      <th scope="row">15</th>
      <td>đây là chỗ được check hash lại nà :</td>
      <td>{{$checkhash}}</td>
    </tr>   
      <td><STRONG class="text-center">Digging Deeper</STRONG></td>
    </tr>
    <tr>
      <th scope="row">12</th>
      <td>đây là chỗ cache nà :v :</td>
      <td><a href="{{route('demo.cachemain')}}">click here</a> to show the user number 1 , {{$value?? 'chua'}}</td>
    </tr>    
    <tr>
      <th scope="row">12</th>
      <td>đây là chỗ được collect lại nà :</td>
      <td>{{$collections}}</td>
    </tr>    
    <tr>
      <th scope="row">12</th>
      <td>đây là chỗ được list collect lại nà :</td>
      <td>
        <ul>
          @foreach($groupCollections as $groupCollection=>$products)
          <h3>{{$groupCollection}}</h3>
            @foreach($products as $product)
              <li>{{$product['product']}} </li><p>{{$product['price']}}$</p>
            @endforeach
          @endforeach
        </ul>
         
        <h4>total price : {{$collectionprice}}</h4>
      </td>
    </tr>
    <tr>
      <th scope="row">13</th>
      <td>đây là chỗ được đơn dữ liệu collect lại nà :</td>
      <td>{{$collections0}}</td>
    </tr>
    <tr>
      <th scope="row">24</th>
      <td>Events</td>
      <td><a href="{{route('demo.manager')}}"> events</a><p>xem trong class userfun se thay khi trigger 1 lệnh tạo user mới nó sẽ lưu vào flash_messaage tin nhắn báo listener thành công và send back lên mail 1 thư listening</p></td>
    </tr>
    <tr>
      <th scope="row">24</th>
      <td>Filesystem</td>
      <td><a href="{{route('demo.manager')}}"> file trong uploadimage</a> </td>
    </tr>       
     <tr>
      <th scope="row">16</th>
      <td>mail</td>
      <td><a href="{{route('mailform')}}">mail</a></td>
    </tr>     
    <tr>
      <th scope="row">17</th>
      <td>notification nà :v</td>

      <td>
        <a href="{{ route('demo.manager')}}">notification khi tao user moi</a>
        <button type="button" class="btn btn-primary" name="button" data-toggle="modal" data-target="#modalRegisterForm"> New User </button>
        <p>xem trong class userfun thành công và send back lên mail 1 thư feedback</p>
      </td>

    </tr>
    <tr>
      <th scope="row">24</th>
      <td>Queues</td>
      <td><a href="{{ route('demo.sendEmail')}}"> queues trong class sendEmail</a></td>
    </tr>     
     <tr>
      <th scope="row">18</th>
      <td>task schedule nà :v</td>
      <td><a href="/admin">bấm php artisan delete:cron hoặc vào crontask-e</a></td>
    </tr> 
     <tr>
      <th scope="row">19</th>
      <td>package</td>
      <td><a href="/admin">ConsoleTV (chart)</a> \ <a href="/admin/article">CSV</a></td>
    </tr>
    <tr>
      <td><STRONG class="text-center">Database</STRONG></td>
    </tr> 
    <tr>
      <th scope="row">20</th>
      <td>Query builder</td>
      <td>cái này là lấy dữ liệu bằng db query nà <strong>{{$user7db}}</strong> cái này lấy của model <strong>{{$user7m}}</strong></td>
    </tr> 
    <tr>
      <th scope="row">21</th>
      <td>Pagination</td>
      <td>vào controller của AdminController => articlemanager() kết quả là <a href="/admin/article">đây</a> :v</td>
    </tr> 
    <tr>
      <th scope="row">22</th>
      <td>Migrate + Seeder</td>
      <td>nếu fresh nhưng muốn seed ra vài fake dữ liệu thì :v bấm thế này cho lẹ <strong>php artisan migrate:fresh --seed</strong> muốn tạo thêm seed thì vào database -> seeds -> DatabaseSeeder còn muốn seed thôi thì bấm <strong>php artisan db:seed</strong>, seed 1 table cụ thể thì bấm vậy <strong>php artisan db:seed --class=UserSeeder</strong> </td>
    </tr>
    <tr>
      <td><STRONG class="text-center">Eloquen ORM</STRONG></td>
    </tr>        
    <tr> 
    <tr>
      <th scope="row">23</th>
      <td>eloquent collect</td>
      <td>tìm thử thằng người dùng có trong db không 
          <form action="/doc/collectelo" method="get">
            <input type="num" name="tes" placeholder="input yours id">
            <input type="submit" name="submit">
          </form>
      </td>
    </tr>
    <tr>
      <th scope="row">23</th>
      <td>eloquent Relationships</td>
      <td>tìm thử thằng người dùng có trong db không 
          <a href="{{route('demo.rela')}}">check vao function rela de sua va xem thay doi</a>
      </td>
    </tr>
    <tr>
      <th scope="row">23</th>
      <td>Mutators</td>
      <td>
        <form action="/doc/testmurators" method="get">
            <input type="text" name="value" placeholder="input yours value to change the user :7 ">
            <input type="submit" name="submit">
        </form>
        <a href="{{ route('muratorstest.accessorstest') }}"> accessor test</a>
      </td>
    </tr>
    <tr>
      <th scope="row">24</th>
      <td>Api</td>
      <td>kết quả <a href="/admin/category"> đây</a> trang này chạy bằng chức năng bằng api</td>
    </tr>    
    
     <tr>
      <th scope="row">25</th>
      <td>Eloquent: Serialization</td>
      <td>          
        <form action="{{ route('demo.serializeelo')}}" method="get">
            <input type="num" name="tes" placeholder="input yours id">
            <input type="submit" name="submit">
        </form>
      </td>
    </tr> 
      <tr>
      <td><STRONG class="text-center">Đang và chưa xem xong </STRONG></td>
    </tr>   

    <tr>
      <th scope="row">24</th>
      <td>Authorization</td>
      <td><a href="https://laravel.com/docs/7.x/authorization"> authorization</a></td>
    </tr>    
    <tr>
      <th scope="row">24</th>
      <td>Redis</td>
      <td><a href="https://laravel.com/docs/7.x/redis"> redis</a></td>
    </tr>   
    <tr>
      <th scope="row">24</th>
      <td>Broadcasting</td>
      <td><a href="https://laravel.com/docs/7.x/broadcasting"> broadcasting</a></td>
    </tr>                
      
    
  </tbody>
</table>
</div>
@endsection