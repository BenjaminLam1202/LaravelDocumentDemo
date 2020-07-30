<div class="flex-center position-ref full-height">
<form action="{{ route('test.check.request')}}" method="post">
    @csrf
    <div>
        <label  class="name">enter any value name you want</label>
        <input type="text" name="name" placeholder="your name value">
    </div>
    <div>
        <label  class="email">enter any value email you want</label>
        <input type="text" name="email" placeholder="your email value">
    </div>
    <div>
        <label  class="title">enter any value title you want</label>
        <input type="text" name="title" placeholder="your title value">
    </div>
    <div>
        <label  class="1">enter any value 1 you want</label>
        <input type="text" name="1" placeholder="your 1 value">
    </div>
    <div>
        <label  class="2">enter any value 2 you want</label>
        <input type="text" name="2" placeholder="your 2 value">
    </div>
    <div>
        <label  class="3">enter any value 3 you want</label>
        <input type="text" name="3" placeholder="your 3 value">
    </div>
    	    <input type="submit" name="submit">
    </form>
</div>