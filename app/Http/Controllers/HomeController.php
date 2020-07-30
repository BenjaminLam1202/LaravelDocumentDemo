<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Mail;
use auth;
use App\User;
use Log;
use Queue;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\NotifiInput;
use App\Notifications\NewUserNotification;
use Illuminate\Notifications\Notification;
use App\Http\Requests\UserRequest;
use Cache;
use Carbon\Carbon;
use App\Events\UserAdded;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Jobs\ProcessUser;
use App\Exports\ExportUsers;
use App\Imports\ImportUsers;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\UserRepository;
// use App\Rules\AppointmentCheck;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    ///////////////////////////////////Main/////////////////////////////////////////
    /**
     * [testafter description]
     * @param  Request $request [description]
     * @return [type]           [('encrypted','decrypted','collections','collectionprice','collections0','groupCollections','hash','checkhash','user7m','user7db','value')]
     */
    public function testafter(Request $request)
    {
        
        $data = $request->validate([
        'testme' =>'string|required|max:255',
        ]);
        //$data = $request->query();
        $testme = $data['testme'];


        //encryp cho nay ne :v
        $encrypted = Crypt::encryptString($testme);

        $decrypted = Crypt::decryptString($encrypted);
        //$collection = Collection::make([$testme, 2, 3]);
        // $collection = collect([$testme, 2, 3]);
        $collections = collect([
            ['product' => $testme, 'price' => 200, 'tag' => "Hilton"],
            ['product' => 'Table', 'price' => 210, 'tag' =>  "Hilton"],
            ['product' => 'Chair', 'price' => 30, 'tag' => "Yerin"],
            ['product' => 'Pen', 'price' => 70, 'tag' => "Yerin"],
            ['product' => 'Sugar', 'price' => 500, 'tag' =>  "Hilton"],
            ['product' => 'Candy', 'price' => 45, 'tag' =>  "Hilton"],
            ['product' => 'Blue', 'price' => 60, 'tag' => "Yerin"],
            ['product' => 'Apple', 'price' => 20, 'tag' => "Yerin"],
        
        ]);
        // dd($collection['0']['product']);
        //hash cho nay ne :v
        $hash = Hash::make($testme, [
            'memory' => 1024,
            'time' => 2,
            'threads' => 2,
        ]);
        $true = "dung roi";
        $false = "sai qua sai :v";
        
        $checkhash = Hash::check($testme, $hash)? $true : $false;
        
        //collect cho nay ne
        $collections0 = $collections['0']['product'];
        $collectionprice = $collections->sum('price');
        $groupCollections = $collections->groupBy('tag');
        $collectdb = $this->querytest();

        $user7m = $collectdb['1']['0']->name;
        $user7db = $collectdb['1']['0']->name;
        $value = $this->cachemain();



        return view('will.Document',compact('encrypted','decrypted','collections','collectionprice','collections0','groupCollections','hash','checkhash','user7m','user7db','value'));

    }  

    ///////////////////////////////////////////////////////////////////////////////////

    /**
     * send mail demo send mail
     * @param Request $request [description]
     */
    public function addFeedback(Request $request)
    {
        $input = $request->all();
        Mail::send('mail.sendform', array('name'=>$input["name"],'email'=>$input["email"], 'content'=>$input['comment']), function($message){
            // $message->to('hilton@asia.cybridge.jp', 'Visitor')->subject('Visitor Feedback!');
            $message->to('hilton@asia.cybridge.jp', 'Visitor')->subject('Visitor Feedback!');
        });
        Session::flash('flash_message', 'Send message successfully!');
        return view('mail.form');
    }

    /**
     * [testme this will send http with value to testafter]
     * @param  Request $request [description]
     * @return [type]           [http cient with $test and $request -> testafter]
     */
    public function testme(Request $request)
    {
        $input = $request->all();
        //session ne :v
        Session::put('testme', $input['testme']);
        $testme = Session::get('testme');
        //htttp client ne :v
        $token = $input['_token'];
        return $this->reposonhttpclient($token,$request);
    }

    /**
     * [serializeelo array,json,hidden,visivle demo serialize]
     * @param  Request $request [description]
     * @return [type]           [show type of $request can return to user]
     */
    public function serializeelo(Request $request)
    {
        $data = $request->validate([
            'tes' =>'string|required|max:3',
        ]);
        $user = User::findOrFail($data['tes']);
        dd("the hien du lieu theo kieu json",$user->toJson(JSON_PRETTY_PRINT),"the hien du lieu theo kieu string",(string) $user,"the hien du lieu theo kieu array",$user->toArray(),"lam 1 so du lieu mong muon co the xem duoc boi nguoi dung",$user->makeVisible('attribute')->toArray(),"lam 1 so du lieu mong muon khong duoc boi nguoi dung", $user->makeHidden('attribute')->toArray());
    }

    /**
     * [collectelo tim xem trong database co ton tai nguoi nay khong ]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function collectelo(Request $request)
    {


        $data = $request->validate([
            'tes' =>'string|required|max:3',
        ]);
        $users = User::all();

        $users->contains($data['tes']) ? $results = "co ton tai thang nay :v" : $results ="gi ? ai biet dau ?";
        // $users = $users->fresh('posts'); // giống ::with
        $collectelo = collect([$results]);
        return $this->response200($collectelo);
    //  return response()->json([
    //     'count' => count($users),
    //     'data' => $users // or whatever
    // ]);
    }

    /**
     * [querytest using database query]
     * @return [type] [dataquery->testafter]
     */
    public function querytest()
    {
        $user7m = User::findOrFail(1); //lay user = 1 bằng model 
        $user7db = DB::table('users')->where('id',1)->get(); //lay user = 1 bằng query DB
        $dataquery = collect([$user7m,$user7db]);
        return $dataquery;
    }    


    /**
     * [testcheckre demo request]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function testcheckre(Request $request)
    {
       dd($request->all());
    }    

    /**
     * [testloerror demo error]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function testloerror(Request $request)
    {
        
       $data = $request->all();
       $data['tes'] == 1 ?  abort(403, 'Unauthorized action.') 
                         : $successfu = "right";

        return $this->response200($successfu);                   
    }  

    /**
     * [logging demo logging]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function logging(Request $request)
    {
        
       $data = $request->all();
       $id = auth::user()->id;
       Log::info('Showing user profile for user: '.$id);

         return view('admin.user', ['user' => User::findOrFail($id)]);              
    }    


    /**
     * [notifi demo notification , check the request return of input]
     * @param  NotifiInput $request [description]
     * @return [type]               [description]
     */
    public function notifi(NotifiInput $request)
    {
        return $this->response200('hello'); 
    }    


    /**
     * [changeLanguage check locatize]
     * @param  [type] $language [description]
     * @return [type]           [description]
     */
    public function changeLanguage($language)
    {
        Session::put('website_language', $language);

        return redirect()->back();
    }

    /**
     * [userpage demo url generator]
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public function userpage($user)
    {

        $user = User::find($user);
        
        $user = $user->toJson(JSON_PRETTY_PRINT);

        return view('admin.user')->with('user',$user);
    }
    
    public function manager()
    {

        $users = User::orderBy('id', 'desc')->paginate(10);
        // $notifications = Auth()->user()->unreadNotifications;
        $notifications = DB::table('notifications')->get(); 
        return view('admin.manager.manager')
                    ->with('users',$users)
                    ->with('notifications',$notifications);
    }

    /**
     * [userfun description]
     * @param  UserRequest $request [description]
     * @return [type]               [description]
     */
    public function userfun(UserRequest $request)
    {
        $admin = auth()->user();
        $data = $request->all();
        $data?$this->eventByModelAfterCreateRequest($data)
            :$this->returnWithError($data);
        // Notification::send($admin, new NewUserNotification($data));
        $notifi = new NewUserNotification();
        // $notifi->toDatabase($data);
        $notifi->sendMail($data);
        $user_this = User::where('email',$data['email'])->get()->first()->id;
        $user_this = User::find($user_this);
        $user_this->notify(new NewUserNotification());
        return redirect()->back();
    }

    public function delete($user)
    {
        $user = User::findOrFail($user);
        $user->delete();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255','unique:users'],
            'id' => 'required',
        ]);

        $user = User::findOrFail($data['id']);
        User::where('id', $user->id)->update(['name' => $data['name']]);
        return redirect()->back();
    }

    /**
     * [cachemain demo cache]
     * @return [type] [description]
     */
    public function cachemain()
    {

        $expiresAt = Carbon::now()->addMinutes(1);
        $value = Cache::remember('users', $expiresAt, function() {
            return DB::table('users')->where("id",1)->get();
        });
        //$value = Cache::pull('users');
        $value2 = "day";
        return $value;
    }    
    public function cachemaintain()
    {

       //Cache::forget('users');
        // $value1 = Cache::pull('users');
        if(Cache::has('users')) 
            { 
                $valuethat = Cache::get('users');
                // return response($valuethat, 201)->header('Content-Type', 'text/plain');
                return $this->response200($valuethat); 
            }
             // return response("khong co cache", 201)->header('Content-Type', 'text/plain');
             return $this->response200("khong co cache"); 

    }
    /**
     * [markread demo notification]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function markread($id)
    {
        $noti = DB::table('notifications')->where('id',$id)->delete();
        return redirect()->back(); 

    }
    public function xoahet()
    {
        $noti = DB::table('notifications')->delete();
        return redirect()->back(); 

    }
    /**
     * [uploadimage demo file system]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function uploadimage(Request $request)
    {   

        // dd($request->all());
        $data = $request->validate([
          'file' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
        $time = Carbon::now()->format('dhi');
        if($data && $request->hasFile('file'))
        {
            $image = $data['file'];
            // $image = $request->file('file');
            // dd($image);
            $extension=$image->getClientOriginalExtension();
            $name = $time.'-'.basename($image).'.'.$extension;
            // Storage::move($image, 'image/'.$name);
            // $url = Storage::disk('uploads')->put($name, $image);
            // $path = storage_path('app/public/uploads/' . $name . '/');
            // Storage::disk('uploads')->put('file.txt', 'Contents');
            // Storage::disk('uploads')->put($image, $fileContents);
            // $up = Storage::putFileAs($name, new File($image), 'public');
            // $imagePath = $image->store('uploads', 'public');
            $path = Storage::putFileAs('public/uploads',$image,$image->hashName());
            // $contents = Storage::get($path);
            $na = $image->hashName();

            $path?Session::flash('image_status','storage/uploads/'.$na):Session::flash('image_status', 'image uploaded fail!!');
            return redirect()->back();

        }else{  
            Session::flash('image_status', 'image uploaded fail!!');
            return $this->returnWithError($data);
        }

    }
    public function muratorstest(Request $request)
    {   
        $name = 'valuetest';
        $this->putSessionByName($request,$name);
                // dd(Session::get($name,$data['value']));
        // $value = $this->getSessionByName($name);
        $user = User::find(1);
        $user->name = $this->getSessionByName($name);
        $user->save();
        return $this->response200($user);
    }       
    public function accessorstest()
    {
        $user = User::find(1);
        $value = $user->name;
        return $this->response200($value);
    }

    /**
     * [sendEmail demo queue]
     * @return [type] [description]
     */
    public function sendEmail()
    {
        $email = collect([
            'from' => "job", 
             'detai' => "i heard that new job have been added in queue", 
             'thanhk' => "thank for using our service from here and this is after fixed this 5",
        ]);
       // $emailUser = (new ProcessUser())->delay(Carbon::now()->addSeconds(3));
       // $emailUser = (new ProcessUser())->onConnection('database')->onQueue('email')->delay(Carbon::now()->addSeconds(3));
       
       
       // dispatch($emailUser);
       
       $email = (new ProcessUser($email));
       // Queue::pushOn('email', new ProcessUser($email));
    
       $email2 = (new NewUserNotification());
       dispatch($email)->onQueue('email')->delay(now()->addMinutes(1));
       // dispatch($email2)->onQueue('email')->delay(now()->addSeconds(200));

        return $this->response200("send");
    }


    /**
     * [export demo package]
     * @return [type] [description]
     */
    public function export() 
    {
        return Excel::download(new ExportUsers, 'users.xlsx');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new ImportUsers, request()->file('file'));
            
        return back();
    }        

    /**
     * [rela demo rela]
     * @return [type] [description]
     */
    public function rela() 
    {
        $user = User::has('posts')->get();
        // $user = User::doesntHave('posts')->get();

        // $user = User::has('posts', '>=', 2)->get();

        // $user = User::has('posts')->has('comments')->get();
        // $user = User::has('posts')->Orhas('comments')->get();

        // $user = User::has('posts.comments')->get();
        // $user = User::has('posts.comments','>=', 2)->get();

        // $user = User::whereHas('posts', function($query) {
        //     return $query->where('is_featured',1);
        // })->get();
            
        return $this->response200($user);
    }    



    //////////////////////////////////Return Redirect Respone////////////////////////////
    /**
     * @return redirect('/')                                                            
     */
    public function returnrigh()
    {
        
       return redirect('/');
    }
    /**
     * @param  Request
     * @return Http::get('https://www.google.com/');
     */
    public function httpg(Request $request)
    {
        
        return Http::get('https://www.google.com/');
    }        
    /**
     * @param  Request
     * @return response($key, 200)
     */
    public function response200($key)
    {
        
        return response($key, 200)
                  ->header('Content-Type', 'text/plain');
    }
    /**
     * @param  $token[string]
     * @param  $link[strong]
     * @return Http::withToken
     */
    public function reposonhttpclient($token,$request)
    {
        $testme = Session::get('testme');
        return Http::withToken($token)->get('http://10.11.13.51/doc/laravel', [
            'request' => $request,
            'testme'=>$testme,
        ]);
    }
    public function putSessionByName($request,$name)
    {
        $data = $request->validate([
                'value' => 'required',
        ]);
        // Session::put('valuetest',$data['value']);
        Session::put($name,$data['value']);


    }
    public function getSessionByName($name)
    {
        return Session::get($name);

    }    
    public function returnWithError($data)
    {
        return redirect()
                    ->back()
                    ->withErrors($data)
                    ->withInput();
    }

    public function eventByModelAfterCreateRequest($data)
    {
        $user_id = $this->userRepository->createAndGetID($data);
            $user_this = User::find($user_id);
            event(new UserAdded($user_this));
            \Log::info("run event ".$user_this);
    }
    
    ////////////////////////////////////////////////////////////////////////////////////  
}
