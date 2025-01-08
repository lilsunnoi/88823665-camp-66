<h1>My Controller</h1>
<h1>myinput: {{ $myinput; }}</h1>
<h1>myvalue: {{ $myvalue; }}</h1>

<form method="post" action="{{ url('/mycontroller/0') }}">
    @csrf
    <input type="text" name="myinput">
    <button type="submit">Submit</button>
</form>
